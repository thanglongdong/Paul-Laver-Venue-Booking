<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<h1 class="h3 mb-2 text-gray-800"><?= __('Edit Customer') ?></h1>



<?= $this->Form->create($customer) ?>
    <?php
        echo $this->Form->control('first_name');
        echo $this->Form->control('last_name');
        echo $this->Form->control('mobile');
        echo $this->Form->control('address');
        echo $this->Form->control('email');
    ?>
<br>
<div>
    <?= $this->Form->button(__('Edit Customer'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Form->postLink(
        __('Delete Customer'),
        ['action' => 'delete', $customer->id],
        ['confirm' => __('Are you sure you want to delete customer {0} {1}?', $customer->first_name, $customer->last_name), 'class' => 'btn btn-outline-primary me-2 float-right mr-2']
    ) ?>
    <?= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
</div>
<?= $this->Form->end() ?>
<br </br>
