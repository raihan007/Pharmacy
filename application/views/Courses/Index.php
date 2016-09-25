<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
require_once(APPPATH."views/Shared/_layoutHeader.php");
?>
					<div class="row" style="margin-bottom:5px;">
                        <div class="col-xs-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-red"><i class="fa fa-list-alt"></i></span>
                                <div class="sm-st-info">
                                    <span><?= $totalEmp=20; ?></span>
                                    <strong>Total Programs</strong> 
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-violet"><i class="fa fa-envelope-o"></i></span>
                                <div class="sm-st-info">
                                    <span><?= $totalEmp=20; ?></span>
                                    <strong>Total Batches</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-blue"><i class="fa fa-dollar"></i></span>
                                <div class="sm-st-info">
                                    <span><?= $totalEmp=20; ?></span>
                                    <strong>Total Students</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-green"><i class="fa fa-users"></i></span>
                                <div class="sm-st-info">
                                    <span><?= $totalEmp=20; ?></span>
                                    <strong>Total Faculties</strong>
                                </div>
                            </div>
                        </div>
                    </div>

					<div class="row">
						<div class="col-xs-12">
							<div class="panel">
	                                <header class="panel-heading">
	                                    Batches Informations Desk
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
	                                            <div class="input-group-btn">
													<button style="margin-right: 5px;" type="button" class="btn btn-sm btn-default" onclick="Refreash();" id="refresh" name="refresh" ><i class='fa fa-refresh' aria-hidden="true"> Refresh</i></button>
	                                            	<?= anchor(base_url('Courses/Create'),"<i class='fa fa-user'></i> Add New Course",array('class'=>"btn btn-sm btn-info")) ?>
													<div class="input-group pull-right">
													    <input type="text" name="table_search" class="form-control input-sm" style="width: 150px;" placeholder="Search"/>
													    <span class="input-group-btn">
													      	<button class="btn btn-sm btn-default" type="button"><i class="fa fa-search"></i></button>
													    </span>
													</div>
												</div>
	                                        </div>
	                                    </div>
	                                    <table class="table table-hover">
	                                        <thead>
	                                            <tr>
	                                                <th>#</th>
	                                                <th>Course ID</th>
	                                                <th>Course Name</th>
	                                                <th>Course Instructor</th>
	                                                <th>Program</th>
	                                                <th>Time</th>
	                                                <th></th>
	                                            </tr>
	                                        </thead>
	                                        <tbody>
	                                          	<?php if(count($CoursesList)):
	                                          	$count = $this->uri->segment(3,0);
	                                          	foreach ($CoursesList as $row): ?>
	                                          	<tr>
	                                            	<td><?= ++$count ?></td>
	                                            	<td><?= $row['CourseId'] ?></td>
	                                            	<td><?= $row['CourseName'] ?></td>
	                                            	<td><?= $row['CourseInstructor'] ?></td>
	                                            	<td><?= $row['ProgramId'] ?></td>
	                                            	<td><?= $row['TimeId'] ?></td>
	                                            	<td>
			                                            <?= anchor(base_url('Courses/Details/'.$row['CourseId']),"<i class='fa fa-user'></i>",array('class'=>"btn btn-xs btn-primary",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'data-original-title'=>"Details")) ?>
			                                            <?= anchor(base_url('Courses/Update/'.$row['CourseId']),"<i class='fa fa-pencil'></i>",array('class'=>"btn btn-xs btn-primary",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'data-original-title'=>"Edit")) ?>
			                                            <?= anchor(base_url('Courses/Delete/'.$row['CourseId']),"<i class='fa fa-times'></i>",array('class'=>"btn btn-xs btn-danger",'data-toggle'=>"tooltip",'data-placement'=>"bottom",'data-original-title'=>"Delete")) ?>
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
    <script type="text/javascript" src="<?= base_url('Assets/ProjectJs/courseWork.js') ?>"></script>
	</body>
</html>