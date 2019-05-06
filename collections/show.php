<?php
$collectionTitle = metadata('collection', 'display_title');
$totalItems = metadata('collection', 'total_items');
?>

<?php echo head(array('title' => $collectionTitle, 'bodyclass' => 'collections show')); ?>


<div class="row">
  <div class="col-sm-12">

    <h1 class="my-5 text-center" ><?php echo $collectionTitle; ?></h1>
  </div>
  <div class="col-sm-12">
    <div class="ficha my-4">
      <?php echo all_element_texts('collection'); ?>
    </div>
  </div>
  <div class="col-sm-12">
    <div id="collection-items" class="my-4">
        <h2 class="my-5"><?php echo __('Collection Items'); ?></h2>
        <?php if ($totalItems > 0): ?>
          <div class="row my-4">
          <?php foreach (loop('items') as $item): ?>
            <?php $itemTitle = metadata('item', 'display_title'); ?>

            <div class="col-sm-12 col-md-4">
              <div class="card item hentry">
                <?php if (metadata('item', 'has thumbnail')): ?>
                    <?php
                    echo link_to_item(
                      item_image(null, array('alt' => $itemTitle, 'class' => 'img-fluid card-img-top')),
                        array('class' => 'image'), 'show', $item
                      );
                    ?>
                <?php endif; ?>
                <div class="card-body">

                  <h3 class="card-title"><?php echo link_to_item($itemTitle, array('class' => 'permalink')); ?></h3>

                  <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet' => 250))): ?>
                    <div class="item-description card-text">
                        <?php echo $description; ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>

              <?php endforeach; ?>
          </div>

            <?php echo link_to_items_browse(__(plural('View item', 'View all %s items', $totalItems), $totalItems), array('collection' => metadata('collection', 'id')), array('class' => 'btn btn-outline-primary')); ?>
        <?php else: ?>
            <p><?php echo __("There are currently no items within this collection."); ?></p>
        <?php endif; ?>
    </div><!-- end collection-items -->
  </div>


    <?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>

</div>

<?php echo foot(); ?>
