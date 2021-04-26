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
                <?=$this->Html->image('PL Logo (Main Title).png', ["alt" => "PL Logo","style"=>"width:211px;height:50px"]);?>
                <!--<img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24"> -->
                <!--echo $this->Html->image('VV Logo 1', ['alt' => 'VV Logo']); -->
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="<?= $this->Url->build('/')?>" class="nav-link px-2 link-secondary">Home</a></li>
                <li><a href="<?= $this->Url->build('/faq')?>" class="nav-link px-2 link-dark">FAQs</a></li>
                <li><a href="<?= $this->Url->build('/about')?>" class="nav-link px-2 link-dark">About</a></li>
            </ul>

            <div class="d-flex col-md-3 text-end ">
                <?php if($loggedin) : ?>
                    <!-- User Information -->
                    <li class="navbar-nav nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline nav-link px-2 link-dark">User Name</span>
                            <?=$this->Html->image('blankuser.png', ["alt" => "UserImage","class"=>"img-profile rounded-circle","style"=>"width:30px;height:30px"]);?>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <!-- Nested if -- if role == admin, then we want a dropdown user to have admin dashboard -->
                            <?php if($role == 'admin') : ?>
                                <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'dashboard','action'=>'index'])?>">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Admin Dashboard
                                </a>
                            <?php endif; ?>
                            <!-- Nested elseif -- if role == talent, then we want a dropdown user to have talent dashboard -->
                            <!-- Nested elseif -- if role == supplier, then we want a dropdown user to have supplier dashboard -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'users','action'=>'logout'])?>" >
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                <?php else : ?> <!-- else, if user not logged in -->
                    <a href="<?= $this->Url->build(['controller'=>'users','action'=>'login'])?>" style="margin-right:10px" class="btn btn-outline-primary me-2">Login</a>
                    <a href="<?= $this->Url->build(['controller'=>'users','action'=>'register'])?>" style="margin-right:10px" class="btn btn-primary me-2">Sign-up</a>
                <?php endif; ?>




            </div>


        </header>
    </div>
</nav>
