/*
* @Author: anchen
* @Date:   2017-09-28 09:35:33
* @Last Modified by:   anchen
* @Last Modified time: 2017-09-28 10:44:31
*/

'use strict';

var pic = document.getElementsByClassName("pic");
var pic_c = document.getElementsByClassName("pic_c")[0];

var left_length = 0;

window.onload = function(){
    pic_change();
}

function pic_change(){
    if(left_length < -5460){
        left_length = 0;
    }

    if(left_length == 0){
        pic_c.style.transitionDuration = "0s";
    }else{
        pic_c.style.transitionDuration = "0.5s";
    }
    pic_c.style.left = left_length + "px";
    left_length -= 1365;

    setTimeout("pic_change()", 3000);
}
