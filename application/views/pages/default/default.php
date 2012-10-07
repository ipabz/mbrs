<div id="mainContent">
    
    <div class="slider-wrapper theme-default">
        <div id="slider" class="nivoSlider">
        <?php
			foreach(sliderImages() as $img) {
			?>
            <img src="<?php print base_url(); ?>images/slider/<?php print $img ?>" data-thumb="<?php print base_url(); ?>images/slider/<?php print $img ?>" alt="" />
            <?php
			}
		?>
            
        </div>
    </div>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
			effect: 'fade', // Specify sets like: 'fold,fade,sliceDown'
			slices: 7, // For slice animations
			boxCols: 4, // For box animations
			boxRows: 8, // For box animations
			animSpeed: 500, // Slide transition speed
			pauseTime: 3000, // How long each slide will show
			startSlide: 4, // Set starting Slide (0 index)
			directionNav: false, // Next & Prev navigation
			directionNavHide: false, // Only show on hover
			controlNav: false, // 1,2,3... navigation
			controlNavThumbs: false, // Use thumbnails for Control Nav
			controlNavThumbsFromRel: false, // Use image rel for thumbs
			controlNavThumbsSearch: '.jpg', // Replace this with...
			controlNavThumbsReplace: '_thumb.jpg', // ...this in thumb Image src
			keyboardNav: false, // Use left & right arrows
			pauseOnHover: false, // Stop animation while hovering
			manualAdvance: false, // Force manual transitions
			captionOpacity: 1, // Universal caption opacity
			prevText: 'Prev', // Prev directionNav text
			nextText: 'Next', // Next directionNav text
			beforeChange: function(){}, // Triggers before a slide transition
			afterChange: function(){}, // Triggers after a slide transition
			slideshowEnd: function(){}, // Triggers after all slides have been shown
			lastSlide: function(){}, // Triggers when last slide is shown
			afterLoad: function(){} // Triggers when slider has loaded
		});

    });
    </script>
    <br />
    <div id="left-container">
        <h3 class="page-title">Welcome to <?php print SITE_TITLE; ?> Dumaguete!</h3>
    	<section>
            
            <p>
                Looking for a scooter to rent, motorbike rental, motorcycle for hire in Dumaguete city? We simply provide you with motorbikes or scooter you need for touring Dumaguete City and all other neighboring cities.
            </p>
            <p>
                MotorBike Dumaguete - is conveniently located beside Pen Guest House, Dumaguete City premier motorbike (motorcycle, scooter, motorbikes). We offer exceptional customer service, competitive pricing and unlimited mileage on all of our current model of motorbikes. Our fleet consists of high levels of reliability, performance, handling and comfort. In addition, we equip our motorbikes with premium tires and all engine, breaks, suspension etc. are well maintained.
            </p>
            <p>
                We provide delivery for a minimal cost to anywhere on the island providing the bike is being rented for a minimum of 3 days. We provide you with a comfortable crash helmet approved by the Department of Trade and Industry (DTI).
            </p>
            <p>
                We require a valid driving license and passport and we give you a full written rental agreement for the hire of bikes.
            </p>
            <p>
                All passport are kept safe and guarded by 24/7 security guards.
            </p>
        </section>
        <br />
        <h4 class="page-title">New Motorbikes</h4>
        <section>
        	
 
            <div class="new-motorbikes-container">
                <?php
                foreach($newModels as $m) {
                ?>
                <a href=""><img src="<?php print base_url(); ?>assets/uploads/photos/<?php print $m['photo'] ?>" width="100" /></a>
                <?php
                }
                ?>
            </div>
        </section>
        <br /><br />&nbsp;
    </div>
    
    <div id="right-container">
    <?php $this->load->view('pages/default/check-availability'); ?>
    </div>
 </div>