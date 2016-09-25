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
	                                    Programs Informations Desk
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
	                                            	<button style="margin-left: 5px" type="button" onclick="addNewProgram();" class="btn btn-sm btn-info" id="addProgram" name="addProgram" ><i class='fa fa-user' aria-hidden="true"> Add New Program</i></button>
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
	                                                <th>Supervisor</th>
	                                                <th>Open Date</th>
	                                                <th>End Date</th>
	                                                <th>Year</th>
	                                                <th>Action</th>
	                                            </tr>
	                                        </thead>
	                                        <tbody>
	                                          	<?php if(count($programsList)):
	                                          	$count = $this->uri->segment(3,0);
	                                          	foreach ($programsList as $row): ?>
	                                          	<tr>
	                                            	<td><?= ++$count ?></td>
	                                            	<td><?= $row['ProgramId'] ?></td>
	                                            	<td><?= $row['ProgramName'] ?></td>
	                                            	<td><?= $row['Supervisor'] ?></td>
	                                            	<td><?= $row['OpenDate'] ?></td>
	                                            	<td><?= $row['EndDate'] ?></td>
	                                            	<td><?= $row['Year'] ?></td>
	                                            	<td>
	                                            		<a href="#" data-toggle="tooltip" data-placement="bottom" data-original-title="Details" aria-hidden='true' class='detailsProgram btn btn-xs btn-info detailsProgramInfo'> <i class='fa fa-user'></i></a>
	                                            		<a href="#NewProgramForm" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit" aria-hidden='true' class='editProgram btn btn-xs btn-primary EditProgramInfo'> <i class='fa fa-pencil'></i></a>
	                                            		<a href="#" data-toggle="tooltip" data-placement="bottom" data-original-title="Delete" aria-hidden='true' class='btn btn-xs btn-danger removeProgramInfo' onclick="deleteInfo(<?= $row['ProgramId'] ?>)"> <i class='fa fa-times'></i></a>
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
		                                Program informations
		                            </header>
		                            <div class="panel-body">
		                                <?php
										echo form_open_multipart(base_url('Programs/AddProgram'),array('name' => 'NewProgramForm','class' => ' NewProgramForm form-horizontal', 'id' => 'NewProgramForm'));
		                                      
			                                echo '<div class="form-group">';
			                                	echo form_label('Program ID :', 'ProgramId', array('class' =>'col-lg-4 col-sm-4 control-label'));
			                                	echo '<div class="col-lg-8">';
			                                		$data= array(
														'type' => 'text',
														'name' => 'ProgramId',
														'id' => 'ProgramId',
														'value' => set_value('ProgramId'),
														'readonly' => 'readonly',
														'class' => 'form-control input-sm'
														);
													echo form_input($data);
			                                	echo '</div>';
			                                echo '</div>';

			                                echo '<div class="form-group">';
			                                	echo form_label('Program Name :', 'ProgramName', array('class' =>'col-lg-4 col-sm-4 control-label'));
			                                	echo '<div class="col-lg-8">';
			                                		$data= array(
														'type' => 'text',
														'name' => 'ProgramName',
														'id' => 'ProgramName',
														'value' => set_value('ProgramName'),
														'placeholder' => 'Enter Program Name',
														'class' => 'form-control input-sm'
														);
													echo form_input($data);
			                                	echo '</div>';
			                                	echo '<div class="errorProgramName text-danger col-lg-offset-4  col-lg-8">';
	                                    			echo form_error('ProgramName');
	                                			echo '</div>';
			                                echo '</div>';

			                                echo '<div class="form-group">';
			                                	echo form_label('Supervisor :', 'Supervisor', array('class' =>'col-lg-4 col-sm-4 control-label'));
			                                	echo '<div class="col-lg-8">';
			                                		echo form_dropdown('Supervisor', $batch, set_value('Supervisor'),array('class'=>"form-control input-sm", 'name'=>"Supervisor", 'id'=>"Supervisor"));
			                                	echo '</div>';
			                                	echo '<div class="errorSupervisor text-danger col-lg-offset-4 col-lg-8">';
	                                    			echo form_error('Supervisor');
	                                			echo '</div>';
			                                echo '</div>';

			                                echo '<div class="form-group">';
			                                	echo form_label('Opening Date :', 'OpenDate', array('class' =>'col-lg-4 col-sm-4 control-label'));
			                                	echo '<div class="col-lg-8">';
			                                		$data= array(
														'type' => 'text',
														'value' => set_value('OpenDate'),
														'name' => 'OpenDate',
														'id' => 'OpenDate',
														'placeholder' => 'Enter Program Open Date',
														'class' => 'OpenDate form-control input-sm'
														);
			                                		echo '<div class="input-group">';
			                                			echo form_input($data);
			                                			echo '<div class="input-group-addon input-sm">';
			                                				echo '<i class="fa fa-calendar"></i>';
			                                			echo '</div>';
													echo '</div>';
			                                	echo '</div>';
			                                	echo '<div class="errorOpenDate text-danger col-lg-offset-4 col-lg-8">';
	                                    			echo form_error('OpenDate');
	                                			echo '</div>';
			                                echo '</div>';

			                                echo '<div class="form-group">';
			                                	echo form_label('Ending Date :', 'EndDate', array('class' =>' col-lg-4 col-sm-4 control-label'));
			                                	echo '<div class="col-lg-8">';
			                                		$data= array(
														'type' => 'text',
														'value' => set_value('EndDate'),
														'name' => 'EndDate',
														'id' => 'EndDate',
														'placeholder' => 'Enter Program End Date',
														'class' => 'EndDate form-control input-sm'
														);
			                                		echo '<div class="input-group">';
			                                			echo form_input($data);
			                                			echo '<div class="input-group-addon input-sm">';
			                                				echo '<i class="fa fa-calendar"></i>';
			                                			echo '</div>';
													echo '</div>';
			                                	echo '</div>';
			                                	echo '<div class="errorEndDate text-danger col-lg-offset-4 col-lg-8">';
	                                    			echo form_error('EndDate');
	                                			echo '</div>';
			                                echo '</div>';

			                                echo '<div class="form-group">';
			                                	echo form_label('Year :', 'Year', array('class' =>' col-lg-4 col-sm-4 control-label'));
			                                	echo '<div class="col-lg-8">';
			                                		$data= array(
														'type' => 'text',
														'value' => set_value('Year'),
														'name' => 'Year',
														'id' => 'Year',
														'placeholder' => 'Enter Program Year',
														'class' => 'yearPicker form-control input-sm'
														);
			                                		echo '<div class="input-group">';
			                                			echo form_input($data);
			                                			echo '<div class="input-group-addon input-sm">';
			                                				echo '<i class="fa fa-calendar"></i>';
			                                			echo '</div>';
													echo '</div>';
			                                	echo '</div>';
			                                	echo '<div class="errorYear text-danger col-lg-offset-4 col-lg-8">';
	                                    			echo form_error('Year');
	                                			echo '</div>';
			                                echo '</div>';
			                                

			                                echo '<div class="form-group">';
			                                    echo '<div class="col-lg-offset-4 col-lg-8">';
			                                    	
			                                    	$reset = array(
														'type'		=> 'button',
														'name'		=> 'reset',
														'value' 	=> 'Reset',
														'class' 	=> 'btn btn-danger btn-sm',
														'onclick'	=> "addNewProgram();"
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
                          		<form name="ProgramsForm" class="form-horizontal" id="ProgramsForm" method="post" accept-charset="utf-8">
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
                                Details of Program Informations
                          </div>
                          <div class="modal-body">
                          	<div class="">
		                        <dl class="dl-horizontal">
			                        <dt>
									    <label class="control-label">Program Id :</label>
									</dt>
									<dd>
									    <label class="detailPId control-label"></label>
									</dd>
									<dt>
									    <label class="control-label">Program Name :</label>
									</dt>
									<dd>
									    <label class="detailPName control-label"></label>
									</dd>
									<dt>
									    <label class="control-label">Supervisor :</label>
									</dt>
									<dd>
									    <label class="detailSupervisor control-label"></label>
									</dd>
									<dt>
									    <label class="control-label">Opening Date :</label>
									</dt>
									<dd>
									    <label class="detailOdate control-label"></label>
									</dd>
									<dt>
									    <label class="control-label">Ending Date :</label>
									</dt>
									<dd>
									    <label class="detailEDate control-label"></label>
									</dd>
									<dt>
									    <label class="control-label">Year :</label>
									</dt>
									<dd>
									    <label class="detailYear control-label"></label>
									</dd> <!-- 
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
		<script type="text/javascript">
            $(function () {
                $('.yearPicker').datetimepicker({
                    format: 'YYYY'
                });
            });
        </script>
        <script type="text/javascript" src="<?= base_url('Assets/ProjectJs/programWork.js') ?>"></script>
	</body>
</html>