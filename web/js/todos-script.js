/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $( "#todo-list tbody" ).sortable();
    $( "#todo-list tbody" ).disableSelection();
    
        $('#todo-list tbody tr').mouseenter(function() {
        $(this).css('background-color', 'rgba(255, 255, 255, 0.2)');
        
    });
    
        $('#todo-list tbody tr').mouseleave(function() {
        $(this).css('background-color', 'transparent');
    });
    
//    $('#todo-check').click(function() {
//        $('#todo-list tbody tr').fadeOut('slow');
//    });

});