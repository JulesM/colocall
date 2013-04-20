/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){

$(function(){ 
    var page  = document.URL;
    if (page.search("inbox")>0)
    {
    $('#navbox-link-1').addClass('test');
    }else if (page.search("expense")>0)
    {
    $('#navbox-link-2').addClass('test');
    }else if (page.search("todos")>0)    
    {
    $('#navbox-link-3').addClass('test');
    }else if (page.search("shoppinglist")>0)    
    {
    $('#navbox-link-4').addClass('test');
    }else if (page.search("coloc")>0 && page.search("coloc/statistics")<0)    
    {
    $('#navbox-link-5').addClass('test');
    }else if (page.search("coloc/statistics")>0)    
    {
    $('#navbox-link-6').addClass('test');
    }     
});

});