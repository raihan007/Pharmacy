<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?= $title ?></title>
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="description" content="Developed By Talukder, Md. Raihan">
        <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
        <!-- toastr -->
        <?= link_tag('Assets/css/toastr.min.css') ?>
        <!-- bootstrap 3.0.2 -->
        <?= link_tag('Assets/css/bootstrap.min.css') ?>
        <!-- Kendo Material CSS -->
        <?= link_tag('Assets/Contents/css/Kendo/kendo.common-material.min.css') ?>
        <?= link_tag('Assets/Contents/css/Kendo/kendo.material.min.css') ?>
        <!-- //Kendo Material CSS -->
        <!-- font Awesome -->
        <?= link_tag('Assets/font-awesome-4.6.3/css/font-awesome.min.css') ?>
        <!-- Ionicons -->
        <?= link_tag('Assets/css/ionicons.min.css') ?>
        <?= link_tag('Assets/css/bootstrap-table.css') ?>
        <!-- google font -->
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <!-- Date Picker -->
        <?= link_tag('Assets/bootstrap_datepicker/bootstrap-datetimepicker.min.css') ?>
            
        <!-- Theme style -->
        
        <?= link_tag('Assets/css/style1.css') ?>
        <?= link_tag('Assets/css/style.css') ?>
    </head>
    <body class="skin-black">
        <header class="header">
            <a href="index.html" class="logo">
                ABC Parmacy Limited
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url('Assets/img/26115.jpg') ?>" class="img-circle" alt="User Image"/>
                                                </div>
                                                <h4>
                                                    Support Team
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                                <small class="pull-right"><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </a>
                                        </li><!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url('Assets/img/26115.jpg') ?>" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Director Design Team

                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                                <small class="pull-right"><i class="fa fa-clock-o"></i> 2 hours</small>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url('Assets/img/avatar.png') ?>" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Developers

                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                                <small class="pull-right"><i class="fa fa-clock-o"></i> Today</small>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url('Assets/img/26115.jpg') ?>" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Sales Department

                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                                <small class="pull-right"><i class="fa fa-clock-o"></i> Yesterday</small>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url('Assets/img/avatar.png') ?>" class="img-circle" alt="user image"/>
                                                </div>
                                                <h4>
                                                    Reviewers

                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                                <small class="pull-right"><i class="fa fa-clock-o"></i> 2 days</small>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-tasks"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress progress-striped xs">
                                                    <div class="progress-bar progress-bar-success" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Create a nice theme
                                                    <small class="pull-right">40%</small>
                                                </h3>
                                                <div class="progress progress-striped xs">
                                                    <div class="progress-bar progress-bar-danger" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Some task I need to do
                                                    <small class="pull-right">60%</small>
                                                </h3>
                                                <div class="progress progress-striped xs">
                                                    <div class="progress-bar progress-bar-info" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Make beautiful transitions
                                                    <small class="pull-right">80%</small>
                                                </h3>
                                                <div class="progress progress-striped xs">
                                                    <div class="progress-bar progress-bar-warning" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">80% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li><!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span> Raihan <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>
                                <li>
                                    <a href="#">
                                    <i class="fa fa-clock-o fa-fw pull-right"></i>
                                        <span class="badge badge-success pull-right">10</span> Updates</a>
                                    <a href="#">
                                    <i class="fa fa-envelope-o fa-fw pull-right"></i>
                                        <span class="badge badge-danger pull-right">5</span> Messages</a>
                                    <a href="#"><i class="fa fa-magnet fa-fw pull-right"></i>
                                        <span class="badge badge-info pull-right">3</span> Subscriptions</a>
                                    <a href="#"><i class="fa fa-question fa-fw pull-right"></i> <span class=
                                        "badge pull-right">11</span> FAQ</a>
                                </li>
                                <li class="divider"></li>
                                    <li>
                                        <a href="Users/Profile">
                                        <i class="fa fa-user fa-fw pull-right"></i>
                                            Profile
                                        </a>
                                        <a data-toggle="modal" href="#modal-user-settings">
                                        <i class="fa fa-cog fa-fw pull-right"></i>
                                            Account Settings
                                        </a>
                                        </li>

                                        <li class="divider"></li>
                                        <li>
                                            <a  href="<?= base_url('Login/Logout')?>"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                                        </li>
                                    </li>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="left-side sidebar-offcanvas">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?= base_url('Assets/img/26115.jpg') ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Welcome, Raihan</p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>

                    <ul class="nav sidebar-menu">
                        <li class="active">
                            <a href="<?= base_url('Admin') ?>"><i class="fa fa-dashboard">
                                </i> <span>Home</span>
                            </a>
                        </li>
                        <li class="treeview ">
                          <a href="#">
                            <i class="fa fa-edit"></i> <span>Users</span>
                            <i class="fa fa-angle-left pull-right"></i>
                          </a>
                          <ul class="treeview-menu menu-open" id="UsersMenu">
                            <li><a href="<?= base_url('Users/Permission') ?>"><i class="fa fa-bell"></i> User Permission</a></li>
                            <li class="LogActivity"><a href="<?= base_url('Users/LogActivity') ?>"><i class="fa fa-universal-access"></i> Login Activity</a></li>
                            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
                          </ul>
                        </li>
                        <li class="treeview Staff">
                          <a href="#">
                            <i class="fa fa-users"></i> <span>Staffs</span>
                            <i class="fa fa-angle-left pull-right"></i>
                          </a>
                          <ul class="treeview-menu">
                            <li><a href="<?= base_url('Employees/AllEmployees') ?>"><i class="fa fa-users"></i> All Staffs Info.</a></li>
                            <li><a href="<?= base_url('Employees/Create') ?>"><i class="fa fa-user"></i> Add Staff Info.</a></li>
                          </ul>
                        </li>
                        <li class="treeview Medicines">
                          <a href="#">
                            <i class="fa fa-medkit"></i> <span>Medicines</span>
                            <i class="fa fa-angle-left pull-right"></i>
                          </a>
                          <ul class="treeview-menu">
                            <li><a href="<?= base_url('Medicines/AllMedicines') ?>"><i class="fa fa-medkit"></i> All Medicines Info.</a></li>
                            <li><a href="<?= base_url('Medicines/Create') ?>"><i class="fa fa-medkit"></i> Add Medicine</a></li>
                          </ul>
                        </li>
                        <li class="treeview">
                          <a href="#">
                            <i class="fa fa-cogs"></i> <span>Settings</span>
                            <i class="fa fa-angle-left pull-right"></i>
                          </a>
                          <ul class="treeview-menu">
                            <li><a href="<?= base_url('Dealers') ?>"><i class="fa fa-medkit"></i> Dealers Info.</a></li>
                            <li><a href="<?= base_url('Common/Category') ?>"><i class="fa fa-medkit"></i> Categories</a></li>
                          </ul>
                        </li>
                        <li class="treeview">
                          <a href="#">
                            <i class="fa fa-users"></i> <span>Pages</span>
                            <i class="fa fa-angle-left pull-right"></i>
                          </a>
                          <ul class="treeview-menu">
                            <li><a href="<?= base_url('Login') ?>"><i class="fa fa-users"></i> Login</a></li>
                            <li><a href="<?= base_url('Login/LockAccount') ?>"><i class="fa fa-user"></i> Lock Account</a></li>
                          </ul>
                        </li>
                    </ul>
                </section><!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">

                <!-- Main content -->
                <section class="content">
                    
                