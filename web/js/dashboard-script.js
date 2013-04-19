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

$(function(){
    $('.shopping-lower').slimScroll({
        height: '218px',
        alwaysVisible: false,
        disableFadeOut: false
    });
});

$(function(){
    $('#expense-body-slimscroll').slimScroll({
        height: '250px',
        alwaysVisible: false,
        disableFadeOut: false
    });
});

    $('#mini-shopping-list-table tbody tr').mouseenter(function() {
    $(this).css('background-color', 'rgba(255, 255, 255, 1)');

});

    $('#mini-shopping-list-table tbody tr').mouseleave(function() {
    $(this).css('background-color', 'transparent');
});

    $('#mini-shopping-list-table tbody tr' ).dblclick(function() {
    $(this).toggle( "slide", 500 ),
   $(this).css('background-color', 'rgba(0, 255, 255, 1)')
});

});