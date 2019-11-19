<?php
    /*
    Template Name: Início
    */
     ?>

<?php header ('Content-type: text/html; charset=UTF-8'); ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-br"> <!--<![endif]-->
    <head>
        <?php include "_inc/headlines.php" ?>

        <?php include "_inc/styles-scripts.php" ?>
    </head>

    <body id="home">
        <!--[if lt IE 10]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <main>
            <?php include "header.php" ?>

            <section class="container-banner-destaque">
                container-banner-destaque
            </section><!-- container-banner-destaque -->


            <section class="container-carrossel-personas">
                container-carrossel-personas
            </section><!-- container-carrossel-personas -->


            <section class="container-form-contato">
                container-form-contato
            </section><!-- container-form-contato -->

            <?php include "footer.php" ?>
        </main>

    </body>
</html>