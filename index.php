<!DOCTYPE html>
<html>
<head>
	<title>Upload Multiple Files</title>

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/style2.css">
  <link rel="stylesheet" href="bootstrap/css/font.css">
  <link rel="stylesheet" href="bootstrap/css/font_2.css">
  <link rel="stylesheet" href="bootstrap/css/animate.css">
  <link rel="stylesheet" href="bootstrap/css/alertify.core.css" />
  <script src="bootstrap/js/jquery-3.1.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
	<style type="text/css">
	body{
		background:#BED7E2;
	}
	#preview{
		margin-top:30px;
		display:none;
	}
	#preview img{
		margin: 5px;
		border:2px #000 solid;
	}
	.container{
		margin-top:30px;
		margin-bottom:30px;
		padding:15px;
		border-radius:5px;
		background:#F7FBFD;
		font-size:18px;
		text-align:center;
		color:#000;
		font-weight:700;
	}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
			</div>
			<div class="col-md-6">
				<center>
					<form method='post' action='' enctype="multipart/form-data">
						<input type="file" class="btn btn-secondary btn-block" id='files' name="files[]" multiple><br>
						<input type="button" id="submit" class="btn btn-dark btn-block" value='Upload'>
					</form>
				</center>
			</div>
		</div>
		<div id='preview'></div>
	</div>

	<!-- Script -->
	<script type="text/javascript">
	$(document).ready(function(){
		$('#submit').click(function(){
			document.getElementById('preview').style.display = "none";
			document.getElementById('preview').innerHTML = "";
			var form_data = new FormData();
			var totalfiles = document.getElementById('files').files.length;
			for (var index = 0; index < totalfiles; index++) {
				form_data.append("files[]", document.getElementById('files').files[index]);
			}
			$.ajax({
				url: 'ajaxfile.php',
				type: 'post',
				data: form_data,
				dataType: 'json',
				contentType: false,
				processData: false,
				success: function (response) {
					for(var index = 0; index < response.length; index++) {
						var src = response[index];
						document.getElementById('preview').style.display = "block";
						$('#preview').append('<img src="'+src+'" width="200px;" height="200px">');
					}
				}
			});
		});
	});
	</script>
</body>
</html>