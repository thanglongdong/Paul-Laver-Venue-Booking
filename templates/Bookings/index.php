<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking[]|\Cake\Collection\CollectionInterface $bookings
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
        <a class="nav-link active" href="<?= $this->Url->build('/bookings')?>">Bookings</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build('/bookings-suppliers')?>">Bookings Suppliers</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build('/bookings-talents')?>">Bookings Talents</a>
    </li>
</ul>
<p></p>

<div>
    <div class="mb-3 d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="text-grey"><?= __('Bookings') ?></h3>
        <a href="<?= $this->Url->build('/bookings/add')?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> New Booking</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= h('id') ?></th>
                    <th><?= h('date') ?></th>
                    <th><?= h('start_time') ?></th>
                    <th><?= h('end_time') ?></th>
                    <th><?= h('event_type') ?></th>
                    <th><?= h('no_of_people') ?></th>
                    <th><?= h('venue_id') ?></th>
                    <th><?= h('customer_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking): ?>
                <tr>
                    <td><?= $this->Number->format($booking->id) ?></td>
                    <td><?= h($booking->date) ?></td>
                    <td><?= h($booking->start_time) ?></td>
                    <td><?= h($booking->end_time) ?></td>
                    <td><?= h($booking->event_type) ?></td>
                    <td><?= $this->Number->format($booking->no_of_people) ?></td>
                    <td><?= $booking->has('venue') ? $this->Html->link($booking->venue->name, ['controller' => 'Venues', 'action' => 'view', $booking->venue->id]) : '' ?></td>
                    <td><?= $booking->has('customer') ? $this->Html->link($booking->customer->id, ['controller' => 'Customers', 'action' => 'view', $booking->customer->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $booking->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $booking->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
