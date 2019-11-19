
// Mascaras
    var maskBehavior = function (val) {
      return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    options = {onKeyPress: function(val, e, field, options) {
            field.mask(maskBehavior.apply({}, arguments), options);
        }
    };

    $('.ipt-fone').mask(maskBehavior, options);
    $('.ipt-cpf').mask('000.000.000-00', {reverse: true});
    $('.ipt-cep').mask('00000-000');


// for menu mobile
    function animaMenu(x) {
        x.classList.toggle('change');
    }


$(document).ready(function() {

    // link externo
    $('.external').on('click',function (e){
            e.preventDefault();
            var url = $(this).attr('href');
            window.open(url);
        });


    // show / hide menu mobile
        $('.bt-menu-mobile').click(function() {
            animaMenu(this);

            $('.content-menu-mobile, .nav-mobile span').toggle('slow');
            $('.overlay-login').toggle('fast');
        });


  // carousel bxSlider
        /* slider banner */
        if ($('.bxslider-banner').length > 0) {
            $('.bxslider-banner').bxSlider({
              mode: 'fade',
              minSlides: 2,
              auto: true,
              autoHover: true
            });

            /*
              auto: true,
              autoControls: true,
              stopAutoOnClick: true,
              pager: true,
              slideWidth: 300,
              moveSlides: 2
            */
        }



  // carousel bxSlider
    /* verifica a existencia do objeto */
      if ($('.list-carousel').length > 0) {
        $('.list-carousel').bxSlider({
          slideWidth: 210,
          minSlides: 2,
          maxSlides: 5,
          moveSlides: 1,
          slideMargin: 30
         //  adaptiveHeight: true,
           // mode: 'fade'
      });
      }


    // quando enviar o form de contato executa a funcao
        $('.form-contato .btn').click(function(event) {
            // a cada campo dentro do form que tiver a classe validatxt executa a funcao
            $('.form-contato .validatxt').each(function(index) {
                var thisVal = $(this).val();
                var valorValidate = $(this).val();

                //verifica os inputs que tem a class "validatxt"
                if ($(this).hasClass('validatxt')) {
                    if (thisVal == "") {
                        $(this).addClass('error');
                        $('.error_invalido_contato').fadeIn();
                    }else{
                        $(this).removeClass('error');
                    }
                }

                /* validar email */
                var objEmail = new RegExp(/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i);

                if ($(this).hasClass('email')) {
                    if (!objEmail.test($(this).val())) {
                        $(this).addClass('error');
                    }else{
                        $(this).removeClass('error');
                    }
                }else{
                    if (valorValidate == "" || valorValidate.length < 2) {
                        $(this).addClass('error');
                    }
                }/* end validar email */
            }); // end each

            var errors = $('.error').length;


            /* Coletando dados */
            var nome     = $('#nome').val();
            var email    = $('#email').val();
            var mensagem = $('#mensagem').val();


            /* construindo url */
            var urlData = "&nome=" + nome + "&email=" + email + "&mensagem=" + mensagem;


            if (errors == "0"){
                $('.error_invalido_contato').fadeOut();
                $('.box-success-contato').show('fast');


                /* Ajax */
                $.ajax({
                     type: "POST",
                     url: "email-contato.php", /* endereço do phpmailer */
                     async: true,
                     data: urlData, /* informa Url */

                     success: function(data) { /* sucesso */
                        $('.box-success-contato').html(data);
                     },
                     beforeSend: function() { /* antes de enviar */
                        $('.loading').show('fast');
                     },
                     complete: function(){ /* completo */
                        $('.loading').hide('fast');
                        $('form').find('input[type=text]').val('');
                        $('form').find('input[type=email]').val('');
                        $('form').find('textarea').val('');
                     }
                 });

                event.preventDefault();
            }else{
                $('.error_invalido_contato').fadeIn();
                $('.box-success-contato').hide('fast');
                event.preventDefault();
            }
        });// end validacao form contato

}); // end ready
