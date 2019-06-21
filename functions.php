
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

function navSearchForm(array $options = array())
  {
      $view = get_view();
      $validQueryTypes = get_search_query_types();
      $validRecordTypes = get_custom_search_record_types();
      $filters = array(
          'query' => apply_filters('search_form_default_query', ''),
          'query_type' => apply_filters('search_form_default_query_type', 'keyword'),
          'record_types' => apply_filters('search_form_default_record_types',
              array_keys($validRecordTypes))
      );
      if (isset($_GET['submit_search'])) {
          if (isset($_GET['query'])) {
              $filters['query'] = $_GET['query'];
          }
          if (isset($_GET['query_type'])) {
              $filters['query_type'] = $_GET['query_type'];
          }
          if (isset($_GET['record_types'])) {
              $filters['record_types'] = $_GET['record_types'];
          }
      }
      // Set the default flag indicating whether to show the advanced form.
      if (!isset($options['show_advanced'])) {
          $options['show_advanced'] = false;
      }
      // Set the default submit value.
      if (!isset($options['submit_value'])) {
          $options['submit_value'] = __('Search');
      }
      // Set the default form attributes.
      if (!isset($options['form_attributes'])) {
          $options['form_attributes'] = array();
      }
      if (!isset($options['form_attributes']['action'])) {
          $url = apply_filters('search_form_default_action', url('search'));
          $options['form_attributes']['action'] = $url;
      }
      if (!isset($options['form_attributes']['id'])) {
          $options['form_attributes']['id'] = 'search-form';
      }
      $options['form_attributes']['method'] = 'get';
      $formParams = array(
          'options' => $options,
          'filters' => $filters,
          'query_types' => $validQueryTypes,
          'record_types' => $validRecordTypes
      );
      $form = $view->partial('search/nav-search-form.php', $formParams);
      return apply_filters('search_form', $form, $formParams);
  }
 ?>
