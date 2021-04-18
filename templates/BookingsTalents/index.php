<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookingsTalent[]|\Cake\Collection\CollectionInterface $bookingsTalents
 */
echo $this -> Html->css("/vendor/datatables/dataTables.bootstrap4.min.css",['block'=>true]);
echo $this -> Html->script("/vendor/datatables/jquery.dataTables.min.js",['block'=>true]);
echo $this -> Html->script("/vendor/datatables/dataTables.bootstrap4.min.js",['block'=>true]);
echo $this -> Html->script("/js/demo/datatables-demo.js",['block'=>true]);
?>

<div>
    <div class="mb-3 d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="text-grey"><?= __('Booking-Talent') ?></h3>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= h('id') ?></th>
                    <th><?= h('booking_id') ?></th>
                    <th><?= h('talent_id') ?></th>
                    <th><?= h('perform_stime') ?></th>
                    <th><?= h('perform_etime') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookingsTalents as $bookingsTalent): ?>
                <tr>
                    <td><?= $this->Number->format($bookingsTalent->id) ?></td>
                    <td><?= $bookingsTalent->has('booking') ? $this->Html->link($bookingsTalent->booking->id, ['controller' => 'Bookings', 'action' => 'view', $bookingsTalent->booking->id]) : '' ?></td>
                    <td><?= $bookingsTalent->has('talent') ? $this->Html->link($bookingsTalent->talent->name, ['controller' => 'Talents', 'action' => 'view', $bookingsTalent->talent->id]) : '' ?></td>
                    <td><?= h($bookingsTalent->perform_stime) ?></td>
                    <td><?= h($bookingsTalent->perform_etime) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $bookingsTalent->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bookingsTalent->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bookingsTalent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookingsTalent->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
