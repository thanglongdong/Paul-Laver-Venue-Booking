<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookingsSupplier[]|\Cake\Collection\CollectionInterface $bookingsSuppliers
 */
echo $this -> Html->css("/vendor/datatables/dataTables.bootstrap4.min.css",['block'=>true]);
echo $this -> Html->script("/vendor/datatables/jquery.dataTables.min.js",['block'=>true]);
echo $this -> Html->script("/vendor/datatables/dataTables.bootstrap4.min.js",['block'=>true]);
echo $this -> Html->script("/js/demo/datatables-demo.js",['block'=>true]);
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
        <a class="nav-link active font-weight-bold" href="<?= $this->Url->build('/bookings-suppliers')?>">Bookings Suppliers</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build('/bookings-talents')?>">Bookings Talents</a>
    </li>
</ul>
<p></p>


<div>
    <div class="mb-3 d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="text-grey"><?= __('Bookings Supplier') ?></h3>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= h('id') ?></th>
                    <th><?= h('booking_id') ?></th>
                    <th><?= h('supplier_id') ?></th>
                    <th><?= h('role') ?></th>
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
</div>
