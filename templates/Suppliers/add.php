<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
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
                <h1 class="h3 mb-2 text-gray-800"><?= __('New Supplier') ?></h1>
            </div>

            <div>
                <?= $this->Form->create($supplier,['novalidate' => true, 'type'=>'file']) ?>
                <?= $this->Form->control('name')?>
                <!-- Row 1 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('preferred', [
                            'options' => ['no'=>'no','yes'=>'yes']
                        ])?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('pph',['label'=>'Price Per Hour'])?>
                    </div>
                </div>
                <!-- Row 2 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('phone') ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('email') ?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('user_id', ['options' => $users, 'empty' => true])?>
                    </div>
                </div>
                <?= $this->Form->control('description') ?>
                <br </br>
                <?= $this->Form->control('image_file',['type'=>'file']) ?>
                <br </br>

                <div>
                    <?= $this->Form->button(__('Add Supplier'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link(__('List Suppliers'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
                </div>
            </div>

        </div>
    </div>

</div>
<?= $this->Form->end() ?>
<br </br>
