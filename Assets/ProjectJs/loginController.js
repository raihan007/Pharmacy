$('#forgot').click(function(e) {
        // Initializing Variables With Form Element Values
        var Username = $('#Username').val();

        // To Check Empty Form Fields.
        if (Username.length == 0) {
        $('.validation').text("User Name or Email is required");
        $("#Username").focus();
        return false;
        }
        else {
            $.ajax({
                url: baseurl + "Admin/CheckEmail",
                type: 'POST',
                data: {
                    key: Username
                },
                dataType: 'json',
                success: function(data) {
                    if(data.STATUS == false){
                        $(".validation").html("This Username or Email Address has no account!");
                        $("#Username").focus();
                        return false;
                    }
                    else{
                        $("#ResetPasswordForm").submit();
                        return true;
                    }
                },
                error: function(){                      
                    alert(this.url);
                }
            });
        }
});



$('#go').click(function(e) {
    var password = $("#password").val();
    if (password.length == 0) {
        $('.validation').text("Password is required");
        $("#password").focus();
        return false;
    }
    else {
        $('#LockForm').submit();
    }
});