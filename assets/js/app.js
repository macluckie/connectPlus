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



                for (let i = 0;i< data.length;i++){
                    $(".newSelect").append('<option>'+data[i]+'</option>');
                }

            },
            dataType: 'json',

        })})


//suppression des attributs values qui provoquent un pb de recupération des données dans le form symfony.
    //$("select > option").removeAttr('value');
})

