$(document).ready(function(){
	$("#demo").intlTelInput({
		formatOnDisplay: true,
		initialCountry: "IN",
		nationalMode: false,
		placeholderNumberType: "MOBILE",
		preferredCountries: [ "in", "us" ],
	});
    var b = true;
	$(window).scroll(function () {
		var wScroll = $(this).scrollTop();

        var h = $('.section-7').position().top;
        var a = $('.banner').height();
		if(h-(a/2) < wScroll){
            if(b){
                b = false;
                $('.timer1').countTo({
                    from: 0,
                    to: 11000,
                    speed: 5000
                });
                $('.timer2').countTo({
                    from: 0,
                    to: 1000,
                    speed: 5000
                });
                $('.timer3').countTo({
                    from: 0,
                    to: 500,
                    speed: 5000
                });
                $('.timer4').countTo({
                    from: 0,
                    to: 200,
                    speed: 5000
                });
            }
        }
	});
	$('[data-toggle="tooltip"]').tooltip();
	// $('.customer-logos').slick({
	// 	slidesToShow: 4,
	// 	slidesToScroll: 1,
	// 	autoplay: true,
	// 	autoplaySpeed: 1000,
	// 	arrows: false,
	// 	dots: false,
	// 	pauseOnHover: false,
	// 	responsive: [{
	// 		breakpoint: 768,
	// 		settings: {
	// 			slidesToShow: 3
	// 		}
	// 	}, {
	// 		breakpoint: 520,
	// 		settings: {
	// 			slidesToShow: 2
	// 		}
	// 	}]
	// });
	function bs_input_file() {
		$(".input-file").before(
			function() {
				if ( ! $(this).prev().hasClass('input-ghost') ) {
					var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
					element.attr("name",$(this).attr("name"));
					element.change(function(){
						element.next(element).find('input').val((element.val()).split('\\').pop());
					});
					$(this).find("button.btn-choose").click(function(){
						element.click();
					});
					$(this).find("button.btn-reset").click(function(){
						element.val(null);
						$(this).parents(".input-file").find('input').val('');
					});
					$(this).find('input').css("cursor","pointer");
					$(this).find('input').mousedown(function() {
						$(this).parents('.input-file').prev().click();
						return false;
					});
					return element;
				}
			}
			);
	}
	$(function() {
		bs_input_file();
	});
	jQuery(document).ready(function($) {
		$(".clickable-row").click(function() {
			window.location = $(this).data("href");
		});
	});
	$("#btn_submit").click(function(e) {
		e.preventDefault();
        var form = $('#frm_q');
		var formdata = new FormData(form[0]);
		$.ajax({
            url: "/exam/question/save/answer",
            type: "POST",
            dataType: "html",
            contentType: false,
            processData: false,
            data: formdata,
            success: function (data) {
            	window.location.replace('/exam/submit');
            }
        });
	});
	$("#btn_next").click(function(e) {
		e.preventDefault();
		var answer = $("input[name=answer]:checked").val();
		var num = parseInt($("#num").html());
		var token = $('input[name=_token]').val();
        var form = $('#frm_q');
		var formdata = new FormData(form[0]);
		$.ajax({
            url: "/exam/question/save/answer",
            type: "POST",
            dataType: "html",
            contentType: false,
            processData: false,
            data: formdata,
            success: function (data) {
            	window.location.replace('/exam/question/'+(num+1));
            }
        });
	});
	$("#btn_prev").click(function(e) {
		e.preventDefault();
		var answer = $("input[name=answer]:checked").val();
		var num = parseInt($("#num").html());
		var token = $('input[name=_token]').val();
        var form = $('#frm_q');
		var formdata = new FormData(form[0]);
		$.ajax({
            url: "/exam/question/save/answer",
            type: "POST",
            dataType: "html",
            contentType: false,
            processData: false,
            data: formdata,
            success: function (data) {
            	window.location.replace('/exam/question/'+(num-1));
            }
        });
	});
	$(".btn-jump").click(function(e) {
		var answer = $("input[name=answer]:checked").val();
		var num = parseInt($("#num").html());
		var token = $('input[name=_token]').val();
        var form = $('#frm_q');
		var formdata = new FormData(form[0]);
		var jump = $(this).data("jump");
		alert(jump);
		$.ajax({
            url: "/exam/question/save/answer",
            type: "POST",
            dataType: "html",
            contentType: false,
            processData: false,
            data: formdata,
            success: function (data) {
            	window.location.replace('/exam/question/'+(jump));
            }
        });
	});
});
