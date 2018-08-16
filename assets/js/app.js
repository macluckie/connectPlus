require('bootstrap');

var $ = require('jquery');

require('../css/app.scss');


$(document).ready(function(){

    $('.dropdownJeux, .menuJeux').hover(function(){

        $('.menuJeux').toggle();
    })


    $('.dropdownConsole, .menuConsole').hover(function(){

        $('.menuConsole').toggle();
    })



})

