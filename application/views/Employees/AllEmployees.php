<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
require_once(APPPATH."views/Shared/_layoutHeader.php");
?>
                    <div class="row" style="margin-bottom:5px;">


                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-red"><i class="fa fa-users"></i></span>
                                <div class="sm-st-info">
                                    <span><?= $totalEmployees ?></span>
                                    <strong>Total Employees</strong> 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-violet"><i class="fa fa-envelope-o"></i></span>
                                <div class="sm-st-info">
                                    <span>2200</span>
                                    Total Messages
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-blue"><i class="fa fa-dollar"></i></span>
                                <div class="sm-st-info">
                                    <span>100,320</span>
                                    Total Profit
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-green"><i class="fa fa-paperclip"></i></span>
                                <div class="sm-st-info">
                                    <span>4567</span>
                                    Total Documents
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    Employees Informations Desk

                                </header>
                                <div class="panel-body table-responsive">
                                    <?php  if( $success = $this->session->flashdata('success')): ?>
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="alert alert-dismissible alert-info">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <strong><?= $success ?></strong>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <?php  if( $error = $this->session->flashdata('error')): ?>
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="alert alert-dismissible alert-warning">
                                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                <strong><?= $error ?></strong>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="box-tools m-b-15">
                                        <div class="input-group">
                                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-tools m-b-15">
                                        <?= anchor(base_url('Employees/Create'),"<i class='fa fa-user'></i> Add New Employee",array('class'=>"btn btn-sm btn-info")) ?>
                                    </div>
                                    <table class="table table-responsive table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Entity No</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Photo</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>National Id No</th>
                                                <th>Join Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php if(count($EmployeesList)):
                                          $count = $this->uri->segment(3,0);
                                          foreach ($EmployeesList as $row): ?>
                                          <tr>
                                            <td><?= ++$count ?></td>
                                            <td><?= $row['EntityNo'] ?></td>
                                            <td><?= $row['FullName'] ?></td>
                                            <td><?= $row['Gender'] ?></td>
                                            <td><img class='img-responsive img-thumbnail' style='height: 150px; width: 150px;' src="<?php echo base_url('uploads/'.$row['Photo']); ?>" />
                                            </td>
                                            <td><?= $row['PhoneNo'] ?></td>
                                            <td><?= $row['Email'] ?></td>
                                            <td><?= $row['NationalIdNo'] ?></td>
                                            <td><?= $row['JoinDate'] ?></td>
                                            <td>
                                            <?= anchor(base_url('Employees/Details/'.$row['EntityNo']),"<i class='fa fa-user'></i>",array('class'=>"btn btn-xs btn-primary",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'data-original-title'=>"Details")) ?>
                                            <?= anchor(base_url('Employees/Edit/'.$row['EntityNo']),"<i class='fa fa-pencil'></i>",array('class'=>"btn btn-xs btn-primary",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'data-original-title'=>"Edit")) ?>
                                            <?= anchor(base_url('Employees/Delete/'.$row['EntityNo']),"<i class='fa fa-times'></i>",array('class'=>"btn btn-xs btn-danger",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'data-original-title'=>"Delete")) ?>
                                            </td>
                                          </tr>
                                          <?php endforeach; ?>
                                          <?php else: ?>
                                          <tr>
                                            <td colspan="6"><h2>No Records Found.</h2></td>
                                          </tr>
                                          <?php endif; ?>
                                        </tbody>
                                    </table>
                                    <div class="table-foot">
                                        </br>
                                        <?= $this->pagination->create_links() ?>
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
<?php
require_once(APPPATH."views/Shared/_layoutFooter.php");
?>
    </body>
</html>