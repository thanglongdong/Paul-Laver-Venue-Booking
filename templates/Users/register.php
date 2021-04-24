<!-- templates/Users/register.php -->

<div class="users form">
<?= $this->Form->create($user) ?>
    <fieldset>
        <h3><?= __('Register') ?></h3>
        <?= $this->Form->control('email') ?>
        <?= $this->Form->control('password') ?>
        <!-- <?= $this->Form->control('role', [
            'options' => ['admin' => 'Admin', 'customer' => 'Customer','talent' => 'Talent','supplier' => 'Supplier']
        ]) ?> -->
   </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>
</div>
