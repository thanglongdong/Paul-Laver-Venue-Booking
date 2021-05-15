<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 */
use Cake\I18n\Date;
?>
<!-- Tabs -->
<?php $page_name = $this->request->getparam("controller") ?>
<?= $this->element('tabs/tab', ['page' => $page_name]) ?>
<p></p>
<!-- End of Tabs -->

<h1 class="h3 mb-2 text-gray-800"><?= __('New Booking') ?></h1>

<?= $this->Form->create($booking,['novalidate' => true]) ?>
    <?php
        echo $this->Form->control('date', ['default'=>\Cake\I18n\FrozenDate::now(), 'readonly'=>true]);
        echo $this->Form->control('start_time');
        echo $this->Form->control('end_time');
        echo $this->Form->control('event_type', [
            'options' => ['Birthday'=>'Birthday','Wedding'=>'Wedding','Engagement Party'=>'Engagement Party','Meeting'=>'Meeting','Workshop'=>'Workshop','Others'=>'Others']
        ]);
        echo $this->Form->control('no_of_people');
        echo $this->Form->control('venue_id', ['options' => $venues]);
        echo $this->Form->control('customer_id', ['options' => $customers]);
        echo $this->Form->control('suppliers._ids', ['options' => $suppliers]);
        echo $this->Form->control('talents._ids', ['options' => $talents]);
        echo $this->Form->control('cost');
    ?>
<br
<div>
<?= $this->Form->button(__('Add Booking'), ['class' => 'btn btn-primary']) ?>
<?= $this->Html->link(__('List Bookings'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
</div>
<?= $this->Form->end() ?>
<br
