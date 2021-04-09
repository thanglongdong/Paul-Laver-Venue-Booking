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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bookingsTalent->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bookingsTalent->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Bookings Talents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bookingsTalents form content">
            <?= $this->Form->create($bookingsTalent) ?>
            <fieldset>
                <legend><?= __('Edit Bookings Talent') ?></legend>
                <?php
                    echo $this->Form->control('booking_id', ['options' => $bookings, 'empty' => true]);
                    echo $this->Form->control('talent_id', ['options' => $talents, 'empty' => true]);
                    echo $this->Form->control('perform_stime', ['empty' => true]);
                    echo $this->Form->control('perform_etime', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
