/*
Script Name: comet_lib
Description: a library designed to make comet programming easy to implement.
Author: Ivan Clint A. Pabelona


Usage:
	
	var handler = function(data,clib) {
		// data is the result of the ajax request
		// clib is a variable used by the library
	}
	
	var sample = new comet_lib('http://www.google.com', 'id=1', 'POST', 'json', handler);
	sample.connect(sample);

*/


var comet_lib = function(url,data,form_method,dataType,handler) {
		
		this.url = url;
		this.data = data;
		this.type = form_method;
		this.dataType = dataType;
		this.error_timeout = 5000;
		this.fetch_interval = 1000;
		this.continue_fetch = true;
		this.handler = handler;
		this.request = null;
		
		this.connect = function(clib) {
			
			this.request = $.ajax({
						url: this.url,
						data: this.data,
						type: this.type,
						dataType: this.dataType,
						success: function(data) {
							clib.handler(data,clib);
						},
						complete: function(jqXHR, textStatus) { 
							if (textStatus != 'success') {
								if (clib.continue_fetch) { 
									setTimeout(function() { clib.connect(clib); }, clib.error_timeout);	
								}
							} else {
								if (clib.continue_fetch) {
									setTimeout(function() { clib.connect(clib); }, clib.fetch_interval);
									//clib.connect(clib);
								}
							}
						}
					});
				
		}
		
};
