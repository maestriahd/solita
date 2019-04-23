<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
  <?php if ($showElementSetHeadings): ?>
  <h2><?php echo html_escape(__($setName)); ?></h2>
  <?php endif; ?>

  <table class="table">
    <tbody>
      <?php foreach ($setElements as $elementName => $elementInfo): ?>

      <tr>
        <td>
          <?php echo html_escape(__($elementName)); ?>
        </td>
        <td>
          <?php foreach ($elementInfo['texts'] as $text): ?>
            <?php echo $text; ?>
          <?php endforeach; ?>
        </td>
      </tr>
    <?php endforeach; ?>

    </tbody>
  </table>
<?php endforeach; ?>
