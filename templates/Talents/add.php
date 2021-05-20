<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Talent $talent
 */
?>
<!-- Tabs -->
<?php $page_name = $this->request->getparam("controller") ?>
<?= $this->element('tabs/tab', ['page' => $page_name]) ?>
<p></p>
<!-- End of Tabs -->

<h1 class="h3 mb-2 text-gray-800"><?= __('New Talent') ?></h1>

<?= $this->Form->create($talent,['novalidate' => true, 'type'=>'file']) ?>
<?php
echo $this->Form->control('name');
echo $this->Form->control('phone');
echo $this->Form->control('email');
echo $this->Form->control('genre', [
    'options' => ['Singer'=>'Singer','Dancer'=>'Dancer','Clown'=>'Clown','Magician'=>'Magician']
]);
echo $this->Form->control('description');
echo $this->Form->control('image_file',['type'=>'file']);
echo $this->Form->control('pph',['label'=>'Price Per Hour']);
echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
?>
<br </br>
<div>
    <?= $this->Form->button(__('Add Talent'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('List Talents'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
</div>
<?= $this->Form->end() ?>
<br </br>
