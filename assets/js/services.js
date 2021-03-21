$(document).ready(function(){
var service = $('.service');

if (service.length == 2) {
    service.attr('class','col-md-6 service');  
}

if (service.length == 1) {
    service.attr('class','col-md-12 service');  
}
 })