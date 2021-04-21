<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venue $venue
 */
?>
<ul class="nav nav-tabs nav-fill">
    <li class="nav-item">
        <a class="nav-link" href="<?= $this->Url->build('/dashboard')?>">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="<?= $this->Url->build('/venues')?>">Venues</a>
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
        <a class="nav-link" href="<?= $this->Url->build('/bookings-talents')?>">Bookings Talents</a>
    </li>
</ul>
<p></p>

<h1 class="h3 mb-2 text-gray-800"><?= __('New Venue') ?></h1>

<?= $this->Form->create($venue) ?>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('street_address');
    echo $this->Form->control('suburb');
    echo $this->Form->control('state');
    echo $this->Form->control('postcode');
    echo $this->Form->control('capacity');
    echo $this->Form->control('phone');
    echo $this->Form->control('email');
    ?>
<br </br>
<div>
<?= $this->Form->button(__('Add Venue'), ['class' => 'btn btn-primary']) ?>
<?= $this->Html->link(__('List Venues'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
</div>
<?= $this->Form->end() ?>
<br </br>
