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

<h1 class="h3 mb-2 text-gray-800"><?= __('New Bookings Supplier') ?></h1>

<?= $this->Form->create($bookingsSupplier) ?>
    <?php
        echo $this->Form->control('booking_id', ['options' => $bookings, 'empty' => true]);
        echo $this->Form->control('supplier_id', ['options' => $suppliers, 'empty' => true]);
    ?>
<br </br>
<div>
<?= $this->Form->button(__('Add Bookings Supplier'), ['class' => 'btn btn-primary']) ?>
<?= $this->Html->link(__('List BookingsSuppliers'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
</div>
<?= $this->Form->end() ?>
<br </br>

