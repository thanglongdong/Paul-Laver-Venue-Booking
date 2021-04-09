<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookingsSupplier $bookingsSupplier
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Bookings Supplier'), ['action' => 'edit', $bookingsSupplier->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Bookings Supplier'), ['action' => 'delete', $bookingsSupplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookingsSupplier->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Bookings Suppliers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Bookings Supplier'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bookingsSuppliers view content">
            <h3><?= h($bookingsSupplier->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Booking') ?></th>
                    <td><?= $bookingsSupplier->has('booking') ? $this->Html->link($bookingsSupplier->booking->id, ['controller' => 'Bookings', 'action' => 'view', $bookingsSupplier->booking->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Supplier') ?></th>
                    <td><?= $bookingsSupplier->has('supplier') ? $this->Html->link($bookingsSupplier->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $bookingsSupplier->supplier->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= h($bookingsSupplier->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($bookingsSupplier->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
