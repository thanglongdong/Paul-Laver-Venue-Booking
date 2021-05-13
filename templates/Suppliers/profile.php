<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
 */

echo $this -> Html->css("pagetitle.css",['block'=>true]);
echo $this -> Html->css("about.css",['block'=>true]);

use Cake\ORM\TableRegistry;
$this->loadHelper('Authentication.Identity');


if ($loggedin){
$loggedin = $this->Identity->isLoggedIn();
$user_id=$this->Identity->get('id');
$suppliers = TableRegistry::getTableLocator()->get('Suppliers');
$bookings = TableRegistry::getTableLocator()->get('Bookings');
$bookings_suppliers = TableRegistry::getTableLocator()->get('BookingsSuppliers');
$venues = TableRegistry::getTableLocator()->get('Venues');


$supplier = $suppliers
    ->find()
    ->where(['user_id' => $user_id])
    ->first();
$supplier_id=$supplier->id;

$booking_supplier =$bookings_suppliers
    ->find()
    ->where(['supplier_id' => $supplier_id])
    ->all();
}
?>


<section id="intro-section">

<div class="group">
    <?=$this->Html->image('blankuser.png', ["class"=>'img-fluid rounded-circle mb-3',"alt" => "","style"=>"width:200px;height:200px"]);?>  
    <div class="left-side flex-col">
        <div class="item1">
            <?= h($supplier->name) ?>
        </div>
        <div class="item2">
            <i class="fas fa-phone-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            <?= h($supplier->phone) ?>
        </div>
        <div class="item2">
            <i class="fas fa-envelope fa-sm fa-fw mr-2 text-gray-400"></i>
            <?= h($supplier->email) ?>
        </div>
        <div class="item2">
            <i class="fas fa-dollar-sign fa-sm fa-fw mr-2 text-gray-400"></i>
            <?= h($supplier->pph)."/hour" ?>
        </div>
        <div class="item2">
            <?= h($supplier->description) ?>
        </div>
        <a href="<?= $this->Url->build(['action' => 'editprofile', $supplier->id])?>" class="d-none d-sm-inline-block btn btn-outline-primary shadow-sm" style="width:116px"><i
                class="fas fa-sm text-white-50"></i>Edit</a>
    </div>
</div>

</section>

<?php if ($loggedin): ?>
    <section>
        <div class='flex' style='margin-top:15px;margin-bottom:15px;text-align:center'>
            <h4>Related bookings</h4>
        </div>
        <?php if ($booking_supplier->isEmpty()): ?>
            <div class='flex' style='margin-top:15px;margin-bottom:15px;text-align:center'>
                <h2>You have no related bookings yet. </h2>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><?= h('Booking Date') ?></th>
                            <th><?= h('Start Time') ?></th>
                            <th><?= h('End Time') ?></th>
                            <th><?= h('Event Type') ?></th>
                            <th><?= h('# of People') ?></th>
                            <th><?= h('Venue') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($booking_supplier as $eachbooking_supplier):
                            $eachbooking = $bookings
                            ->find()
                            ->where(['id' => $eachbooking_supplier->booking_id])
                            ->first(); ?>
                        <tr>
                            <td><?= h($eachbooking->date) ?></td>
                            <td><?= h($eachbooking->start_time) ?></td>
                            <td><?= h($eachbooking->end_time) ?></td>
                            <td><?= h($eachbooking->event_type) ?></td>
                            <td><?= $this->Number->format($eachbooking->no_of_people) ?></td>
                            <?php $venue = $venues
                            ->find()
                            ->where(['id' => $eachbooking->venue_id])
                            ->first();?>
                            <td><?= h($venue->name) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>