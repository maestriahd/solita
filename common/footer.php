        </article>

        <footer role="contentinfo">

          <div class="container-fluid">
            <div class="row">
              <div class="col col-sm">
                <div id="footer-text">
                    <?php echo get_theme_option('Footer Text'); ?>
                    <?php if ((get_theme_option('Display Footer Copyright') == 1) && $copyright = option('copyright')): ?>
                        <p><?php echo $copyright; ?></p>
                    <?php endif; ?>
                    <?php fire_plugin_hook('public_footer', array('view'=>$this)); ?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col col-sm">
                <ul class="nav footer-links my-5 justify-content-center">
                  <li class="nav-item mr-2" > <a class="nav-link btn btn-outline-primary btn-sm" href="https://facartes.uniandes.edu.co" target="_blank">Facultad de Artes y Humanidades</a> </li>
                  <li class="nav-item mr-2" > <a class="nav-link btn btn-outline-primary btn-sm" href="https://arte.uniandes.edu.co" target="_blank">Departamento de Arte </a> </li>
                  <li class="nav-item mr-2" > <a class="nav-link btn btn-outline-primary btn-sm" href="https://registro.uniandes.edu.co/" target="_blank">Admisiones y registro</a> </li>
                  <li class="nav-item mr-2" > <a class="nav-link btn btn-outline-primary btn-sm" href="https://eventos.uniandes.edu.co/" target="_blank"> Agenda </a> </li>
                  <li class="nav-item mr-2" > <a class="nav-link btn btn-outline-primary btn-sm" href="https://apoyofinanciero.uniandes.edu.co/index.php/es/" target="_blank">Apoyo Financiero </a> </li>
                  <li class="nav-item mr-2" > <a class="nav-link btn btn-outline-primary btn-sm" href="https://biblioteca.uniandes.edu.co/index.php?lang=es" target="_blank"> Biblioteca </a> </li>
                  <li class="nav-item mr-2" > <a class="nav-link btn btn-outline-primary btn-sm" href="http://correo.uniandes.edu.co/" target="_blank"> Correo </a> </li>
                  <li class="nav-item mr-2" > <a class="nav-link btn btn-outline-primary btn-sm" href="https://secretariageneral.uniandes.edu.co/index.php/es/" target="_blank"> Normas </a> </li>
                  <li class="nav-item mr-2" > <a class="nav-link btn btn-outline-primary btn-sm" href="https://uniandes.edu.co/egresado" target="_blank"> Egresados </a> </li>
                  <li class="nav-item mr-2" > <a class="nav-link btn btn-outline-primary btn-sm" href="https://planeacion.uniandes.edu.co/" target="_blank"> Planeación </a> </li>
                  <li class="nav-item mr-2" > <a class="nav-link btn btn-outline-primary btn-sm" href="https://sicuaplus.uniandes.edu.co/webapps/login/" target="_blank"> SICUA </a></li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col col-sm my-5 text-center">
                Universidad de los Andes | Vigilada MinEducación
                <br>
                  Reconocimiento como Universidad: Decreto 1297 del 30 de mayo de 1964.
                <br>
                  Reconocimiento personería jurídica: Resolución 28 del 23 de febrero de 1949 MinJusticia
                <br>
              </div>
            </div>
          </div>

        </footer>

    </div><!-- end wrap -->

    <script>

    jQuery(document).ready(function() {

        Omeka.showAdvancedForm();
        Omeka.skipNav();
        Omeka.megaMenu('#top-nav');
    });
    </script>
</body>
</html>
