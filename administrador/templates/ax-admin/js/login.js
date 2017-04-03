function _ini_login() {
  var error_icon = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> ',
	  success_icon = '<i class="fa fa-check-circle" aria-hidden="true"></i> ',
	  process_icon = '<i class="fa fa-spinner fa-spin" aria-hidden="true"></i> ';

  $('#ajax_login').removeClass('alert alert-danger');
  $('#ajax_login').removeClass('alert alert-warning');
  $('#ajax_login').addClass('alert alert-warning');
  $("#ajax_login").html(process_icon  + 'Iniciando sesión, por favor espere...');
  $('#ajax_login').removeClass('hide');

  $.ajax({
	type : "POST",
	url : "api/login",
	data : $('#login_form').serialize(),
	success : function(json) {
	  var obj = jQuery.parseJSON(json);
	  if(obj.success == 1) {
		$('#ajax_login').html(success_icon + obj.message);
		$("#ajax_login").removeClass('alert alert-warning');
		$("#ajax_login").addClass('alert alert-success');
		setTimeout(function(){
		  location.reload();
		},1000);
	  } else {
		$('#ajax_login').html(error_icon  + obj.message);
		$("#ajax_login").removeClass('alert alert-warning');
		$("#ajax_login").addClass('alert alert-danger');
	  }
	},
	error : function() {
	  window.alert('#login ERORR');
	}
  });
};

if(document.getElementById('login')) {
  document.getElementById('login').onclick = function() {
	_ini_login();
  };
}

if(document.getElementById('login_form')) {
  document.getElementById('login_form').onkeypress = function(e) {
	  if (!e) e = window.event;
	  var keyCode = e.keyCode || e.which;
	  if (keyCode == '13'){
		_ini_login();

		return false;
	  }
  };
}
