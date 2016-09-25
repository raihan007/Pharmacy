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
							<div class="col-xs-7">
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
													<button type="button" class="btn btn-sm btn-default" onclick="Refreash();" id="refresh" name="refresh" ><i class='fa fa-refresh' aria-hidden="true"> Refresh</i></button>
	                                            	<button style="margin-left: 5px" type="button" onclick="addNewBatch();" class="btn btn-sm btn-info" id="addProgram" name="addProgram" ><i class='fa fa-user' aria-hidden="true"> Add New Batch</i></button>
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
	                                                <th>ID</th>
	                                                <th>Title</th>
	                                                <th>Shift</th>
	                                                <th>Program Title</th>
	                                                <th>Action</th>
	                                            </tr>
	                                        </thead>
	                                        <tbody>
	                                          	<?php if(count($BatchesList)):
	                                          	$count = $this->uri->segment(3,0);
	                                          	foreach ($BatchesList as $row): ?>
	                                          	<tr>
	                                            	<td><?= ++$count ?></td>
	                                            	<td><?= $row['BatchId'] ?></td>
	                                            	<td><?= $row['BatchName'] ?></td>
	                                            	<td><?= $row['Shift'] ?></td>
	                                            	<td><?= $row['ProgramName'] ?></td>
	                                            	<td>
	                                            		<a href="#" data-toggle="tooltip" data-placement="bottom" data-original-title="Details" aria-hidden='true' class='detailBatch btn btn-xs btn-info detailBatchInfo'> <i class='fa fa-user'></i></a>
	                                            		<a href="#NewBatchForm" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit" aria-hidden='true' class='editBatch btn btn-xs btn-primary EditBatchInfo'> <i class='fa fa-pencil'></i></a>
	                                            		<a href="#" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete" aria-hidden='true' class='btn btn-xs btn-danger removeBatchInfo' onclick="deleteInfo(<?= $row['BatchId'] ?>)"> <i class='fa fa-times'></i></a>
	                                            	</td>
	                                          	</tr>
	                                          	<?php endforeach; ?>
	                                          	<?php else: ?>
	                                          	<tr>
	                                            	<td colspan="5"><h2>No Records Found.</h2></td>
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
							<div class="col-xs-5">
								<section class="panel">
		                            <header class="panel-heading">
		                                Batch informations
		                            </header>
		                            <div class="panel-body">
		                                <?php
										echo form_open_multipart(base_url('Batches/AddBatch'),array('name' => 'NewBatchForm','class' => ' NewBatchForm form-horizontal', 'id' => 'NewBatchForm'));
		                                      
			                                echo '<div class="form-group">';
			                                	echo form_label('Batch ID :', 'BatchId', array('class' =>'col-lg-4 col-sm-4 control-label'));
			                                	echo '<div class="col-lg-8">';
			                                		$data= array(
														'type' => 'text',
														'name' => 'BatchId',
														'id' => 'BatchId',
														'value' => set_value('BatchId'),
														'readonly' => 'readonly',
														'class' => 'form-control input-sm'
														);
													echo form_input($data);
			                                	echo '</div>';
			                                echo '</div>';

			                                echo '<div class="form-group">';
			                                	echo form_label('Batch Title :', 'BatchName', array('class' =>'col-lg-4 col-sm-4 control-label'));
			                                	echo '<div class="col-lg-8">';
			                                		$data= array(
														'type' => 'text',
														'name' => 'BatchName',
														'id' => 'BatchName',
														'value' => set_value('BatchName'),
														'placeholder' => 'Enter Batch Title',
														'class' => 'form-control input-sm'
														);
													echo form_input($data);
			                                	echo '</div>';
			                                	echo '<div class="errorBatchName text-danger col-lg-offset-4  col-lg-8">';
	                                    			echo form_error('BatchName');
	                                			echo '</div>';
			                                echo '</div>';

			                                $options = array(
			                                	'0' => '-- Select Batch Shift --',
										        'Morning' => 'Morning',
										        'Afternoon' => 'Afternoon',
										        'Evening' => 'Evening',
											);

			                                echo '<div class="form-group">';
			                                	echo form_label('Shift :', 'Shift', array('class' =>'col-lg-4 col-sm-4 control-label'));
			                                	echo '<div class="col-lg-8">';
			                                		echo form_dropdown('Shift', $options, set_value('Shift'),array('class'=>"form-control input-sm", 'name'=>"Shift", 'id'=>"Shift"));
			                                	echo '</div>';
			                                	echo '<div class="errorShift text-danger col-lg-offset-4  col-lg-8">';
	                                    			echo form_error('Shift');
	                                			echo '</div>';
			                                echo '</div>';

			                                echo '<div class="form-group">';
			                                	echo form_label('Program :', 'ProgramId', array('class' =>'col-lg-4 col-sm-4 control-label'));
			                                	echo '<div class="col-lg-8">';
			                                		echo form_dropdown('ProgramId', $Program, set_value('ProgramId'),array('class'=>"form-control input-sm", 'name'=>"ProgramId", 'id'=>"ProgramId"));
			                                	echo '</div>';
			                                	echo '<div class="errorProgramId text-danger col-lg-offset-4 col-lg-8">';
	                                    			echo form_error('ProgramId');
	                                			echo '</div>';
			                                echo '</div>';

			                                echo '<div class="form-group">';
			                                    echo '<div class="col-lg-offset-4 col-lg-8">';
			                                    	
			                                    	$reset = array(
														'type'		=> 'button',
														'name'		=> 'reset',
														'value' 	=> 'Reset',
														'class' 	=> 'btn btn-danger btn-sm',
														'onclick'	=> "addNewBatch();"
													);
													echo form_input($reset);

			                                        echo "&nbsp;";
			                                        $data = array(
														'type' => 'button',
														'name' => 'Save',
														'id' => 'Save',
														'value' => 'Save',
														'class' => 'btn btn-info btn-sm'
													);
													echo form_submit($data);
			                                    echo '</div>';
			                                echo '</div>';
			                            
										echo form_close();?>
										<div class="form-group">
		                            </div>
		                        </section>
							</div>
						</div>
					</div>
					<!--post modal-->
                    <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                Confirm Please
                          </div>
                          <div class="modal-body">
                          	<div class="">
                          		<p class="text-danger"><strong>Are you sure you want to delete this item?</strong></p>
                          	</div>
                          	<div class="">
                          		<form name="BatchForm" class="form-horizontal" id="BatchForm" method="post" accept-charset="utf-8">
									<input type="submit" name="confirm" value="Confirm" class="btn btn-danger btn-sm">
									<input type="button" name="Cancle" value="Cancle" data-dismiss="modal" aria-hidden="true" class="btn btn-info btn-sm">
								</form>
                          	</div>
                          </div>
                      </div>
                      </div>
                    </div>

                    <!--post modal-->
                    <div id="detailsModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                Details of Batch Informations
                          </div>
                          <div class="modal-body">
                          	<div class="">
		                        <dl class="dl-horizontal">
			                        <dt>
									    <label class="control-label">Batch Id :</label>
									</dt>
									<dd>
									    <label class="detailPId control-label"></label>
									</dd>
									<dt>
									    <label class="control-label">Batch Name :</label>
									</dt>
									<dd>
									    <label class="detailPName control-label"></label>
									</dd>
									<dt>
									    <label class="control-label">Shift :</label>
									</dt>
									<dd>
									    <label class="detailSupervisor control-label"></label>
									</dd>
									<dt>
									    <label class="control-label">Program :</label>
									</dt>
									<dd>
									    <label class="detailOdate control-label"></label>
									</dd>
									<!-- 
									<input type="button" name="Cancle" value="Cancle" data-dismiss="modal" aria-hidden="true" class="btn btn-info btn-sm"></input>   --> 
			                    </dl>
		                    </div>
                          </div>
                      </div>
                      </div>
                    </div>
<?php
require_once(APPPATH."views/Shared/_layoutFooter.php");
?>
    <script type="text/javascript" src="<?= base_url('Assets/ProjectJs/batchWork.js') ?>"></script>
	</body>
</html>