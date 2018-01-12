var app = app || {};

(function ($, plugin) {
	'use strict';
	var sumOrToken = "";
    // ie
    if ( !!navigator.userAgent.match(/MSIE/i) || !!navigator.userAgent.match(/Trident.*rv:11\./) ){
      $('body').addClass('ie');
    }

    // iOs, Android, Blackberry, Opera Mini, and Windows mobile devices
    var ua = window['navigator']['userAgent'] || window['navigator']['vendor'] || window['opera'];
    if( (/iPhone|iPod|iPad|Silk|Android|BlackBerry|Opera Mini|IEMobile/).test(ua) ){
        $('body').addClass('touch');
    }

    // fix z-index on ios safari
    if( (/iPhone|iPod|iPad/).test(ua) ){
      $(document, '.modal, .aside').on('shown.bs.modal', function(e) {
        var backDrop = $('.modal-backdrop');
        $(e.target).after($(backDrop));
      });
    }

    //resize
    $(window).on('resize', function () {
      var $w = $(window).width()
          ,$lg = 1200
          ,$md = 991
          ,$sm = 768
          ;
      if($w > $lg){
        $('.aside-lg').modal('hide');
      }
      if($w > $md){
        $('#aside').modal('hide');
        $('.aside-md, .aside-sm').modal('hide');
      }
      if($w > $sm){
        $('.aside-sm').modal('hide');
      }
    });

    app.init = function () {

      $('[data-toggle="popover"]').popover();
      $('[data-toggle="tooltip"]').tooltip();

      // init the plugin
      $('body').find('[data-plugin]').plugin();

			$('.ui-image-radio .radio-box').click(function(){
				$(this).parent().find('.radio-box').removeClass('selected');
				$(this).addClass('selected');
				var val = $(this).attr('data-value');
				$('.label_curency_text').text(val);
				$("input[name='curency_quality']").val("");
				$("input[name='token_quality']").val("");
				$(".token_buy").text("0");
				$(".currency_buy").text("0");
				$(".token_bonus").text("0");
				$(".total_token").text("0");
				$("input", this).prop('checked', true);
			});
			$("#OnChange1").on('input', function () {
				sumOrToken = "sum";
				$("input[name='token_quality']").val("");
				app.delay_method("Check1", function () { app.calculate(); }, 250);
			});
			$("#OnChange2").on('input', function () {
				sumOrToken = "token";
				$("input[name='curency_quality']").val("");
				app.delay_method("Check2", function () { app.calculate(); }, 250);
			});

    },
		app.delay_method = function (label, callback, time) {
			if (typeof window.delayed_methods == "undefined") { window.delayed_methods = {}; }
			delayed_methods[label] = Date.now();
			var t = delayed_methods[label];
			setTimeout(function () { if (delayed_methods[label] != t) { return; } else { callback(); } }, time || 500);
		},
		app.calculate = function () {
		var data = $("#refresh").serializeArray();
			$.ajax({
					type: "POST",
					url: "/token/calc",
					data: data,
					success: app.successFunc,
					error: app.errorFunc
			});
		},
		app.successFunc = function(data2, status) {
		if (sumOrToken == "sum") {
				if (data2.curency_quality == $("input[name='curency_quality']").val()) {
						$("input[name='curency_quality']").val(data2.curency_quality);
						$("input[name='token_quality']").val(data2.token_quality);
						$(".token_buy").text(app.number_format(data2.token_quality,0));
						$(".currency_buy").text(app.number_format(data2.curency_quality,6));
						$(".token_bonus").text(app.number_format(data2.token_bonus,0));
						$(".total_token").text(app.number_format(data2.total_token,0));
				}
				} else if (sumOrToken == "token") {
						if (data2.token_quality == $("input[name='token_quality']").val()) {
								$("input[name='curency_quality']").val(data2.curency_quality);
								$("input[name='token_quality']").val(data2.token_quality);
								$(".token_buy").text((data2.token_quality));
								$(".currency_buy").text(data2.curency_quality);
								$(".token_bonus").text(data2.token_bonus);
								$(".total_token").text(data2.total_token);
						}
				}
		},
		app.errorFunc = function() {
			console.log("failure");
			alert('There was an error');
		};
		app.number_format = function( number, decimals, dec_point, thousands_sep ) {
	    // http://kevin.vanzonneveld.net
	    // + original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
	    // + improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
	    // + bugfix by: Michael White (http://crestidg.com)
	    // + bugfix by: Benjamin Lupton
	    // + bugfix by: Allan Jensen (http://www.winternet.no)
	    // + revised by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
	    // * example 1: number_format(1234.5678, 2, '.', '');
	    // * returns 1: 1234.57

	    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
	    var d = dec_point == undefined ? "." : dec_point;
	    var t = thousands_sep == undefined ? "," : thousands_sep, s = n < 0 ? "-" : "";
	    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;

	    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
		}
   	app.init();

   	$(document).on('pjaxEnd', function(){
   		app.init();
   	});

})(jQuery, app);
