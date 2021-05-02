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
    <?=$this->Html->image('testimonials-1.jpg', ["class"=>'img-fluid rounded-circle mb-3',"alt" => "","style"=>"width:200px;height:200px"]);?>  
    <div class="left-side flex-col">
        <div class="item1">
            <?= h($talent->name) ?>
        </div>
        <div class="item2">
            <?= h($talent->genre) ?>
        </div>
        <div class="item2">
            <?= h($talent->email) ?>
        </div>
    </div>
</div>

</section>

