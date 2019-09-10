<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
	<link rel="stylesheet" type="text/css" href="assets/Bootstrap/CSS/bootstrap.css">
	<!-- Firebase -->
	<script src="https://www.gstatic.com/firebasejs/6.3.4/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/6.3.4/firebase-firestore.js"></script>
	<script src="https://www.gstatic.com/firebasejs/6.3.4/firebase-storage.js"></script>
</head>
<body>
	<div class="container"><br><br>
		<div class="card">
			<div class="card-header" style="background-color: #e3f2fd;">
				<?php include 'nav.php'; ?>
			</div>

			<div class="card-body">
			<!-- <form id="add_data"> -->
				<div class="form-group">
					<label>No Buku Tanah</label>
					<input type="text" id="nbt" class="form-control" required>
				</div>

				<div class="form-group">
					<label>Lingkungan</label>
					<input type="text" id="lngk" class="form-control" required>
				</div>

				<div class="form-group">
					<label>Nama File</label><br>
					<progress value="0" max="100" id="uploadfile">0%</progress>
					<input type="file" class="form-control" id="uploadpdf" name="dat" accept=".pdf">
				</div>

				<div>
					<hr>
					<a href="List_data_tanah.php" class="btn btn-danger">Back</a>
				</div> 
				<!-- </form> -->
			</div>
		</div>
	</div>

<script src="app.js"></script>
<script src="js/jquery.js"></script>
<script>
// var file;
// var name;
// $('#uploadpdf').on("change"), function(e) {
// 	file = e.target.files[0];
// }

// function upld(){
// 	var filename = file.name;
// 	var storageRef = firebase.storage().ref('Test/' + filename);
// 	var uploadTask = storageRef.put(file);

// 	uploadTask.on('state_changed', function(snapshot){

// 	}, function(error){

// 	}, function() {
// 		var postKey = firebase.database().ref('Test_buku/').push().key;
// 		var downloadURL = uploadTask.snapshot.downloadURL;
// 		var updates = {};
// 		var postdata = {
// 			No_Buku_Tanah: $("#nbt").val(),
// 			Nama_buku: downloadURL 
// 		};
// 		updates['/Test_buku/'+postKey] = postdata;
// 		firebase.database().ref().update(updates);
// 		console.log(downloadURL)
// 	}
// 	)
// }

var progress = document.getElementById('uploadfile')
var button = document.getElementById('uploadpdf')
const storage = firebase.storage();

	button.addEventListener('change', function(e){

		var file = e.target.files[0];
		var storageRef = storage.ref('Test/' + file.name)
		var UploadTask = storageRef.put(file)

		UploadTask.on('state_changed', loadUpload, errUpload, complateUpload)

		function loadUpload(data){
			var perecent = (data.bytesTransferred/data.totalBytes) * 100
			progress.value = perecent
		} function errUpload(err){
			console.log('error')
			console.log(err)
		} function complateUpload(data){
			// console.log(storageRef.data().fullpath)
		UploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL){
			db.collection('Test_buku/').add({
			No_Buku_Tanah: $("#nbt").val(),
			Lingkungan: $("#lngk").val(),
			UrlDownload: downloadURL
		}).then(function(){
		  		console.log("Data Berhasil Disimpan");
		  		console.log('File available at', downloadURL);
		  		window.location="List_data_tanah.php"; 
		  	}).catch(function(error){
		  		console.log("Got an Error: ", error);
		  	});
		
		});
		}

	});

</script>
</body>
</html>