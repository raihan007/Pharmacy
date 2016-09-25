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
	                                Delete Employee Informations
	                            </header>
	                            
	                            <div class="panel-body">
		                            <div class="">
		                            	<dl class="dl-horizontal">
			                            	<dt>
									            <label class="control-label">Entity No :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $employee->EntityNo; ?></label>
									        </dd>
									        <dt>
									            <label class="control-label">First Name :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $employee->FirstName ; ?></label>
									        </dd>
									        <dt>
									            <label class="control-label">Last Name :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $employee->LastName; ?></label>
									        </dd>
									        <dt>
									            <label class="control-label">Gender :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $employee->Gender; ?></label>
									        </dd>
									        <dt>
									            <label class="control-label">Email :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $employee->Email; ?></label>
									        </dd>
									        <dt>
									            <label class="control-label">Photo :</label>
									        </dt>

									        <dd>
									            <?php echo "<span style='height: 150px;width: 150px;'><img id='Photo' class='img-responsive img-thumbnail' src='".base_url('uploads/'.$employee->Photo)."' style='height: 150px; width: 150px;' /></span><br/><br/>";?>
									        </dd>
									        <dt>
									            <label class="control-label">Permanent Address :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $employee->PermanentAddress; ?></label>
									        </dd>
									        <dt>
									            <label class="control-label">Present Address :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $employee->PresentAddress; ?></label>
									        </dd>
									        <dt>
									            <label class="control-label">Phone No :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $employee->PhoneNo; ?></label>
									        </dd>
									        <dt>
									            <label class="control-label">Date of Birth :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $employee->Birthdate; ?></label>
									        </dd>
									        <dt>
									            <label class="control-label">BloodGroup :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $employee->BloodGroup; ?></label>
									        </dd>
									        <dt>
									            <label class="control-label">National Id No :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $employee->NationalIdNo; ?></label>
									        </dd>
									        <dt>
									            <label class="control-label">Role :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $employee->Role; ?></label>
									        </dd>
			                            </dl>
		                            </div>
		                            <div class="">
		                            	<?= anchor(base_url('Admin/Employees'),"<i class='fa fa-arrow-left'> Back</i>",array('class'=>"btn btn-sm btn-default")) ?>
		                            	<a href="#postModal" data-toggle="modal" class="btn btn-sm btn-info" data-target="#postModal"> Edit</a>
		                            </div>
								</div>
	                        </section>
						</div>
					</div>
					<!--post modal-->
                    <div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header bg-primary">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                Confirm Please
                          </div>
                          <div class="modal-body">
                          	<div class="">
                          		<p class="text-danger"><strong>Are you sure you want to edit this item?</strong></p>
                          	</div>
                          	<div class="">
                          		<?= anchor(base_url('Employees/Edit/'.$employee->EntityNo)," Edit",array('class'=>"btn btn-sm btn-primary",'data-toggle'=>"tooltip",'data-placement'=>"top",'data-original-title'=>"Edit"))
                          		?>
                          		<a href="" data-dismiss='modal' aria-hidden='true' class='btn btn-default btn-sm'> Cancle</a>
                          	</div>
                          </div>
                      </div>
                      </div>
                    </div>

<?php
require_once(APPPATH."views/Shared/_layoutFooter.php");
?>
    </body>
</html>
