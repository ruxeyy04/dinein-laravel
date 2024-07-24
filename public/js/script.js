/* Profile Category*/
$(document).ready(function () {
	$("#profile").show();
	$("#cpassword").hide();
	$("#purchased").hide();
	$("#treserve").hide();

	$("#cprofile").click(function () {
		$("#ccpassword, #cpurchased, #ctreserve").removeClass("active");
		$(this).addClass("active");
		$("#profile").show();
		$("#cpassword").hide();
		$("#purchased").hide();
		$("#treserve").hide();
	});

	$("#ccpassword").click(function () {
		$("#cprofile, #cpurchased, #ctreserve").removeClass("active");
		$(this).addClass("active");
		$("#profile").hide();
		$("#cpassword").show();
		$("#purchased").hide();
		$("#treserve").hide();
	});

	$("#cpurchased").click(function () {
		$("#cprofile, #ccpassword, #ctreserve").removeClass("active");
		$(this).addClass("active");
		$("#profile").hide();
		$("#cpassword").hide();
		$("#purchased").show();
		$("#treserve").hide();
	});

	$("#ctreserve").click(function () {
		$("#cprofile, #ccpassword, #cpurchased").removeClass("active");
		$(this).addClass("active");
		$("#profile").hide();
		$("#cpassword").hide();
		$("#purchased").hide();
		$("#treserve").show();
	});
});

$("#first").change(function () {
	if ($(".first").hasClass("d-none")) {
		$(".first").removeClass("d-none");
	} else {
		$(".first").addClass("d-none");
	}
});
$("#second").change(function () {
	if ($(".second").hasClass("d-none")) {
		$(".second").removeClass("d-none");
	} else {
		$(".second").addClass("d-none");
	}
});

jQuery(function ($) {
	$(".sidebar-dropdown > a").click(function () {
		$(".sidebar-submenu").slideUp(200);
		if ($(this).parent().hasClass("active")) {
			$(".sidebar-dropdown").removeClass("active");
			$(this).parent().removeClass("active");
		} else {
			$(".sidebar-dropdown").removeClass("active");
			$(this).next(".sidebar-submenu").slideDown(200);
			$(this).parent().addClass("active");
		}
	});

	$("#close-sidebar").click(function () {
		$(".page-wrapper").removeClass("toggled");
	});
	$("#show-sidebar").click(function () {
		$(".page-wrapper").addClass("toggled");
	});
});
	