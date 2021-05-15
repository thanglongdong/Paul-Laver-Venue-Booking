<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking[]|\Cake\Collection\CollectionInterface $venues
 */

//echo debug($location);
//echo $location;
//echo $date;
//echo $numPeople;
//debug($this->request->getParam('pass'));

$search_criteria_context = [
    'data' => [
        'location' => $this->request->getQuery('location'),
        'num_of_people' => $this->request->getQuery('num_of_people')
    ],
    'schema' => [
        'location',
        'num_of_people'
    ]
];

?>
<?= $this->Form->create($search_criteria_context, ['type' => 'get']) ?>
<div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex">
                <div class="col-lg-3 col-md-3 col-sm-12 p-0" style="margin-right:10px">
                    <?= $this->Form->control('location', ['label' => false,
                        'placeholder' => 'Location']); ?>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 p-0" style="margin-right:10px">
                    <?= $this->Form->control('num_of_people', [
                        'label' => false,
                        'placeholder' => '# of People']); ?>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                    <?= $this->Form->button('Search', [
                        'class' => 'btn btn-lg-3 btn-md-3 btn-sm-12 btn-block btn-primary'
                    ]) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($venues as $venue): ?>
    <div class="table-responsive">
        <!-- Page Content -->
        <div class="container">

            <!-- Venue-->
            <div class="row">
                <div class="col-md-7">
                    <a href="<?= $this->Url->build(['action'=>'profile', $venue->id])?>">
                        <td><?= $this->Html->image($venue->image, ["style"=>"width:700px;height:300px;object-fit: cover", 'class' =>"img-fluid rounded mb-3 mb-md-0"]) ?></td>
                    </a>
                </div>

                <div class="col-md-5">
                    <h3><td><?= h($venue->name) ?></td></h3>
                    <p><td><?= h($venue->description) ?></td></p>
                    <p class="text-muted font-weight-bold"> <td><?= h($venue->street_address) ?></td>
                    <td><?= h($venue->suburb) ?></td>
                    <td><?= h($venue->state) ?></td>
                    <td><?= h($venue->postcode) ?></td></p>
                    <p class="list-inline-item float-left"><i class="fas fa-users fa-2x"></i></p>
                    <p class="list-inline-item font-weight-bold float-left"><td><?= $this->Number->format($venue->capacity) ?></td></p>
                    <p class="list-inline-item float-right"><?= $this->Html->link(__('Take a Look'), ['action' => 'profile', $venue->id],['class'=>'btn btn-primary']) ?></p>

                </div>
            </div>
            <!-- /.row -->

            <hr>




        </div>
        <!-- /.container -->
    </div>
<?php endforeach; ?>


