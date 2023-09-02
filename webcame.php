<!DOCTYPE html>
<html>
<head>
	<title>Webcam</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<style>
		#snap {
			display: none;
		}
	</style>
</head>
<body>
	<h1>Webcam</h1>
	<div id="video-container">
		<video id="video" width="640" height="480" autoplay></video>
	</div>
	<button id="toggle">Turn On</button>
	<button id="snap">Capture</button>
	<br/>
	<input type="file" id="file-input">
	<script>
		var video = document.querySelector("#video");
		var canvas = document.createElement("canvas");
		var context = canvas.getContext("2d");
		var isStreaming = false;

		document.querySelector("#toggle").addEventListener("click", function() {
			if (!isStreaming) {
				navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
					video.srcObject = stream;
					video.play();
					isStreaming = true;
					document.querySelector("#toggle").innerText = "Turn Off";
					document.querySelector("#snap").style.display = "block";
				}).catch(function(error) {
					console.log("Error getting user media: " + error);
				});
			} else {
				video.pause();
				video.srcObject = null;
				isStreaming = false;
				document.querySelector("#toggle").innerText = "Turn On";
				document.querySelector("#snap").style.display = "none";
				document.querySelector("#output").src = "#";
			}
		});

		document.querySelector("#snap").addEventListener("click", function() {
			if (isStreaming) {
				canvas.width = video.videoWidth;
				canvas.height = video.videoHeight;
				context.drawImage(video, 0, 0, canvas.width, canvas.height);
				canvas.toBlob(function(blob) {
					var formData = new FormData();
					formData.append("image", blob, "image.jpg");
					$.ajax({
						type: "POST",
						url: "save.php",
						data: formData,
						processData: false,
						contentType: false,
						success: function(msg) {
							alert("Image saved: " + msg);
							document.querySelector("#file-input").value = "";
						},
						error: function(jqXHR, textStatus, errorThrown) {
							console.log("Error saving image: " + textStatus + ", " + errorThrown);
						}
					});
					var url = URL.createObjectURL(blob);
					document.querySelector("#output").src = url;
					document.querySelector("#output").style.display = "block";
					document.querySelector("#file-input").files = [blob];
				});
			} else {
				document.querySelector("#output").src = "#";
				document.querySelector("#output").style.display = "none";
				document.querySelector("#file-input").value = "";
			}
		});
	</script>
</body>
</html>
