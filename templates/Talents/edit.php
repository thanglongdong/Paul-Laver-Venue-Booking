<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Talent $talent
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
        <a class="nav-link active font-weight-bold"  href="<?= $this->Url->build('/talents')?>">Talents</a>
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

<h1 class="h3 mb-2 text-gray-800"><?= __('Edit Talent') ?></h1>

<?= $this->Form->create($talent) ?>
    <?php
        echo $this->Form->control('name');
        echo $this->Form->control('phone');
        echo $this->Form->control('email');
        echo $this->Form->control('genre');
        echo $this->Form->control('bookings._ids', ['options' => $bookings]);
    ?>
<br </br>
<div>
<?= $this->Form->button(__('Edit Talent'), ['class' => 'btn btn-primary']) ?>
<?= $this->Form->postLink(
    __('Delete Talent'),
    ['action' => 'delete', $talent->id],
    ['confirm' => __('Are you sure you want to delete talent {0}?', $talent->name), 'class' => 'btn btn-outline-primary me-2 float-right mr-2']
) ?>
<?= $this->Html->link(__('List Talents'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
</div>
<?= $this->Form->end() ?>
<br </br>
