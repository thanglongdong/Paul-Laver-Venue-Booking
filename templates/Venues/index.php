<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venue[]|\Cake\Collection\CollectionInterface $venues
 */
?>
<div class="venues index content">
    <div class="row justify-content-center" style="margin-bottom:20px">
        <h3><?= __('Venues') ?></h3>
        <a href="<?= $this->Url->build('/venues/add')?>" class="btn btn-outline-primary" style="margin-left:15px" >Add Venues</a>
    </div>
    <div class="table-responsive">
        <table class='table'>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('street_address') ?></th>
                    <th><?= $this->Paginator->sort('suburb') ?></th>
                    <th><?= $this->Paginator->sort('state') ?></th>
                    <th><?= $this->Paginator->sort('postcode') ?></th>
                    <th><?= $this->Paginator->sort('capacity') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($venues as $venue): ?>
                <tr>
                    <td><?= $this->Number->format($venue->id) ?></td>
                    <td><?= h($venue->name) ?></td>
                    <td><?= h($venue->street_address) ?></td>
                    <td><?= h($venue->suburb) ?></td>
                    <td><?= h($venue->state) ?></td>
                    <td><?= h($venue->postcode) ?></td>
                    <td><?= $this->Number->format($venue->capacity) ?></td>
                    <td><?= h($venue->phone) ?></td>
                    <td><?= h($venue->email) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $venue->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $venue->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $venue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venue->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
