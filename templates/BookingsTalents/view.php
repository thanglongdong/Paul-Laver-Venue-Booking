<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookingsTalent $bookingsTalent
 */
?>
<!-- Tabs -->
<?php $page_name = $this->request->getparam("controller") ?>
<?= $this->element('tabs/tab', ['page' => $page_name]) ?>
<p></p>
<!-- End of Tabs -->

<h1 class="h3 mb-2 text-gray-800"><?= h($bookingsTalent->id) ?></h1>


<?= $this->Form->create($bookingsTalent) ?>
<?php
echo $this->Form->control('booking_id', ['options' => $bookings, 'empty' => true, 'disabled']);
echo $this->Form->control('talent_id', ['options' => $talents, 'empty' => true, 'disabled']);
echo $this->Form->control('perform_stime', ['empty' => true, 'disabled']);
echo $this->Form->control('perform_etime', ['empty' => true, 'disabled']);
?>
<br </br>
<div>
    <?= $this->Html->link(__('Edit Bookings Talent'), ['action' => 'edit', $bookingsTalent->id], ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->postLink(__('Delete Bookings Talent'), ['action' => 'delete', $bookingsTalent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookingsTalent->id), 'class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
    <?= $this->Html->link(__('List Bookings Talents'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
    <?= $this->Html->link(__('New Bookings Talent'), ['action' => 'add'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
</div>
<br </br>

