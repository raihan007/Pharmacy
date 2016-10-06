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
        <form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-6">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>
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
									    <div id="CategoryGrid">
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

        $("#splitter").kendoSplitter({
          panes: [
            { collapsible: true, size: "40%", },
            { collapsible: false, size: "60%", }
          ],
          resize: onResize
        });
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
                    $("#grid").kendoGrid({
                        dataSource: {
                            type: "odata",
                            transport: {
                                read: "//demos.telerik.com/kendo-ui/service/Northwind.svc/Orders"
                            },
                            schema: {
                                model: {
                                    fields: {
                                        OrderID: { type: "number" },
                                        Freight: { type: "number" },
                                        ShipName: { type: "string" },
                                        OrderDate: { type: "date" },
                                        ShipCity: { type: "string" }
                                    }
                                }
                            },
                            pageSize: 20,
                            serverPaging: true,
                            serverFiltering: true,
                            serverSorting: true
                        },
                        filterable: true,
                        sortable: true,
                        pageable: {
		                    refresh: true,
		                    pageSizes: true,
		                    buttonCount: 5
		                },
                        columns: [{
                                field:"OrderID",
                                filterable: false
                            },
                            "Freight",
                            {
                                field: "OrderDate",
                                title: "Order Date",
                                format: "{0:MM/dd/yyyy}"
                            }, {
                                field: "ShipName",
                                title: "Ship Name"
                            }, {
                                field: "ShipCity",
                                title: "Ship City"
                            }
                        ]
                    });

                    $("#CategoryGrid").kendoGrid({
                    	autoBind: true,
					    sortable  : true,
					    scrollable: true,
					    filterable: true,
					    autoSync: true,
					    pageable  : {
					        refresh: true,
		                    pageSizes: true,
		                    pageSizes: [2, 3, 4, "all"],
    						numeric: false,
		                    buttonCount: 5
					    },
					    dataSource: {
					        transport: {
					            read: {
					                url     : baseurl+'Common/test',
					                type: "GET",
					                dataType: "Json",
					                data: {
								        q: "html5" // send "html5" as the "q" parameter
								      }
					            }
					        },
					        schema: {
					            data: 'rows',
					            total: "total" // total is returned in the "total" field of the response
					        },
					        pageSize: 2,
                            serverPaging: true
					    },
					    noRecords: {
    template: "No data available on current page. Current page is: #=this.dataSource.page()#"
  },
					    dataBinding: function(e) {
						    console.log("dataBinding");
						  },
					    columns   : [
					        { field: "EntityNo", title: "Entity No" },
					        { field: "Title", title: "Title" },
					        {
					            command: "edit"
					        }],
					        /*toolbar: [
    { template: kendo.template($("#template").html()) }
  ],*/
					    editable: "popup",
					    columnMenu: true,
					    detailTemplate: "<div>Name: #: EntityNo #</div><div>Age: #: Title #</div>",
					    edit: function(e) {
						    if (!e.model.isNew()) {
						      // Disable the editor of the "id" column when editing data items
						      var numeric = e.container.find("input[name=id]").data("kendoNumericTextBox");
						      numeric.enable(false);
						    }
						  },
						  cancel: function(e) {
					    	e.preventDefault()
					  	},
					  	change: function (e) {
   var selectedDataItem = e != null ? e.sender.dataItem(e.sender.select()) : null;
},
					  	selectable: "row",
					  	mobile: true
					});

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