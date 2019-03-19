        </article>

        <footer role="contentinfo">

          <div class="container">
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
