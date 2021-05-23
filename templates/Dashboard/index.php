<?php

use Cake\ORM\TableRegistry;
use Cake\I18n\FrozenTime;

echo $this->Html->script("https://canvasjs.com/assets/script/canvasjs.min.js");

$talents = TableRegistry::getTableLocator()->get('Talents');
$suppliers = TableRegistry::getTableLocator()->get('Suppliers');
$venues = TableRegistry::getTableLocator()->get('Venues');
$customers = TableRegistry::getTableLocator()->get('Customers');
$bookings = TableRegistry::getTableLocator()->get('Bookings');

$talent = $talents
    ->find()
    ->all()
    ->count();
$supplier = $suppliers
    ->find()
    ->all()
    ->count();
$venue = $venues
    ->find()
    ->all()
    ->count();
$customer = $customers
    ->find()
    ->all()
    ->count();
$booking = $bookings
    ->find()
    ->all();


$now = FrozenTime::now();

$beforeNow = 0;
$afterNow = 0;
$today = 0;
$lastWeek = 0;
$thisWeek = 0;
$nextWeek = 0;
$future = 0;

foreach ($booking as $eachbooking) {
    $time = $eachbooking->start_time;

    if($time->isToday()){
        $today++;
    }
    if($time < $now){
        //everything before this second
        $beforeNow++;
    }
    if($time > $now){
        //everything after this second
        $afterNow++;
    }
    if($time->wasWithinLast('1 week')){
        //everything in last week
        $lastWeek++;
    }
    if($time->isWithinNext('1 week')){
        $thisWeek++;
    }
    if($time->isWithinNext('2 weeks')){
        $nextWeek++;
    }
    if($time->isWithinNext('2 weeks')){
        $future++;
    }
}


$lastWeek = $lastWeek - $today;
$before = $beforeNow - $today - $lastWeek; //cant include today or last week
$nextWeek = $nextWeek - $thisWeek;
$thisWeek = $thisWeek + $today;
$after = $afterNow - $future; //cant include today


$total = $customer + $venue + $supplier + $talent;
$customer_percent = round($customer/$total * 100,2);
$venue_percent = round($venue/$total * 100,2);
$supplier_percent = round($supplier/$total * 100,2);
$talent_percent = round($talent/$total * 100,2);


$dataPoints = array( //data points for pie chart
    array("label"=>"Venues", "y"=>$venue_percent),
    array("label"=>"Customers", "y"=>$customer_percent),
    array("label"=>"Talent", "y"=>$talent_percent),
    array("label"=>"Suppliers", "y"=>$supplier_percent)
);


$dataPoints2 = array( //data points for bar chart
    array("y" => $before, "label" => "Previous" ),
    array("y" => $lastWeek, "label" => "Last Week" ),
    array("y" => $thisWeek, "label" => "This Week" ),
    array("y" => $nextWeek, "label" => "Next Week" ),
    array("y" => $after, "label" => "After" )
);

?>
<!-- Tabs -->
<?php $page_name = $this->request->getparam("controller") ?>
<?= $this->element('tabs/tab', ['page' => $page_name]) ?>
<!-- End of Tabs -->


<script>
    window.onload = function() {


        var chart1 = new CanvasJS.Chart("pieChart", {
            animationEnabled: true,

            data: [{
                type: "pie",
                yValueFormatString: "#,##0.00\"%\"",
                indexLabel: "{label} ({y})",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });

        var chart2 = new CanvasJS.Chart("columnChart", {
            animationEnabled: true,
            theme: "light2",
            axisY: {
                title: "# of Bookings"
            },
            data: [{
                type: "column",
                yValueFormatString: "# Bookings",
                dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
            }]
        });

        chart1.render();
        chart2.render();

    }
</script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <br>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total # of Venues</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= h($venue) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-home fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total # of Talent</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= h($talent) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-microphone-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Total # of Suppliers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= h($supplier) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-utensils fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total # of Customers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= h($customer) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Bookings Breakdown</h6>
                </div>
                <div class="card-body">
                    <div id="columnChart" style="height: 370px; width: 100%;"></div> <!-- canvas call -->
                    <br>
                </div>
            </div>
        </div>


        <!-- Pie Chart -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Accounts Breakdown</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <div id="pieChart" style="height: 370px; width: 100%;"></div> <!-- canvas call -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->
</div>




