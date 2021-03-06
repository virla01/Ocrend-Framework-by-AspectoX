/// BOTONES EN USUARIOS

/* Boton borrar seleccionados
--------------------------------------------------------------------*/

$('#borrarall').click(function(){

  var error_icon = '<span class="fa fa-exclamation-circle" aria-hidden="true"></span> ',
	  success_icon = '<span class="fa fa-check" aria-hidden="true"></span> ',
	  process_icon = '<span class="fa fa-spinner fa-spin" aria-hidden="true"></span> ';

  $('#ajax_alerta').removeClass('alert alert-danger');
  $('#ajax_alerta').removeClass('alert alert-warning');
  $('#ajax_alerta').addClass('alert alert-warning');
  $("#ajax_alerta").html(process_icon  + 'Borrando...');
  $('#ajax_alerta').removeClass('hide');

  $.ajax({
	type : "POST",
	url : "api/deleteUser",
	data : $('#formid').serialize(),

	success : function(json) {
	  var obj = jQuery.parseJSON(json);
	  if(obj.success == 1) {
		$('#ajax_alerta').html(success_icon + obj.message);
		$("#ajax_alerta").removeClass('alert alert-warning');
		$("#ajax_alerta").addClass('alert alert-success');
		setTimeout(function(){
		  location.reload();
		},1000);
	  } else {
		$('#ajax_alerta').html(error_icon  + obj.message);
		$("#ajax_alerta").removeClass('alert alert-warning');
		$("#ajax_alerta").addClass('alert alert-danger');
	  }
	},
	error : function() {
	  window.alert('#user ERORR');
	}
  });
});


/* Boton desactiva seleccionados
--------------------------------------------------------------------*/

$('#desactivarall').click(function(){

  var error_icon = '<span class="fa fa-exclamation-circle" aria-hidden="true"></span> ',
	  success_icon = '<span class="fa fa-check" aria-hidden="true"></span> ',
	  process_icon = '<span class="fa fa-spinner fa-spin" aria-hidden="true"></span> ';

  $('#ajax_alerta').removeClass('alert alert-danger');
  $('#ajax_alerta').removeClass('alert alert-warning');
  $('#ajax_alerta').addClass('alert alert-warning');
  $("#ajax_alerta").html(process_icon  + 'Desactivando...');
  $('#ajax_alerta').removeClass('hide');

  $.ajax({
	type : "POST",
	url : "api/desactivaUser",
	data : $('#formid').serialize(),

	success : function(json) {
	  var obj = jQuery.parseJSON(json);
	  if(obj.success == 1) {
		$('#ajax_alerta').html(success_icon + obj.message);
		$("#ajax_alerta").removeClass('alert alert-warning');
		$("#ajax_alerta").addClass('alert alert-success');
		setTimeout(function(){
		  location.reload();
		},1000);
	  } else {
		$('#ajax_alerta').html(error_icon  + obj.message);
		$("#ajax_alerta").removeClass('alert alert-warning');
		$("#ajax_alerta").addClass('alert alert-danger');
	  }
	},
	error : function() {
	  window.alert('#user ERORR');
	}
  });
});

/* Boton desactiva seleccionados
--------------------------------------------------------------------*/

$('#activarall').click(function(){

  var error_icon = '<span class="fa fa-exclamation-circle" aria-hidden="true"></span> ',
	  success_icon = '<span class="fa fa-check" aria-hidden="true"></span> ',
	  process_icon = '<span class="fa fa-spinner fa-spin" aria-hidden="true"></span> ';

  $('#ajax_alerta').removeClass('alert alert-danger');
  $('#ajax_alerta').removeClass('alert alert-warning');
  $('#ajax_alerta').addClass('alert alert-warning');
  $("#ajax_alerta").html(process_icon  + 'Activando...');
  $('#ajax_alerta').removeClass('hide');

  $.ajax({
	type : "POST",
	url : "api/activaUser",
	data : $('#formid').serialize(),

	success : function(json) {
	  var obj = jQuery.parseJSON(json);
	  if(obj.success == 1) {
		$('#ajax_alerta').html(success_icon + obj.message);
		$("#ajax_alerta").removeClass('alert alert-warning');
		$("#ajax_alerta").addClass('alert alert-success');
		setTimeout(function(){
		  location.reload();
		},1000);
	  } else {
		$('#ajax_alerta').html(error_icon  + obj.message);
		$("#ajax_alerta").removeClass('alert alert-warning');
		$("#ajax_alerta").addClass('alert alert-danger');
	  }
	},
	error : function() {
	  window.alert('#user ERORR');
	}
  });
});


