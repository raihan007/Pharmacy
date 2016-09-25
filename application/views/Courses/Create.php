<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
require_once(APPPATH."views/Shared/_layoutHeader.php");
?>
					<div class="row">
						<div class="col-md-12">
							<section class="panel">
	                            <header class="panel-heading">
	                                Add a new Course informations
	                            </header>
	                            <div class="panel-body">
		                            <!-- <div class="alert alert-dismissible alert-info">
									  <button type="button" class="close" data-dismiss="alert">&times;</button>
									  
									</div> -->
	                                <?php
									echo form_open_multipart(base_url('Courses/Create'),array('name' => 'NewCoursForm','class' => 'NewCoursForm form-horizontal', 'id' => 'NewCoursForm'));
	                                      
		                                echo '<div class="form-group">';
		                                	echo form_label('Course ID :', 'CourseId', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'name' => 'CourseId',
													'value' => set_value('CourseId'),
													'readonly' => 'readonly',
													'class' => 'form-control input-sm'
													);
												echo form_input($data);
		                                	echo '</div>';
		                                	//echo '<div class="col-lg-5">';
                                    			//echo form_error('PhoneNo');
                                			//echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Course Title :', 'CourseName', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'name' => 'CourseName',
													'value' => set_value('CourseName'),
													'placeholder' => 'Enter Course Name',
													'class' => 'form-control input-sm'
													);
												echo form_input($data);
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('FirstName');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Course Instructor :', 'CourseInstructor', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		echo form_dropdown('CourseInstructor', $Program, set_value('CourseInstructor'),array('class'=>"form-control input-sm", 'name'=>"CourseInstructor", 'id'=>"CourseInstructor"));
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('CourseInstructor');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Program :', 'ProgramId', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		echo form_dropdown('ProgramId[]', $Program, set_value('ProgramId'),array('class'=>"form-control input-sm", 'name'=>"ProgramId", 'id'=>"ProgramId",'multiple'=>'multiple'));
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('ProgramId');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Lecture Start Time :', 'StartTime', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
														'type' => 'text',
														'value' => set_value('StartTime'),
														'name' => 'StartTime',
														'id' => 'StartTime',
														'placeholder' => 'Enter Lecture Starting Time',
														'class' => 'StartTime form-control input-sm'
														);
			                                		echo '<div class="input-group">';
			                                			echo form_input($data);
			                                			echo '<div class="input-group-addon input-sm">';
			                                				echo '<i class="fa fa-calendar"></i>';
			                                			echo '</div>';
													echo '</div>';
		                                	echo '</div>';
		                                	echo '<div class="text-danger StartTimeError col-lg-5">';
                                    			echo form_error('StartTime');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Lecture End Time :', 'EndTime', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
														'type' => 'text',
														'value' => set_value('EndTime'),
														'name' => 'EndTime',
														'id' => 'EndTime',
														'placeholder' => 'Enter Lecture Ending Time',
														'class' => 'EndTime form-control input-sm'
														);
			                                		echo '<div class="input-group">';
			                                			echo form_input($data);
			                                			echo '<div class="input-group-addon input-sm">';
			                                				echo '<i class="fa fa-calendar"></i>';
			                                			echo '</div>';
													echo '</div>';
		                                	echo '</div>';
		                                	echo '<div class="text-danger EndTimeError col-lg-5">';
                                    			echo form_error('EndTime');
                                			echo '</div>';
		                                echo '</div>';

		                                $LectureDays = array(
										    'Sat' => 'Male',
										    'Female' => 'Female',
										);

										$days = array(
										  	'Sunday' => 'Sunday',
										  	'Monday' => 'Monday',
										  	'Tuesday' => 'Tuesday',
										  	'Wednesday' => 'Wednesday',
										  	'Thursday' => 'Thursday',
										  	'Friday' => 'Friday',
										  	'Saturday' => 'Saturday',
										);

		                                echo '<div class="form-group">';
		                                	echo form_label('Lecture Days :', 'LectureDays', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		echo form_dropdown('LectureDays[]', $days, set_value('LectureDays'),array('class'=>"form-control input-sm", 'name'=>"LectureDays", 'id'=>"LectureDays",'multiple'=>'multiple'));
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('LectureDays');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                    echo '<div class="col-lg-offset-2 col-lg-10">';
		                                    	echo anchor(base_url('Admin/Employees'),"<i class='fa fa-arrow-left'> Back</i>",array('class'=>"btn btn-sm btn-success"));
		                                        echo "&nbsp;";
		                                        $reset = array(
														'type'		=> 'reset',
														'name'		=> 'reset',
														'value' 	=> 'Reset',
														'class' 	=> 'btn btn-danger btn-sm',
														'onclick'	=> "ResetForm();"
												);
												echo form_input($reset);
												echo "&nbsp;";
		                                        $data = array(
													'type' => 'submit',
													'name'=> 'submit',
													'value'=> 'Save',
													'class'=> 'btn btn-info btn-sm'
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

<?php
require_once(APPPATH."views/Shared/_layoutFooter.php");
?>
	<script type="text/javascript" src="<?= base_url('Assets/js/jquery.multiselect.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('Assets/ProjectJs/courseWork.js') ?>"></script>
	</body>
</html>
