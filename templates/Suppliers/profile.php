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
    </div>
</div>

</section>