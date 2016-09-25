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
            <div class="col-sm-12 login_panel">
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
                <div class="login_header">
                    <h4>Provide New Password Here !</h4>
                </div>
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
                    <?= form_open(base_url('Login/NewPassword/'.$UserId),array('name' => 'NewPasswordForm','id' => 'NewPasswordForm')) ?>
                        <input type="hidden" name="<?= $UserId ?>" value="<?= $UserId ?>">
                        <div class="form-group">
                            <label for="Password">New Password</label>
                            <input type="password" class="form-control" id="Password" name="Password" value="<?= set_value('Password') ?>">
                            <span class="text-danger validation"><?= form_error('Password') ?></span>
                        </div>
                        <div class="form-group">
                            <label for="ConfirmPassword">Confirm Password</label>
                            <input type="password" class="form-control" id="ConfirmPassword" name="ConfirmPassword" >
                            <span class="text-danger validation"><?= form_error('ConfirmPassword') ?></span>
                        </div>
                        <a href="<?= base_url('Login/Index') ?>" class="btn btn-success" id="back">Go Back</a>
                        <button type="submit" class="btn btn-primary" id="login">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?= base_url('Assets/js/jquery.min.js') ?>"></script>
        <!-- jQuery 2.0.2 -->
        <script type="text/javascript" src="<?= base_url('Assets/js/jquery.min.2.0.2.js') ?>"></script>

        <!-- Bootstrap -->
        <script type="text/javascript" src="<?= base_url('Assets/js/bootstrap.min.js') ?>"></script>
    </body>
</html>