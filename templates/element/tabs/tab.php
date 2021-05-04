<?php
?>

<ul class="nav nav-tabs nav-fill">
    <li class="nav-item">
        <?php if($page == 'Dashboard') : ?>
            <a class="nav-link active font-weight-bold" href="<?= $this->Url->build('/dashboard')?>">Dashboard</a>
        <?php else : ?>
            <a class="nav-link" href="<?= $this->Url->build('/dashboard')?>">Dashboard</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
        <?php if($page == 'Venues') : ?>
            <a class="nav-link active font-weight-bold" href="<?= $this->Url->build('/venues')?>">Venues</a>
        <?php else : ?>
            <a class="nav-link" href="<?= $this->Url->build('/venues')?>">Venues</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
        <?php if($page == 'Users') : ?>
            <a class="nav-link active font-weight-bold" href="<?= $this->Url->build('/users')?>">Users</a>
        <?php else : ?>
            <a class="nav-link" href="<?= $this->Url->build('/users')?>">Users</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
        <?php if($page == 'Talents') : ?>
            <a class="nav-link active font-weight-bold" href="<?= $this->Url->build('/talents')?>">Talents</a>
        <?php else : ?>
            <a class="nav-link" href="<?= $this->Url->build('/talents')?>">Talents</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
        <?php if($page == 'Suppliers') : ?>
            <a class="nav-link active font-weight-bold" href="<?= $this->Url->build('/suppliers')?>">Suppliers</a>
        <?php else : ?>
            <a class="nav-link" href="<?= $this->Url->build('/suppliers')?>">Suppliers</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
        <?php if($page == 'Customers') : ?>
            <a class="nav-link active font-weight-bold" href="<?= $this->Url->build('/customers')?>">Customers</a>
        <?php else : ?>
            <a class="nav-link" href="<?= $this->Url->build('/customers')?>">Customers</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
        <?php if($page == 'Bookings') : ?>
            <a class="nav-link active font-weight-bold" href="<?= $this->Url->build('/bookings')?>">Bookings</a>
        <?php else : ?>
            <a class="nav-link" href="<?= $this->Url->build('/bookings')?>">Bookings</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
        <?php if($page == 'BookingsSuppliers') : ?>
            <a class="nav-link active font-weight-bold" href="<?= $this->Url->build('/bookings-suppliers')?>">Bookings Suppliers</a>
        <?php else : ?>
            <a class="nav-link" href="<?= $this->Url->build('/bookings-suppliers')?>">Bookings Suppliers</a>
        <?php endif; ?>
    </li>
    <li class="nav-item">
        <?php if($page == 'BookingsTalents') : ?>
            <a class="nav-link active font-weight-bold" href="<?= $this->Url->build('/bookings-talents')?>">Bookings Talents</a>
        <?php else : ?>
            <a class="nav-link" href="<?= $this->Url->build('/bookings-talents')?>">Bookings Talents</a>
        <?php endif; ?>
    </li>
</ul>
