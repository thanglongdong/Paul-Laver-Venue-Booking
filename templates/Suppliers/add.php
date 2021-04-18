<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
 */
?>
<h1 class="h3 mb-2 text-gray-800"><?= __('New Supplier') ?></h1>

<?= $this->Form->create($supplier) ?>
    <?php
        echo $this->Form->control('name');
        echo $this->Form->control('phone');
        echo $this->Form->control('email');
        echo $this->Form->control('bookings._ids', ['options' => $bookings]);
    ?>
<br </br>
<div>
<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
<?= $this->Html->link(__('List Suppliers'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
</div>
<?= $this->Form->end() ?>
<br </br>
