<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
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
        <a class="nav-link active font-weight-bold" href="<?= $this->Url->build('/suppliers')?>">Suppliers</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build('/customers')?>">Customers</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build('/bookings')?>">Bookings</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build('/bookings-suppliers')?>">Bookings Suppliers</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build('/bookings-talents')?>">Bookings Talents</a>
    </li>
</ul>
<p></p>

<h1 class="h3 mb-2 text-gray-800"><?= h($supplier->name) ?></h1>

<?= $this->Form->create($supplier) ?>
<?php
echo $this->Form->control('name',['disabled']);
echo $this->Form->control('phone',['disabled']);
echo $this->Form->control('email',['disabled']);
?>
<br </br>
<div>
<?= $this->Html->link(__('Edit Supplier'), ['action' => 'edit', $supplier->id], ['class' => 'btn btn-primary']) ?>
<?= $this->Form->postLink(__('Delete Supplier'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete supplier {0}?', $supplier->name), 'class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
<?= $this->Html->link(__('List Suppliers'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
<?= $this->Html->link(__('New Supplier'), ['action' => 'add'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
</div>
<br </br>


<?php if (!empty($supplier->bookings)) : ?>
<h4><?= __('Related Bookings') ?></h4>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Date') ?></th>
            <th><?= __('Start Time') ?></th>
            <th><?= __('End Time') ?></th>
            <th><?= __('Event Type') ?></th>
            <th><?= __('No Of People') ?></th>
            <th><?= __('Venue Id') ?></th>
            <th><?= __('Customer Id') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($supplier->bookings as $bookings) : ?>
        <tr>
            <td><?= h($bookings->id) ?></td>
            <td><?= h($bookings->date) ?></td>
            <td><?= h($bookings->start_time) ?></td>
            <td><?= h($bookings->end_time) ?></td>
            <td><?= h($bookings->event_type) ?></td>
            <td><?= h($bookings->no_of_people) ?></td>
            <td><?= h($bookings->venue_id) ?></td>
            <td><?= h($bookings->customer_id) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Bookings', 'action' => 'view', $bookings->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Bookings', 'action' => 'edit', $bookings->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bookings', 'action' => 'delete', $bookings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookings->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php endif; ?>
<br></br>
