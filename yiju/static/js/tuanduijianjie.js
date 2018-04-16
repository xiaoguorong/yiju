$(".lunbo1").click(function(){
	let index=$(".lunbo1").index(this);
	$(".team_bottom3").animate({"marginLeft":-1200*index},500);
	$(".lunbo1").css({"background": "#E5E5E5","color": "#184F6B"})
	.eq(index).css({"background": "#184f6b","color": "#fff"});
})
