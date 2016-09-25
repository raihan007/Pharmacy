$(function () {
    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
    $('.tree li.parent_li > span').on('click', function (e) {
        var children = $(this).parent('li.parent_li').find(' > ul > li');
        if (children.is(":visible")) {
            children.hide('fast');
            $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
        } else {
            children.show('fast');
            $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
        }
        e.stopPropagation();
    });
});

function permissionTableFormatter(value, row, index) {
        return [
            '<a class="text-primary permission" href="#" title="Set User Permission">',
            '<i class="fa fa-key" aria-hidden="true"></i>',
            '</a>  '
        ].join('');
}
window.permissionTableEvents = {
        'click .permission': function (e, value, row, index) {
            //alert('You click like action, row: ' + JSON.stringify(row));
            //$('#ProgramsForm').attr('action', baseurl+"Programs/Delete/"+programId);
            var userid = row.UserId;
            $('#labelUser').text(row.FullName);
            $('#PUserId').val(userid);
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
                    }
                    else{
                        $('input:checkbox').removeAttr('checked');
                    }
                },
                error: function(){                      
                    alert(this.url);
                }
            });
            $("#wait").css("display", "none");
            $('#PermissionModal').modal('show');
        }
};

function imageFormatter(photo) {
        return '<img style="height: 150px; width: 150px;" src="'+baseurl+'uploads/'+photo+'">';
    }

function SetUserPermission(){
    alert('hell');
}

$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

$("#savePermission").click(function(){
    var formData = $("#SetUserPermissionsForm").serializeObject();
    $.ajax({
        url: baseurl + "Users/SetUserPermissions",
                type: 'POST',
                data: {
                    formData: formData
                },
                dataType: 'json',
                success: function(data) {
                    if(data.Status){
                        //alert("Done");
                        sweetAlert('Congratulations!', 'Your message has been successfully sent', 'success');
                    }
                    else{
                        alert("Faild");
                    }
                },
                error: function(){                      
                    alert(this.url);
                }
            });
});


//Typeahead.js autocomplete
$('#txtinput1').typeahead({
    source: function(query, process) {
        var $url = baseurl + "Users/getFunction1";
        var $items = new Array;
        var newUsername = $('#txtinput1').val();
        $items = [""];
        $.ajax({
            url: $url,
            data: {
                term: newUsername
            },
            dataType: "json",
            type: "GET",
            success: function(data) {

                $.map(data, function(data){
                    var group;
                    group = {
                        id: data.id,
                        name: data.name,                            
                        toString: function () {
                            return JSON.stringify(this);
                            //return this.app;
                        }
                    };
                    $items.push(group);
                });

                process(data);
            }
        });
    },
    property: 'name',
    items: 10,
    minLength: 2,
    updater: function (item) { 
        $('#hiddenID').val(item.id);       
        return item.name;
    }
});;

//End Typeahead.js autocomplete





