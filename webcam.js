$(document).ready(function() {
	$('#webcam1').click(function() {
		$('#video1').show();
		startWebcam('#video1', 'webcam1');
	});
	$('#webcam2').click(function() {
		$('#video2').show();
		startWebcam('#video2', 'webcam2');
	});
});

function startWebcam(videoId, webcamId) {
	navigator.mediaDevices.getUserMedia({ video: true, audio: false })
	.then(function(stream) {
		$(videoId).attr('srcObject', stream);
		$(videoId).attr('autoplay', true);
		$(videoId).attr('playsinline', true);

		$(videoId).on('loadedmetadata', function() {
			sendWebcamData(webcamId);
		});
	})
	.catch(function(error) {
		console.log(error);
	});
}

function sendWebcamData(webcamId) {
	$.ajax({
		type: 'POST',
		url: 'webcam.php',
		data: { webcam: webcamId },
		success: function(response) {
			console.log(response);
		}
	});
}
