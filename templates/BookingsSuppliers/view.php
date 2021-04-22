<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookingsSupplier $bookingsSupplier
 */
?>
<!-- Tabs -->
<?php $page_name = $this->request->getparam("controller") ?>
<?= $this->element('tabs/tab', ['page' => $page_name]) ?>
<p></p>
<!-- End of Tabs -->

<h1 class="h3 mb-2 text-gray-800"><?= h($bookingsSupplier->id) ?></h1>


<?= $this->Form->create($bookingsSupplier) ?>
<?php
echo $this->Form->control('booking_id', ['options' => $bookings, 'empty' => true, 'disabled']);
echo $this->Form->control('supplier_id', ['options' => $suppliers, 'empty' => true, 'disabled']);
echo $this->Form->control('role',['disabled']);
?>
<br </br>
<div>
    <?= $this->Html->link(__('Edit Bookings Supplier'), ['action' => 'edit', $bookingsSupplier->id], ['class' => 'side-nav-item']) ?>
    <?= $this->Form->postLink(__('Delete Bookings Supplier'), ['action' => 'delete', $bookingsSupplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookingsSupplier->id), 'class' => 'side-nav-item']) ?>
    <?= $this->Html->link(__('List Bookings Suppliers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
    <?= $this->Html->link(__('New Bookings Supplier'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
</div>
<br </br>
