$('#users').click(function(){

    var error_icon = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> ',
        success_icon = '<i class="fa fa-check-circle" aria-hidden="true"></i> ',
        process_icon = '<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> ';
    var url  = './avatar';
    var image_file = $('#avatar').get(0).files[0];    

    $('#ajax_users').removeClass('alert alert-danger');
    $('#ajax_users').removeClass('alert alert-warning');
    $('#ajax_users').addClass('alert alert-warning');
    $("#ajax_users").html(process_icon  + 'Procesando por favor espere...');
    $('#ajax_users').removeClass('hide');

    var formData = new FormData();
    formData.append("avatar", image_file);    
    
    $.ajax({
        type : "POST",
        url : "api/users/crear",
        data : $('#users_form').serialize(),
        success : function(json) {
            var obj = jQuery.parseJSON(json);
            if(obj.success == 1) {
                $('#ajax_users').html(success_icon + obj.message);
                $("#ajax_users").removeClass('alert alert-warning');
                $("#ajax_users").addClass('alert alert-success');
                setTimeout(function(){
                    location.reload();
                },1000);
            } else {
                $('#ajax_users').html(error_icon  + obj.message);
                $("#ajax_users").removeClass('alert alert-warning');
                $("#ajax_users").addClass('alert alert-danger');
            }
        },
        error : function() {
            window.alert('#users ERORR');
        }
    });
});
