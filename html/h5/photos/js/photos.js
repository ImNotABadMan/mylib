document.getElementsByClassName("div5")[0].onmouseover = function(){
//	alert("div51");
	var div1 = document.getElementsByClassName("div1")[0];
	var div2 = document.getElementsByClassName("div2")[0];
	var div3 = document.getElementsByClassName("div3")[0];
	var div4 = document.getElementsByClassName("div4")[0];
	var div5 = document.getElementsByClassName("div5")[0];
	
	div1.style.transform = "translateX(200px) rotateZ(-10deg)";
	var str = div1.style.transform;
	div2.style.transform = "translateX(-200px) rotateZ(10deg)";
	div3.style.transform = "translateY(200px) rotateZ(-10deg)";
	div4.style.transform = "translateY(-200px) rotateZ(10deg)";
};

document.getElementsByClassName("div5")[0].onmouseout = function(){
	var div1 = document.getElementsByClassName("div1")[0];
	var div2 = document.getElementsByClassName("div2")[0];
	var div3 = document.getElementsByClassName("div3")[0];
	var div4 = document.getElementsByClassName("div4")[0];
	
	div1.style.transform = "translateX(0) rotateZ(0)";
	div2.style.transform = "translateX(0) rotateZ(0)";
	div3.style.transform = "translateY(0) rotateZ(0)";
	div4.style.transform = "translateY(0) rotateZ(0)";
};
