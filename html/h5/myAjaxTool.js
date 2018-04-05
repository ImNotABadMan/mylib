/*
* @Author: anchen
* @Date:   2017-12-11 16:53:10
* @Last Modified by:   anchen
* @Last Modified time: 2017-12-11 19:21:17
*/

'use strict';
/**
 * ajax获得info，用ul>li>a表示，高亮显示
 * @param  Object window   全局对象的window
 * @param  undefined undefined 不传参，只为了别让低版本的IE篡改undefined的值
 */
(function(window, undefined){
    var myAjax = {
        'getUser' : function(obj, idName, httpType, url){
            // obj.onkeyup = function(){
            obj.oninput = function(){
                var xmlHttp;
                if(window.XMLHttpRequest){
                    xmlHttp = new XMLHttpRequest();
                }else{
                    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlHttp.onreadystatechange = function(){
                    if(xmlHttp.readyState == 4){
                        if(xmlHttp.status == 200){
                            var menu = document.getElementById(idName);
                            var arr = eval(xmlHttp.responseText);
                            menu.innerHTML = "";
                            var arrLen = arr.length;
                            for(var i = 0; i < arrLen; i++){
                                var li = document.createElement("li");
                                li.role = "presentation";
                                var a = document.createElement("a");
                                //高亮显示不失真
                                var reg = eval("/" + obj.value + "/ig");
                                var regIndex = arr[i].nickname.toLowerCase().indexOf(obj.value.toLowerCase());
                                var str = arr[i].nickname.replace(reg, "<font color='red'>" + arr[i].nickname.substr(regIndex, obj.value.length) + "</font>");
                                if(reg != undefined && obj.value.trim() != ""){
                                    a.innerHTML = str;
                                }else{
                                    a.innerHTML = arr[i].nickname;
                                }

                                a.data = arr[i].nickname;
                                a.href="javascript:void(0);";
                                li.appendChild(a);
                                menu.appendChild(li);
                            }
                            var liA = menu.getElementsByTagName("a");
                            var liALen = liA.length;

                            for(var i = 0; i < liALen; i++){
                                (function(index){
                                    liA[index].onclick = function(){
                                        obj.value = liA[index].data;
                                    }
                                })(i);
                            }
                            /***********************************/
                        }
                    }
                }
                xmlHttp.open(httpType, url + encodeURI(this.value), true);

                //使用smarty模板
                // xmlHttp.open("GET", "{C('URL')}/index.php?p=admin&m=blog&a=getUser&u_nickname=" + encodeURI(this.value) + "&date=" + new Date().getTime(), true);
                xmlHttp.send();
            }
        }
    }
    window.myAjax = myAjax;
})(window);
