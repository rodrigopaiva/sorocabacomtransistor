<?php
    /*
    Template Name: Contato
    */
?>

<form class="form-contato center" name="form-contato" method="post" enctype="multipart/form-data">

    <input type="text" placeholder="Nome" name="nome" value="" id="nome" class="validatxt nome" required />

    <input type="email" placeholder="E-mail" name="email" value="" id="email" class="validatxt email" required />

    <textarea placeholder="Mensagem" name="mensagem" id="mensagem" class="validatxt" required></textarea>

    <button class="btn btn-full-green" name="enviar">enviar</button>

    <div class="clear"></div>

    <div class="error-invalido-contato message-fail none">
        <p>Os campos acima em destaque são necessários</p>
    </div><!-- error_invalido -->

    <img src="images/loading.gif" width="32" height="32" class="loading none" />

    <!-- conteudo gerado via sendcontato php -->
    <div class="box-success-contato message-success none"></div><!-- box-success -->
</form>