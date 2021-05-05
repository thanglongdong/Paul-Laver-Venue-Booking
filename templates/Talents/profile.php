<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Talent $talent
 */

echo $this -> Html->css("pagetitle.css",['block'=>true]);
echo $this -> Html->css("about.css",['block'=>true]);
?>


<section id="intro-section">

<div class="group">
    <?=$this->Html->image('blankuser.png', ["class"=>'img-fluid rounded-circle mb-3',"alt" => "","style"=>"width:200px;height:200px"]);?>  
    <div class="left-side flex-col">
        <div class="item1">
            <?= h($talent->name) ?>
        </div>
        <div class="item2">
            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
            <?= h($talent->genre) ?>
        </div>
        <div class="item2">
            <i class="fas fa-phone-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            <?= h($talent->phone) ?>
        </div>
        <div class="item2">
            <i class="fas fa-envelope fa-sm fa-fw mr-2 text-gray-400"></i>
            <?= h($talent->email) ?>
        </div>
        <div class="item2">
            <i class="fas fa-dollar-sign fa-sm fa-fw mr-2 text-gray-400"></i>
            <?= h($talent->pph)."/hour"?>
        </div>
    </div>
</div>

</section>

