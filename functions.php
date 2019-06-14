
<?php
function hero_image()
{
    $headerBg = get_theme_option('hero');
    if ($headerBg) {
        $storage = Zend_Registry::get('storage');
        $headerBg = $storage->getUri($storage->getPathByType($headerBg, 'theme_uploads'));
        return '<img src="' . $headerBg . '" class="img-fluid w-100" />';
    }
}
function hero_image_path()
{
    $headerBg = get_theme_option('hero');
    if ($headerBg) {
        $storage = Zend_Registry::get('storage');
        $headerBg = $storage->getUri($storage->getPathByType($headerBg, 'theme_uploads'));
        return $headerBg;
    }
}
 ?>
