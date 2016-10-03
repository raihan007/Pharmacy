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
	                                Add a new medicine informations
	                            </header>
	                            <div class="panel-body">
	                                <?php
									echo form_open_multipart(base_url('Medicines/Create'),array('name' => 'NewMedicineForm','class' => 'form-horizontal', 'id' => 'NewMedicineForm'));

		                                echo '<div class="form-group">';
		                                	echo form_label('Entity No :', 'EntityNo', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'name' => 'EntityNo',
													'value' => set_value('EntityNo'),
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
		                                	echo form_label('Name :', 'Name', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'name' => 'Name',
													'value' => set_value('Name'),
													'placeholder' => 'Enter Medicine Name',
													'class' => 'form-control input-sm'
													);
												echo form_input($data);
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('Name');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Category :', 'Category', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'name' => 'Category',
													'value' => set_value('Category'),
													'placeholder' => 'Enter Medicine Category',
													'class' => 'form-control input-sm'
													);
												echo form_input($data);
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('Category');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Batch Number :', 'BatchNumber', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'name' => 'BatchNumber',
													'value' => set_value('BatchNumber'),
													'id' => 'BatchNumber',
													'placeholder' => 'Enter Batch Number',
													'class' => 'form-control input-sm'
													);
												echo form_input($data);
		                                	echo '</div>';
		                                	echo '<div class="text-danger BatchNumberError col-lg-5">';
                                    			echo form_error('BatchNumber');
                                			echo '</div>';
		                                echo '</div>';

		                                $options = array(
										        'Male' => 'Male',
										        'Female' => 'Female',
											);

		                                echo '<div class="form-group">';
		                                	echo form_label('Manufacturer :', 'Manufacturer', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		echo form_dropdown('Manufacturer', $options, '','class="form-control input-sm id="Manufacturer"');
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('Manufacturer');
                                			echo '</div>';
		                                echo '</div>';

		                                

		                                echo '<div class="form-group">';
		                                	echo form_label('Quantity :', 'Quantity', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
		                                			'type' => 'text',
													'name' => 'Quantity',
													'value' => set_value('Quantity'),
													'placeholder' => 'Enter Quantity',
													'class' => 'form-control input-sm',
													'rows' => 4
													);
												echo form_input($data);
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('Quantity');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Medicine Entry Date :', 'EntryDate', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'value' => set_value('EntryDate'),
													'name' => 'EntryDate',
													'placeholder' => 'Enter Medicine Entry Date',
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
                                    			echo form_error('EntryDate');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Production Date :', 'ProductionDate', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'value' => set_value('ProductionDate'),
													'name' => 'ProductionDate',
													'placeholder' => 'Enter Production Date',
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
                                    			echo form_error('ProductionDate');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Expire Date :', 'ExpireDate', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'value' => set_value('ExpireDate'),
													'name' => 'ExpireDate',
													'placeholder' => 'Enter Expire Date',
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
                                    			echo form_error('ExpireDate');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Buying Price :', 'BuyingPrice', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'name' => 'BuyingPrice',
													'value' => set_value('BuyingPrice'),
													'placeholder' => 'Enter Buying Price',
													'class' => 'form-control input-sm'
													);
												echo form_input($data);
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('BuyingPrice');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                	echo form_label('Selling Price :', 'SellingPrice', array('class' =>'col-lg-2 col-sm-2 control-label'));
		                                	echo '<div class="col-lg-5">';
		                                		$data= array(
													'type' => 'text',
													'value' => set_value('SellingPrice'),
													'name' => 'SellingPrice',
													'placeholder' => 'Enter Selling Price',
													'class' => 'form-control input-sm'
													);
												echo form_input($data);
		                                	echo '</div>';
		                                	echo '<div class="col-lg-5">';
                                    			echo form_error('SellingPrice');
                                			echo '</div>';
		                                echo '</div>';

		                                echo '<div class="form-group">';
		                                    echo '<div class="col-lg-offset-2 col-lg-10">';
		                                    	echo anchor(base_url('Employees/AllEmployees'),"<i class='fa fa-arrow-left'> Back</i>",array('class'=>"btn btn-sm btn-success"));
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

	<script type="text/javascript" src="<?= base_url('Assets/ProjectJs/employeeController.js') ?>"></script>
	</body>
</html>
