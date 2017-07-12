$(function(){
	
	$("#contact").validate({
		rules: {
			cpwd: {
				required: true,
			},
			npwd: {
				required: true,
			},
			confp: {
				required: true,
				equalTo: "#newp"
			},
		},
		messages: {
			cpwd: {
				required: 'This field is required',
			},
			npwd: {
				required: 'This field is required',
			},
			confp: {
				required: 'This field is required',
				equalTo: "Please enter the same password as above"
			}
		},
		success: function(label) {
			label.html('OK').removeClass('error').addClass('ok');
			setTimeout(function(){
				label.fadeOut(500);
			}, 2000)
		}
	});
	
});