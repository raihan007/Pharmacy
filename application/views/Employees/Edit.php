<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
require_once(APPPATH."views/Shared/_layoutHeader.php")
?>
					<div class="row">
						<div class="col-md-12">
							<section class="panel">
	                            <header class="panel-heading">
	                                Update emlpoyee informations
	                            </header>
	                            <div class="panel-body">
		                            <!-- <div class="alert alert-dismissible alert-info">
									  <button type="button" class="close" data-dismiss="alert">&times;</button>
									  
									</div> -->
	                                <?php
									echo form_open_multipart(base_url('Admin/EditEmployee'),array('name' => 'NewEmployeeForm','class' => 'form-horizontal', 'id' => 'NewEmployeeForm'));
	                                      
		                                echo '<div class="form-group">';
		                                	echo form_label('Entity No :', 'EntityNo', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'name' => 'EntityNo',
													'value' => set_value('EntityNo',$employee->EntityNo),
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
		                                	echo form_label('First Name :', 'FirstName', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'name' => 'FirstName',
													'value' => set_value('FirstName',$employee->FirstName),
													'placeholder' => 'Enter Your First Name',
													'class' => 'form-control input-sm'
													);
												echo form_input($data);
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('FirstName');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Last Name :', 'LastName', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'name' => 'LastName',
													'value' => set_value('LastName',$employee->LastName),
													'placeholder' => 'Enter Your Last Name',
													'class' => 'form-control input-sm'
													);
												echo form_input($data);
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('LastName');
                                			echo '</div>';
		                                echo '</div>';

		                                $options = array(
										        'Male' => 'Male',
										        'Female' => 'Female',
											);

		                                echo '<div class="form-group">';
		                                	echo form_label('Gender :', 'Gender', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		echo form_dropdown('Gender', $options, $employee->Gender,'class="form-control input-sm id="Gender"');
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('Gender');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Email :', 'Email', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'email',
													'name' => 'Email',
													'value' => set_value('Email',$employee->Email),
													'id' => 'Email',
													'placeholder' => 'Enter Your Email',
													'class' => 'form-control input-sm'
													);
												echo form_input($data);
		                                	echo '</div>';
		                                	echo '<div class="text-danger emailError col-lg-5">';
                                    			echo form_error('Email');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Permanent Address :', 'PermanentAddress', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'name' => 'PermanentAddress',
													'value' => set_value('PermanentAddress',$employee->PermanentAddress),
													'placeholder' => 'Enter Your Permanent Address',
													'class' => 'form-control input-sm',
													'rows' => 4
													);
												echo form_textarea($data);
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('PermanentAddress');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Present Address :', 'PresentAddress', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'name' => 'PresentAddress',
													'value' => set_value('PresentAddress',$employee->PresentAddress),
													'placeholder' => 'Enter Your Present Address',
													'class' => 'form-control input-sm',
													'rows' => 4
													);
												echo form_textarea($data);
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('PresentAddress');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Phone No :', 'PhoneNo', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'name' => 'PhoneNo',
													'value' => set_value('PhoneNo',$employee->PhoneNo),
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
													'value' => set_value('Birthdate',$employee->Birthdate),
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
                                    			echo form_error('Birthdate');
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
		                                		echo form_dropdown('BloodGroup', $bloodGroups, $employee->BloodGroup,'class="form-control input-sm id="BloodGroup"');
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('BloodGroup');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Photo :', 'Photo', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'file',
													'name' => 'Photo',
													'class' => 'form-control input-sm',
													//'value' => set_value('Photo'),
													'onchange' => "readURL(this);"
													);
		                                		echo "<span style='height: 150px;width: 150px;'><img id='Photo' class='img-responsive img-thumbnail' src='".base_url('uploads/'.$employee->Photo)."' style='height: 150px; width: 150px;' /></span><br/><br/>";
												echo form_input($data);
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5 text-danger">';
                                    			if(isset($error)){echo $error;}
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('National ID No :', 'NationalIdNo', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'value' => set_value('NationalIdNo',$employee->NationalIdNo),
													'name' => 'NationalIdNo',
													'placeholder' => 'Enter Your National Id No',
													'class' => 'form-control input-sm'
													);
												echo form_input($data);
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('NationalIdNo');
                                			echo '</div>';
		                                echo '</div>';

		                                $roleOptions = array(
										        'Manager' => 'Manager',
										        'Employee' => 'Employee',
											);

		                                echo '<div class="form-group">';
		                                	echo form_label('Role :', 'Role', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		echo form_dropdown('Role', $roleOptions, $employee->Role,'class="form-control input-sm id="Role"');
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('Role');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                    echo '<div class="col-lg-offset-2 col-lg-10">';
		                                    	echo anchor(base_url('Employees/AllEmployees'),"<i class='fa fa-arrow-left'> Back</i>",array('class'=>"btn btn-sm btn-primary"));
		                                        echo "&nbsp;";
		                                        $data = array(
													'type' => 'submit',
													'name'=> 'submit',
													'value'=> 'Submit',
													'class'=> 'btn btn-sm btn-success'
													);
												echo form_submit($data);
		                                    echo '</div>';
		                                echo '</div>';
		                            
									echo form_close();?>
	                            </div>
	                        </section>
						</div>
					</div>

<?php
require_once(APPPATH."views/Shared/_layoutFooter.php");
?>
    
	<script type="text/javascript" src="<?= base_url('Assets/ProjectJs/employeeController.js') ?>"></script>
	</body>
</html>
