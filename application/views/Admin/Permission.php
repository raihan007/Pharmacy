<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
require_once(APPPATH."views/Shared/_layoutHeader.php");
?>

                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                  User Permissions
                                </header>
                                <div class="panel-body table-responsive">
                                  <table id="PermissionTable"
                                         data-toggle="table"
                                         data-height="500"
                                         data-url='http://localhost/Pharmacy/Users/UsersInfo_json'
                                         data-cookie="true"
                                         data-cookie-id-table="saveId"
                                         data-toolbar="#toolbar"
                                         data-search="true"
                                         data-show-refresh="true"
                                         data-minimum-count-columns="2"
                                         data-pagination="true"
                                         data-page-size=5
                                         data-id-field="EntityNo"
                                         data-page-list="[5,10, 25, 50, 100, ALL]"
                                         data-side-pagination="server"
                                         data-sort-name="EntityNo"
                                         data-sort-order="asc">
                                      <thead>
                                      <tr>
                                        <th data-field="EntityNo" data-sortable="true" data-align="center">#</th>
                                        <th data-field="FullName" data-sortable="true" data-align="center">User Name</th>
                                        <th data-field="Photo" data-formatter="imageFormatter" data-align="center">Image</th>
                                        <th data-events="permissionTableEvents" data-formatter="permissionTableFormatter" data-align="center">Action</th>
                                      </tr>
                                      </thead>
                                  </table>
                                </div>
                            </section>
                        </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-12">
                        <input type="text" class="typeahead form-control input-sm" id="txtinput1"/>
                         
                      </div>
                    </div>

                    <!--post modal-->
                    <div id="PermissionModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header modal-info">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                Set Users Permission
                          </div>
                          <div class="modal-body">
                            <div class="text-center"><h4><label id="labelUser"></label><label>&nbsp; have this permissions only.</label></h4></div>
                              <form action="<?= base_url('Users/SetUserPermissions') ?>" id="SetUserPermissionsForm" class="SetUserPermissionsForm form-horizontal" method="post">
                                <input type="hidden" name="UserId" id="PUserId"></input>
                                <div class="form-group">
                                  <label for="empPermission" class="col-lg-4 control-label">Employee Info.</label>
                                  <div class="col-lg-8">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <label><input id="<?= $empPermission['canGet'] ?>" name="Permission" type="checkbox" value="<?= $empPermission['canGet'] ?>">Can Get</label>
                                        <br/><label><input id="<?= $empPermission['canCreate'] ?>" name="Permission" type="checkbox" value="<?= $empPermission['canCreate']  ?>">Can Create</label>
                                      </div>
                                      <div class="col-md-6">
                                        <label><input id="<?= $empPermission['canEdit'] ?>" name="Permission" type="checkbox" value="<?= $empPermission['canEdit']  ?>">Can Edit</label>
                                        <br/><label><input id="<?= $empPermission['canDelete'] ?>" name="Permission" type="checkbox" value="<?= $empPermission['canDelete']  ?>">Can Delete</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="medPermission" class="col-lg-4 control-label">Medicines Info.</label>
                                  <div class="col-lg-8">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <label><input id="<?= $medPermission['canGet'] ?>" name="Permission" type="checkbox" value="<?= $medPermission['canGet'] ?>">Can Get</label>
                                        <br/><label><input id="<?= $medPermission['canCreate'] ?>" name="Permission" type="checkbox" value="<?= $medPermission['canCreate']  ?>">Can Create</label>
                                      </div>
                                      <div class="col-md-6">
                                        <label><input id="<?= $medPermission['canEdit'] ?>" name="Permission" type="checkbox" value="<?= $medPermission['canEdit']  ?>">Can Edit</label>
                                        <br/><label><input id="<?= $medPermission['canDelete'] ?>" name="Permission" type="checkbox" value="<?= $medPermission['canDelete']  ?>">Can Delete</label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-lg-8 col-lg-offset-4">
                                    <button type="button" id="savePermission" class="btn btn-primary">Save</button>
                                    <button type="button" data-dismiss='modal' class="cancel btn btn-default">Cancel</button>
                                  </div>
                                </div>
                              </form>
                          </div>
                      </div>
                      </div>
                    </div>
<?php
require_once(APPPATH."views/Shared/_layoutFooter.php");
?>
    <link rel="stylesheet" type="text/css" href="<?= base_url('Assets/css/sweet-alert.css') ?>">
    <script type="text/javascript" src="<?= base_url('Assets/ProjectJs/userController.js') ?>"></script>
  <script type="text/javascript" src="<?= base_url('Assets/js/sweet-alert.js') ?>"></script>
    </body>
</html>