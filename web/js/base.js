/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    var div = document.getElementById('content');
    var div1 = document.getElementById('leftbox');
    div.style.height = document.body.clientHeight + 'px';
    div1.style.height = div.style.height;     


var oritop = -100;
$(window).scroll(function() {
    var scrollt = window.scrollY;
    var elm = $("#leftbox");
    if(oritop < 0) {
        oritop= elm.offset().top;
    }
    if(scrollt >= oritop) {
        elm.css({"position": "fixed", "top": 0, "left": 0});
    }
    else {
        elm.css("position", "static");
    }
  });
  
  
$(function(){ 
    if ($(window).width()<800)
    {
    $("#leftbox").css("width","50px");
    }
});

$(window).resize(function() {
        var wi = $(window).width();
        $("p.testp").text('Screen width is currently: ' + wi + 'px.');
});

    $(window).resize(function() {
        var wi = $(window).width();
 
         if (wi <= 767){
            
    $("#leftbox").css("width","50px");
}
        else {
            $("#leftbox").css("width","15%");
            }
    }); 
});