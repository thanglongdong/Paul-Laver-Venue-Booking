<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookingsTalent $bookingsTalent
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Bookings Talent'), ['action' => 'edit', $bookingsTalent->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Bookings Talent'), ['action' => 'delete', $bookingsTalent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookingsTalent->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Bookings Talents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Bookings Talent'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bookingsTalents view content">
            <h3><?= h($bookingsTalent->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Booking') ?></th>
                    <td><?= $bookingsTalent->has('booking') ? $this->Html->link($bookingsTalent->booking->id, ['controller' => 'Bookings', 'action' => 'view', $bookingsTalent->booking->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Talent') ?></th>
                    <td><?= $bookingsTalent->has('talent') ? $this->Html->link($bookingsTalent->talent->name, ['controller' => 'Talents', 'action' => 'view', $bookingsTalent->talent->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($bookingsTalent->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Perform Stime') ?></th>
                    <td><?= h($bookingsTalent->perform_stime) ?></td>
                </tr>
                <tr>
                    <th><?= __('Perform Etime') ?></th>
                    <td><?= h($bookingsTalent->perform_etime) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
