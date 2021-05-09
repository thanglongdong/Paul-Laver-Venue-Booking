<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Supplier $supplier
 */

echo $this -> Html->css("pagetitle.css",['block'=>true]);
echo $this -> Html->css("about.css",['block'=>true]);
?>


<section id="intro-section">

<div class="group">
    <?=$this->Html->image('blankuser.png', ["class"=>'img-fluid rounded-circle mb-3',"alt" => "","style"=>"width:200px;height:200px"]);?>  
    <div class="left-side flex-col">
        <div class="item1">
            <?= h($supplier->name) ?>
        </div>
        <div class="item2">
            <i class="fas fa-phone-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            <?= h($supplier->phone) ?>
        </div>
        <div class="item2">
            <i class="fas fa-envelope fa-sm fa-fw mr-2 text-gray-400"></i>
            <?= h($supplier->email) ?>
        </div>
        <div class="item2">
            <i class="fas fa-dollar-sign fa-sm fa-fw mr-2 text-gray-400"></i>
            <?= h($supplier->pph)."/hour" ?>
        </div>
        <div class="item2">
            <?= h($supplier->description) ?>
        </div>
        <a href="<?= $this->Url->build(['action' => 'editprofile', $supplier->id])?>" class="d-none d-sm-inline-block btn btn-outline-primary shadow-sm" style="width:116px"><i
                class="fas fa-sm text-white-50"></i>Edit</a>
    </div>
</div>

</section>