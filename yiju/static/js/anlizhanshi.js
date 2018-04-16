let anlitou=$(".wancheng_bottom1 li");
let anlibottom=$(".wancheng_bottom2");
let anli_line=$(".wancheng_bottom1_line");
$(anlitou).mouseenter(function(){
	let index=$(anlitou).index(this);
	$(anlitou).find($(anli_line)).css({"display":"none"}).eq(index).css({"display":"block","transition":"all 0.3s linear"})
	$(anlibottom).css({"display":"none"}).eq(index).css({"display":"block"}).find(".wancheng_bottom2_1").css({"transition":"all 0.3s linear"});
})

$(".wancheng_bottom2").each(function(index,ele){
	let a=0;
	let you=$(this).find(".chanpin_lunbo img:last-child");
	let zuo=$(this).find(".chanpin_lunbo img:first-child");
	let part=$(this).parent().find(".wancheng_bottom2");
	let chanpin_lunbo1=$(this).find(".chanpin_lunbo1");
	console.log(part)
	console.log(you)
	$(you).click(function(){
		console.log("pppppp")
			a++;
			if(a>4){
				return;
			}
			console.log("pppppp")
		$(".wancheng_bottom2").eq(index).find(".wancheng_bottom2_1").css({"marginLeft":-991*a,"transition":"all 0.3s linear"});
		$(".chanpin_lunbo1").css({"background": "#E5E5E5","color": "#184F6B"})
		.eq(a).css({"background": "#184f6b","color": "#fff"});
	})
	$(zuo).click(function(){
			a--;
			if(a==-1){
				a=0;
				return;
			}
		$(".wancheng_bottom2").eq(index).find(".wancheng_bottom2_1").css({"marginLeft":-991*a,"transition":"all 0.3s linear"});$(".chanpin_lunbo1").css({"background": "#E5E5E5","color": "#184F6B"})
		.eq(a).css({"background": "#184f6b","color": "#fff"})
	})

	$(chanpin_lunbo1).click(function(){
		let inde=$(chanpin_lunbo1).index(this);
		console.log($(this).parent())
		$(part).eq(index).find(".wancheng_bottom2_1").css({"marginLeft":-991*inde,"transition":"all 0.3s linear"});
		$(".chanpin_lunbo1").css({"background": "#E5E5E5","color": "#184F6B"})
		.eq(inde).css({"background": "#184f6b","color": "#fff"});
		a=inde;
	})
})
