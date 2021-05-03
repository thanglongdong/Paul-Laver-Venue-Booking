<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venue $venue
 */
echo $this -> Html->css("pagetitle.css",['block'=>true]);
echo $this -> Html->css("venue-profile.css",['block'=>true]);
?>
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <img src="http://placehold.it/1300x300">
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

