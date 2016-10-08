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
									            <label class="control-label"><?= $Medicine->EntityNo; ?></label>
									        </dd>
									        <dt>
									            <label class="control-label">Name :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $Medicine->Name ; ?></label>
									        </dd>
									        <dt>
									            <label class="control-label">Category :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $Medicine->Category; ?></label>
									        </dd>
									        <dt>
									            <label class="control-label">Batch Number :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $Medicine->BatchNumber; ?></label>
									        </dd>
									        
									        <dt>
									            <label class="control-label">Manufacturer :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $Medicine->Manufacturer; ?></label>
									        </dd>
									        <dt>
									            <label class="control-label">Quantity :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $Medicine->Quantity; ?></label>
									        </dd>
									        <dt>
									            <label class="control-label">Entry Date :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $Medicine->EntryDate; ?></label>
									        </dd>
									        <dt>
									            <label class="control-label">Production Date :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $Medicine->ProductionDate; ?></label>
									        </dd>
									        <dt>
									            <label class="control-label">Expire Date :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $Medicine->ExpireDate; ?></label>
									        </dd>
									        <dt>
									            <label class="control-label">Buying Price :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $Medicine->BuyingPrice; ?></label>
									        </dd>
									        <dt>
									            <label class="control-label">Selling Price :</label>
									        </dt>

									        <dd>
									            <label class="control-label"><?= $Medicine->SellingPrice; ?></label>
									        </dd>
			                            </dl>
		                            </div>
		                            <div class="">
		                            	<?= anchor(base_url('Medicines/AllMedicines'),"<i class='fa fa-arrow-left'> Back</i>",array('class'=>"btn btn-sm btn-default")) ?>
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
                          		<?= anchor(base_url('Medicines/Edit/'.$Medicine->EntityNo)," Edit",array('class'=>"btn btn-sm btn-primary",'data-toggle'=>"tooltip",'data-placement'=>"top",'data-original-title'=>"Edit"))
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
