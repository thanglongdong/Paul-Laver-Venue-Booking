<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venue $venue
 */
?>
<!-- Tabs -->
<?php $page_name = $this->request->getparam("controller") ?>
<?= $this->element('tabs/tab', ['page' => $page_name]) ?>
<p></p>
<!-- End of Tabs -->

<h1 class="h3 mb-2 text-gray-800"><?= h($venue->name) ?></h1>

<?= $this->Form->create($venue) ?>
<?php
//echo $this->Form->control('name'); not really needed as title shows venue name
echo $this->Form->control('street_address',['disabled']);
echo $this->Form->control('suburb',['disabled']);
echo $this->Form->control('state',['disabled']);
echo $this->Form->control('postcode',['disabled']);
echo $this->Form->control('capacity',['disabled']);
echo $this->Form->control('phone',['disabled']);
echo $this->Form->control('email',['disabled']);
echo $this->Form->control('description',['disabled']);
echo $this->Form->control('image',['disabled']);
echo $this->Form->control('pph',['disabled']);
?>

<br></br>
<div>
    <?= $this->Html->link(__('Edit Venue'), ['action' => 'edit', $venue->id], ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->postLink(__('Delete Venue'), ['action' => 'delete', $venue->id], ['confirm' => __('Are you sure you want to delete venue {0}?', $venue->name), 'class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
    <?= $this->Html->link(__('List Venues'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
    <?= $this->Html->link(__('New Venue'), ['action' => 'add'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
</div>
<br></br>


<?php if (!empty($venue->bookings)) : ?>
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
                <th><?= __('Cost') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($venue->bookings as $bookings) : ?>
                <tr>
                    <td><?= h($bookings->id) ?></td>
                    <td><?= h($bookings->date) ?></td>
                    <td><?= h($bookings->start_time) ?></td>
                    <td><?= h($bookings->end_time) ?></td>
                    <td><?= h($bookings->event_type) ?></td>
                    <td><?= h($bookings->no_of_people) ?></td>
                    <td><?= h($bookings->venue_id) ?></td>
                    <td><?= h($bookings->customer_id) ?></td>
                    <td><?= h($bookings->cost) ?></td>
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
