
<?php
$title = metadata($item, 'display_title');
$description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 150));
$date = metadata($item, array('Dublin Core', 'Date'));
?>

<div class="item record col-sm-12 col-md-4 my-4">

  <div class="card">
    <?php if (metadata($item, 'has files')) {
        echo link_to_item(
            item_image('square_thumbnail', array('class' => 'img-fluid card-img-top'), 0, $item),
            array('class' => 'image'), 'show', $item
        );
    }
    ?>
    <div class="card-body">
      <h3 class="card-title"><?php echo link_to($item, 'show', $title); ?></h3>
      <?php if ($date): ?>
          <p class="item-description"><?php echo $date; ?></p>
      <?php endif; ?>
    </div>
  </div>



</div>
