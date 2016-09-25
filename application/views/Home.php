<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ABC Pharmacy</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="description" content="Developed By M Abdur Rokib Promy">
        <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
        <!-- bootstrap 3.0.2 -->
        <?= link_tag('Assets/css/bootstrap.min.css') ?>
        <!-- font Awesome -->
        <?= link_tag('Assets/css/font-awesome.min.css') ?>
        <!-- Ionicons -->
        <?= link_tag('Assets/css/ionicons.min.css') ?>
        <!-- google font -->
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <!-- Theme style -->
        <?= link_tag('Assets/css/style.css') ?>

    </head>
    <body class="container">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="Home.html">ABC Pharmacy</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                <li><a href="#">About</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top:-21px;">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="Assets/Images/3.jpg" />
                </div>

                <div class="item">
                    <img src="Assets/Images/2.jpg" />
                </div>

                <div class="item">
                    <img width="100%" src="Assets/Images/5.jpg" />
                </div>

                <div class="item">
                    <img src="Assets/Images/1.jpg" />
                </div>
                
                <div class="item">
                    <img src="Assets/Images/4.jpg" />
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="footer-main">
            &copy; Md. Raihan Talukder - 2016
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Login Here!</h4>
              </div>
              <div class="modal-body">
                <?php
                $attributes = array('class' => 'form-horizontal','name' => 'loginForm', 'id' => 'loginForm');
                echo form_open('login/user_login',$attributes); 
            ?>
                <fieldset>
                    <legend style="font-size: 25px;">Login Here</legend>
                    <?php  if( $error = $this->session->flashdata('login_faild')): ?>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="alert alert-dismissible alert-danger">
                              <strong><?= $error ?></strong>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputEmail" class="col-md-3 control-label">User Name</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span style="font-size: 20px;" class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                        <?php 
                                            $uname = array('name'=>'username','id'=>'username','class'=>'form-control','placeholder'=>'Username or Email','value'=>set_value('username'));
                                            echo form_input($uname); 
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-md-push-3">
                                    <?php echo form_error('username'); ?>
                                </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputEmail" class="col-md-3 control-label">Password</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span style="font-size: 20px;" class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                                        <?php 
                                            $upass = array('name'=>'password','id'=>'password','class'=>'form-control','placeholder'=>'Password');
                                            echo form_password($upass); 
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9 col-md-push-3">
                            <?php echo form_error('password'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10">    
                            <div class="form-group">
                                <div class="col-md-6 col-md-push-6">
                                    <?php
                                        echo anchor('Login','BACK <span class="glyphicon glyphicon-home"></span>',array('data-dismiss'=>'modal','class'=>'btn btn-default btn-sm back'));
                                        echo nbs(3); 
                                        $login = array('name'=>'login','id'=>'login','class'=>'btn btn-primary btn-sm','value'=>'LOGIN');
                                        echo form_submit($login); 
                                    ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
              </div>
            </div>
          </div>
        </div>

		<script type="text/javascript" src="<?= base_url('Assets/js/jquery.min.js') ?>"></script>
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

        <!-- Bootstrap -->
        <script type="text/javascript" src="<?= base_url('Assets/js/bootstrap.min.js') ?>"></script>
        <!-- Director App -->
        <script type="text/javascript" src="<?= base_url('Assets/js/Director/app.js') ?>"></script>
    </body>
</html>