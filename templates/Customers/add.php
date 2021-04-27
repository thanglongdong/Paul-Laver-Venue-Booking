<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<!-- Tabs -->
<?php $page_name = $this->request->getparam("controller") ?>
<?= $this->element('tabs/tab', ['page' => $page_name]) ?>
<p></p>
<!-- End of Tabs -->

<h1 class="h3 mb-2 text-gray-800"><?= __('New Customer') ?></h1>

<?= $this->Form->create($customer,['novalidate' => true]) ?>
    <?php
        echo $this->Form->control('first_name');
        echo $this->Form->control('last_name');
        echo $this->Form->control('mobile');
        echo $this->Form->control('address');
        echo $this->Form->control('email');
    ?>
</br>
<div>
<?= $this->Form->button(__('Add Customer'), ['class' => 'btn btn-primary']) ?>
<?= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
</div>
<?= $this->Form->end() ?>
</br>
