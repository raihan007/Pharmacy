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
                                  Categories
                                </header>
                                <div class="panel-body table-responsive">
                                    <div id="splitter" style="height: 600px; border: none;">
                                        <div>
                                            <div id="toolbar">
                                                <div class="form-inline" role="form">
                                                    <div class="form-group">
                                                        <button id="newCategory" class="btn btn-primary ">New</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <br/>
                                            <div id="CategoryGrid">
                                            
                                            </div>
                                        </div>
                                        <div>
                                            <div style="padding: 15px;" data-role="view" data-use-native-scrolling="true">
                                                <form id="CategoryForm" name="CategoryForm" method="post" class="form-horizontal" action="<?= base_url('Kendo/Category') ?>">
                                                    <table id="FormTable" class="FormTable table-responsive">
                                                        <tr>
                                                            <th><label class="km-label-above">Entity No.</label></th>
                                                            <td><input type="text" class="k-textbox" name="EntityNo" id="EntityNo" readonly="readonly" placeholder="Entity No" style="width: 150%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <th><label class="km-label-above">Title</label></th>
                                                            <td><input type="text" class="k-textbox" name="Title" id="Title" placeholder="Title" value="<?= set_value('Title') ?>" style="width: 150%;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><span class="text-danger validation"><?= form_error('Title') ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th><label class="km-label-above">Remarks</label></th>
                                                            <td>
                                                                <textarea class="k-textbox" name="Remarks" rows="6" id="Remarks" placeholder="Remarks" style="width: 150%;"></textarea>
                                                                
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><span class="text-danger validation"><?= form_error('Remarks') ?></span></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td><button type="button" name="SaveCategory" id="SaveCategory" class="btn btn-info">Save</button></td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>


                    <div class="row" style="margin-bottom:5px;">
                        <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
                            <section class="panel">
                                <header class="panel-heading">
                                  Categories Informations
                                </header>
                                <div class="panel-body table-responsive">
                                	<div id="splitter" style="height: 600px">
									    <div style="padding: 5px;" id="CategoryGrid">
									    <div id="CategoryInput">
									    	<form id="CategoryForm" name="CategoryForm" method="post" class="form-horizontal" action="<?= base_url('Common/Category') ?>">
	                                          <div class="form-group">
	                                            <label for="EntityNo" class="control-label">Id</label>
	                                            <div>
	                                                <input type="text" class="form-control input-sm" name="EntityNo" id="EntityNo" readonly="readonly" placeholder="Entity No">
	                                            </div>
	                                          </div>
	                                        </form>
									    </div>
									    </div>
									</div>
                                </div>
                            </section>
                        </div>
                    </div>
					
					


			              
<?php
require_once(APPPATH."views/Shared/_layoutFooter.php");
?>
<script type="text/javascript" src="<?= base_url("Assets/ProjectJs/KendoController.js"); ?>"></script>
<script type="text/javascript" src="<?= base_url('Assets/ProjectJs/CommonController.js') ?>"></script>
<script>
      $(document).ready(function() {
        function onResize(e) {
          // prevent endless recursion from resizes
          if (!this.appliesSizes) {
            this.appliesSizes = true;

            // calculate pane width
            var element = this.element;
            var pane = element.find(".k-pane:first");
            var ratio = Math.ceil(pane.width() * 100 / element.width());

            // set pane width in percentages
            this.size(pane, ratio + "%");

            this.appliesSizes = false;
          }
        }

        
});
    </script>
    <script id="template" type="text/x-kendo-template">
    <button id="newCategory" class="btn btn-primary ">New</button>
    <button class="k-button " type="submit">Submit</button>
<a class="btn k-button" href="\#" onclick="return toolbar_click()">Command</a>
</script>
<script>
function toolbar_click() {
  console.log("Toolbar command is clicked!");
  return false;
}
                $(document).ready(function() {
                    

                    

                });

                var catalogGrid = $("#CategoryGrid").data("kendoGrid");

                function rowSelect(e) {
                	var entityGrid = $("#CategoryGrid").data("kendoGrid");
					var rows = entityGrid.dataItem(entityGrid.select());
    var record;
    rows.each(function () {
        record = catalogGrid.dataItem($(this));
        mapShowBounds(record.bbox);
    });
}
            </script>
    </body>
</html>