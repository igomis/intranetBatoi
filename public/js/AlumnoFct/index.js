'use strict';

var id;


$(function() {
    $("#401").on("click", function(event){
        event.preventDefault();
        $(this).attr("data-toggle","modal").attr("data-target", "#entreFechas").attr("href","");
        id='pr0401';
    });
    $("#402").on("click", function(event){
        event.preventDefault();
        $(this).attr("data-toggle","modal").attr("data-target", "#entreFechas").attr("href","");
        id= 'pr0402';
    });
    $("#formFechas").on("submit", function(){
        $(this).attr("action","fct/"+id+"/print");
    });
})