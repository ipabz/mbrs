<br />
<img src="<?php print base_url(); ?>images/ads.png" />
<div class="sidebar-title">
<?php
print lang('check_availability_label');
?>
</div>
<hr />
<?php print form_open('reservation/check_availability', 'id="check-availability-form"'); ?>
<table border="0" width="90%" class="mytable center">

    <tr>
    	<td>
        <?php
		print lang('start_date_label');
		?>
        </td>
        <td>
        	<input type="text" name="start-date" class="date-field date" />
        </td>
    </tr>
    
    <tr>
    	<td>
        <?php
		print lang('end_date_label');
		?>
        </td>
        <td>
        	<input type="text" name="end-date" class="date-field date" />
        </td>
    </tr>
    
    <tr>
    	<td colspan="2" align="center">
        	<br />
        	<input type="submit" class="button" name="check-availability-button" value="<?php print lang('check_availability_label'); ?>" />
        </td>
    </tr>
</table>
<?php print form_close(); ?>
<br /><br /><br /><br /><br /><br /><br /><br />&nbsp;
