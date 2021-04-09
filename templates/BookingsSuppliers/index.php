<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookingsSupplier[]|\Cake\Collection\CollectionInterface $bookingsSuppliers
 */
?>
<div class="bookingsSuppliers index content">
    <?= $this->Html->link(__('New Bookings Supplier'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Bookings Suppliers') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('booking_id') ?></th>
                    <th><?= $this->Paginator->sort('supplier_id') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookingsSuppliers as $bookingsSupplier): ?>
                <tr>
                    <td><?= $this->Number->format($bookingsSupplier->id) ?></td>
                    <td><?= $bookingsSupplier->has('booking') ? $this->Html->link($bookingsSupplier->booking->id, ['controller' => 'Bookings', 'action' => 'view', $bookingsSupplier->booking->id]) : '' ?></td>
                    <td><?= $bookingsSupplier->has('supplier') ? $this->Html->link($bookingsSupplier->supplier->name, ['controller' => 'Suppliers', 'action' => 'view', $bookingsSupplier->supplier->id]) : '' ?></td>
                    <td><?= h($bookingsSupplier->role) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $bookingsSupplier->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bookingsSupplier->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bookingsSupplier->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookingsSupplier->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
