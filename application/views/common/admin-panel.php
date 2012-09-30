<?php if (isLogined()): ?>
<div id="admin-panel">
    <div id="admin-panel-inner">
        &nbsp;<img src="<?php print base_url(); ?>images/icon-48-user.png" width="25" align="absmiddle" />
        &nbsp;
        <span>
        	<a <?php print ((currentMenu() == 'rentals') ? 'style="color: orange; font-weight: bold"' : ''); ?> href="<?php print site_url('rentals/rentals_list'); ?>"><?php print lang('rentals_label'); ?></a>
        	<a <?php print ((currentMenu() == 'reservations') ? 'style="color: orange; font-weight: bold"' : ''); ?> href="<?php print site_url('reservations/reservations_list'); ?>"><?php print lang('reservations_label'); ?></a>
        	<a <?php print ((currentMenu() == 'customers') ? 'style="color: orange; font-weight: bold"' : ''); ?> href="<?php print site_url('customers/customers_list'); ?>"><?php print lang('customers_label'); ?></a>
            <a <?php print ((currentMenu() == 'motorbikes') ? 'style="color: orange; font-weight: bold"' : ''); ?> href="<?php print site_url('motorbikes/list_motorbikes'); ?>"><?php print lang('motorbike_label'); ?></a>
            <a href=""><?php print lang('reports_label'); ?></a>
            <?php if($this->session->userdata('admin_id') == '1') { ?>
            <a <?php print ((currentMenu() == 'account') ? 'style="color: orange; font-weight: bold"' : ''); ?> href="<?php print site_url('account/account_list'); ?>"><?php print lang('account_label'); ?></a>
            <?php } else { ?>
            <a <?php print ((currentMenu() == 'account') ? 'style="color: orange; font-weight: bold"' : ''); ?> href="<?php print site_url('account/account_list/edit/'.$this->session->userdata('admin_id')); ?>"><?php print lang('edit_account_label'); ?></a>
            <?php } ?>
        </span> 
        <a href="<?php print site_url('manage/logout'); ?>" class="button-custom logout-container"><?php print lang('logout_label'); ?></a>
    </div>
</div>
<?php endif; ?>