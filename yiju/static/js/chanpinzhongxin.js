	let a=0;
	let you=$(".chanpin_lunbo img:last-child");
	let zuo=$(".chanpin_lunbo img:first-child");
	let all=$(".chanpin_bottom_all");
	$(you).click(function(){
		console.log("pppppp")
			a++;
			if(a>4){
				return;
			}
			console.log("pppppp")
		$(all).css({"marginLeft":-1200*a,"transition":"all 0.3s linear"});
		$(".chanpin_lunbo1").css({"background": "#E5E5E5","color": "#184F6B"})
		.eq(a).css({"background": "#184f6b","color": "#fff"});
	})
	$(zuo).click(function(){
			a--;
			if(a==-1){
				a=0;
				return;
			}
		$(all).css({"marginLeft":-991*a,"transition":"all 0.3s linear"});
		$(".chanpin_lunbo1").css({"background": "#E5E5E5","color": "#184F6B"})
		.eq(a).css({"background": "#184f6b","color": "#fff"})
	})

	$(".chanpin_lunbo1").click(function(){
		let inde=$(".chanpin_lunbo1").index(this);
		$(all).css({"marginLeft":-991*inde,"transition":"all 0.3s linear"});
		$(".chanpin_lunbo1").css({"background": "#E5E5E5","color": "#184F6B"})
		.eq(inde).css({"background": "#184f6b","color": "#fff"});
		a=inde;
	})
