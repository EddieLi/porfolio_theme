$(function(){

	var controller = $.superscrollorama({
			triggerAtCenter: false,
			playoutAnimations: true
		});
	
	desktopStyleChange(controller);




})

function desktopStyleChange(controller){
	var topVal = 100;
	var titleTopval = 300;

	//full browser image
	$("#banner").css('height', $(window).height()-100)
	$("#banner-back").css('height', $("#banner").height()-200)

	//only do this animation when screen size is bigger than 765 
	if($(window).width() > 765){
		//animate search input
		$("#navbar-search-form").hover(function(){
			$(this).animate({
				width: '300px'
			})
		}, function(){
				$(this).animate({
					width: "170px"
				})
		})


	}else{
		topVal = 50;
		titleTopval = 150;
	}

	//parallax responsive design
	controller.addTween(
	  '.body',
	  (new TimelineLite())
	    .append([
	      TweenMax.fromTo($('#banner'), 1, 
	        {css:{top: topVal}, immediateRender:true}, 
	        {css:{top: -300}}),
	    ]),
	  1000 // scroll duration of tween
	);

	//parallax responsive design
	controller.addTween(
	  '.body',
	  (new TimelineLite())
	    .append([
	      TweenMax.fromTo($('#banner-title'), 1, 
	        {css:{top: titleTopval}, immediateRender:true}, 
	        {css:{top: -900}}),
	    ]),
	  1000 // scroll duration of tween
	);


	if($("#wpadminbar").css("height")){
		//add extra margin on the top afer user login
		$(".navbar-fixed-top").css("top", "30px");
	}
}

