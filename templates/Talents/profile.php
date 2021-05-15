<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Talent $talent
 */

echo $this -> Html->css("pagetitle.css",['block'=>true]);
echo $this -> Html->css("about.css",['block'=>true]);


use Cake\ORM\TableRegistry;
$this->loadHelper('Authentication.Identity');

$loggedin = $this->Identity->isLoggedIn();

if ($loggedin){

    $talents = TableRegistry::getTableLocator()->get('Talents');
    $bookings = TableRegistry::getTableLocator()->get('Bookings');
    $bookings_talents = TableRegistry::getTableLocator()->get('BookingsTalents');
    $venues = TableRegistry::getTableLocator()->get('Venues');

    $user_id=$this->Identity->get('id');
    $role = $this->Identity->get('role');
    if ($role=='talent' && $user_id== $talent->user_id){

        $talent = $talents
        ->find()
        ->where(['user_id' => $user_id])
        ->first();
        $talent_id=$talent->id;

        $booking_talent=$bookings_talents
        ->find()
        ->where(['talent_id' => $talent_id])
        ->all();
    }
}
?>




<div class="group">
    <?=$this->Html->image('blankuser.png', ["class"=>'img-fluid rounded-circle mb-3',"alt" => "","style"=>"width:200px;height:200px"]);?>
    <div class="left-side flex-col">
        <div class="item1">
            <?= h($talent->name) ?>
        </div>
        <div class="item2">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
            <?= h($talent->genre) ?>
        </div>
        <div class="item2">
            <i class="fas fa-phone-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            <?= h($talent->phone) ?>
        </div>
        <div class="item2">
            <i class="fas fa-envelope fa-sm fa-fw mr-2 text-gray-400"></i>
            <?= h($talent->email) ?>
        </div>
        <div class="item2">
            <i class="fas fa-dollar-sign fa-sm fa-fw mr-2 text-gray-400"></i>
            <?= $this->Number->currency($talent->pph)."/hour"?>
        </div>
        <div class="item2">
            <?= h($talent->description) ?>
        </div>
        <?php if ($loggedin): ?>
            <?php if ($role=='talent' && $user_id== $talent->user_id): ?>
                <a href="<?= $this->Url->build(['action' => 'editprofile', $talent->id])?>" class="d-none d-sm-inline-block btn btn-outline-primary shadow-sm" style="width:116px"><i
                        class="fas fa-sm text-white-50"></i>Edit</a>
            <?php endif; ?>
        <?php endif; ?>
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
