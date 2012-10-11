<div id="mainContent">
    <br />
    <div id="left-container">
        <h3 class="page-title">Gallery</h3>
    	<section>
        <?php
        foreach($newModels as $model) {
        ?>
            <div>
                <strong>- 
                <?php 
                print $model['name'];
                ?>
                </strong>
            </div>
            <br />
            <div align="center">
                <img width="500" src="<?php print base_url(); ?>assets/uploads/photos/<?php print $model['photo']; ?>" />
            </div>
            <br />
            <hr />
            <br />
        <?php
        }
        ?>
        </section>
        
    </div>
    
    <div id="right-container">
    <?php $this->load->view('pages/default/check-availability'); ?>
    </div>
 </div>