
<div id="mainContent">
	<br />
    <h3 class="page-title"><?php print lang('reservations_label');  ?></h3>
    
        
      <div class="page-content">
    		
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