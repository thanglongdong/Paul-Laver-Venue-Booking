<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
 */
?>

<h1 class="h3 mb-2 text-gray-800"><?= __('Edit Profile') ?></h1>

<?= $this->Form->create($supplier,['novalidate' => true,'type'=>'file']) ?>
<?php
echo $this->Form->control('name');
echo $this->Form->control('phone');
echo $this->Form->control('email');
echo $this->Form->control('description');
echo $this->Form->control('change_image',['type'=>'file']);
echo $this->Form->control('preferred', [
    'options' => ['no'=>'no','yes'=>'yes']
]);
echo $this->Form->control('pph');
echo $this->Form->control('user_id', ['disabled']);
?>
<br </br>
<div>
    <?= $this->Form->button(__('Confirm'), ['class' => 'btn btn-primary']) ?>
</div>
<?= $this->Form->end() ?>
<br </br>

