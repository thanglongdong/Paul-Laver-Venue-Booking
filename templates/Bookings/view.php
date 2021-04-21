<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
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

<h1 class="h3 mb-2 text-gray-800"><?= h($booking->id) ?></h1>

<?= $this->Form->create($booking) ?>
<?php
echo $this->Form->control('date', ['empty' => true, 'disabled']);
echo $this->Form->control('start_time', ['empty' => true, 'disabled']);
echo $this->Form->control('end_time', ['empty' => true, 'disabled']);
echo $this->Form->control('event_type',['disabled']);
echo $this->Form->control('no_of_people',['disabled']);
?>
<br </br>
<div>
<?= $this->Html->link(__('Edit Booking'), ['action' => 'edit', $booking->id], ['class' => 'btn btn-primary']) ?>
<?= $this->Form->postLink(__('Delete Booking'), ['action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id), 'class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
<?= $this->Html->link(__('List Bookings'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
<?= $this->Html->link(__('New Booking'), ['action' => 'add'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
</div>
<br></br>


<?php if (!empty($booking->suppliers)) : ?>
<h4><?= __('Related Suppliers') ?></h4>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">>
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Phone') ?></th>
            <th><?= __('Email') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($booking->suppliers as $suppliers) : ?>
        <tr>
            <td><?= h($suppliers->id) ?></td>
            <td><?= h($suppliers->name) ?></td>
            <td><?= h($suppliers->phone) ?></td>
            <td><?= h($suppliers->email) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Suppliers', 'action' => 'view', $suppliers->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Suppliers', 'action' => 'edit', $suppliers->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Suppliers', 'action' => 'delete', $suppliers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $suppliers->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php endif; ?>
<br></br>


<?php if (!empty($booking->talents)) : ?>
<h4><?= __('Related Talents') ?></h4>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">>
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Phone') ?></th>
            <th><?= __('Email') ?></th>
            <th><?= __('Genre') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($booking->talents as $talents) : ?>
        <tr>
            <td><?= h($talents->id) ?></td>
            <td><?= h($talents->name) ?></td>
            <td><?= h($talents->phone) ?></td>
            <td><?= h($talents->email) ?></td>
            <td><?= h($talents->genre) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Talents', 'action' => 'view', $talents->id]) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => 'Talents', 'action' => 'edit', $talents->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Talents', 'action' => 'delete', $talents->id], ['confirm' => __('Are you sure you want to delete # {0}?', $talents->id)]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php endif; ?>
<br></br>
