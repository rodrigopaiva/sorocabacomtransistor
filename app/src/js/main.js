
$(document).ready(function() {

    // scroll to top
        $('.scroll-to-top').on('click',function (e){
            e.preventDefault();
            $("html, body").animate({ scrollTop: 0 }, "slow");
        });



    // altura banner destaque
        var alturaBanner = $(window).height();
        $('.container-banner-destaque').css('height', alturaBanner);

        // resize tela
            $( window ).resize(function() {
                var alturaBanner = $(window).height();
        		$('.container-banner-destaque').css('height', alturaBanner);
            });



  	// carousel
        // if ($('.bxslider-banner').length > 0) {
            $('.list-personas').slick({
			  infinite: true,
			  slidesToShow: 3,
			  slidesToScroll: 1
			});
        // }


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
                        $('.error-invalido-contato').fadeIn();
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
                $('.error-invalido-contato').fadeOut();
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
                $('.error-invalido-contato').fadeIn();
                $('.box-success-contato').hide('fast');
                event.preventDefault();
            }
        });// end validacao form contato

}); // end ready
