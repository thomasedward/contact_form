/* global $ ,alert,console */
$(function (){
 'use strict';
 var usererror = true,
     emailerror = true,
     msgerror = true;




 $('.username' ).blur(function (){
    
    if($(this).val().length < 4)
    {
        $(this).css("border",'1px solid #f00');
        $(this).parent().find('.custom-alert').fadeIn(100);
        $(this).parent().find('.asterisx').fadeIn(100);
         usererror = true;   
}
    else
    {
       $(this).css("border",'1px solid #0f0');
       $(this).parent().find('.custom-alert').fadeOut(100);
       $(this).parent().find('.asterisx').fadeOut(100);
       usererror = false;    
}
 
 });
  $('.email' ).blur(function (){
    
    if($(this).val()  === '')
    {
        $(this).css("border",'1px solid #f00');
        $(this).parent().find('.custom-alert').fadeIn(100);
        $(this).parent().find('.asterisx').fadeIn(100);
        emailerror = true;
    }
    else
    {
       $(this).css("border",'1px solid #0f0');
       $(this).parent().find('.custom-alert').fadeOut(100);
       $(this).parent().find('.asterisx').fadeOut(100);
       emailerror = false;
    }
 
 });
 $('.message' ).blur(function (){
    
    if($(this).val().length < 11)
    {
        $(this).css("border",'1px solid #f00');
        $(this).parent().find('.custom-alert').fadeIn(100);
        $(this).parent().find('.asterisx').fadeIn(100);
        msgerror = true;
    }
    else
    {
       $(this).css("border",'1px solid #0f0');
       $(this).parent().find('.custom-alert').fadeOut(100);
       $(this).parent().find('.asterisx').fadeOut(100);
       msgerror = false;
    }
 
 });

 $('.contact').submit(function (e) 
 {
     if(usererror === true || emailerror === true  || msgerror === true )
     {
         e.preventDefault();
         $('.username, .email ').blur();
         ('.message'),blur();
     }
    
     

 });

}) ;