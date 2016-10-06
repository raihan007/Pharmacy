<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
require_once(APPPATH."views/Shared/_layoutHeader.php");
?>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    Medicine Categories
                                </header>
                                <div class="panel-body table-responsive">
                                    <div class="col-xs-6 table-responsive">
                                        <div>
                                                <div id="toolbar">
                                                    <div class="form-inline" role="form">
                                                        <div class="form-group">
                                                            <button id="newCategory" class="btn btn-primary ">New</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <table id="CategoriesTable"
                                                    data-toggle="table"
                                                    data-height="450"
                                                    data-click-to-select="true"
                                                    data-url='<?= base_url('Common/Categories_json')?>'
                                                    data-cookie="true"
                                                    data-cookie-id-table="saveId"
                                                    data-toolbar="#toolbar"
                                                    data-search="true"
                                                    data-show-refresh="true"
                                                    data-minimum-count-columns="2"
                                                    data-pagination="true"
                                                    data-id-field="EntityNo"
                                                    data-page-size="5"
                                                    data-page-list="[5,10, 25, 50, 100, ALL]"
                                                    data-show-footer="false"
                                                    data-side-pagination="server"
                                                    data-sort-name="EntityNo"
                                                    data-sort-order="asc"
                                                    data-query-params="queryParams">
                                                    <thead>
                                                        <tr>
                                                            <th data-field="EntityNo" data-sortable="true">#</th>
                                                            <th data-field="Title" data-sortable="true">Title</th>
                                                            <th data-events="operateEvents" data-formatter="operateFormatter"></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                    </div>
                                    <div class="col-xs-6 table-responsive">
                                        
                                        <form id="CategoryForm" name="CategoryForm" method="post" class="form-horizontal" action="<?= base_url('Common/Category') ?>">
                                          <div class="form-group">
                                            <label for="EntityNo" class="col-sm-2 control-label">Id</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control input-sm" name="EntityNo" id="EntityNo" readonly="readonly" placeholder="Entity No">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="Title" class="col-sm-2 control-label">Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control input-sm" name="Title" id="Title" placeholder="Title" value="<?= set_value('Title') ?>">
                                                <span class="text-danger validation"><?= form_error('Title') ?></span>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="Remarks" class="col-sm-2 control-label">Remarks</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control input-sm" name="Remarks" rows="6" id="Remarks" placeholder="Remarks"></textarea>
                                                <span class="text-danger validation"><?= form_error('Remarks') ?></span>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="button" name="SaveCategory" id="SaveCategory" class="btn btn-info">Save</button>
                                            </div>
                                          </div>
                                        </form>
                                    </div>
                                </div>
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
                                <form name="DeleteForm" class="form-horizontal" id="DeleteForm" method="post" accept-charset="utf-8">
                                    <input type="hidden" name="EntityNo" id="CategoryId"></input>
                                    <input type="button" id="DeleteCategory" value="Confirm" class="btn btn-danger btn-sm">
                                    <input type="button" value="Cancle" data-dismiss="modal" aria-hidden="true" class="btn btn-info btn-sm">
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
                                Details of Category
                          </div>
                          <div class="modal-body">
                            <div class="">
                                <dl class="dl-horizontal">
                                    <dt>
                                        <label class="control-label">Entity No :</label>
                                    </dt>
                                    <dd>
                                        <label class="detailEno control-label"></label>
                                    </dd>
                                    <dt>
                                        <label class="control-label">Title :</label>
                                    </dt>
                                    <dd>
                                        <label class="detailTitle control-label"></label>
                                    </dd>
                                    <dt>
                                        <label class="control-label">Remarks  :</label>
                                    </dt>
                                    <dd>
                                        <label class="detailRemarks control-label"></label>
                                    </dd>
                                </dl>
                            </div>
                          </div>
                      </div>
                      </div>
                    </div>
<?php
require_once(APPPATH."views/Shared/_layoutFooter.php");
?>
    <script type="text/javascript" src="<?= base_url('Assets/ProjectJs/CommonController.js') ?>"></script>
    </body>
</html>