$("#splitter").kendoSplitter({
    panes: [
        { collapsible: true, size: "50%", },
        { collapsible: false, size: "50%",}
    ]
});

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
	sortable  : true,
	filterable: true,
	autoSync: true,
	pageable  : {
		refresh: true,
		pageSizes: [5,10,20,50,"All"],
		numeric: false,
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
		pageSize: 5,
		serverPaging: true
	},
	toolbar: [
    	{ name: "new", text: "Add new" },{ name: "Clear" }
  	],
	noRecords: {
    	template: "No data available on current page. Current page is: #=this.dataSource.page()#"
  	},
	columns   : [
		{ field: "EntityNo", title: "#", width: "20%"  },
		{ field: "Title", title: "Title" },],
		detailTemplate: "<div>Name: #: EntityNo #</div><div>Age: #: Title #</div>",
		edit: function(e) {
			if (!e.model.isNew()) {
				// Disable the editor of the "id" column when editing data items
				var numeric = e.container.find("input[name=id]").data("kendoNumericTextBox");
				numeric.enable(false);
			}
		},
		height: "90%",
		scrollable: true,
		cancel: function(e) {
			e.preventDefault()
		},
		change: handleChange,
		selectable: "row",
		mobile: true,
		messages: {
    		noRecords: "There is no data on current page"
  		}
	});

function handleChange(e) {
	var row = e != null ? e.sender.dataItem(e.sender.select()) : null;

	$('#EntityNo').val(row.EntityNo);
    $('#Title').val(row.Title);
    $('#Remarks').val(row.Remarks);
    $('#SaveCategory').text('Update');
}

$(".k-grid-new").click(function(e){
    alert("sdsd");
});