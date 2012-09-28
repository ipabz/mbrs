<?php print form_open('manage/login_form_ajax_process', 'id="login-form"'); ?>
<div id="error-msg-container">
</div>
<table border="0" width="100%" align="center">
	<tr>
    	<td align="right">
        	<?php
			print lang('username_label');
			?>
        </td>
    	<td align="right">
        	<input type="text" size="30" required="required" name="username" class="form_input autofocus form-element" value="<?php print set_value('username'); ?>" />
        </td>
    </tr>
    <tr>
    	<td align="right">
        	<?php
			print lang('password_label');
			?>
        </td>
    	<td align="right">
        	<input type="password" size="30" required="required" name="password" class="form_input form-element" value="<?php print set_value('username'); ?>" />
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="right">
        	<hr />
        	<input type="submit" name="login" class="btn btn-primary form-element" value="<?php print lang('login_label'); ?>" />
        </td>
    </tr>
</table>
<?php print form_close(); ?>
