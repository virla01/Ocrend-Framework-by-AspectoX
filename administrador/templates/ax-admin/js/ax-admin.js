/* BOTONES PANEL
----------------------------------------------------*/

jQuery(document).ready(function ($) {
	var contador = 1;

	$(".collapse-link").on("click", function () {
		var e = $(this).closest(".panel"),
			t = $(this).find("i"),
			n = e.find(".panel-body");
		e.attr("style") ? n.slideToggle(200, function () {
			e.removeAttr("style")
		}) : (n.slideToggle(200), e.css("height", "auto")), t.toggleClass("fa-chevron-up fa-chevron-down")
	});

	$(".close-link").on("click", function () {
		var e = $(this).closest(".panel");
		e.remove()
	});

	/* Menu
	--------------------------------------*/
	var nav = document.getElementById('sidebar');
	var contenedor = document.getElementById('contenido-pagina');
	var menu = document.getElementById('menu');
	menu.addEventListener('click', function () {
		'use strict';
		nav.classList.toggle('toggle-x');
		contenedor.classList.toggle('toggle-contenido');
	});

	var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}

	var accordion = new Accordion($('#accordion'), false);
});

$(function() {

});
