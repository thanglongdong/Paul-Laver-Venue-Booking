<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookingsSupplier $bookingsSupplier
 */
?>
<ul class="nav nav-tabs nav-fill">
    <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build('/dashboard')?>">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build('/venues')?>">Venues</a>
    </li>
    <li class="nav-item">
        <a class="nav-link"  href="<?= $this->Url->build('/talents')?>">Talents</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build('/suppliers')?>">Suppliers</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build('/customers')?>">Customers</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build('/bookings')?>">Bookings</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="<?= $this->Url->build('/bookings-suppliers')?>">Bookings Suppliers</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build('/bookings-talents')?>">Bookings Talents</a>
    </li>
</ul>
<p></p>

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
