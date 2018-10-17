require('bootstrap');

var $ = require('jquery');

require('../css/app.scss');


$(document).ready(function(){




    //on envoie en post dans le controller le nom du jeux contenue dans le select




    $(".gameConsole ").click(function(){



        let game =$(".gameConsole option:selected").text();



        $.ajax({

            url: 'http://localhost:8000/formajax',
            method:'POST',
            data: 'param='+game,
            success: function(data){

                        if ($(".newSelect").length == 1){


                          $(".newSelect").remove();

                        }

                        $("#appbundle_reservation").append('<select id="appbundle_reservation_console" name="appbundle_reservation[console]" class="newSelect form-control"></select>')



               for(i=0; i< data.length; i++){


                    $(".newSelect").append('<option value="'+ data[i]['id'] +'" >'+ data[i]['console'] +' </option>');


            }


        }, dataType: 'json'


        })



})
})
