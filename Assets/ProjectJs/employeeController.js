$(function () {
    $('.datepicker').datetimepicker({
        format: 'YYYY-MM-DD'
    });
});


$("#Email").change(function (){
    var email = $("#Email").val();
    $.ajax({
	    url: baseurl + "Admin/CheckEmail",
	    type: 'POST',
	    data: {
	        email: email
	    },
	    dataType: 'json',
	    success: function(data) {
	    	if(data.STATUS == true){
	    		$(".emailError").html("This Email Address already exists!");
	    	}
	    	else{
	    		$(".emailError").html("");
	    	}
	    },
	    error: function(){						
			alert(this.url);
		}
    });
});


function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#Photo')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }