<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Talent $talent
 */

echo $this -> Html->css("pagetitle.css",['block'=>true]);
echo $this -> Html->css("about.css",['block'=>true]);
echo $this -> Html->css("venue-profile.css",['block'=>true]);


use Cake\ORM\TableRegistry;
$this->loadHelper('Authentication.Identity');

$loggedin = $this->Identity->isLoggedIn();

if ($loggedin){

    $bookings = TableRegistry::getTableLocator()->get('Bookings');
    $bookings_talents = TableRegistry::getTableLocator()->get('BookingsTalents');
    $venues = TableRegistry::getTableLocator()->get('Venues');

    $user_id=$this->Identity->get('id');
    $role = $this->Identity->get('role');

    if ($role=='talent' && $user_id== $talent->user_id){

        $talent_id = $talent->id;

        $booking_talent=$bookings_talents
        ->find()
        ->where(['talent_id' => $talent_id])
        ->all();
    }
}

$search_criteria_context = [
    'data' => [
        'estimate' => $this->request->getQuery('estimate'),
    ],
    'schema' => [
        'estimate'
    ]
];

?>



<div class="container">

    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center">
        <?=$this->Html->image($talent->image, ["style"=>"width:700px;height:300px;object-fit: cover"]);?>
    </div>

    <div class="row">
        <div class="col-md-8">

            <article class="blog-post">
                <vname class="blog-post-title" ><?= h($talent->name) ?></vname>
                <br>
                <p class="blog-post-meta"> <?= h($talent->genre) ?> </p>

                <p class="description"><?= h($talent->description) ?></p>

                <br>

                <div class="float-left">
                <?php if ($loggedin): ?>
                    <?php if ($role=='talent' && $user_id== $talent->user_id): ?>
                        <a href="<?= $this->Url->build(['action' => 'editprofile', $talent->id])?>" class="d-none d-sm-inline-block btn btn-outline-primary shadow-sm" style="width:116px"><i
                                class="fas fa-sm text-white-50"></i>Edit Profile</a>
                    <?php endif; ?>
                <?php endif; ?>
                </div>

              </article><!-- /.blog-post -->

            <br>

        </div>

        <div class="col-md-4">
            <div class="p-4 mb-3 bg-light rounded">


                <h4>Contact</h4>
                <blockquote></blockquote>
                <p class="mb-0"> <strong>Phone:</strong> <?= h($talent->phone) ?></p>
                <p class="mb-0"> <strong>Email:</strong> <?= h($talent->email) ?></p>
                <hr>
                <h4>Request a Quote</h4>

                <br>
                <?= $this->Form->create($search_criteria_context, ['type' => 'get']) ?>
                <?= $this->Form->control('hours', ['label' => false,
                    'class' => 'form-control search-slt',
                    'placeholder' => '# of hours']); ?>
                <br>
                <?= $this->Form->button('Enquire', [
                    'class' => 'btn btn-primary col-12'
                ]) ?>
                <?= $this->Form->end() ?>

                <?php if($estimate != null): ?>
                    <?php if($estimate == 'incorrect'): ?>
                        <h6 class="list-inline-item align-middle text-center text-danger" >Please input numeric value</h6>
                    <?php else: ?>
                        <i class="list-inline-item fas fa-dollar-sign fa-2x"></i>
                        <h5 class="list-inline-item align-middle" ><?=$estimate?></h5>
                    <?php endif; ?>
                <?php endif; ?>


                <!--<a class="btn btn-primary" href="">Request Quote</a></div>-->
            </div>

        </div>
    </div>



<hr>

<?php if ($loggedin && $role=='talent' && $user_id== $talent->user_id): ?>
    <section>
        <div class='flex' style='margin-top:15px;margin-bottom:15px;text-align:center'>
            <h4>Related bookings</h4>
        </div>
        <?php if ($booking_talent->isEmpty()): ?>
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
                        <?php foreach ($booking_talent as $eachbooking_talent):
                            $eachbooking = $bookings
                            ->find()
                            ->where(['id' => $eachbooking_talent->booking_id])
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

</div>
