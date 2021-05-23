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

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h1 class="h3 mb-2 text-gray-800"><?= __('New Customer') ?></h1>
            </div>

            <div>
                <?= $this->Form->create($customer,['novalidate' => true]) ?>
                <!-- Row 1 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('first_name')?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('last_name')?>
                    </div>
                </div>
                <!-- Row 2 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('mobile') ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('email') ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('user_id', ['options' => $users, 'empty' => true]) ?>
                    </div>
                </div>
                <?= $this->Form->control('address') ?>
                <br </br>

                <div>
                    <?= $this->Form->button(__('Add Customer'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
                </div>
            </div>

        </div>
    </div>

</div>
<?= $this->Form->end() ?>
</br>
