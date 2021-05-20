<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venue $venue
 */
?>
<!-- Tabs -->
<?php $page_name = $this->request->getparam("controller") ?>
<?= $this->element('tabs/tab', ['page' => $page_name]) ?>
<p></p>
<!-- End of Tabs -->

<h1 class="h3 mb-2 text-gray-800"><?= __('New Venue') ?></h1>

<?= $this->Form->create($venue,['novalidate' => true, 'type'=>'file']) ?>
<?php
echo $this->Form->control('name');
echo $this->Form->control('street_address');
echo $this->Form->control('suburb');
echo $this->Form->control('state', [
    'options' => ['ACT'=>'ACT','NSW'=>'NSW','NT'=>'NT','QLD'=>'QLD','SA'=>'SA','TAS'=>'TAS','VIC'=>'VIC','WA'=>'WA']
]);
echo $this->Form->control('postcode');
echo $this->Form->control('capacity');
echo $this->Form->control('phone');
echo $this->Form->control('email');
echo $this->Form->control('description');
echo $this->Form->control('image_file',['type'=>'file']);
echo $this->Form->control('pph', ['label'=>'Price Per Hour']);
?>
<br </br>
<div>
    <?= $this->Form->button(__('Add Venue'), ['class' => 'btn btn-primary']) ?>
    <?= $this->Html->link(__('List Venues'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
</div>
<?= $this->Form->end() ?>
<br </br>
