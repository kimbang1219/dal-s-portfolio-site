$(document).ready(function(){
   
  $('ul.tabs .tab-link').click(function(){
    var tab_id = $(this).attr('data-tab');
 
    $('ul.tabs .tab-link').removeClass('current');
    $('.tab-content').removeClass('current');
 
    $(this).addClass('current');
    $("#"+tab_id).addClass('current');
  })
 
})

