<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
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
                <h1 class="h3 mb-2 text-gray-800"><?= __('Edit User') ?></h1>
            </div>

            <div>
                <?= $this->Form->create($user,['novalidate' => true]) ?>
                <!-- Row 1 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('email',['disabled']) ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('role', [
                            'options' => ['admin'=>'admin','talent'=>'talent','supplier'=>'supplier','customer'=>'customer']
                        ])?>
                    </div>
                </div>
                <?= $this->Form->control('password',['disabled'])?>
                <br </br>

                <div>
                    <?= $this->Form->button(__('Edit User'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                    <?= $this->Form->postLink(
                        __('Delete User'),
                        ['action' => 'delete', $user->id],
                        ['confirm' => __('Are you sure you want to delete user {0}?', $user->id), 'class' => 'btn btn-outline-primary me-2 float-right mr-2']
                    ) ?>
                    <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
                </div>
            </div>

        </div>
    </div>

</div>

<br </br>

