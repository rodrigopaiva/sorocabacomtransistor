<?php header ('Content-type: text/html; charset=UTF-8'); ?>
<?php include "_inc/headlines.php"; ?>

	<body id="home">
        <!--[if lt IE 10]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

		<main>
            <article class="left">
                <a href="#" class="button external">link de teste com sprite</a>

                <br />

                <a href="#" class="teste">link de teste com bg</a>


                <header class="header">
                    <h1>article header h1</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec.</p>
                </header>


                <div>
                    <?php include '_inc/fancybox.php' ?>

                    <hr />

                    <?php include '_inc/slider.php' ?>

                    <hr />

                    <?php include '_inc/form-contato.php' ?>

                    <hr />
                </div>


                <footer>
                    <h3>article footer h3</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor.</p>
                </footer>
            </article>



            <aside class="right">
                LATERAL DO SITE AQUI
            </aside>


            <div class="clear"></div>


            <?php include "_inc/footer.php" ?>
        </main>

        <?php include "_inc/analytics.php" ?>
	</body>
</html>