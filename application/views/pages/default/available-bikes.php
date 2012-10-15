<br />
<div style="height: 400px; overflow: auto;">
<?php

if ($query->num_rows() == 0) {
?>
    <div>
        No Available motorbikes on the dates you specified.
    </div>
<?php
}

foreach($query->result_array() as $row) {
?>
<div>
    <img style="float:left; margin-right: 10px; margin-bottom: 10px;" src="<?php print base_url(); ?>assets/uploads/photos/<?php print $row['photo']; ?>" width="100" />
    <div style="float: left">
        <div>
        
        <?php
        print '<b>'.$row['name'].'</b>';
        ?>
        
        <?php print form_open('reservations/customer_form', 'class="bike-option" style="float: right"') ?>
        <input style="margin-left: 100px;" type="submit" value="Reserved" />
        <input type="hidden" name="name" value="<?php print $row['name']; ?>" />
        <input type="hidden" name="price" value="<?php print $row['price']; ?>" />
        <input type="hidden" name="photo" value="<?php print $row['photo']; ?>" />
        <input type="hidden" name="startDate" value="<?php print $startDate; ?>" />
        <input type="hidden" name="endDate" value="<?php print $endDate; ?>" />
        <input type="hidden" name="motorbikeID" value="<?php print $row['motorbike_id']; ?>" />
        <input type="hidden" name="description" value="<?php print $row['description'] ?>" />
        
        <?php print form_close(); ?>
        </div>
        <br />
        <div>
            <b>Description</b><br />
        <?php
        print $row['description'];
        ?>
        </div>
    </div>
    <br class="clear" />
    <hr />
</div>
<br />
<?php
}
?>
<div>