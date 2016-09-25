$('#ProgramId').multiselect({
    columns: 1,
    placeholder: '-- Select Program --',
    search: true,
    selectAll: true
});

$('#LectureDays').multiselect({
    columns: 1,
    placeholder: '-- Select Lecture Days --',
    search: true
});

$("div.ms-options-wrap button:first-child" ).addClass ( "form-control input-sm" );
$('.ms-options').addClass('form-control input-sm');

$(function () {
    $('#StartTime').datetimepicker({
        format: 'LT'
    });
});

$(function () {
    $('#EndTime').datetimepicker({
        format: 'LT'
    });
});






$('.editBatch').on('click', function() {
    var rowData = $(this).parent().siblings().map(function() {
        return $(this).text();
    }).get();

    updateData(rowData);
});


$('.detailBatch').on('click', function() {
    var rowData = $(this).parent().siblings().map(function() {
        return $(this).text();
    }).get();

    detailsData(rowData);
});


function updateData(rowData) {
    $("#BatchId").val($.trim(rowData[1]));
    $("#BatchName").val($.trim(rowData[2]));
    
    $("#Shift option[value='" + rowData[3] + "']").attr('selected', 'selected');
    $("#ProgramId option:contains(" + rowData[4] + ")").attr('selected', 'selected');

    $('#NewBatchForm').attr('action', baseurl+"Batches/Update/"+rowData[1]);
};

function detailsData(rowData) {
    $(".detailPId").html($.trim(rowData[1]));
    $(".detailPName").html($.trim(rowData[2]));
    $(".detailSupervisor").html($.trim(rowData[3]));
    $('.detailOdate').html($.trim(rowData[4]));

    $('#detailsModal').modal('show');
};

function Refreash(){
    window.location.assign(baseurl+"Batches/AllBatches");
};


function ResetForm(){
    $('.NewCoursForm').clearForm();
};

function resetError(){
    $('.errorBatchName').text("");
    $('.errorShift').text("");
    $('.errorProgramId').text("");
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


$('#Save').click(function(e) {
        // Initializing Variables With Form Element Values
        var BatchName = $('#BatchName').val();
        var Shift = $('#Shift').val();
        var ProgramId = $('#ProgramId').val();

        // To Check Empty Form Fields.
        if (BatchName.length == 0) {
        $('.errorBatchName').text("Batch Name is required"); // This Segment Displays The Validation Rule For All Fields
        $("#BatchName").focus();
        return false;
        }
        // Validating Username Field.
        else if (Shift == 0) {
        $('.errorShift').text("Please select Shift"); // This Segment Displays The Validation Rule For All Fields
        $("#Shift").focus();
        return false;
        }
        // Validating Username Field.
        else if (ProgramId == 0) {
        $('.errorProgramId').text("Please select Program"); // This Segment Displays The Validation Rule For All Fields
        $("#ProgramId").focus();
        return false;
        }
        else {
            $("#NewBatchForm").submit();
            return true;
        }
});

$("#BatchName").change(function (){
    var BatchName = $("#BatchName").val();
    $.ajax({
        url: baseurl + "Batches/CheckBatchName",
        type: 'POST',
        data: {
            BatchName: BatchName
        },
        dataType: 'json',
        success: function(data) {
            if(data.STATUS == true){
                $('.errorBatchName').text("Batch Name is already exists"); // This Segment Displays The Validation Rule For All Fields
                $("#BatchName").focus();
            }
            else{
                $('.errorBatchName').text("");
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