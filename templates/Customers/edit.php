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
                <h1 class="h3 mb-2 text-gray-800"><?= __('Edit Customer') ?></h1>
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
                    <?= $this->Form->button(__('Edit Customer'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                    <?= $this->Form->postLink(
                        __('Delete Customer'),
                        ['action' => 'delete', $customer->id],
                        ['confirm' => __('Are you sure you want to delete customer {0} {1}?', $customer->first_name, $customer->last_name), 'class' => 'btn btn-outline-primary me-2 float-right mr-2']
                    ) ?>
                    <?= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
                </div>
            </div>

        </div>
    </div>

</div>

<br>
