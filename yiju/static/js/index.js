//banner
let lonbotu=$(".lunbotu");
let lonbodian=$(".lunbodian");
let n=0;
$(lonbodian).click(function(){
	let index=$(lonbodian).index(this);
	$(lonbotu).css({"zIndex":-1}).eq(index).css({"zIndex":0});
	$(lonbodian).children("div").css("opacity",0);
	$(lonbodian).eq(index).children().css("opacity",1);
	n=index;
})
function move(){
	n++;
	if(n==5){
		n=0;
	}
	$(lonbotu).css({"zIndex":-1}).eq(n).css({"zIndex":0})
	$(lonbodian).children("div").css("opacity",0);
	$(lonbodian).eq(n).children().css("opacity",1);
}
let t=setInterval(move,2000);
$(".bannerbanner").mouseenter(function(){
	clearInterval(t);
})
$(".bannerbanner").mouseleave(function(){
	t=setInterval(move,2000);
})
//案例展示
let anli_zuo=$(".black1");
let anli_you=$(".blue");
let anli_tu=$(".case_bottom>img");
let anli_n=0;
$(anli_you).click(function(){
	anli_n++;
	if(anli_n>2){
        anli_n=2;
	}
	console.log(anli_n)
	if(anli_n==1){	
		$(anli_tu).eq(0).removeClass()
		.addClass("case_bottom_case2");
		$(anli_tu).eq(2).removeClass()
		.addClass("case_bottom_case1");
		$(anli_tu).eq(1).removeClass()
		.addClass("case_bottom_case3");
	}
	if(anli_n==2){
		$(anli_tu).eq(0).removeClass().addClass("case_bottom_case3");
		$(anli_tu).eq(2).removeClass().addClass("case_bottom_case2");
		$(anli_tu).eq(1).removeClass().addClass("case_bottom_case1");
	}	
})
$(anli_zuo).click(function(){
	anli_n--;
	if(anli_n<0){
		n=0;
	}
	if(anli_n==0){	
		$(anli_tu).eq(0).removeClass().addClass("case_bottom_case1");
		$(anli_tu).eq(2).removeClass().addClass("case_bottom_case3");
		$(anli_tu).eq(1).removeClass().addClass("case_bottom_case2");
	}
	if(anli_n==1){
		$(anli_tu).eq(0).removeClass()
		.addClass("case_bottom_case2");
		$(anli_tu).eq(2).removeClass()
		.addClass("case_bottom_case1");
		$(anli_tu).eq(1).removeClass()
		.addClass("case_bottom_case3");
	}
})