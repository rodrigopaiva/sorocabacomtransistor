<?php
    /*
    Template Name: Contato
    */
?> <form class="form-contato limit-6w center" name="form-contato" method="post" enctype="multipart/form-data"><label for="nome">Nome</label><input type="text" name="nome" value="" id="nome" class="validatxt nome" required><label for="email">E-mail</label><input type="email" name="email" value="" id="email" class="validatxt email" required><label for="mensagem">Mensagem</label><textarea name="mensagem" id="mensagem" class="validatxt" required></textarea><button class="btn" name="enviar">enviar</button><div class="clear"></div><div class="error_invalido_contato none"><p>Os campos acima em destaque são necessários</p></div><img src="images/loading.gif" width="32" height="32" class="loading none"><div class="box-success-contato none"></div></form>