
    var currentId = 0;
    // A hard coded list of items to render
    var dataSource= new kendo.data.DataSource({
        serverAggregates:false,
        aggregate: [
            { field: "Name", aggregate: "count" },
            { field: "Total", aggregate: "sum" }
          ],
        schema: {
            model: {
              id: "id",
              fields: {
                id: { type: "number" },
                Name: { type: "string" },
                Price: { type: "number" },
                Quantity: { type: "number" },
                Total: { type: "number" }
              }
            }
        }
    });

$("#splitter").kendoSplitter({
    panes: [
        { size: "40%", max: "40%", min: "40%" },
        { collapsible: false, size: "60%",}
    ]
});

// Handle adding a new to do item
  $("#AddSell").click(function(e){
    e.preventDefault();
    currentId += 1;
    var validator = $("#SellsForm").kendoValidator().data("kendoValidator");
    if (validator.validate()) {
        var Name = $("#MedicineName").val();
        var Price = $("#Price").val();
        var Quantity = $("#Quantity").val();
        var Total = $("#Total").val();
    
        dataSource.add({
          id: currentId,
          Name: Name,
          Price: parseFloat(Price),
          Quantity: parseInt(Quantity),
          Total: parseFloat(Total)
        });
        $('#SellsForm').clearForm();
    }
  });

  $("#Quantity").change(function(){
        setTotalValu();
    });
  $("#Price").change(function(){
        setTotalValu();
    });

  function setTotalValu() {
    var Price = parseFloat($("#Price").val());
        var Quantity = parseInt($("#Quantity").val());
        var total = (Price * Quantity);
        $("#Total").val(total);
  }

  function calc() {
      // assume this to be dynamically determined  
      var field = "Total";
      
      // some custom calc logic
      var newValue = 0;
      
      $.each(dataSource.data(), function(index, model) {
          newValue += model.get(field);
      });
      
      return newValue;
    }

// Handle removing cleared items
  $("#remove-done").click(function(e){
    e.preventDefault();

    var raw = dataSource.data();
    var length = raw.length;

    // iterate and remove "done" items
    var item, i;
    for(i=length-1; i>=0; i--){

      item = raw[i];
      if (item.done){
        dataSource.remove(item);
      }

    }

  });


$("#SellsGrid").kendoGrid({
    sortable  : true,
    //filterable: true,
    toolbar: kendo.template($("#toolbarTemplate").html()),
    noRecords: {
        template: "No data found!"
    },
    dataSource : dataSource,
    columns   : [
        { field: "id", title: "#", width: '8%'},
        { field: "Name", title: "Name", width: '35%', footerTemplate: "Count: #=count#</span>" },
        { field: "Price", title: "Price" },
        { field: "Quantity", title: "Quantity" },
        { field: "Total", title: "Total", footerTemplate: "Total: <span id='footerPlaceholder'>#=calc()#</span>" },
        //{ command: [{ className: "btn-destroy", name: "destroy", text: "Remove" }] }
    ],
    height: "90%",
    scrollable: true,
    change: handleChange,
    selectable: "row",
    mobile: true,
    messages: {
        noRecords: "There is no data on current page"
    },
    save:function(e){
        this.refresh();
    },
});

function handleChange(e) {
    var row = e != null ? e.sender.dataItem(e.sender.select()) : null;

    if(row != null){
        $('.cancelItem').prop("disabled", false);
        $('#CategoryId').val(row.EntityNo);
        $('#EntityNo').val(row.EntityNo);
        $('#Title').val(row.Title);
        $('#Remarks').val(row.Remarks);
        $('#SaveCategory').text('Update');
    }
    
    
}

$("#cancelItem").click(function(e){ 
           clearSelectedRows("SellsGrid"); 
 });

function clearSelectedRows(gridName) {
 
           // identifying grid
 
            var entityGrid = $("#" + gridName + "").data("kendoGrid");
 
            // finding all the selected rows
            var rows = entityGrid.select();
            rows.each(function (index, row) {
 
                        // reading each selected item
                         var selectedItem = entityGrid.dataItem(row);
 
                       // finally removing selected item from grid data source
                         entityGrid.dataSource.remove(selectedItem); 
              });
 }

$(".k-grid-new").click(function(e){
    $('#CategoryForm').clearForm();
    $('#SaveCategory').text('Save');
    $("#CategoryGrid").data("kendoGrid").clearSelection();
});

var SearchOptions = [
                        {text: "Search Options", value:"0"},
                        {text: "Entity No", value:"EntityNo"},
                        {text: "Title", value:"Title"}
                    ];

$("#searchType").kendoDropDownList({
    dataTextField: "text",
    dataValueField: "value",
    dataSource: SearchOptions,
    height: 100
});

$('#SearchAction').click(function () {

    var searchKey = $('#searchKey').val();
    var searchType = $("#searchType").kendoDropDownList().val();
    if(searchType!= '0' && searchKey != ''){
        $("#CategoryGrid").data("kendoGrid").dataSource.read({SearchKey:searchKey,SearchType:searchType});
    }
    
});

$('#refresh').click(function () {
    $('#searchKey').val('');
    $("#searchType").data("kendoDropDownList").value("0");
    $('#CategoryForm').clearForm();
    $('#SaveCategory').text('Save');
    $("#CategoryGrid").data("kendoGrid").dataSource.read();
});

