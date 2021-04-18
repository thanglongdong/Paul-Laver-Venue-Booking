<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 */
?>
<h1 class="h3 mb-2 text-gray-800"><?= __('Add Booking') ?></h1>

<?= $this->Form->create($booking) ?>
    <?php
        echo $this->Form->control('date', ['empty' => true]);
        echo $this->Form->control('start_time', ['empty' => true]);
        echo $this->Form->control('end_time', ['empty' => true]);
        echo $this->Form->control('event_type');
        echo $this->Form->control('no_of_people');
        echo $this->Form->control('venue_id', ['options' => $venues]);
        echo $this->Form->control('customer_id', ['options' => $customers]);
        echo $this->Form->control('suppliers._ids', ['options' => $suppliers]);
        echo $this->Form->control('talents._ids', ['options' => $talents]);
    ?>
<br </br>
<div>
<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
<?= $this->Html->link(__('List'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
</div>
<?= $this->Form->end() ?>
<br </br>
