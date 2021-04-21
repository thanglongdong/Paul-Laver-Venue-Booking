<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookingsTalent $bookingsTalent
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
        <a class="nav-link" href="<?= $this->Url->build('/bookings')?>">Bookings</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build('/bookings-suppliers')?>">Bookings Suppliers</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="<?= $this->Url->build('/bookings-talents')?>">Bookings Talents</a>
    </li>
</ul>
<p></p>

<h1 class="h3 mb-2 text-gray-800"><?= __('Edit Bookings Talent') ?></h1>



<?= $this->Form->create($bookingsTalent) ?>
    <?php
        echo $this->Form->control('booking_id', ['options' => $bookings, 'empty' => true]);
        echo $this->Form->control('talent_id', ['options' => $talents, 'empty' => true]);
        echo $this->Form->control('perform_stime', ['empty' => true]);
        echo $this->Form->control('perform_etime', ['empty' => true]);
    ?>
<br </br>
<div>
<?= $this->Form->button(__('Edit Bookings Talent'), ['class' => 'btn btn-primary']) ?>
<?= $this->Form->postLink(
    __('Delete Bookings Talent'),
    ['action' => 'delete', $bookingsTalent->id],
    ['confirm' => __('Are you sure you want to delete # {0}?', $bookingsTalent->id), 'class' => 'btn btn-outline-primary me-2 float-right mr-2']
) ?>
<?= $this->Html->link(__('List Bookings Talents'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
</div>
<?= $this->Form->end() ?>
<br </br>
