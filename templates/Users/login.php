<?php
echo $this -> Html->css("login.css",['block'=>true]);
?>

<div class="container-fluid">
    <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
            <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4">Welcome back!</h3>
                                <?= $this->Flash->render() ?>
                                <?= $this->Form->create() ?>
                                    <div class="form-label-group">
                                        <?= $this->Form->control('email', [
                                            'placeholder'=>'Email address',
                                            'label'=> false,
                                            'class'=>'form-control',
                                            'required' => true,
                                            'type'=>'email',
                                            'id'=>'inputEmail'
                                        ]) ?>
                                    </div>

                                    <div class="form-label-group">
                                        <?= $this->Form->control('password', [
                                            'class'=>'form-control',
                                            'placeholder'=>'Password',
                                            'label' => false,
                                            'required' => true
                                        ]) ?>
                                    </div>

                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember password</label>
                                    </div>
                                    <?= $this->Form->submit(__('Login'), ['class'=>'btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2','formnovalidate' => true]); ?>
                                    <div class="text-center">
                                        <a class="small" href="#">Forgot password?</a></div>
                                    <?= $this->Html->link("Don't have an account?", ['action' => 'register']) ?>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<p></p>
