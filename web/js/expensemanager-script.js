/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
 $(function() {
$( "#accordion" ).accordion({
        active: false,
    collapsible: true 
      });
    });
    
$(function(){
    $('.table-slimscroll').slimScroll({
        height: '200px',     
        alwaysVisible: false,
        disableFadeOut: false
    });
});   

        
    
        
        $(function(){
    $('#expense-list-body-slimscroll').slimScroll({
        height: '370px',     
        alwaysVisible: false,
        disableFadeOut: false
     });
    }); 
    

$(function(){
    $('#expense-list-body').slimScroll({
        height: '370px',     
        alwaysVisible: false,
        disableFadeOut: false
        });
    }); 
    

});