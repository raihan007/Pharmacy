<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
require_once(APPPATH."views/Shared/_layoutHeader.php");
?>

                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                  User Permissions
                                </header>
                                <div class="panel-body table-responsive">
                                  <div id="toolbar">
                                    <button id="button" class="btn btn-default">getSelections</button>
                                    <button id="remove" class="btn btn-danger" disabled>Delete</button>
                                  </div>
                                  <table id="eventsTable"
                                         data-toggle="table"
                                         data-height="370"
                                         data-url='http://localhost/Pharmacy/Users/LogActivity1'
                                         data-cookie="true"
                                         data-cookie-id-table="saveId"
                                         data-show-export="true"
                                         data-toolbar="#toolbar"
                                         data-search="true"
                                         data-show-refresh="true"
                                         data-show-toggle="true"
                                         data-show-columns="true"
                                         data-show-export="true"
                                         data-detail-view="true"
                                         data-detail-formatter="detailFormatter"
                                         data-minimum-count-columns="2"
                                         data-show-pagination-switch="true"
                                         data-pagination="true"
                                         data-page-size=5
                                         data-id-field="EntityNo"
                                         data-page-list="[5,10, 25, 50, 100, ALL]"
                                         data-show-footer="false"
                                         data-side-pagination="server"
                                         data-sort-name="EntityNo"
                                         data-sort-order="asc"
                                         
                                         >
                                      <thead>
                                      <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="EntityNo" data-sortable="true">#</th>
                                        <th data-field="FullName" data-sortable="true">User Name</th>
                                        <th data-field="Email" data-sortable="true">Email</th>
                                        <th data-field="LoginTime" data-sortable="true">Login Time</th>
                                        <th data-events="operateEvents" data-formatter="operateFormatter"></th>
                                      </tr>
                                      </thead>
                                  </table>
                                </div>
                            </section>
                        </div>
                    </div>



					<div class="row">
						<div class="col-xs-12">
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
													
	                                            	

													<div class="input-group pull-right">
													    <input type="text" name="table_search" class="form-control input-sm" style="width: 150px;" placeholder="Search"/>
													    <span class="input-group-btn">
													      	<button class="btn btn-sm btn-default" type="button"><i class="fa fa-search"></i></button>
													    </span>
													</div>
												</div>
	                                        </div>
	                                    </div>
	                                    <div class="box-tools m-b-15">
	                                    	<button type="button" class="btn btn-sm btn-success" onclick="Refreash();" id="refresh" name="refresh" ><i class='fa fa-refresh' aria-hidden="true"> Refresh</i></button>
	                                    </div>
	                                    <table class="table table-hover">
	                                        <thead>
	                                            <tr>
	                                                <th>#</th>
	                                                <th>Entity No</th>
	                                                <th>Full Name</th>
	                                                <th>Email</th>
	                                                <th>Login Time</th>
	                                            </tr>
	                                        </thead>
	                                        <tbody>
	                                          	<?php if(count($ActivitiesList)):
	                                          	$count = $this->uri->segment(3,0);
	                                          	foreach ($ActivitiesList as $row): ?>
	                                          	<tr>
	                                            	<td><?= ++$count ?></td>
	                                            	<td><?= $row['EntityNo'] ?></td>
	                                            	<td><?= $row['FullName'] ?></td>
	                                            	<td><?= $row['Email'] ?></td>
	                                            	<td><?= $row['LoginTime'] ?></td>
	                                          	</tr>
	                                          	<?php endforeach; ?>
	                                          	<?php else: ?>
	                                          	<tr>
	                                            	<td colspan="4"><h2>No Records Found.</h2></td>
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
	<script type="text/javascript" src="<?= base_url('Assets/ProjectJs/userController.js') ?>"></script>
	<script type="text/javascript">
		function Refreash(){
		    window.location.assign(baseurl+"Users/LogActivity");
		};
	</script>
	</body>
</html>