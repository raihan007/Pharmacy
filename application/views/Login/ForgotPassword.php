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
                            <h5 class="_title">ABC Pharmacy Limited</h5>
                            <small class="_slogan">24 Hours Service</small>
                        </blockquote>
                    </div>
                </div>
                <div class="login_header">
                    <h4>Provide Your Email or Username</h4>
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
                    <?= form_open(base_url('Login/ResetPassword'),array('name' => 'ResetPasswordForm','id' => 'ResetPasswordForm')) ?>
                        <div class="form-group">
                            <label for="Username">User Name or Email</label>
                            <input type="text" value="<?= set_value('Username') ?>" class="form-control" id="Username" name="Username">
                            <span class="text-danger validation"><?= form_error('Username') ?></span>
                        </div>
                        <a href="<?= base_url('Login/Index') ?>" class="btn btn-success" id="back">Go Back</a>
                        <button type="button" class="btn btn-primary" id="forgot">Submit</button>
                    </form>
                    <br/>
                    <div class="text-danger">
                        <blockquote>
                            <small class="_slogan">If you forgot your username or email address also, then please contact with your supervisor.</small>
                        </blockquote>
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