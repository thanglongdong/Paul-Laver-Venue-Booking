<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

echo $this -> Html->css("home.css",['block'=>true]);

$this->disableAutoLayout();

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?= $this->Html->meta('icon') ?>

    <title><?= $this->fetch('title') ?></title>

    <!-- Bootstrap core CSS -->
    <?= $this->Html->css(['/vendor/bootstrap/css/bootstrap.min.css']) ?>

    <!-- Custom fonts for this template -->
    <?= $this->Html->css(['/vendor/fontawesome-free/css/all.min.css']) ?>
    <?= $this->Html->css(['/vendor/simple-line-icons/css/simple-line-icons.css']) ?>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <?= $this->Html->css(['landing-page.min.css']) ?>

    <!-- Anchors -->
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>

<body>

<!-- Navigation -->
<nav>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a class="navbar-brand">
                <?=$this->Html->image('VV Logo 2.png', ["alt" => "VV Logo","style"=>"width:211px;height:50px"]);?>
                <!--<img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24"> -->
                <!--echo $this->Html->image('VV Logo 1', ['alt' => 'VV Logo']); -->
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="<?= $this->Url->build('/')?>" class="nav-link px-2 link-secondary">Home</a></li>
                <li><a href="<?= $this->Url->build('/faq')?>" class="nav-link px-2 link-dark">FAQs</a></li>
                <li><a href="<?= $this->Url->build('/about')?>" class="nav-link px-2 link-dark">About</a></li>
            </ul>

            <div class="d-flex col-md-3 text-end">
                <button id= type="button" style= "margin-right:10px" class="btn btn-outline-primary me-2">Login</button>
                <button type="button" class="btn btn-primary" >Sign-up</button>
            </div>
        </header>
    </div>
</nav>

<div class="container">

</div>

<!-- Masthead -->
<header class="masthead text-white text-center">
    <div class="overlay"> </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h1 class="mb-5">Best way to browse venues online!</h1>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <form action="#" method="post" novalidate="novalidate">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex">
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0" style="margin-right:10px">
                                    <input type="location"  class="form-control search-slt" placeholder="Location">
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0" style="margin-right:10px">
                                    <input type="date" class="form-control search-slt" placeholder="Date">
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0" style="margin-right:10px">
                                    <select class="form-control search-slt"  id="numOfPeople">
                                        <option># of People</option>
                                        <option><50</option>
                                        <option>50-100</option>
                                        <option>100-200</option>
                                        <option>200+</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                    <!-- making button type search/submit throws an error as no action performed yet -->
                                    <!-- jessie: I just make the type 'button' so that there is no error for integrity testing (for iteration 1 only) -->
                                    <button type="button" class="btn btn-lg-3 btn-md-3 btn-sm-12 btn-block btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>

<main class="main">
    <div class="container-fluid">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
        <!-- Icons Grid NOT ANYMORE -->
        <section class="features-icons bg-light text-center">
            <!-- Page Content -->
            <div class="container">
                <h3 class="text-muted mb-3 text-left">Featured Venues</h3>

                <!-- Page Features -->
                <div class="row text-center">

                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card h-100">
                            <img class="card-img-top" src="http://placehold.it/500x325" alt="">
                            <div class="card-body">
                                <h4 class="card-title">Venue Name</h4>
                                <p class="card-text">Text that adequately describes the best parts of the venue and shows a reason for people to book here.</p>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-primary">Find Out More!</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card h-100">
                            <img class="card-img-top" src="http://placehold.it/500x325" alt="">
                            <div class="card-body">
                                <h4 class="card-title">Venue Name</h4>
                                <p class="card-text">Text that adequately describes the best parts of the venue and shows a reason for people to book here.</p>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-primary">Find Out More!</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card h-100">
                            <img class="card-img-top" src="http://placehold.it/500x325" alt="">
                            <div class="card-body">
                                <h4 class="card-title">Venue Name</h4>
                                <p class="card-text">Text that adequately describes the best parts of the venue and shows a reason for people to book here.</p>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-primary">Find Out More!</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card h-100">
                            <img class="card-img-top" src="http://placehold.it/500x325" alt="">
                            <div class="card-body">
                                <h4 class="card-title">Venue Name</h4>
                                <p class="card-text">Text that adequately describes the best parts of the venue and shows a reason for people to book here.</p>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-primary">Find Out More!</a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </section>


        <!-- Testimonials -->
        <section class="testimonials text-center bg-light">
            <div class="container">
                <h2 class="mb-5">What people are saying...</h2>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-1.jpg" alt="">
                            <h5>Margaret E.</h5>
                            <p class="font-weight-light mb-0">"This is fantastic! Thanks so much guys, the best way by far to book events!"</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-2.jpg" alt="">
                            <h5>Fred S.</h5>
                            <p class="font-weight-light mb-0">"Venue Virtual is amazing. I've been using it as an event manager at my work and it has never failed me."</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="img/testimonials-3.jpg" alt="">
                            <h5>Sarah W.</h5>
                            <p class="font-weight-light mb-0">"Such a enjoyable and customizable experience!"</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>


<!-- Footer -->
<footer class="footer bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                <ul class="list-inline mb-2">
                    <li class="list-inline-item">
                        <a href="<?= $this->Url->build('/about')?>" >About</a>
                    </li>
                    <li class="list-inline-item">&sdot;</li>
                    <li class="list-inline-item">
                        <a href="<?= $this->Url->build('/contact_us')?>" >Contact</a>
                    </li>
                    <li class="list-inline-item">&sdot;</li>
                    <li class="list-inline-item">
                        <a href="<?= $this->Url->build('/terms')?>" >Terms of Use</a>
                    </li>
                    <li class="list-inline-item">&sdot;</li>
                    <li class="list-inline-item">
                        <a href="<?= $this->Url->build('/privacy_policy')?>" >Privacy Policy</a>
                    </li>
                </ul>
                <p class="text-muted small mb-4 mb-lg-0">&copy; Venue Virtual 2021. All Rights Reserved.</p>
            </div>
            <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item mr-3">
                        <a>
                            <i class="fab fa-facebook fa-2x fa-fw"></i>
                        </a>
                    </li>
                    <li class="list-inline-item mr-3">
                        <a>
                            <i class="fab fa-twitter-square fa-2x fa-fw"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a>
                            <i class="fab fa-instagram fa-2x fa-fw"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<?= $this->Html->script(['/vendor/jquery/jquery.min.js']) ?>
<?= $this->Html->script(['/vendor/bootstrap/js/bootstrap.bundle.min.js']) ?>

</body>

</html>
