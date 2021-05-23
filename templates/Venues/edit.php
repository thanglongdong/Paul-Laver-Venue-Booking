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

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h1 class="h3 mb-2 text-gray-800"><?= __('Edit Venue') ?></h1>
            </div>

            <div>
                <?= $this->Form->create($venue,['novalidate' => true, 'type'=>'file']) ?>
                <?= $this->Form->control('name') ?>
                <?= $this->Form->control('street_address')?>
                <!-- Row 1 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('suburb') ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('state', [
                            'options' => ['ACT'=>'ACT','NSW'=>'NSW','NT'=>'NT','QLD'=>'QLD','SA'=>'SA','TAS'=>'TAS','VIC'=>'VIC','WA'=>'WA']
                        ]) ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('postcode'); ?>
                    </div>
                </div>
                <!-- Row 2 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('capacity') ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('pph', ['label'=>'Price Per Hour']) ?>
                    </div>
                </div>
                <!-- Row 3 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('phone') ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('email') ?>
                    </div>
                </div>
                <?= $this->Form->control('description') ?>
                <br </br>
                <?= $this->Form->control('image_file',['type'=>'file']) ?>
                <br </br>

                <div>
                    <?= $this->Form->button(__('Edit Venue'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                    <?= $this->Form->postLink(
                        __('Delete Venue'),
                        ['action' => 'delete', $venue->id],
                        ['confirm' => __('Are you sure you want to delete venue {0}?', $venue->name),'class' => 'btn btn-outline-primary me-2 float-right mr-2']
                    ) ?>
                    <?= $this->Html->link(__('List Venues'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
                </div>
            </div>

        </div>
    </div>

</div>


<br </br>


