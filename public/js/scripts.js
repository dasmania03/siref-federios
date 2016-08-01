jQuery(document).ready(function($){
    //open popup
    $('.cd-popup-trigger').on('click', function(event){
        event.preventDefault();
        $('.popup-modal').addClass('is-visible');
    });

    //close popup
    $('.popup-modal-edit').on('click', function(event){
        if( $(event.target).is('.modal-close') || $(event.target).is('.popup-modal-edit') ) {
            event.preventDefault();
            $(this).removeClass('is-visible');
        }
    });
    $('.popup-modal-show').on('click', function(event){
        if( $(event.target).is('.modal-close') || $(event.target).is('.popup-modal-show') ) {
            event.preventDefault();
            $(this).removeClass('is-visible');
        }
    });
    $('.popup-modal-sale').on('click', function(event){
        if( $(event.target).is('.modal-close') || $(event.target).is('.popup-modal-sale') ) {
            event.preventDefault();
            $(this).removeClass('is-visible');
        }
    });
    //close popup when clicking the esc keyboard button
    $(document).keyup(function(event){
        if(event.which=='27'){
            $('.popup-modal-edit').removeClass('is-visible');
            $('.popup-modal-show').removeClass('is-visible');
            $('.popup-modal-sale').removeClass('is-visible');
        }
    });
    //close message
    $('.message-close').on('click', function(event){
        setTimeout(function() {
            $(".message").fadeOut(250);
        },500);
    });

    $('#valor').maskMoney({thousands: '', decimal: '.', allowZero: true});
});

// Script para consultar dinamicamente los horarios segun la disciplina seleccionada
$("#disciplina").change(function(event){
    $("#carga").html("<div class='loading'><img src='/img/load.gif' /></div>");
    $.get("/horarios/"+event.target.value+"",function(resp,disciplina){
        $("#horario").empty();
        for(i=0; i<resp.length;i++){
            $("#horario").append("<option value='"+resp[i].id_horario+"'> "+resp[i].nombre+"</option>");
        }
        $("#carga").empty();
    });
});

function validarcedula(id) {
    cedula = document.getElementById(id).value;
    array = cedula.split("");
    num = array.length;
    if(num == 10) {
        total = 0;
        digito = (array[9]*1);
        for(i=0; i < (num-1); i++) {
            mult = 0;
            if((i%2) != 0) {
                total = total + (array[i] * 1);
            }
            else {
                mult = array[i] * 2;
                if(mult > 9)
                    total = total + (mult - 9);
                else
                    total = total + mult;
            }
        }
        decena = total / 10;
        decena = Math.floor(decena);
        decena = (decena + 1) * 10;
        final = (decena - total);
        if((final == 10 && digito == 0) || (final == digito)) {
            return true;
        }
        else {
            alert( "El n\xF9mero de c\xe9dula NO es v\xe1lida!!!" );
            return false;
        }
    } else {
        alert("El n\xF9mero de c\xe9dula no puede tener menos o m\xE1s de 10 d\xedgitos");
        return false;
    }
}

function aMays(e, elemento) {
    elemento.value = elemento.value.toUpperCase();
}

function aMinus(e, elemento) {
    elemento.value = elemento.value.toLowerCase();
}

function showContent(elemento, id) {
    element = document.getElementById(id);
    if (elemento.checked) {
        element.style.display='block';
    }
    else {
        element.style.display='none';
    }
}

function addCeros (n, length)
{
    var str = (n > 0 ? n : -n) + "";
    var zeros = "";
    for (var i = length - str.length; i > 0; i--)
        zeros += "0";
    zeros += str;
    return n >= 0 ? zeros : "-" + zeros;
}