function deleteInfo(programId)
{
	$('#ProgramsForm').attr('action', baseurl+"Programs/Delete/"+programId);
	$('#deleteModal').modal('show');
}

$('.editProgram').on('click', function() {
    var rowData = $(this).parent().siblings().map(function() {
        return $(this).text();
    }).get();

    updateData(rowData);
});


$('.detailsProgram').on('click', function() {
    var rowData = $(this).parent().siblings().map(function() {
        return $(this).text();
    }).get();

    detailsData(rowData);
});


function updateData(rowData) {
    $("#ProgramId").val($.trim(rowData[1]));
    $("#ProgramName").val($.trim(rowData[2]));
    
    $("#Supervisor option[value='" + rowData[3] + "']").attr('selected', 'selected'); // added single quotes
    //$("#Supervisor").find("option[text=" + rowData[3] + "]").attr("selected", "selected");
    $('#OpenDate').val($.trim(rowData[4]));
    $("#EndDate").val($.trim(rowData[5]));
    $("#Year").val($.trim(rowData[6]));

    $('#NewProgramForm').attr('action', baseurl+"Programs/Update/"+rowData[1]);
};

function detailsData(rowData) {
    $(".detailPId").html($.trim(rowData[1]));
    $(".detailPName").html($.trim(rowData[2]));
    $(".detailSupervisor").html($.trim(rowData[3]));
    $('.detailOdate').html($.trim(rowData[4]));
    $(".detailEDate").html($.trim(rowData[5]));
    $(".detailYear").html($.trim(rowData[6]));

    $('#detailsModal').modal('show');
};

function Refreash(){
    window.location.assign(baseurl+"Programs/AllPrograms");
};


function addNewProgram(){
    $('#NewProgramForm').attr('action', baseurl+"Programs/AddProgram");
    $('.NewProgramForm').clearForm();
    resetError();
};

function resetError(){
    $('.errorProgramName').text("");
    $('.errorSupervisor').text("");
    $('.errorOpenDate').text("");
    $('.errorEndDate').text("");
    $('.errorYear').text("");
}

$.fn.clearForm = function() {
  return this.each(function() {
    var type = this.type, tag = this.tagName.toLowerCase();
    if (tag == 'form')
      return $(':input',this).clearForm();
    if (type == 'text' || type == 'password' || tag == 'textarea')
      this.value = '';
    else if (type == 'checkbox' || type == 'radio')
      this.checked = false;
    else if (tag == 'select')
      this.selectedIndex = 0;
  });
};

$(function () {
    $('.OpenDate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
});

$(function () {
    $('.EndDate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
});

$('#Save').click(function(e) {
        // Initializing Variables With Form Element Values
        var ProgramName = $('#ProgramName').val();
        var Supervisor = $('#Supervisor').val();
        var oDate = moment($('#OpenDate').val()).format('YYYY-MM-DD');
        var OpenDate = new Date(oDate);
        var eDate = moment($('#EndDate').val()).format('YYYY-MM-DD');
        var EndDate = new Date(eDate);
        var Year = $('#Year').val();

        var year_regex = /^\d{4}$/;

        // To Check Empty Form Fields.
        if (ProgramName.length == 0) {
        $('.errorProgramName').text("Program Name is required"); // This Segment Displays The Validation Rule For All Fields
        $("#ProgramName").focus();
        return false;
        }
        // Validating Username Field.
        else if (Supervisor == 0) {
        $('.errorSupervisor').text("Please select supervisor"); // This Segment Displays The Validation Rule For All Fields
        $("#Supervisor").focus();
        return false;
        }
        // Validating Email Field.
        else if (OpenDate.length == 0) {
        $('.errorOpenDate').text("Program open date is required"); // This Segment Displays The Validation Rule For Email
        return false;
        }
        // Validating Email Field.
        else if (isNaN(OpenDate)) {
        $('.errorOpenDate').text("Please enter valid open date"); // This Segment Displays The Validation Rule For Email
        return false;
        }
        // Validating Email Field.
        else if (EndDate.length == 0) {
        $('.errorEndDate').text("Program end date is required"); // This Segment Displays The Validation Rule For Email
        return false;
        }
        // Validating Email Field.
        else if (isNaN(EndDate)) {
        $('.errorEndDate').text("Please enter valid end date"); // This Segment Displays The Validation Rule For Email
        return false;
        }
        // Validating Email Field.
        else if (Year.length == 0) {
        $('.errorYear').text("Program year is required"); // This Segment Displays The Validation Rule For Email
        return false;
        }
        // Validating Email Field.
        else if (!Year.match(year_regex)) {
        $('.errorYear').text("Please enter valid year"); // This Segment Displays The Validation Rule For Email
        return false;
        }
        else {
            $("#NewProgramForm").submit();
            return true;
        }
});

$('#OpenDate').click(function(e) {
    $('.errorOpenDate').text(""); 
});

$('#EndDate').click(function(e) {
    $('.errorEndDate').text(""); 
});

$('#Year').click(function(e) {
    $('.errorYear').text(""); 
});

$("#ProgramName").change(function (){
    var ProgramName = $("#ProgramName").val();
    $.ajax({
        url: baseurl + "Programs/CheckProgramName",
        type: 'POST',
        data: {
            ProgramName: ProgramName
        },
        dataType: 'json',
        success: function(data) {
            if(data.STATUS == true){
                $('.errorProgramName').text("Program Name is already exists"); // This Segment Displays The Validation Rule For All Fields
                $("#ProgramName").focus();
            }
            else{
                $('.errorProgramName').text("");
            }
        },
        error: function(){                      
            alert(this.url);
        }
    });
});

$('input[type="checkbox"]').on('change', function() {
   $('input[type="checkbox"]').not(this).prop('checked', false);
});