<?php if (isLogined()): ?>
<div id="admin-panel">
    <div id="admin-panel-inner">
        &nbsp;<img src="<?php print base_url(); ?>images/icon-48-user.png" width="25" align="absmiddle" />
        &nbsp;
        <span>
        	<a href=""><?php print lang('rentals_label'); ?></a>
        	<a href=""><?php print lang('reservations_label'); ?></a>
            <a href="<?php print site_url('motorbikes'); ?>"><?php print lang('motorbike_label'); ?></a>
            <a href=""><?php print lang('reports_label'); ?></a>
            <a href=""><?php print lang('account_label'); ?></a>
        </span>
        <a href="<?php print site_url('manage/logout'); ?>" class="button logout-container"><?php print lang('logout_label'); ?></a>
    </div>
</div>
<?php endif; ?>