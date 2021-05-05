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

<h1 class="h3 mb-2 text-gray-800"><?= __('Edit User') ?></h1>

<?= $this->Form->create($user,['novalidate' => true]) ?>
    <?php
    echo $this->Form->control('email',['disabled']);
    echo $this->Form->control('password',['disabled']);
    echo $this->Form->control('role', [
        'options' => ['admin'=>'admin','talent'=>'talent','supplier'=>'supplier','customer'=>'customer']
    ]);
    ?>
<br </br>
<div>
<?= $this->Form->button(__('Edit User'), ['class' => 'btn btn-primary']) ?>
<?= $this->Form->postLink(
    __('Delete User'),
    ['action' => 'delete', $user->id],
    ['confirm' => __('Are you sure you want to delete user {0}?', $user->id), 'class' => 'btn btn-outline-primary me-2 float-right mr-2']
) ?>
<?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
</div>
<?= $this->Form->end() ?>
<br </br>

