<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venue $venue
 */
echo $this -> Html->css("pagetitle.css",['block'=>true]);
?>
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <img src="http://placehold.it/1300x300">
</div>
<div>
    <h3><?= h($venue->name) ?></h3>
    <br></br>

    <p align="center">Venue description here</p>
</div>

