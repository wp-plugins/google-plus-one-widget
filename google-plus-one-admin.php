<?php
  // handle the form settings and update options 
  if(isset($_POST['size'])){
    update_option('google_plusone_widget_ks_size', $_POST['size']);
  }

  if(isset($_POST['position'])){
    update_option('google_plusone_widget_ks_position', $_POST['position']);
  }

  // size options
  $sizes = array(
    'small' => false,
    'medium' => false,
    'standard' => false,
    'tall' => false
  );

  // position options
  $positions = array(
      'top' => false,
      'bottom' => false,
      'both' => false
  );

  // set size
  $selectedSize = get_option('google_plusone_widget_ks_size', null);
  if(!empty($selectedSize) && isset($sizes[$selectedSize])){
    $sizes[$selectedSize] = true;
  }

  // set position
  $selectedPosition = get_option('google_plusone_widget_ks_position', null);
  if(!empty($selectedPosition) && isset($positions[$selectedPosition])){
    $positions[$selectedPosition] = true;
  }
  
?>

<style type="text/css">
  .sizes, .positions {
    float: left;
    margin: 10px
  }

  #size_select select {
    width: 100px;
  }

  .save_btn{
    float:right;
  }

  #settings_form{
    width: 300px;
  }
</style>
<h2>Google Plus One Widget</h2>

<form id="settings_form" method="POST" action="">
  <div class="sizes">
    <div id="size_label">Select size:</div>
    <div id="size_select">
      <select name="size" id="button_size">
        <?php foreach($sizes as $size => $selected): ?>
          <?php if($selected): ?>
            <option selected="true" value="<?php echo $size; ?>"><?php echo $size; ?></option>
          <?php else: ?>
            <option value="<?php echo $size; ?>"><?php echo $size; ?></option>
          <?php endif; ?>
        <?php endforeach; ?>
      </select>
    </div>
  </div>

  <div class="positions">
    <div id="position_label">Select position:</div>
    <div id="position_check">
      <table>
        <?php foreach($positions as $position => $selected): ?>
          <tr>
            <td><input type="radio" name="position" value="<?php echo $position; ?>" <?php if($selected) echo 'checked="checked"'; ?> /></td>
            <td><?php echo ucfirst($position); ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
  <div style="clear: both;"/>

  <input class="save_btn" type="submit" value="Save"/>
</form>