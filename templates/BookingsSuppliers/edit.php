<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookingsSupplier $bookingsSupplier
 */
?>
<h1 class="h3 mb-2 text-gray-800"><?= __('Edit Bookings Supplier') ?></h1>

<?= $this->Form->create($bookingsSupplier) ?>
    <legend><?= __('Edit Bookings Supplier') ?></legend>
    <?php
        echo $this->Form->control('booking_id', ['options' => $bookings, 'empty' => true]);
        echo $this->Form->control('supplier_id', ['options' => $suppliers, 'empty' => true]);
        echo $this->Form->control('role');
    ?>
<br </br>
<div>
<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
<?= $this->Form->postLink(
    __('Delete'),
    ['action' => 'delete', $bookingsSupplier->id],
    ['confirm' => __('Are you sure you want to delete # {0}?', $bookingsSupplier->id), 'class' => 'btn btn-outline-primary me-2 float-right mr-2']
) ?>
<?= $this->Html->link(__('List'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
</div>
<?= $this->Form->end() ?>
<br </br>
