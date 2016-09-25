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
                                    MEdicine Dealers

                                </header>
                                <div class="panel-body table-responsive">
                                    <div class="col-xs-6 table-responsive">
                                        <div>
                                                <div id="toolbar">
                                                    <div class="form-inline" role="form">
                                                        <div class="form-group">
                                                            <button id="newDealer" class="btn btn-primary ">New</button>
                                                        </div>
                                                        <!-- <div style="margin-left: 180px;" class="form-group">
                                                            <select class="form-control" id="select">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                        </div> -->
                                                    </div>
                                                    
                                                    
                                                    <!-- <button id="remove" class="btn btn-danger " disabled>Delete</button> -->
                                                </div>
                                                <table id="DealersTable"
                                                    data-toggle="table"
                                                    data-height="450"
                                                    data-url='<?= base_url('Dealers/DealersInfo_json')?>'
                                                    data-cookie="true"
                                                    data-cookie-id-table="saveId"
                                                    data-toolbar="#toolbar"
                                                    data-search="true"
                                                    data-show-refresh="true"
                                                    data-minimum-count-columns="2"
                                                    data-pagination="true"
                                                    data-id-field="EntityNo"
                                                    data-page-list="[10, 25, 50, 100, ALL]"
                                                    data-show-footer="false"
                                                    data-side-pagination="server"
                                                    data-sort-name="EntityNo"
                                                    data-sort-order="asc"
                                                    data-query-params="queryParams">
                                                    <thead>
                                                        <tr>
                                                            <th data-field="EntityNo" data-sortable="true">#</th>
                                                            <th data-field="DealerTitle" data-sortable="true">Title</th>
                                                            <th data-events="operateEvents" data-formatter="operateFormatter"></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                    </div>
                                    <div class="col-xs-6 table-responsive">
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
                                        <form id="DealerForm" name="DealerForm" method="post" class="form-horizontal" action="<?= base_url('Dealers') ?>">
                                          <div class="form-group">
                                            <label for="EntityNo" class="col-sm-2 control-label">Id</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control input-sm" name="EntityNo" id="EntityNo" readonly="readonly" placeholder="Entity No">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="DealerTitle" class="col-sm-2 control-label">Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control input-sm" name="DealerTitle" id="DealerTitle" placeholder="Dealer Title" value="<?= set_value('DealerTitle') ?>">
                                                <span class="text-danger validation"><?= form_error('DealerTitle') ?></span>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="DealerAddress" class="col-sm-2 control-label">Address</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control input-sm" name="DealerAddress" id="DealerAddress" placeholder="Dealer Address"></textarea>
                                                <span class="text-danger validation"><?= form_error('DealerAddress') ?></span>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="DealerCity" class="col-sm-2 control-label">City</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control input-sm" name="DealerCity" id="DealerCity" value="<?= set_value('DealerCity') ?>" placeholder="Dealer City">
                                                <span class="text-danger validation"><?= form_error('DealerCity') ?></span>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="DealerCountry" class="col-sm-2 control-label">Country</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control input-sm" name="DealerCountry" id="DealerCountry" value="<?= set_value('DealerCountry') ?>" placeholder="Dealer Country">
                                                <span class="text-danger validation"><?= form_error('DealerCountry') ?></span>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="DealerPhone" class="col-sm-2 control-label">Phone</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control input-sm" name="DealerPhone" id="DealerPhone" value="<?= set_value('DealerPhone') ?>" placeholder="Dealer Phone">
                                                <span class="text-danger validation"><?= form_error('DealerPhone') ?></span>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="DealerEmail" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control input-sm" name="DealerEmail" id="DealerEmail" value="<?= set_value('DealerEmail') ?>" placeholder="Dealer Email">
                                                <span class="text-danger validation"><?= form_error('DealerEmail') ?></span>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="DealerFax" class="col-sm-2 control-label">Fax</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control input-sm" name="DealerFax" id="DealerFax" value="<?= set_value('DealerFax') ?>" placeholder="Dealer Fax">
                                                <span class="text-danger validation"><?= form_error('DealerFax') ?></span>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="DealerRemarks" class="col-sm-2 control-label">Remarks</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control input-sm" name="DealerRemarks" id="DealerRemarks" placeholder="Dealer Address"></textarea>
                                                
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="button" name="SaveDealer" id="SaveDealer" class="btn btn-info">Save</button>
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
                                <form name="DeleteDealerForm" class="form-horizontal" id="DeleteDealerForm" method="post" accept-charset="utf-8">
                                    <input type="submit" name="confirm" value="Confirm" class="btn btn-danger btn-sm">
                                    <input type="button" name="Cancle" value="Cancle" data-dismiss="modal" aria-hidden="true" class="btn btn-info btn-sm">
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
                                Details of Dealer Informations
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
                                        <label class="control-label">Address :</label>
                                    </dt>
                                    <dd>
                                        <label class="detailAddress control-label"></label>
                                    </dd>
                                    <dt>
                                        <label class="control-label">City :</label>
                                    </dt>
                                    <dd>
                                        <label class="detailCity control-label"></label>
                                    </dd>
                                    <dt>
                                        <label class="control-label">Country :</label>
                                    </dt>
                                    <dd>
                                        <label class="detailCountry control-label"></label>
                                    </dd>
                                    <dt>
                                        <label class="control-label">Phone :</label>
                                    </dt>
                                    <dd>
                                        <label class="detailPhone control-label"></label>
                                    </dd>
                                    <dt>
                                        <label class="control-label">Email :</label>
                                    </dt>
                                    <dd>
                                        <label class="detailEmail control-label"></label>
                                    </dd>
                                    <dt>
                                        <label class="control-label">Fax :</label>
                                    </dt>
                                    <dd>
                                        <label class="detailFax control-label"></label>
                                    </dd>
                                    <dt>
                                        <label class="control-label">Remarks :</label>
                                    </dt>
                                    <dd>
                                        <label class="detailRemarks control-label"></label>
                                    </dd>
                                    <dt>
                                        
                                    </dt>
                                    <!-- <dd class="buttonPanel"><input type="button" name="Cancle" value="Cancle" data-dismiss="modal" aria-hidden="true" class="btn btn-info btn-sm"></input></dd> -->
                                </dl>
                            </div>
                          </div>
                      </div>
                      </div>
                    </div>
<?php
require_once(APPPATH."views/Shared/_layoutFooter.php");
?>
    <script type="text/javascript" src="<?= base_url('Assets/ProjectJs/DealerController.js') ?>"></script>
    <script type="text/javascript">

        /*$(document).ready(function () {
            $(".columns-right").find('button[name="refresh"]').addClass("btn-sm");
            $(".search").find('input[type="text"]').addClass("input-sm");
            $(".pagination-detail").find('button[type="button"]').addClass("btn-sm");
            $('div.pagination').find('ul.pagination').addClass('pagination-sm');
        });

        $(window).bind("load", function() {
            $(".pagination-detail").find('button[type="button"]').addClass("btn-sm");
            $('div.pagination').find('ul.pagination').addClass('pagination-sm');
        });*/
    </script>
    </body>
</html>