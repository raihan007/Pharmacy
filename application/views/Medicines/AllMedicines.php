<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
require_once(APPPATH."views/Shared/_layoutHeader.php");
?>
                    <button id="testbtn"></button>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    Medicines Informations
                                </header>
                                <div class="panel-body table-responsive">
                                    <div>
                                        <div id="toolbar">
                                            <div class="form-inline" role="form">
                                                <div class="form-group">
                                                    <a class="btn btn-primary " href="<?= base_url('Medicines/Create')?>">New</a>
                                                </div>
                                            </div>

                                        </div>
                                        <table id="DataGrid"
                                            data-toggle="table"
                                            data-height="640"
                                            data-url='<?= base_url('Medicines/MedicinesInfo_json')?>'
                                            data-show-columns="true"
                                            data-cookie="true"
                                            data-cookie-id-table="saveId"
                                            data-toolbar="#toolbar"
                                            data-show-export="true"
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
                                                    <th data-field="Name" data-sortable="true">Name</th>
                                                    <th data-field="Category" data-sortable="true">Category</th>
                                                    <th data-field="BatchNumber" data-sortable="true">Batch Number</th>
                                                    <th data-field="Manufacturer" data-sortable="true">Manufacturer</th>
                                                    <th data-field="Quantity" data-sortable="true">Quantity</th>
                                                    <th data-field="ExpireDate" data-sortable="true">Expire Date</th>
                                                    <th data-field="BuyingPrice" data-sortable="true">Buying Price</th>
                                                    <th data-field="SellingPrice" data-sortable="true">Selling Price</th>
                                                    <th data-events="operateEvents" data-formatter="operateFormatter"></th>
                                                    </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
<?php
require_once(APPPATH."views/Shared/_layoutFooter.php");
?>
    <script type="text/javascript" src="<?= base_url('Assets/ProjectJs/MedicineController.js') ?>"></script>
    </body>
</html>