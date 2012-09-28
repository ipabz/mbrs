<div class="text-right">
	<input type="button" class="btn btn-primary" onClick="Manage.newModelForm()" value="<?php print lang('new_model_label'); ?>" />
    <input type="button" class="btn btn-primary" value="<?php print lang('delete_selected_label'); ?>" />
</div>
<hr />
<div id="model-list" style="height: 400px; overflow: auto;">
	<table border="0" width="100%">
    	<tr class="table-header">
        	<td class="text-center" width="5"><input type="checkbox" /></td>
        	<td class="text-center" width="200"><?php print lang('model_name_label'); ?></td>
            <td class="text-center" width="300"><?php print lang('description_label'); ?></td>
            <td class="text-center"><?php print lang('price_label'); ?></td>
            <td class="text-center"><?php print lang('actions_label'); ?></td>
        </tr>
        <?php
		foreach($models as $index => $model) {
		?>
        <tr class="hover">
        	<td class="text-center"><input type="checkbox" /></td>
        	<td class="text-center"><?php print ucwords($model['name']); ?></td>
            <td class="text-center"><?php print word_limiter(ucwords($model['description']),4); ?></td>
            <td class="text-center"><?php print number_format($model['price'],2); ?></td>
            <td class="text-center">
            	<a href="" title="Edit"><img src="<?php print base_url(); ?>images/icon-16-help-docs.png" border="0" /></a>&nbsp;
                <a href="" title="Delete"><img src="<?php print base_url(); ?>images/icon-16-delete.png" border="0" /></a>
            </td>
        </tr>
        <?php
		}
		?>
    </table>
</div>