/// BOTONES EN MENUS
/* Boton borrar seleccionados
--------------------------------------------------------------------*/

$('#borrarMen').click(function(){

  var error_icon = '<span class="fa fa-exclamation-circle" aria-hidden="true"></span> ',
	  success_icon = '<span class="fa fa-check" aria-hidden="true"></span> ',
	  process_icon = '<span class="fa fa-spinner fa-spin" aria-hidden="true"></span> ';

  $('#ajax_alerta').removeClass('alert alert-danger');
  $('#ajax_alerta').removeClass('alert alert-warning');
  $('#ajax_alerta').addClass('alert alert-warning');
  $("#ajax_alerta").html(process_icon  + 'Borrando...');
  $('#ajax_alerta').removeClass('hide');

  $.ajax({
	type : "POST",
	url : "api/deleteMen",
	data : $('#formid').serialize(),

	success : function(json) {
	  var obj = jQuery.parseJSON(json);
	  if(obj.success == 1) {
		$('#ajax_alerta').html(success_icon + obj.message);
		$("#ajax_alerta").removeClass('alert alert-warning');
		$("#ajax_alerta").addClass('alert alert-success');
		setTimeout(function(){
		  location.reload();
		},1000);
	  } else {
		$('#ajax_alerta').html(error_icon  + obj.message);
		$("#ajax_alerta").removeClass('alert alert-warning');
		$("#ajax_alerta").addClass('alert alert-danger');
	  }
	},
	error : function() {
	  window.alert('#Menu ERORR');
	}
  });
});


/* Boton desactiva seleccionados
--------------------------------------------------------------------*/

$('#desactivarMen').click(function(){

  var error_icon = '<span class="fa fa-exclamation-circle" aria-hidden="true"></span> ',
	  success_icon = '<span class="fa fa-check" aria-hidden="true"></span> ',
	  process_icon = '<span class="fa fa-spinner fa-spin" aria-hidden="true"></span> ';

  $('#ajax_alerta').removeClass('alert alert-danger');
  $('#ajax_alerta').removeClass('alert alert-warning');
  $('#ajax_alerta').addClass('alert alert-warning');
  $("#ajax_alerta").html(process_icon  + 'Desactivando...');
  $('#ajax_alerta').removeClass('hide');

  $.ajax({
	type : "POST",
	url : "api/desactivaMen",
	data : $('#formid').serialize(),

	success : function(json) {
	  var obj = jQuery.parseJSON(json);
	  if(obj.success == 1) {
		$('#ajax_alerta').html(success_icon + obj.message);
		$("#ajax_alerta").removeClass('alert alert-warning');
		$("#ajax_alerta").addClass('alert alert-success');
		setTimeout(function(){
		  location.reload();
		},1000);
	  } else {
		$('#ajax_alerta').html(error_icon  + obj.message);
		$("#ajax_alerta").removeClass('alert alert-warning');
		$("#ajax_alerta").addClass('alert alert-danger');
	  }
	},
	error : function() {
	  window.alert('#Menu ERORR');
	}
  });
});

/* Boton desactiva seleccionados
--------------------------------------------------------------------*/

$('#activarMen').click(function(){

  var error_icon = '<span class="fa fa-exclamation-circle" aria-hidden="true"></span> ',
	  success_icon = '<span class="fa fa-check" aria-hidden="true"></span> ',
	  process_icon = '<span class="fa fa-spinner fa-spin" aria-hidden="true"></span> ';

  $('#ajax_alerta').removeClass('alert alert-danger');
  $('#ajax_alerta').removeClass('alert alert-warning');
  $('#ajax_alerta').addClass('alert alert-warning');
  $("#ajax_alerta").html(process_icon  + 'Activando...');
  $('#ajax_alerta').removeClass('hide');

  $.ajax({
	type : "POST",
	url : "api/activaMen",
	data : $('#formid').serialize(),

	success : function(json) {
	  var obj = jQuery.parseJSON(json);
	  if(obj.success == 1) {
		$('#ajax_alerta').html(success_icon + obj.message);
		$("#ajax_alerta").removeClass('alert alert-warning');
		$("#ajax_alerta").addClass('alert alert-success');
		setTimeout(function(){
		  location.reload();
		},1000);
	  } else {
		$('#ajax_alerta').html(error_icon  + obj.message);
		$("#ajax_alerta").removeClass('alert alert-warning');
		$("#ajax_alerta").addClass('alert alert-danger');
	  }
	},
	error : function() {
	  window.alert('#Menu ERORR');
	}
  });
});

/// BOTONES EN MENUS
