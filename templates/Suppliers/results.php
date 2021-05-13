<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking[]|\Cake\Collection\CollectionInterface $suppliers
 */

//echo debug($location);
//echo $location;
//echo $date;
//echo $numPeople;
//debug($this->request->getParam('pass'));


?>


<?php foreach ($suppliers as $supplier): ?>
    <div class="table-responsive">
        <!-- Page Content -->
        <div class="container">

            <!-- Venue-->
            <div class="row">
                <div class="col-md-7">
                    <a href="<?= $this->Url->build(['action'=>'profile', $supplier->id])?>">
                        <td><?= $this->Html->image($supplier->image, ["style"=>"width:700px;height:300px;object-fit: cover", 'class' =>"img-fluid rounded mb-3 mb-md-0"]) ?></td>
                    </a>
                </div>

                <div class="col-md-5">
                    <h3><td><?= h($supplier->name) ?></td></h3>
                    <p class="text-muted"><td><?= h($supplier->genre) ?></td></p>
                    <p><td><?= h($supplier->description) ?></td></p>

                    <p class="list-inline-item float-left"><i class="fas fa-dollar-sign fa-2x"></i></p>
                    <p class="list-inline-item font-weight-bold float-left"><td>Price at Request</td></p>
                    <p class="list-inline-item float-right"><?= $this->Html->link(__('Take a Look'), ['action' => 'profile', $supplier->id],['class'=>'btn btn-primary']) ?></p>

                </div>
            </div>
            <!-- /.row -->

            <hr>




        </div>
        <!-- /.container -->
    </div>
<?php endforeach; ?>


