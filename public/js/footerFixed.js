/*--------------------------------------------------------------------------*
 *
 *  footrFixed.js
 *
 *  MIT-style license.
 *
 *  2007 Kazuma Nishihata [to-R]
 *  http://blog.webcreativepark.net
 *
 *--------------------------------------------------------------------------*/
new function(){var d="footer";function a(){var g=document.getElementsByTagName("body")[0].clientHeight;document.getElementById(d).style.top="0px";var h=document.getElementById(d).offsetTop;var e=document.getElementById(d).offsetHeight;if(window.innerHeight){var f=window.innerHeight}else{if(document.documentElement&&document.documentElement.clientHeight!=0){var f=document.documentElement.clientHeight}}if(h+e<f){document.getElementById(d).style.position="relative";document.getElementById(d).style.top=(f-e-h-1)+"px"}}function b(h){var i=document.createElement("div");var g=document.createTextNode("S");i.appendChild(g);i.style.visibility="hidden";i.style.position="absolute";i.style.top="0";document.body.appendChild(i);var f=i.offsetHeight;function j(){if(f!=i.offsetHeight){h();f=i.offsetHeight}}setInterval(j,1000)}function c(i,g,f){try{i.addEventListener(g,f,false)}catch(h){i.attachEvent("on"+g,f)}}c(window,"load",a);c(window,"load",function(){b(a)});c(window,"resize",a)};