function queryParams(params) {
    if (params.search){
        searchType = $('#searchType option:selected').val();
        if(searchType!=0){
            params.type = searchType;
        }
    }
    return {
        limit: params.limit,
        offset: params.offset,
        search: params.search,
        sort: params.sort,
        order: params.order,
        type: params.type
    };
}

$(function () {
    $('#ok').click(function () {
        $('#CategoriesTable').bootstrapTable('refresh');
    });
});

$('#CategoriesTable').bootstrapTable({
    onRefresh: function (arg1, arg2) {
        var r=$('<input/>').attr({
        type: "button",
        id: "field",
        class: "pull-left btn btn-success",
        value: 'new'
    });

    customTollbar();
    },
    /*onAll: function (arg1, arg2) {
        $(".columns-right").find('button[name="refresh"]').addClass("btn-sm");
            $(".search").find('input[type="text"]').addClass("input-sm");
            $(".pagination-detail").find('button[type="button"]').addClass("btn-sm");
            $('div.pagination').find('ul.pagination').addClass('pagination-sm');
    },*/

});

$('.columns-right button[name="refresh"]').click(function(e) {
    $(".search").find('input[type="text"]').val(null);
    $('#CategoriesTable').bootstrapTable('refresh', {url: baseurl + 'Common/Categories_json',params:'queryParams'});
});

$(function () {
    customTollbar();
});

function customTollbar(){
    $('.search').find('div.customTollbar').first().remove();
    $(".search").addClass('form-inline');
    $(".search").prepend('<div class="customTollbar form-group"><label class="control-label"></label><select class="form-control searchType" name="searchType" id="searchType"><option value="0">Search Type</option><option value="EntityNo">Entity No</option><option value="Title">Title</option></select></div>');
}


function operateFormatter(value, row, index) {
    return [
        '<a class="details" href="#CategoryForm" title="Details">',
        '<i class="fa fa-user" aria-hidden="true"></i>',
        '</a>  ',
        '<a class="edit" href="#CategoryForm" title="Edit">',
        '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',
        '</a>  ',
        '<a class="remove text-danger" href="#" title="Remove">',
        '<i class="glyphicon glyphicon-remove"></i>',
        '</a>'
    ].join('');
}
    
window.operateEvents = {
    'click .edit': function (e, value, row, index) {
        //$('#DealerForm').attr('action', baseurl+"Dealers/Edit/"+row.EntityNo);
        $('#EntityNo').val(row.EntityNo);
        $('#Title').val(row.Title);
        $('#Remarks').val(row.Remarks);
        $('#SaveCategory').text('Update');
    },
    'click .remove': function (e, value, row, index) {
        //$('#DeleteForm').attr('action', baseurl+"Common/DeleteCategory/"+row.EntityNo);
        $('#CategoryId').val(row.EntityNo);
        $('#deleteModal').modal('show');
    },
    'click .details': function (e, value, row, index) {
        $('.detailEno').text(row.EntityNo);
        $('.detailTitle').text(row.Title);
        $('.detailRemarks').text(row.Remarks);
        $('#detailsModal').modal('show');
    }
};

$('#newCategory').on('click', function() {
    //$('#CategoryForm').attr('action', baseurl+"Dealers");
    $('#CategoryForm').clearForm();
    $('#SaveCategory').text('Save');
    $("#CategoryGrid").data("kendoGrid").clearSelection();
});

$('#removeCategory').click(function(e) {
    $('#deleteModal').modal('show');
     $('.deleteCategory').prop("disabled", true);
});

$('#DeleteCategory').on('click',function(){
    var formData = $("#DeleteForm").serializeObject();
    $.ajax({
        url: baseurl + "Common/DeleteCategory",
                type: 'POST',
                data: {
                    formData: formData
                },
                dataType: 'json',
                success: function(data) {
                    if(data.status){
                        toastr['error']("Data have been deleted successfully.","Deleted");
                    }
                    else{
                        toastr['error']("Data have been deleted successfully.","Deleted");
                    }
                    $('#deleteModal').modal('hide');
                    $("#CategoryGrid").data("kendoGrid").dataSource.read();
                    $('#CategoryForm').clearForm();
    $('#SaveCategory').text('Save');

                    $('#CategoriesTable').bootstrapTable('refresh');

                },
                error: function(){                      
                    alert(this.url);
                }
    });
});

$('#SaveCategory').click(function(e) {
    $("#CategoryForm").submit();
});

$.fn.clearForm = function() {
  return this.each(function() {
    var type = this.type, tag = this.tagName.toLowerCase();
    if (tag == 'form')
      return $(':input',this).clearForm();
    if (type == 'text' || type == 'number' || type == 'email' || type == 'password' || tag == 'textarea')
      this.value = '';
    else if (type == 'checkbox' || type == 'radio')
      this.checked = false;
    else if (tag == 'select')
      this.selectedIndex = 0;
  });
};

/*$('body').on('change', 'select.searchType', function() {
    $('#DealersTable').bootstrapTable('refresh');
});*/

/*function Messages(notification) {
    if(typeof notification !== 'undefined')
    {
        toastr[notification.type](notification.body,notification.title);
    }
}*/



