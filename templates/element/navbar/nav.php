<?php
use Cake\ORM\TableRegistry;
$this->loadHelper('Authentication.Identity');

$loggedin = $this->Identity->isLoggedIn();
$user_id=$this->Identity->get('id');
$role = $this->Identity->get('role');
$email = $this->Identity->get('email');
$talents = TableRegistry::getTableLocator()->get('Talents');
$suppliers = TableRegistry::getTableLocator()->get('Suppliers');
$customers = TableRegistry::getTableLocator()->get('Customers');

if($role == 'admin'){
    $username= 'Admin';}
elseif($role == 'customer'){
    $user = $customers
    ->find()
    ->where(['user_id' => $user_id])
    ->first();
    $username= $user->first_name."  ".$user->last_name;}
elseif($role == 'supplier'){
    $user = $suppliers
    ->find()
    ->where(['user_id' => $user_id])
    ->first();
    $username= $user->name;}
elseif($role == 'talent'){
    $user = $talents
    ->find()
    ->where(['user_id' => $user_id])
    ->first();
    $username= $user->name;}
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
                <?php if($loggedin): ?>
                    <!-- User Information -->
                    <li class="navbar-nav nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php if($role != null): ?>
                            <span class="mr-2 d-none d-lg-inline nav-link px-2 link-dark"><?= $username ?></span>
                            <?php endif; ?>
                            <?=$this->Html->image('blankuser.png', ["alt" => "UserImage","class"=>"img-profile rounded-circle","style"=>"width:30px;height:30px"]);?>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">

                            <!-- Nested if -- if role == admin, then we want a dropdown user to have admin dashboard -->
                            <?php if($role == 'admin') : ?>
                                <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'dashboard','action'=>'index'])?>">
                                    <!-- no longer builds to dashboard as doesnt exist-->
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Admin Dashboard
                                </a>
                            <!-- Nested elseif -- if role == talent, then we want a dropdown user to have talent dashboard -->
                            <?php elseif($role == 'talent') :
                                $user = $talents
                                ->find()
                                ->where(['user_id' => $user_id])
                                ->first();
                                $talent_id= $user->id?>
                                <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'talents','action'=>'profile',$talent_id])?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                My Profile
                                 </a>
                            <!-- Nested elseif -- if role == supplier, then we want a dropdown user to have supplier dashboard -->
                            <?php elseif($role == 'supplier') :
                                $user = $suppliers
                                ->find()
                                ->where(['user_id' => $user_id])
                                ->first();
                                $supplier_id= $user->id?>
                                <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'suppliers','action'=>'profile',$supplier_id])?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                My Profile
                                 </a>
                            <?php elseif($role == 'customer') :
                                $user = $customers
                                ->find()
                                ->where(['user_id' => $user_id])
                                ->first();
                                $customers_id= $user->id?>
                                <a class="dropdown-item" href="<?= $this->Url->build(['controller'=>'customers','action'=>'myprofile',$customers_id])?>">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                My Profile
                                 </a>
                            <?php endif; ?>

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
