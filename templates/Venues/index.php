<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venue[]|\Cake\Collection\CollectionInterface $venues
 */

echo $this -> Html->css("/vendor/datatables/dataTables.bootstrap4.min.css",['block'=>true]);
echo $this -> Html->script("/vendor/datatables/jquery.dataTables.min.js",['block'=>true]);
echo $this -> Html->script("/vendor/datatables/dataTables.bootstrap4.min.js",['block'=>true]);
echo $this -> Html->script("/js/demo/datatables-demo.js",['block'=>true]);
?>
<!-- Tabs -->
<?php $page_name = $this->request->getparam("controller") ?>
<?= $this->element('tabs/tab', ['page' => $page_name]) ?>
<p></p>
<!-- End of Tabs -->

<div>
    <div class="mb-3 d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="text-grey"><?= __('Venues') ?></h3>
        <a href="<?= $this->Url->build('/venues/add')?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> New Venue</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th><?= h('id') ?></th>
                    <th><?= h('Name') ?></th>
                    <th><?= h('Street Address') ?></th>
                    <th><?= h('Suburb') ?></th>
                    <th><?= h('State') ?></th>
                    <th><?= h('Postcode') ?></th>
                    <th><?= h('Capacity') ?></th>
                    <th><?= h('Phone') ?></th>
                    <th><?= h('Email') ?></th>
                    <th><?= h('description') ?></th>
                    <th><?= h('image') ?></th>
                    <th><?= h('pph') ?></th>
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
                    <td><?= h($venue->description) ?></td>
                    <td><?= h($venue->image) ?></td>
                    <td><?= h($venue->pph) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $venue->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $venue->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $venue->id], ['confirm' => __('Are you sure you want to delete venue {0}?', $venue->name)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
