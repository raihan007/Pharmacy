function test(action)
{
	var activeId = $("#lg-menu li").find("a.active").attr('id');
	if(action == 'employee')
	{
		$("#" + activeId).removeClass("active");
		$("#employee").addClass("active");
		$("#dashboard").prepend('<div class="row"><div class="col-md-6"><div class="panel panel-primary"><div class="panel-heading smallPanel"><span class="pull-right removable" data-effect="remove"><i class="glyphicon glyphicon-remove"></i></span><span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span><h3 class="panel-title">Panel 1</h3></div><div class="panel-collapse collapse in"><div class="panel-body">Panel content</div></div></div></div></div>');
	}
}

function addDept()
{
	$("#addPanel").prepend('<div class="panel panel-primary"><div class="panel-heading smallPanel"><span class="pull-right removable" data-effect="remove"><i class="glyphicon glyphicon-remove"></i></span><span class="pull-right clickable"><i class="glyphicon glyphicon-chevron-up"></i></span><h3 class="panel-title">Panel 1</h3></div><div class="panel-collapse collapse in"><div class="panel-body">Panel content</div></div></div>');
}

$("td button.editDeptInfo").click(function() {
    var rowData = $(this).parent().siblings().map(function() {
        return $(this).text();
    }).get();

    alert("Your data is: " + $.trim(rowData[0]) + " , " + $.trim(rowData[1]) + " , " + $.trim(rowData[2]));
});


function add_Dept()
{
	var dataString = $("#addDeptForm").serializeArray();
	alert(dataString[0]='dept_id');
}

