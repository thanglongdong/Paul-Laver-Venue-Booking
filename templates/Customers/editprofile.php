<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>

<h1 class="h3 mb-2 text-gray-800"><?= __('Edit Profile') ?></h1>

<?= $this->Form->create($customer,['novalidate' => true]) ?>
    <?php
        echo $this->Form->control('first_name');
        echo $this->Form->control('last_name');
        echo $this->Form->control('mobile');
        echo $this->Form->control('address');
        echo $this->Form->control('email');
    ?>
<br>
<div>
    <?= $this->Form->button(__('Confirm'), ['class' => 'btn btn-primary']) ?>
</div>
<?= $this->Form->end() ?>
<br </br>