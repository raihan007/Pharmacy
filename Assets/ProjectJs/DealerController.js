function detailFormatter(index, row) {
    var html = [];
    $.each(row, function (key, value) {
        html.push('<p><b>' + key + ':</b> ' + value + '</p>');
    });
    return html.join('');
}

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
            $('#DealersTable').bootstrapTable('refresh');
        });
    });

$('#DealersTable').bootstrapTable({
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
    $('#DealersTable').bootstrapTable('refresh', {url: baseurl + 'Dealers/DealersInfo_json',params:'queryParams'});
});

$(function () {
    customTollbar();
});

function customTollbar(){
    $('.search').find('div.customTollbar').first().remove();
    $(".search").addClass('form-inline');
    $(".search").prepend('<div class="customTollbar form-group"><label class="control-label"></label><select class="form-control searchType" name="searchType" id="searchType"><option value="0">Search Type</option><option value="EntityNo">Entity No</option><option value="DealerTitle">Title</option></select></div>');
}


function operateFormatter(value, row, index) {
    return [
        '<a class="details" href="#DealerForm" title="Details">',
        '<i class="fa fa-user" aria-hidden="true"></i>',
        '</a>  ',
        '<a class="edit" href="#DealerForm" title="Edit">',
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
        $('#DealerTitle').val(row.DealerTitle);
        $('#DealerAddress').val(row.DealerAddress);
        $('#DealerCity').val(row.City);
        $('#DealerCountry').val(row.Country);
        $('#DealerPhone').val(row.Phone);
        $('#DealerEmail').val(row.Email);
        $('#DealerFax').val(row.Fax);
        $('#DealerRemarks').val(row.Remarks);
    },
    'click .remove': function (e, value, row, index) {
        $('#DeleteDealerForm').attr('action', baseurl+"Dealers/Delete/"+row.EntityNo);
        $('#deleteModal').modal('show');
    },
    'click .details': function (e, value, row, index) {
        $('.detailEno').text(row.EntityNo);
        $('.detailTitle').text(row.DealerTitle);
        $('.detailAddress').text(row.DealerAddress);
        $('.detailCity').text(row.City);
        $('.detailCountry').text(row.Country);
        $('.detailPhone').text(row.Phone);
        $('.detailEmail').text(row.Email);
        $('.detailFax').text(row.Fax);
        $('.detailRemarks').text(row.Remarks);

        $('#detailsModal').modal('show');
    }
};



function deleteInfo(BatchId)
{
	$('#BatchForm').attr('action', baseurl+"Batches/Delete/"+BatchId);
	$('#deleteModal').modal('show');
}

$('#newDealer').on('click', function() {
    //$('#DealerForm').attr('action', baseurl+"Dealers");
    $('#DealerForm').clearForm();
});

$('#SaveDealer').click(function(e) {
    $("#DealerForm").submit();
});

$.fn.clearForm = function() {
  return this.each(function() {
    var type = this.type, tag = this.tagName.toLowerCase();
    if (tag == 'form')
      return $(':input',this).clearForm();
    if (type == 'text' || type == 'email' || type == 'password' || tag == 'textarea')
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