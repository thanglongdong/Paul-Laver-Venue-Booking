<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Users $users
 */
?>
<div class="row">
    <div class="column-responsive column-80">
        <div class="customers view content">
            <h3><?= h($users->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($users->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($users->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Role') ?></th>
                    <td><?= h($users->role) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($users->id) ?></td>
                </tr>
            </table>
    </div>
</div>
