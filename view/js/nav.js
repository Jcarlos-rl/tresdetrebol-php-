$(document).ready(function(){

	$("#banner").css({"height":$(window).height() + "px"});

	var flag = false;
	var scroll;

	$(window).scroll(function(){
		scroll = $(window).scrollTop();

		if(scroll > 80){
			if(!flag){
				$("#logo").css({"margin-top": "0px", "width": "55px","height":"55px"});

				$("header").css({"background-color": "#000000"});

				$(".menu").css({"display": "block"});

				$(".slogan").css({"display": "none"});

				flag = true;
			}
		}else{
			if(flag){
				$("#logo").css({"margin-top": "50px", "width": "130px","height":"130px"});

				$("header").css({"background-color": "transparent"});

				$(".menu").css({"display": "none"});

				$(".slogan").css({"display": "block"});

				flag = false;
			}
		}


	});

});