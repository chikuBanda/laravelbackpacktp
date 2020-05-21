$(document).ready(function(){
    $("#chicken_wings").prop('disabled', true);
    $('input[type=radio]').click(function(){
        if($(this).prop('id') == "radio_wings"){
            $("#chicken_wings").prop("disabled", false);
            $("#salade_verte").prop("disabled", true);
        }else{
            $("#chicken_wings").prop("disabled", true);
            $("#salade_verte").prop("disabled", false);
        }

    });
 });
