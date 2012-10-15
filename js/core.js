$(function() {
	
	$('.button').button();
	
	$('.date').datepicker();
	
	$('#check-availability-form').live('submit', function(e) {
			
			e.preventDefault();
            
            $(this).ajaxSubmit({
                success: function(data) {
                    new Messi(data, {title: "Available Motorbikes", titleClass: "custom1"});
                }
            });
			
		});
        
    $('.bike-option').live('submit', function(e) {
        
        e.preventDefault();
        
        $(this).ajaxSubmit({
            success:function(data) {
                new Messi(data, {title: "Customer Details", titleClass: "custom1", modal: true, width: 350});
            }
        });
        
    });
		
	$('#login-form').live('submit', function(e) {
			
			e.preventDefault();
			
			
			$(this).ajaxSubmit({
					beforeSend: function() {
						$('.form-element').attr('disabled', true);
					},
					success: function(data) { 
						if (data == 'success') {
							window.location = site_url;
						} else {
							$('#error-msg-container').html(data);
						}
					},
					complete: function(jqhr, status) { 
						$('.form-element').attr('disabled', false);
						$('.autofocus').select();
					}
				});
			
		});
		
	$('#motorbike-models').click(function() {
			
			var url = site_url + 'motorbikes/models';
			
			$.get(url, function(data) {
					new Messi(data, { title: "MotorBike Models", titleClass: "custom1", width: 800, modal: false });
				});
			
		});
		
	
	
});


var Manage = {
	
	loginForm: function() {
		
		var url = site_url + 'manage/login_form_ajax';
		
		$.get(url, function(data) {
			
				new Messi(data, { title: "Login", titleClass: "custom1", modal: true, width: 410 });
				$('.autofocus').focus();
				
			});
			
	},
	
	newModelForm: function() {
		
		new Messi("sammple	", { title: "New Model", titleClass: "custom1", modal: true, width: 340 });
		
	}
	
};
