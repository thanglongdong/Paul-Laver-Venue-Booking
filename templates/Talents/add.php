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

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h1 class="h3 mb-2 text-gray-800"><?= __('New Talent') ?></h1>
            </div>

            <div>
                <?= $this->Form->create($talent,['novalidate' => true, 'type'=>'file']) ?>
                <?= $this->Form->control('name')?>
                <!-- Row 1 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('genre', [
                            'options' => ['Singer'=>'Singer','Dancer'=>'Dancer','Clown'=>'Clown','Magician'=>'Magician']
                        ])?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('pph',['label'=>'Price Per Hour'])?>
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('phone')?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('email')?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('user_id', ['options' => $users, 'empty' => true])?>
                    </div>
                </div>

                <?= $this->Form->control('description')?>
                <br </br>
                <?= $this->Form->control('image_file',['type'=>'file']) ?>
                <br </br>

                <div>
                    <?= $this->Form->button(__('Add Talent'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link(__('List Talents'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
                </div>
            </div>

        </div>
    </div>

</div>
<?= $this->Form->end() ?>
<br </br>
