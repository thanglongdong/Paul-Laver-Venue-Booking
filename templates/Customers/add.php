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

    <div class="row">
        <div class="col">
                <?= $this->Form->control('first_name', ['placeholder'=>'First Name', 'label'=>false]); ?>
        </div>
        <div class="col">
                <?= $this->Form->control('last_name', ['placeholder'=>'Last Name', 'label'=>false]); ?>
        </div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-4">
        <?= $this->Form->control('mobile', ['placeholder'=>'Mobile Number', 'label'=>false]); ?>
        </div>
        <div class="col-md-8">
        <?= $this->Form->control('email', ['placeholder'=>'Email Address', 'label'=>false]); ?>
        </div>
    </div>
    <?= $this->Form->control('address'); ?>

    <?= $this->Form->control('user_id', ['options' => $users, 'empty' => true]); ?>
</br>
<div>
<?= $this->Form->button(__('Add Customer'), ['class' => 'btn btn-primary']) ?>
<?= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
</div>
<?= $this->Form->end() ?>
</br>
