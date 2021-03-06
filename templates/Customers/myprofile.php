<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
echo $this -> Html->css("pagetitle.css",['block'=>true]);
echo $this -> Html->css("about.css",['block'=>true]);

use Cake\ORM\TableRegistry;
$this->loadHelper('Authentication.Identity');

$loggedin = $this->Identity->isLoggedIn();
$user_id=$this->Identity->get('id');
$customers = TableRegistry::getTableLocator()->get('Customers');
$bookings = TableRegistry::getTableLocator()->get('Bookings');
$venues = TableRegistry::getTableLocator()->get('Venues');
$customer = $customers
    ->find()
    ->where(['user_id' => $user_id])
    ->first();
$customer_id=$customer->id;

$booking =$bookings
    ->find()
    ->where(['customer_id' => $customer_id])
    ->all();
?>


<section id="intro-section">

<div class="group">
    <?=$this->Html->image('blankuser.png', ["class"=>'img-fluid rounded-circle mb-3',"alt" => "","style"=>"width:200px;height:200px"]);?>
    <div class="left-side flex-col">
        <div class="item1">
            <?= h($customer->first_name."  ". $customer->last_name) ?>
        </div>
        <div class="item2">
            <i class="fas fa-phone-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            <?= h($customer->mobile) ?>
        </div>
        <div class="item2">
            <i class="fas fa-envelope fa-sm fa-fw mr-2 text-gray-400"></i>
            <?= h($customer->email) ?>
        </div>
        <div class="item2">
            <i class="fas fa-map-marker-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            <?= h($customer->address) ?>
        </div>
        <a href="<?= $this->Url->build(['action' => 'editprofile', $customer->id])?>" class="d-none d-sm-inline-block btn btn-outline-primary shadow-sm" style="width:116px"><i
                class="fas fa-sm text-white-50"></i>Edit</a>
    </div>
</div>

</section>

<section>
    <div class='flex' style='margin-top:15px;margin-bottom:15px;text-align:center'>
        <h4>My bookings</h4>
    </div>
    <?php if ($booking->isEmpty()): ?>
        <div class='flex' style='margin-top:15px;margin-bottom:15px;text-align:center'>
            <h2>You have not made any bookings yet.</h2>
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
                        <th><?= h('Cost') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($booking as $eachbooking): ?>
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
                        <td><?= $this->Number->currency($eachbooking->cost) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>
