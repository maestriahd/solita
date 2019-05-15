<?php
$pageTitle = __('Browse Items');
echo head(array('title' => $pageTitle, 'bodyclass' => 'items browse'));
?>
<div class="row">
  <div class="col my-5">
    <h1><?php echo $pageTitle;?> <?php echo __('(%s total)', $total_results); ?></h1>
  </div>
</div>
<div class="row">
  <div class="col-sm-12 col-md-6 align-middle">
    <nav class="items-nav navigation secondary-nav">
        <?php echo public_nav_items(); ?>
    </nav>
  </div>

  <?php if ($total_results > 0): ?>
  <div class="col-sm-12 col-md-6">
    <?php
    $sortLinks[__('Title')] = 'Dublin Core,Title';
    $sortLinks[__('Creator')] = 'Dublin Core,Creator';
    $sortLinks[__('Date Added')] = 'added';
    ?>

    <div id="sort-links">
        <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
    </div>
  </div>
<?php endif; ?>

</div>

<div class="row">
  <div class="col-sm-12">
    <?php echo item_search_filters(); ?>
    <?php echo pagination_links(); ?>
  </div>
</div>
<div class="row">
  <?php foreach (loop('items') as $item): ?>
  <div class="item hentry col col-sm-1 col-md-4 my-4">
    <div class="card">
      <?php if (metadata('item', 'has files')): ?>
          <?php echo link_to_item(item_image('square_thumbnail', array('class' => 'img-fluid card-img-top'), 0, $item)); ?>
      <?php endif; ?>
      <div class="card-body">
          <h3 class="card-title"><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class' => 'permalink')); ?></h3>

          <?php $date = metadata($item, array('Dublin Core', 'Date')); ?>

          <?php if ($date): ?>
              <h5 class="card-subtitle"><?php echo $date; ?></h5>
          <?php endif; ?>

          <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet' => 250))): ?>
          <div class="item-description card-text">
              <?php echo $description; ?>
          </div>
        <?php endif; ?>
        <?php if (metadata('item', 'has tags')): ?>
        <div class="tags"><p><strong><?php echo __('Tags'); ?>:</strong>
            <?php echo tag_string('items'); ?></p>
        </div>
        <?php endif; ?>
        <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' => $item)); ?>

      </div>
    </div>
  </div><!-- end class="item hentry" -->
  <?php endforeach; ?>
</div>



<div class="row">
  <div class="col">
    <?php echo pagination_links(); ?>
  </div>
</div>
<div class="row">
  <div class="col">
    <div id="outputs">
        <span class="outputs-label"><?php echo __('Output Formats'); ?></span>
        <?php echo output_format_list(false); ?>
    </div>
  </div>
</div>


<?php fire_plugin_hook('public_items_browse', array('items' => $items, 'view' => $this)); ?>

<?php echo foot(); ?>
