<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookingsTalent[]|\Cake\Collection\CollectionInterface $bookingsTalents
 */
?>
<div class="bookingsTalents index content">
    <?= $this->Html->link(__('New Bookings Talent'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Bookings Talents') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('booking_id') ?></th>
                    <th><?= $this->Paginator->sort('talent_id') ?></th>
                    <th><?= $this->Paginator->sort('perform_stime') ?></th>
                    <th><?= $this->Paginator->sort('perform_etime') ?></th>
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
