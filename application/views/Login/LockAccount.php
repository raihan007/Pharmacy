<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= $title ?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="description" content="Developed By Talukder, Md. Raihan">
        <meta name="keywords" content="Login, Bootstrap 3, Responsive">
        <!-- bootstrap 3.0.2 -->
        <?= link_tag('Assets/css/bootstrap.min.css') ?>
        <!-- font Awesome -->
        <?= link_tag('Assets/css/font-awesome.min.css') ?>

        <?= link_tag('Assets/css/own_style.css') ?>
    </head>
        <body>
        <div class="row">
            <div class="col-md-7 col-sm-7 hidden-xs login_left">
                
            </div>
            <div class="col-sm-12 login_panel lockscreen">
                <div class="row">
                    <div class="col-sm-3 col-xs-12 text-center">
                        <img src="<?php echo base_url('Assets/Images/med.png'); ?>" alt="user image"/>
                    </div>
                    <div class="col-sm-9 col-xs-12">
                        <blockquote>
                            <h5 class="aiub_title">ABC Pharmacy Limited</h5>
                            <small class="aiub_slogan">24 Hours Service</small>
                        </blockquote>
                    </div>
                </div>
                <div class="row">
                    <div class="lockscreen-logo">
                        <b>Welcome</b>
                        </div>
                        <!-- User name -->
                        <div class="lockscreen-name">Username</div>
                        <?php  if( $error = $this->session->flashdata('errorMessage')): ?>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="alert alert-dismissible alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><?= $error ?></strong>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <!-- START LOCK SCREEN ITEM -->
                        <div class="lockscreen-item">
                        <!-- lockscreen image -->
                        <div class="lockscreen-image">
                          <img src="<?= base_url('Assets/Images/man.jpg') ?>" alt="User Image">
                        </div>
                        <!-- /.lockscreen-image -->
                        
                        <!-- lockscreen credentials (contains the form) -->
                        <form method="post" action="<?= base_url('Login/LockAccount')?>" class="lockscreen-credentials" name='LockForm' id='LockForm'>
                            <input type="hidden" name="username" id="username" value="raihan"></input>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control input-sm" placeholder="password">
                            
                                <div class="input-group-btn">
                                    <button type="button" name="go" id="go" class="btn btn-sm"><i class="fa fa-arrow-right "></i></button>
                                </div>
                            </div>
                        </form>
                        <!-- /.lockscreen credentials -->
                        <div style="background: #d2d6de;" class="text-center"><span class="validation text-danger"></span></div>
                      </div>
                      
                      <!-- /.lockscreen-item -->
                      <div class="help-block text-center">
                        Enter your password to retrieve your session
                      </div>
                      <div class="text-center">
                        <a href="<?= base_url('Login')?>">Or sign in as a different user</a>
                      </div>
                      <div class="lockscreen-footer text-center">
                        Copyright &copy; 2016 <b>Talukder, Md. Raihan</b><br>
                        All rights reserved
                      </div>
                </div>
            </div>
        </div>
        
        <script type="text/javascript" src="<?= base_url('Assets/js/jquery.min.js') ?>"></script>
        <!-- jQuery 2.0.2 -->
        <script type="text/javascript" src="<?= base_url('Assets/js/jquery.min.2.0.2.js') ?>"></script>

        <!-- Bootstrap -->
        <script type="text/javascript" src="<?= base_url('Assets/js/bootstrap.min.js') ?>"></script>
        
        <script type="text/javascript">var baseurl = "<?php print base_url(); ?>";</script>
        <script type="text/javascript" src="<?= base_url('Assets/ProjectJs/loginController.js') ?>"></script>
    </body>
</html>