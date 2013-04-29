/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    var div = document.getElementById('content');
    var div1 = document.getElementById('leftbox');
    div.style.height = document.body.clientHeight + 'px';
    div1.style.height = div.style.height;
    var contentToRemove = document.querySelectorAll(".collapsed-navbox");
    $(contentToRemove).hide();


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

/*$(window).resize(function() {
        var wi = $(window).width();
        $("p.testp").text('Screen width is currently: ' + wi + 'px.');
});

    $(window).resize(function() {
        var wi = $(window).width();
 
         if (wi <= 767){    
            var contentToRemove = document.querySelectorAll(".fullscreen-navbox");
            $(contentToRemove).hide(); 
            
            var contentToRemove = document.querySelectorAll(".collapsed-navbox");
            $(contentToRemove).show();
            
            $("#leftbox").css("width","30px");
            $("#content").css("width","90%");
        }else if (wi > 800){
            var contentToRemove = document.querySelectorAll(".fullscreen-navbox");
            $(contentToRemove).show();
            
            var contentToRemove = document.querySelectorAll(".collapsed-navbox");
            $(contentToRemove).hide(); 
            
            $("#leftbox").css("width","15%");
            $("#content").css("width","85%");            
            }
    });*/
    
});