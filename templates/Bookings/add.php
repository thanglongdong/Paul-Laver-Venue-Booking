<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 */
use Cake\I18n\Date;
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
                <h1 class="h3 mb-2 text-gray-800"><?= __('New Booking') ?></h1>
            </div>

            <div>
                <?= $this->Form->create($booking,['novalidate' => true]) ?>
                <!-- Row 1 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('date', ['default'=>\Cake\I18n\FrozenDate::now(), 'readonly'=>true])?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('start_time')?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('end_time')?>
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('event_type', [
                            'options' => ['Birthday'=>'Birthday','Wedding'=>'Wedding','Engagement Party'=>'Engagement Party','Meeting'=>'Meeting','Workshop'=>'Workshop','Others'=>'Others']
                        ])?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('no_of_people')?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('cost')?>
                    </div>
                </div>

                <!-- Row 3 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('venue_id', ['options' => $venues])?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('customer_id', ['options' => $customers])?>
                    </div>
                </div>

                <!-- Row 4 -->
                <div class="row">
                    <div class="col">
                        <?= $this->Form->control('suppliers._ids', ['options' => $suppliers])?>
                    </div>
                    <div class="col">
                        <?= $this->Form->control('talents._ids', ['options' => $talents])?>
                    </div>
                </div>
                <br </br>

                <div>
                    <?= $this->Form->button(__('Add Booking'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link(__('List Bookings'), ['action' => 'index'], ['class' => 'btn btn-outline-primary me-2 float-right mr-2']) ?>
                </div>
            </div>

        </div>
    </div>

</div>
<?= $this->Form->end() ?>
<br </br>
