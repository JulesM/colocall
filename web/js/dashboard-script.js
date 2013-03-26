/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


//$(document).ready(function(){
//    $( "#todo-list tbody" ).sortable();
//    $( "#todo-list tbody" ).disableSelection();
//    
//        $('#todo-list tbody tr').accordion();
//    
//        $('#todo-list tbody tr').mouseleave(function() {
//        $(this).css('background-color', 'transparent');
//    });
//    
//});


$(document).ready(function(){
 $(function() {
$( "#accordion" ).accordion({
        active: false,
    collapsible: true 
      });
    });
    
 $(function() {
$( "#accordion1" ).accordion({
        active: false,
    collapsible: true 
      });
    });
});