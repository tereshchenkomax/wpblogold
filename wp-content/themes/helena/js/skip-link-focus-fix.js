!function(){var a=navigator.userAgent.toLowerCase().indexOf("webkit")>-1,b=navigator.userAgent.toLowerCase().indexOf("opera")>-1,c=navigator.userAgent.toLowerCase().indexOf("msie")>-1;(a||b||c)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var b,a=location.hash.substring(1);/^[A-z0-9_-]+$/.test(a)&&(b=document.getElementById(a),b&&(/^(?:a|select|input|button|textarea)$/i.test(b.tagName)||(b.tabIndex=-1),b.focus()))},!1)}();