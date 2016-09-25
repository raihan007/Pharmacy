$(document).ready(function (e) {
          // Remove active for all items.
        $('.sidebar-menu li').removeClass('active');

        // highlight submenu item
        $('li a[href="' + this.location.href + '"]').parent().addClass('active');

        // Highlight parent menu item.
        $('ul a[href="' + this.location.href + '"]').parents('li').addClass('active');
      });


$('.cancel').on('click', function() {
    $('.ChangePasswordForm').clearForm();
    $('.ChangeUsernameForm').clearForm();
});

function resetError(){
    $('.errorOldUsername').text("");
    $('.errorOldPassword').text("");
    $('.errorNewUsername').text("");
    $('.errorNewPassword').text("");
    $('.errorConfirmUsername').text("");
    $('.errorConfirmPassword').text("");
}

$.fn.clearForm = function() {
    $('#oldPassword').val("");
    $('#newUsername').val("");
    $('#newPassword').val("");
    $('#confirmUsername').val("");
    $('#confirmPassword').val("");
};

$('#_ChangeUsername').click(function(e) {
        var oldUsername = $('#oldUsername').val();
        var newUsername = $('#newUsername').val();
        var confirmUsername = $('#confirmUsername').val();

        if (oldUsername.length == 0) {
        $('.errorOldUsername').text("Current username is required"); 
        $("#oldUsername").focus();
        return false;
        }
        else if (newUsername.length == 0) {
        $('.errorNewUsername').text("New username is required"); 
        $("#newUsername").focus();
        return false;
        }
        else if (confirmUsername.length == 0) {
        $('.errorConfirmUsername').text("Confirm username is required"); 
        $("#confirmUsername").focus();
        return false;
        }
        else if (confirmUsername != newUsername) {
        $('.errorConfirmUsername').text("Confirm username is not match with new username!"); 
        $("#confirmUsername").focus();
        return false;
        }
        else {
            $("#ChangeUsernameForm").submit();
            return true;
        }
});

$("#newUsername").change(function (){
    var newUsername = $('#newUsername').val();
    $.ajax({
        url: baseurl + "Admin/CheckEmail",
        type: 'POST',
        data: {
            key: newUsername
        },
        dataType: 'json',
        success: function(data) {
            if(data.STATUS == true){
                $('.errorNewUsername').text("New username is already exists"); // This Segment Displays The Validation Rule For All Fields
                $("#newUsername").focus();
            }
            else{
                $('.errorNewUsername').text("");
            }
        },
        error: function(){                      
            alert(this.url);
        }
    });
});

$(function() {
    $('.sidebar-menu a').on('click', function(){ 
        if($('.li').css('display') !='none'){
            $(".li").trigger( "click" );
        }
    });
});

var userid = '';

$('input[type=radio][name=UserId]').change(function() {
    userid = this.value;
    $("#wait").css("display", "block");

    $.ajax({
        url: baseurl + "Users/UserPermissions",
        type: 'POST',
        data: {
            userid: userid
        },
        dataType: 'json',
        success: function(data) {
            if(data.Permission){
                $('input:checkbox').removeAttr('checked');
                var result = data.Permission;
                for (var key in result)
                {
                   if (result.hasOwnProperty(key))
                   {
                        $('input[value="'+result[key].PermissionNo+'"]').prop("checked", true);
                   }
                }
                $("#wait").css("display", "none");
                $('#permissionTab').removeClass("disabled");
            }
            else{
                $('input:checkbox').removeAttr('checked');
                $("#wait").css("display", "none");
                $('#permissionTab').removeClass("disabled");
            }
        },
        error: function(){
            $("#wait").css("display", "none");                      
            alert(this.url);
        }
    });
});

$('#Users').on('click', 'tbody tr', function(event) {
    $(this).addClass('highlight').siblings().removeClass('highlight');
});

$('#button').click(function () {
    var data = $('#eventsTable').bootstrapTable('getSelections');
});

var $table = $('#eventsTable');
        $remove = $('#remove');

        $table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
            $remove.prop('disabled', !$table.bootstrapTable('getSelections').length);
        });
        $remove.click(function () {
            var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
                return row.EntityNo
            });
            $table.bootstrapTable('remove', {
                field: 'EntityNo',
                values: ids
            });
            $remove.prop('disabled', true);
        });

    /*function detailFormatter(index, row) {
        var html = [];
        $.each(row, function (key, value) {
            html.push('<p><b>' + key + ':</b> ' + value + '</p>');
        });
        return html.join('');
    }

    function operateFormatter(value, row, index) {
        return [
            '<a class="edit" href="'+baseurl+'Users/Edit/'+row.EntityNo+'" title="Like">',
            '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',
            '</a>  ',
            '<a class="remove text-danger" href="javascript:void(0)" title="Remove">',
            '<i class="glyphicon glyphicon-remove"></i>',
            '</a>'
        ].join('');
    }
    window.operateEvents = {
        'click .edit': function (e, value, row, index) {
            alert('You click like action, row: ' + JSON.stringify(row));
        },
        'click .remove': function (e, value, row, index) {
            $table.bootstrapTable('remove', {
                field: 'id',
                values: [row.id]
            });
        }
    };*/

$(function ()
{
    if(typeof notification !== 'undefined')
    {
        toastr[notification.type](notification.body,notification.title);
    }
});

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "10000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
    

