<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venue $venue
 */
?>
<h1 class="h3 mb-2 text-gray-800"><?= __('Edit Venue') ?></h1>

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
<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
<?= $this->Form->postLink(
    __('Delete Venue'),
    ['action' => 'delete', $venue->id],
    ['confirm' => __('Are you sure you want to delete {0}?', $venue->name), 'class' => 'btn btn-outline-primary me-2 float-right mr-2']
) ?>
<?= $this->Html->link(__('List Venues'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
</div>
<?= $this->Form->end() ?>
<br </br>

