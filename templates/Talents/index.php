<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Talent[]|\Cake\Collection\CollectionInterface $talents
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
        <h3 class="text-grey"><?= __('Talents') ?></h3>
        <a href="<?= $this->Url->build('/talents/add')?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> New Talent</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th><?= h('Id') ?></th>
                <th><?= h('Name') ?></th>
                <th><?= h('Phone') ?></th>
                <th><?= h('Email') ?></th>
                <th><?= h('Genre') ?></th>
                <th><?= h('Image') ?></th>
                <th><?= h('Pph') ?></th>
                <th><?= h('User_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($talents as $talent): ?>
                <tr>
                    <td><?= $this->Number->format($talent->id) ?></td>
                    <td><?= h($talent->name) ?></td>
                    <td><?= h($talent->phone) ?></td>
                    <td><?= h($talent->email) ?></td>
                    <td><?= h($talent->genre) ?></td>
                    <td><?= $this->Html->image($talent->image, ["style"=>"width:150px;height:100px;object-fit: cover"]) ?></td>
                    <td><?= h($talent->pph) ?></td>
                    <td><?= $talent->has('user') ? $talent->user->id : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $talent->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $talent->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $talent->id], ['confirm' => __('Are you sure you want to delete talent {0}?', $talent->name)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
