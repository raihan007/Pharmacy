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