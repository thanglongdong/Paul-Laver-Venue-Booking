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
    ->all();

$search_criteria_context = [
    'data' => [
        'estimate' => $this->request->getQuery('estimate'),
    ],
    'schema' => [
        'estimate'
    ]
];

echo $this -> Html->css("venue-profile.css",['block'=>true]);

?>
<div class="container">


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
                <h4>Contact</h4>
                    <blockquote></blockquote>
                    <p class="mb-0"> <strong>Phone:</strong> <?= h($venue->phone) ?></p>
                    <p class="mb-0"> <strong>Email:</strong> <?= h($venue->email) ?></p>
                    <hr>
                <h4>Request a Quote</h4>
                <br>
                <?= $this->Form->create($search_criteria_context, ['type' => 'get']) ?>
                <?= $this->Form->control('hours', ['label' => false,
                    'class' => 'form-control search-slt',
                    'placeholder' => '# of hours']); ?>
                <br>
                <?= $this->Form->button('Enquire', [
                    'class' => 'btn btn-primary col-12'
                ]) ?>
                <?= $this->Form->end() ?>

                <?php if($estimate != null): ?>
                    <?php if($estimate == 'incorrect'): ?>
                        <h6 class="list-inline-item align-middle text-center text-danger" >Please input numeric value</h6>
                    <?php else: ?>
                    <i class="list-inline-item fas fa-dollar-sign fa-2x"></i>
                    <h5 class="list-inline-item align-middle" ><?=$estimate?></h5>
                    <?php endif; ?>
                <?php endif; ?>


                <!--<a class="btn btn-primary" href="">Request Quote</a></div>-->
            </div>

        </div>
    </div>




    <!-- Talent -->
    <div class="container-fluid">
        <div class='flex' style='margin-top:15px;margin-bottom:15px;text-align:center'>
            <h3>Available Talent</h3>
        </div>

        <br>
            <div class="row text-center">

                <?php $i=0; ?>

                <?php foreach ($talent as $eachtalent): ?>

                    <?php if($i==4){
                        break;
                    }
                    ?>

                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card h-100">

                            <a href="<?= $this->Url->build(['controller'=>'Talents','action'=>'profile', $eachtalent->id])?>">
                                <?= $this->Html->image($eachtalent->image, ["style"=>"width:253px;height:164px;object-fit: cover", 'class' =>"card-body"]) ?>
                            </a>

                            <div class="card-body">
                                <h4 class="card-title"><?= h($eachtalent->name) ?></h4>
                                <p class="card-text text-muted"><?= h($eachtalent->genre) ?> </p>
                                <p><?= h($eachtalent->description) ?> </p>
                            </div>
                        </div>
                        <div class="card-footer"><a class="btn btn-primary" href="<?= $this->Url->build(['controller'=>'talents','action'=>'profile', $eachtalent->id])?>">Check them out!</a></div>
                    </div>

                    <?php $i++; ?>

                <?php endforeach; ?>

            </div>

        <br> <br> <br>
        <p class="text-center"><?= $this->Html->link(__('View All Talent'), ['controller' => 'talents','action' => 'results']) ?></p>
        <br>
    </div>
    <!-- End Talent -->


    <!-- Suppliers -->
    <div class="container-fluid">
        <div class='flex' style='margin-top:15px;margin-bottom:15px;text-align:center'>
            <h3>Preferred Suppliers</h3>
        </div>

        <br>

        <div class="row text-center">

            <?php $i=0; ?>

            <?php foreach ($supplier as $eachsupplier): ?>

                <?php if($i==4){
                    break;
                }
                ?>

                <?php if($eachsupplier->preferred == 'yes'): ?> <!-- if supplier is preferred, show them -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card h-100">

                            <a href="<?= $this->Url->build(['controller'=>'Suppliers','action'=>'profile', $eachsupplier->id])?>">
                                <?= $this->Html->image($eachsupplier->image, ["style"=>"width:253px;height:164px;object-fit: cover", 'class' =>"card-body"]) ?>
                            </a>

                            <div class="card-body">
                                <h4 class="card-title"><?= h($eachsupplier->name) ?></h4>
                                <p class="card-text"><?= h($eachsupplier->description) ?></p>
                            </div>
                        </div>
                        <div class="card-footer"><a class="btn btn-primary" href="<?= $this->Url->build(['controller'=>'Suppliers','action'=>'profile', $eachsupplier->id])?>">Check them out!</a></div>
                    </div>

                    <?php $i++; ?>
                <?php endif; ?>

            <?php endforeach; ?>

            <?php if($i < 4): ?> <!-- if all preferred suppliers shown and still spots (in 4 display) left, then show non-preferred -->
                <?php foreach ($supplier as $eachsupplier): ?>

                    <?php if($i==4){
                        break;
                    }
                    ?>

                    <?php if($eachsupplier->preferred == 'no'): ?> <!-- obviously, we dont want to re-show preferred -->
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card h-100">

                                <a href="<?= $this->Url->build(['controller'=>'Suppliers','action'=>'profile', $eachsupplier->id])?>">
                                    <?= $this->Html->image($eachsupplier->image, ["style"=>"width:253px;height:164px;object-fit: cover", 'class' =>"card-body"]) ?>
                                </a>

                                <div class="card-body">
                                    <h4 class="card-title"><?= h($eachsupplier->name) ?></h4>
                                    <p class="card-text"><?= h($eachsupplier->description) ?></p>
                                </div>
                            </div>
                            <div class="card-footer"><a class="btn btn-primary" href="<?= $this->Url->build(['controller'=>'Suppliers','action'=>'profile', $eachsupplier->id])?>">Check them out!</a></div>
                        </div>

                        <?php $i++; ?>
                    <?php endif; ?>

                <?php endforeach; ?>
            <?php endif; ?>

        </div>

        <br> <br> <br>
        <p class="text-center"><?= $this->Html->link(__('View All Suppliers'), ['controller' => 'suppliers','action' => 'results']) ?></p>
        <br>
    </div>
    <!-- End Suppliers -->

</div>
