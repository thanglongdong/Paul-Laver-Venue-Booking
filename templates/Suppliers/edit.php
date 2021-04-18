<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
 */
?>
<h1 class="h3 mb-2 text-gray-800"><?= __('Edit Supplier') ?></h1>

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
<?= $this->Form->postLink(
    __('Delete Supplier'),
    ['action' => 'delete', $supplier->id],
    ['confirm' => __('Are you sure you want to delete {0}?', $supplier->name), 'class' => 'btn btn-outline-primary me-2 float-right mr-2']
) ?>
<?= $this->Html->link(__('List Suppliers'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
</div>
<?= $this->Form->end() ?>
<br </br>
