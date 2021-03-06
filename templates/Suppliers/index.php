<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier[]|\Cake\Collection\CollectionInterface $suppliers
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
        <h3 class="text-grey"><?= __('Suppliers') ?></h3>
        <a href="<?= $this->Url->build('/suppliers/add')?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> New Supplier</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th><?= h('Id') ?></th>
                <th><?= h('Name') ?></th>
                <th><?= h('Phone') ?></th>
                <th><?= h('Email') ?></th>
                <th><?= h('Image') ?></th>
                <th><?= h('Preferred') ?></th>
                <th><?= h('User_id') ?></th>
                <th><?= h('Price Per Hour') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($suppliers as $supplier): ?>
                <tr>
                    <td><?= $this->Number->format($supplier->id) ?></td>
                    <td><?= h($supplier->name) ?></td>
                    <td><?= h($supplier->phone) ?></td>
                    <td><?= h($supplier->email) ?></td>
                    <td><?= $this->Html->image($supplier->image, ["style"=>"width:150px;height:100px;object-fit: cover"]) ?></td>
                    <td><?= h($supplier->preferred) ?></td>
                    <td><?= $supplier->has('user') ? $supplier->user->id : '' ?></td>
                    <td><?= $this->Number->currency($supplier->pph) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $supplier->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $supplier->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $supplier->id], ['confirm' => __('Are you sure you want to delete supplier {0}?', $supplier->name)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
