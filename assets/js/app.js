var $ = require('jquery');

require('bootstrap');

require('../css/app.scss');


$(document).ready(function(){

    $('.dropdownJeux, .menuJeux').hover(function(){

        $('.menuJeux').toggle();
    })


    $('.dropdownConsole, .menuConsole').hover(function(){

        $('.menuConsole').toggle();
    })


    //on envoie en post dans le controller le nom du jeux contenue dans le select




    $(".gameConsole ").click(function(){



        let game =$(".gameConsole option:selected").text();



        $.ajax({

            url: 'http://localhost:8000/formajax',
            method:'POST',
            data: 'param='+game,
            success: function(data){

                        if ($(".divNewSelect > option").length){





                    $(".divNewSelect > option").each(function(){


                        $(".divNewSelect > option").remove();

                    })

                        }








                // $(".reservationForm").append('<div class="form-group"><label class="required" for="appbundle_reservation_console">Console</label><select id="appbundle_reservation_console" name="appbundle_reservation[console]" class="newSelect form-control"></select></div>')



                for (let i = 0;i< data.length;i++){
                    $(".newSelect").append('<option>'+data[i]+'</option>');
                }

            },
            dataType: 'json',

        })

    })





})

