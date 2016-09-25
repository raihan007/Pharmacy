<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
include_once("Shared/_layoutHeader.php")
?>
					<div class="row">
						<div class="col-md-12">
							<section class="panel">
	                            <header class="panel-heading">
	                                Add a new emlpoyee informations
	                            </header>
	                            <div class="panel-body">
	                                <?php
									echo form_open_multipart(base_url('Admin/addDepartment'),array('name' => 'NewEmployeeForm','class' => 'form-horizontal', 'id' => 'NewEmployeeForm'));
	                                      
		                                echo '<div class="form-group">';
		                                	echo form_label('Entity No :', 'EntityNo', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'name' => 'EntityNo',
													'readonly' => 'readonly',
													'class' => 'form-control input-sm'
													);
												echo form_input($data);
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('PhoneNo');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('First Name :', 'FirstName', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'name' => 'FirstName',
													'placeholder' => 'Enter Your First Name',
													'class' => 'form-control input-sm'
													);
												echo form_input($data);
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('PhoneNo');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Last Name :', 'LastName', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'name' => 'LastName',
													'placeholder' => 'Enter Your Last Name',
													'class' => 'form-control input-sm'
													);
												echo form_input($data);
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('PhoneNo');
                                			echo '</div>';
		                                echo '</div>';

		                                $options = array(
										        'Male' => 'Male',
										        'Female' => 'Female',
											);

		                                echo '<div class="form-group">';
		                                	echo form_label('Gender :', 'Gender', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		echo form_dropdown('Gender', $options, 'Male','class="form-control input-sm id="Gender"');
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('PhoneNo');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Email :', 'Email', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'email',
													'name' => 'Email',
													'placeholder' => 'Enter Your Email',
													'class' => 'form-control input-sm'
													);
												echo form_input($data);
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('PhoneNo');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Permanent Address :', 'PermanentAddress', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'name' => 'PermanentAddress',
													'placeholder' => 'Enter Your Permanent Address',
													'class' => 'form-control input-sm',
													'rows' => 4
													);
												echo form_textarea($data);
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('PhoneNo');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Present Address :', 'PresentAddress', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'name' => 'PresentAddress',
													'placeholder' => 'Enter Your Present Address',
													'class' => 'form-control input-sm',
													'rows' => 4
													);
												echo form_textarea($data);
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('PhoneNo');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Phone No :', 'PhoneNo', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'name' => 'PhoneNo',
													'placeholder' => 'Enter Your Phone No',
													'class' => 'form-control input-sm'
													);
												echo form_input($data);
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('PhoneNo');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Date of Birth :', 'Birthdate', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'name' => 'Birthdate',
													'placeholder' => 'Enter Your Date of Birth',
													'class' => 'datepicker form-control input-sm'
													);
		                                		echo '<div class="input-group">';
		                                			echo form_input($data);
		                                			echo '<div class="input-group-addon input-sm">';
		                                				echo '<i class="fa fa-calendar"></i>';
		                                			echo '</div>';
												echo '</div>';
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('PhoneNo');
                                			echo '</div>';
		                                echo '</div>';

		                                $bloodGroups = array(
										        'A+' => 'A+',
										        'A-' => 'A-',
										        'B+' => 'B+',
										        'B-' => 'B-',
										        'AB+' => 'AB+',
										        'AB-' => 'AB-',
										        'O+' => 'O+',
										        'O-' => 'O-',
											);

		                                echo '<div class="form-group">';
		                                	echo form_label('Blood Group :', 'BloodGroup', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		echo form_dropdown('BloodGroup', $bloodGroups, 'A+','class="form-control input-sm id="BloodGroup"');
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('PhoneNo');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Photo :', 'Photo', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'file',
													'name' => 'Photo',
													'class' => 'form-control input-sm'
													);
												echo form_input($data);
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('PhoneNo');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('National ID No :', 'NationalIdNo', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'name' => 'NationalIdNo',
													'placeholder' => 'Enter Your National Id No',
													'class' => 'form-control input-sm'
													);
												echo form_input($data);
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('PhoneNo');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                    echo '<div class="col-lg-offset-2 col-lg-10">';
		                                        $data = array(
													'type' => 'submit',
													'name'=> 'submit',
													'value'=> 'Submit',
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
include_once("Shared/_layoutFooter.php");
?>