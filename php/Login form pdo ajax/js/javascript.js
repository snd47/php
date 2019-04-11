$(document).ready(function() {
    var login =$('#login');

    var response= $('.response');
    login.on('submit', function(e) {
        e.preventDefault();

        $.ajax({
			// here is the location to our php file which will be called by AJAX
			url: './ajax/login.php',
			// the data will be sent using POST method
			type: 'POST',
			// data type is HTML
			dataType: 'html',
			data: login.serialize(),
			// so here before we get any response from it is going to show "Loading..."
			beforeSend: function() {
				response.fadeOut();
				response.fadeIn();
				response.html('Loading...');
			},
			// if the data was successfully sent
			// then it shouw the result in our "alert_content" div
			success: function(data) {
				response.html(data).fadeIn();
				login.trigger('reset');
			},
			error: function(e) {
				console.log(e)
			}
		});
    })
})