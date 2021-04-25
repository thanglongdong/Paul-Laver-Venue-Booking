<?php
$this->loadHelper('Authentication.Identity');
$loggedin = $this->Identity->isLoggedIn();
$role = $this->Identity->get('role');
$email = $this->Identity->get('email');
?>

<nav>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom bg-white">
            <a href= "<?= $this->Url->build('/')?>" class="navbar-brand">
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
                <?php if($loggedin) : ?>
                <a href="<?= $this->Url->build(['controller'=>'users','action'=>'logout'])?>" style="margin-right:10px" class="btn btn-primary me-2">Logout</a>
                    <!-- Nested if -- if role == admin, then we want a dropdown user to have admin dashboard -->
                    <?php if($role == 'admin') : ?>
                    <a href="<?= $this->Url->build(['controller'=>'dashboard','action'=>'index'])?>" class="btn btn-primary me-2">Dashboard</a>
                    <!-- Nested elseif -- if role == talent, then we want a dropdown user to have talent dashboard -->
                    <!-- Nested elseif -- if role == supplier, then we want a dropdown user to have supplier dashboard -->
                    <?php endif; ?>

                 <!--$role = $this->Identity->get('email'); ?> output current email (debugging)-->

                <?php else : ?>
                <a href="<?= $this->Url->build(['controller'=>'users','action'=>'login'])?>" style="margin-right:10px" class="btn btn-outline-primary me-2">Login</a>
                <a href="<?= $this->Url->build(['controller'=>'users','action'=>'register'])?>" style="margin-right:10px" class="btn btn-primary me-2">Sign-up</a>
                <?php endif; ?>
            </div>
        </header>
    </div>
</nav>
