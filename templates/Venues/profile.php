<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venue $venue
 */
use Cake\ORM\TableRegistry;

$talents = TableRegistry::getTableLocator()->get('Talents');
$suppliers = TableRegistry::getTableLocator()->get('Suppliers');

$talent = $talents
    ->find()
    ->all();

$supplier =$suppliers
    ->find()
    ->where(['preferred' => 'yes'])
    ->all();

echo $this -> Html->css("pagetitle.css",['block'=>true]);
echo $this -> Html->css("venue-profile.css",['block'=>true]);
?>
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center">
    <?=$this->Html->image($venue->image, ["style"=>"width:700px;height:300px;object-fit: cover"]);?>
</div>

<div class="row">
    <div class="col-md-8">

        <article class="blog-post">
            <vname class="blog-post-title" ><?= h($venue->name) ?></vname>
            <br>
            <p class="blog-post-meta"> <?= h($venue->street_address) ?>, <?= h($venue->suburb) ?>, <?= h($venue->state) ?>, <?= h($venue->postcode) ?></p>

            <p class="description"><?= h($venue->description) ?></p>
            <hr>
            <br>
            <hd>About This Venue</hd>
            <br>
            <subhd>The Space</subhd>
            <p><?= h($venue->name) ?> will be the perfect venue for you to celebrate memorable events. <br><strong>Venue's Capacity:</strong> <?= h($venue->capacity) ?>.</p>
        </article><!-- /.blog-post -->

        <br>

    </div>

    <div class="col-md-4">
        <div class="p-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">Contact</h4>
            <blockquote></blockquote>
            <p class="mb-0"> <strong>Phone:</strong> <?= h($venue->phone) ?></p>
            <p class="mb-0"> <strong>Email:</strong> <?= h($venue->email) ?></p>
        </div>

    </div>
</div>

<!-- Talents -->
<section>
    <div class='flex' style='margin-top:15px;margin-bottom:15px;text-align:center'>
        <h4>Available Talent</h4>
    </div>
    <div class="row text-center">
    <?php foreach ($talent as $eachtalent): ?>

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">

                    <a href="<?= $this->Url->build(['controller'=>'Talents','action'=>'profile', $eachtalent->id])?>">
                    <?= $this->Html->image($eachtalent->image, ["style"=>"width:200px;height:130px;", 'class' =>"card-img-top rounded mx-auto d-block"]) ?>
                    </a>

                    <div class="card-body">
                    <h4 class="card-title"><?= h($eachtalent->name) ?></h4>
                        <p class="card-text"><?= h($eachtalent->genre) ?> </p>
                        <p><?= h($eachtalent->description) ?> </p>
                    </div>
                </div>
                <div class="card-footer"><a class="btn btn-primary" href="<?= $this->Url->build(['controller'=>'Talents','action'=>'profile', $eachtalent->id])?>">Check them out!</a></div>
            </div>

    <?php endforeach; ?>
    </div>

<br>
</section>

<br>
<!-- Suppliers
<section>
     Same above, but for suppliers instead of talent!

</section> -->
