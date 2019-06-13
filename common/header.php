<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <?php
    queue_css_url('//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
    queue_css_file(array('iconfonts','style'));
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php
    queue_js_url('https://code.jquery.com/jquery-3.3.1.slim.min.js');
    queue_js_url('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
    queue_js_url('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
    queue_js_file(array('jquery-accessibleMegaMenu', 'minimalist', 'globals'));
    //queue_js_file(array('jquery-accessibleMegaMenu', 'popper.min', 'bootstrap.bundle.min','minimalist', 'globals'));
    //queue_js_file(array('minimalist'));
    echo head_js();
    ?>
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <div id="wrap" class="container-fluid">

        <header role="banner">
                <nav class="navbar navbar-expand-md navbar-light py-3 fixed-top">
                  <div class="container-fluid">

                  <div class="row w-100">
                    <div class="col-sm-12 col-md-6">
                      <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
                      <div id="site-title">
                          <?php echo link_to_home_page(option('site_title')); ?>
                      </div>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                          <?php
                            $partial = array('common/menu-partial.phtml', 'default');
                            $nav = public_nav_main();
                            $nav->setUlClass('navbar-nav float-right')->setPartial($partial);
                            echo $nav->render();
                          ?>

                          <form class="form-inline my-2  mx-5">
                            <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
                            <?php echo search_form(array('show_advanced' => true)); ?>
                            <?php else: ?>
                            <?php echo search_form(); ?>
                            <?php endif; ?>
                          </form>
                          <div class="logo">
                            <?php echo theme_logo(); ?>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                </nav>
        </header>
      </div><!-- end wrap -->
        <?php if(get_theme_option('hero')): ?>
        <div class="jumbotron-fluid hero" style="background-image:url(<?php echo hero_image_path(); ?>);">
        </div>
      <?php endif; ?>

        <article id="content" role="main" tabindex="-1" class="container">

            <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
