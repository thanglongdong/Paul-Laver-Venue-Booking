<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Talent $talent
 */
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h1 class="h3 mb-2 text-gray-800"><?= __('Edit Profile') ?></h1>
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
                </div>

                <?= $this->Form->control('description')?>
                <br </br>
                <?= $this->Form->control('change_image',['type'=>'file']) ?>
                <br </br>

                <div>
                    <?= $this->Form->button(__('Confirm'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Form->end() ?>
                    </div>
            </div>

        </div>
    </div>

</div>

<br>
