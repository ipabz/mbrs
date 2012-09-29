
<div id="mainContent">
	<br />
    <h3 class="page-title"><?php print lang('motor_bikes_label');  ?></h3>
    
    <?php  //$this->load->view('pages/motorbikes/options'); ?>
    
    <div class="page-content">
    	<div class="text-right"><a class="button-custom" href="<?php print site_url('motorbikes/models'); ?>"><?php print lang('model_label'); ?></a><hr /></div>
        <?php print $output->output; ?>
    </div>   
    
</div>

<?php 
foreach($output->css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($output->js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>