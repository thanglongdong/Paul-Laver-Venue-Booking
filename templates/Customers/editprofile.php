<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h1 class="h3 mb-2 text-gray-800"><?= __('Edit Profile') ?></h1>
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
                </div>
                <?= $this->Form->control('address') ?>
                <br>

                <div>
                    <?= $this->Form->button(__('Confirm'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>

        </div>
    </div>

</div>

<br>
