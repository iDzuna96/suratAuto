<!DOCTYPE html>
<html>
<head>
	<title>Edit Data</title>
	<link rel="stylesheet" type="text/css" href="assets/Bootstrap/CSS/bootstrap.css">
	<!-- Firebase -->
	<script src="https://www.gstatic.com/firebasejs/6.3.4/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/6.3.4/firebase-firestore.js"></script>
</head>
<body>
	<div class="container" id="app"><br><br>
		<div class="card">
			<div class="card-header" style="background-color: #e3f2fd;">
				<?php include 'nav.php'; ?>
			</div>

			<div class="card-body">
			<form id="add_data">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="Nama" class="form-control" required v-model='items.Nama'>
				</div>

				<div class="form-group">
					<label>Lingkungan</label>
					<input type="text" name="Lingkungan" class="form-control" required>
				</div>

				<div class="form-group">
					<label>Register</label>
					<input type="text" name="Register" class="form-control" required>
				</div>

				<div class="form-group">
					<label>Tanggal</label>
					<input type="date" name="Tanggal" class="form-control" required>
				</div>

				<div class="form-group">
					<label>Proses</label>
					<input type="text" name="Proses" class="form-control" required>
				</div>

				<div class="form-group">
					<label>No.Revisi</label>
					<input type="text" name="Revisi" class="form-control" required>
				</div>

				<div>
					<button class="btn btn-primary" id="saveButton" v-on:click="simpan()">Save</button>
					<a href="List_Data.php" class="btn btn-danger">Back</a>
				</div> 
				</form>
			</div>
		</div>
	</div>
<script src="app.js"></script>
<script src="js/vue.js"></script>
<script type="text/javascript">
	var example = new Vue({
		el : '#app',
		data : {
			items : [],
		},
		created(){
		this.editdata();	
		},
		methods : {
			editdata(){
				const urlParams = new URLSearchParams(window.location.search);
		        console.log(urlParams.has('id')); // true
		        $id = urlParams.get('id');
		        console.log($id);
		      // get data dari resource get-produk
		      var self = this;
	    		db.collection('data_lending').where('Id','==', 'ezhLtP8lh1eONx2KtcoI').get().then((querySnapshot) => {
					querySnapshot.forEach(doc => {
						self.items.push(doc.data());
						console.log(self.items);
					})	    			
	    		})
			}
		}
	})
</script>
</body>
</html>