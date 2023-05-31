<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Monitor Incoming Part</title>
	<style>
		body {
			background-image: url('images/mil.png');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
		.dropbtn {
		background-color: green;
		color: white;
		padding: 12px;
		font-size: 12px;
		border: none;
		cursor: pointer;
		}

		.dropdown {
		position: relative;
		display: inline-block;
		}

		.dropdown-content {
		display: none;
		position: absolute;
		right: 0;
		background-color: #f9f9f9;
		min-width: 160px;
		box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
		z-index: 1;
		}

		.dropdown-content a {
		color: black;
		padding: 12px 16px;
		text-decoration: none;
		display: block;
		}

		.dropdown-content a:hover {background-color: #f1f1f1;}
		.dropdown:hover .dropdown-content {display: block;}
		.dropdown:hover .dropbtn {background-color: #3e8e41;}
		tfoot {
			background-color: #3f87a6;
			color: #fff;
		}

		tbody {
			//background-color: #e4f0f5;
			font-size: .7rem;
		}

		caption {
			padding: 10px;
			caption-side: bottom;
		}

		table {
			border-collapse: collapse;
			border: 1px solid rgb(200, 200, 200);
			letter-spacing: 1px;
			font-family: sans-serif;
			font-size: .8rem;
			position: relative;
			border-collapse: collapse; 
		}

		td,th{
			border: 1px solid rgb(190, 190, 190);
			padding: 2px 2px;	
			vertical-align: middle;
		}
		
		thead {
			border: 1px solid rgb(190, 190, 190);
			padding: 2px 5px;
			position: sticky;
			top: 0;
			background-color: green;
			color: #fff;
		}

		/* The Modal (background) */
		.modal {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 1; /* Sit on top */
			padding-top: 100px; /* Location of the box */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
			background-color: #fefefe;
			margin: auto;
			padding: 20px;
			border: 1px solid #888;
			width: 80%;
		}

		/* The Close Button */
		.close {
			color: #aaaaaa;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}

		.close:hover,
		.close:focus {
			color: #000;
			text-decoration: none;
			cursor: pointer;
		}
		
		.modal2 {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 1; /* Sit on top */
			padding-top: 100px; /* Location of the box */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}
		.close2 {
			color: #aaaaaa;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}

		.close2:hover,
		.close2:focus {
			color: #000;
			text-decoration: none;
			cursor: pointer;
		}
		
		.button {
			display: inline-block;
			padding: 4px 7px;
			font-size: 12px;
			cursor: pointer;
			text-align: center;
			color: #fff;
			background-color: #3f87a6;
			border: none;
			border-radius: 10px;
		}

		.button:hover {background-color: #3e8e41}

		.button:active {
			background-color: #3e8e41;
			box-shadow: 0 5px #666;
			transform: translateY(4px);
		}

		.close3 {
			color: #aaaaaa;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}

		.close3:hover,
		.close3:focus {
			color: #000;
			text-decoration: none;
			cursor: pointer;
		}
		
		.close6 {
			color: #aaaaaa;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}

		.close6:hover,
		.close6:focus {
			color: #000;
			text-decoration: none;
			cursor: pointer;
		}
		
		.even { background-color:#FFF; }
		.odd { background-color:#e4f0f5; }
	</style>
</head>

<body>
<?php 
include "koneksi.php";
if(isset($_REQUEST['tanggal'])){
	?> 
	<script>plier
		setTimeout("location.href = 'http://192.168.0.32/incomingqc?tanggal=<?php echo $_REQUEST['tanggal']; ?>';",725000);
	</script>
	<?php 
}else{
	?> 
	<script>
		setTimeout("location.href = 'http://192.168.0.32/incomingqc'",500000);
	</script>
	<?php 
}
?>
<h1><center>
	<table border=0>
	<tr>
		<td rowspan=2>
			<img src="images/mmm.png" width="60px"> 
		</td>
		<td align="right">
			MONITORING KEDATANGAN PART SUPPLIER
		</td>
	</tr>
	<tr>
		<td align="right">
			PT MILENIA MEGA MANDIRI
		</td>
	</tr>
	</table>
</center></h1>
<div id="myModal2" class="modal">
  <div class="modal-content">
    <span class="close2">&times;</span><center>
	<video id="myVideo" width="95%" height="95%" controls>
		<source src="video/Company Profile Milenia Group_1.mp4" type="video/mp4">
		Your browser does not support the video tag.
	</video></center>
  </div>
</div>
<h3>
	<div style="width:50%;float:right;text-align: right;valign: middle">
		<div class="dropdown" style="float:right;">
		<button class="dropbtn">&#9776; Menu</button>
		<div class="dropdown-content">
			
			<?php 
			if(!isset($_SESSION['admin_incomingqc'])){
			?>
				<a href="login.php">&#10150; Login</a>
				<script>
				// Get the modal 2 =============================================================
				var modal2 = document.getElementById("myModal2");
				var span2 = document.getElementsByClassName("close2")[0];
				var vid = document.getElementById("myVideo");
				let key = 0; // global
				
				const videoSource = [];
				videoSource[0] = 'video/Company Profile Milenia Group_1.mp4';
				videoSource[1] = 'video/Review Flow Proses Retail 1.mp4';
				videoSource[2] = 'video/Review Flow Proses full.mp4';
				videoSource[3] = 'video/Keselamatan Kerja/1 Pengantar manajemen keselamatan bekerja dengan bahan kimia untuk manajer pabrik.mp4';
				videoSource[4] = 'video/Keselamatan Kerja/2 Hazard, Risk & Safety - Understanding Risk Assessment, Management and Perception pilihan 0000.mp4';
				// videoSource[3] = 'video/Keselamatan Kerja/3 ILM Posisi Ergonomis pilihan 000.mp4';
				// videoSource[4] = 'video/Keselamatan Kerja/4 HAL YANG HARUS DIHINDARI AGAR TIDAK TERJADI KECELAKAAN KERJA.mp4';
				// videoSource[5] = 'video/Video K3 Kebakaran dan Gempa Bumi/Catat! Ini 7 Langkah Cegah Kebakaran Akibat Korsleting Listrik.mp4';
	
				const videoCount = videoSource.length; 
				
				let inactivityTime = function () {
					let time;
					window.onload = resetTimer;
					document.onload = resetTimer;
					document.onmousemove = resetTimer;
					document.onmousedown = resetTimer; // touchscreen presses
					document.ontouchstart = resetTimer;
					document.onclick = resetTimer; // touchpad clicks
					document.onkeypress = resetTimer;
					document.addEventListener('scroll', resetTimer, true); // improved; see comments
					function logout() {
						modal2.style.display = "block";
						vid.play();
					}
					function resetTimer() {
						clearTimeout(time);
						time = setTimeout(logout, 20000);
					}
				};
				inactivityTime();
				
				span2.onclick = function() {
					modal2.style.display = "none";
					vid.pause(); 
				}
				window.onclick = function(event) {
					if (event.target == modal2) {
						modal2.style.display = "none";
						vid.pause();
					}
				}
				
				vid.addEventListener('ended',myHandler,false);
				function myHandler(e) {
					modal2.style.display = "none";
					vid.pause(); 
					key+=1;
					if (key == videoCount) {
						key = 0;
					} 
					vid.setAttribute("src", videoSource[key]);
				}		
				</script>
			<?php 
			}else{
				if($_SESSION['admin_incomingqc_lvl'] == 1){
				?>
					<a href="index_standard.php">&#9787; Manage Part/Supplier</a>
					<a onclick="openwindow6();">&#9998; Change Password</a>
				<?php 
				}
				?>
				<!--<a href="isi-tabel.php">&#10009; Add Data</a>-->
				<a onclick="openwindow3();">&#10009; Add Data</a>
				<a onclick="openwindow();">&#10063; Download Data</a>
				<a onclick="openwindow2();">&#x27A4; Play Video</a>
				<a href="logout.php">&#10150; Logout</a>
				<?php 
			}
			?>
			<script>
			var modal2 = document.getElementById("myModal2");
			var vid = document.getElementById("myVideo");
			var span2 = document.getElementsByClassName("close2")[0];
			function openwindow2(){
				modal2.style.display = "block";
				vid.play(); 
			}
			
			span2.onclick = function() {
				modal2.style.display = "none";
				vid.pause(); 
			}
			window.onclick = function(event) {
				if (event.target == modal2) {
					modal2.style.display = "none";
					vid.pause();
				}
			}
			
			vid.addEventListener('ended',myHandler,false);
			function myHandler(e) {
				modal2.style.display = "none";
				vid.pause(); 
				key++;
				if (key == videoCount) {
					key = 0;
				} 
				vid.setAttribute("src", videoSource[key]);
			}	
			</script>
		</div>
		</div>
	</div>
</h3>
<h3><form method="post" action="index.php">
	<div style="width:50%;float:left;text-align: left;valign: middle">
	Pilih Tanggal : <input type="date" name="tanggal" id="tanggal" min="2022-01-01" value="
	<?php 
		if(isset($_REQUEST['tanggal'])){
			echo $_REQUEST['tanggal'];
		}else{
			echo date('Y-m-d'); 
		}
	?>">
</div>
	</div>
<div class="col-sm-12">
		        <div class="form-group">
				<label for="">Pilih Supplier :</label>
					<select name="supplier" id="supplier"  class="form-control" >
					<option value="0">- Pilih supplier-</option>
		        <?php
					$query = mysqli_query($conn,"select distinct Supplier from part_sup order by Supplier");
					while ($row = mysqli_fetch_assoc($query)) {
						if($row['Supplier'] == $_REQUEST['supplier']){
							$slct = "selected";
						}else{ $slct="";}
						echo "<option $slct value='".$row['Supplier']."'>".$row['Supplier']."</option>";
					}	
				?>
		            </select>
		        </div>
		    </div>
<div class="col-sm-12">
		        <div class="form-group">
					
		            <select name="delvtype" id="delvtype" class="form-control">
		                <option value="0">~ Select import/Lokal ~~</option>
						<!-- <option  value="import" <?php //if($row['delvtype']);?>>IMPORT</option>
						<option value="lokal" <?php //if($row['delvtype']);?>>LOKAL</option>  -->
						<?php
						   include "koneksi.php";
						   //query menampilkan nama asal supplier ke dalam combobox
						   $query    =mysqli_query($conn, "SELECT * FROM incoming GROUP BY delvtype ORDER BY delvtype");
						   while ($data = mysqli_fetch_array($query)) {
						   ?>
						   <option value="<?=$data['delvtype'];?>"><?php echo $data['delvtype'];?></option>
						   <?php }
											
						  
						
						
					

						?>
		            </select>
		        </div>
		    </div>
<input type="submit" value="Cari">
</form></h3>	
<br><br>

<table width="100%" border="1" id="datatable">
	<thead>
	 <tr>
      <th colspan="2" scope="col">DATE</th>

      <th colspan="2" scope="col">JAM<br>KEDATANGAN</th>
      <th rowspan="2" scope="col">NO</th>
      <th rowspan="2" scope="col">PART NAME</th>
      <th rowspan="2" scope="col">PO. NO</th>
	  <th rowspan="2" scope="col" >QTY PO</th>
      <th rowspan="2" scope="col" >SUPPLIER</th>
      <th scope="col">LOKAL</th>
      <th colspan="3" scope="col">QTY KEDATANGAN</th>
      <th rowspan="2" scope="col">QTY AQL</th>
      <th colspan="2" scope="col">STATUS</th>
      <th rowspan="2" scope="col">KETERANGAN</th>
    </tr>
    <tr>
      <th align="center" width='7%'>Plan</th>
      <th align="center" width='7%'>Actual</th>
      <th align="center" width='4%'>Plan</th>
      <th align="center" width='4%'>Actual</th>
      <th align="center">IMPORT</th>
      <th align="center">Plan</th>
      <th align="center">Actual</th>
      <th align="center">PCS/SET</th>
      <th align="center">OK</th>
      <th align="center">NG</th>
    </tr>
  </thead>
  <tbody id="databody">
<?php 
$no=1;
$today = date('Y-m-d');

if(isset($_REQUEST['tanggal'])){
	$tgl = $_REQUEST['tanggal'];
	$cari_tgl = "where date_p like '%$tgl%'";
}else{
	$cari_tgl = "";
}

if(isset($_REQUEST['supplier'])){
	$sup = $_REQUEST['supplier'];
	if($sup==0){
		$cari_sup = "";
	}else{
		$cari_sup = "and supplier = '$sup'";
	}
}else{
	$cari_sup = "";
}

if(isset($_POST['delvtype'])){
	$del = $_POST['delvtype'];
	if($del==0){
		$cari_del = "";
	}else{
		$cari_del = "and delvtype = '$del'";
	}
}else{
	$cari_del = "";
}

$cari = mysqli_query($conn,"select * from incoming $cari_tgl $cari_sup $cari_del  order by id desc");
if (mysqli_num_rows($cari) == 0){
?>
	<tr>
		  <td align="center" colspan="16"><h1>DATA MASIH KOSONG</h1></td>
	</tr>
<?php
}else{
	$c = 0;
	while($data = mysqli_fetch_array($cari)){		
		$id 			= $data['id'];
		$date_p 		= date("d-m-Y",strtotime($data["date_p"]));
		$jamdatang_p 	= date("H:i",strtotime($data["date_p"]));
		if($data["date_a"] !='0000-00-00 00:00:00'){
			$date_a 		= date("d-m-Y",strtotime($data["date_a"]));
			$jamdatang_a 	= date("H:i",strtotime($data["date_a"]));
		}else{
			$date_a 		= "-";
			$jamdatang_a 	= "-";
		}
		$partname 		= $data['partname'];
		$no_po 			= $data['no_po'];
		$qty_po         = $data['qty_po'];
		$supplier 		= $data['supplier'];
		$delvtype 		= $data['delvtype'];
		$qtydatang_p 	= $data['qtydatang_p'];
		$qtydatang_a	= $data['qtydatang_a'];
		$qtydatang_sat 	= $data['qtydatang_sat'];
		$qtyaql 		= $data['qtyaql'];
		$stat_ok 		= $data['stat_ok'];
		$stat_ng 		= $data['stat_ng'];
		$ket 			= $data['ket'];
		
		?>
		<tr class="<?=($c++%2==1) ? 'odd' : 'even' ?>">
		<?php
		echo "
		<td align='center'>$date_p</td>
		<td align='center'>$date_a</td>
		<td align='center'>$jamdatang_p</td>
		<td align='center'>$jamdatang_a</td>
		<td align='center'>$no</td>
		<td align='center'>$partname</td>
		<td align='center'>$no_po</td>
		<td align='center'>$qty_po</td>
		<td align='center'>$supplier</td>
		<td align='center'>$delvtype</td>
		<td align='center'>$qtydatang_p</td>
		<td align='center'>$qtydatang_a</td>
		<td align='center'>$qtydatang_sat</td>
		<td align='center'>$qtyaql</td>
		<td align='center'>$stat_ok</td>
		<td align='center'>$stat_ng</td>
		<td>$ket";
		if(isset($_SESSION['admin_incomingqc'])){
		?>
			<br>
			<a onclick="deletz('<?php echo $id; ?>')"><img src='images/delete.jpg' width=20px></a> 
			<a onclick="edite('<?php echo $id; ?>')"><img src='images/edit.png' width=20px></a>
		<?php 
		}
		echo "</td>
		</tr>";
		$no++;
	}
}
?>
  </tbody>
</table>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<h2>Download Excel - Monitoring Incoming Part Supplier</h2>
	<form method="get" action="excel-tabel.php">
    From : <input type="date" id="date_from" name="date_from" required>
    To : <input type="date" id="date_to" name="date_to" required>
    <input type="submit" value="Download">
    </form>
  </div>
</div>

<div id="myModal3" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close3">&times;</span>
	<?php include "isi-tabel.php"; ?>
  </div>
</div>

<div id="myModal6" class="modal">
	<!-- Modal content -->
	<div class="modal-content">
		<span class="close6">&times;</span>
		<?php include "edit-pwd.php"; ?>
	</div>
</div>

<script type="text/javascript">
	function deletz(val){
		var hapuz = confirm("Anda yakin ingin menghapus ini?");
		if(hapuz) {
			var http = new XMLHttpRequest();
			var url = "cari.php";
			var params = "cari=hapusdata&id="+val;
			http.open('POST', url, true);
			http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			http.onreadystatechange = function() {
				if (http.readyState == 4 && http.status == 200) {
					console.log(http.responseText);
					alert(http.responseText);
					location.reload();
				}
			}
			http.send(params);
		} else {
			return false;
		}
	}

	function edite(val){
		location.href = "edit-tabel.php?id="+val;
	}

	// Get the modal
	var modal = document.getElementById("myModal");
	var modal3 = document.getElementById("myModal3");
	var modal6 = document.getElementById("myModal6");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];
	var span3 = document.getElementsByClassName("close3")[0];
	var span6 = document.getElementsByClassName("close6")[0];

	// When the user clicks the button, open the modal 
	function openwindow(){
		modal.style.display = "block";
	}

	function openwindow3(){
		modal3.style.display = "block";
	}
	function openwindow6(){
		modal6.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
		modal.style.display = "none";
	}
	span3.onclick = function() {
		modal3.style.display = "none";
	}
	span6.onclick = function() {
		modal6.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
		else if(event.target == modal3){
			modal3.style.display = "none";
		}else if(event.target == modal6){
			modal6.style.display = "none";
		}
	}
	
	
	function mergeCells() {
	  let db = document.getElementById("databody");
	  let dbRows = db.rows;
	  let lastValue = "";
	  let lastCounter = 1;
	  let lastRow = 0;
	  for (let i = 0; i < dbRows.length; i++) {
		let thisValue = dbRows[i].cells[6].innerHTML;
		
		if (thisValue == lastValue) {
		  lastCounter++;
		  dbRows[lastRow].cells[6].rowSpan = lastCounter;
		  dbRows[i].cells[6].style.display = "none";
		} else {
		  dbRows[i].cells[6].style.display = "table-cell";
		  lastValue = thisValue;
		  lastCounter = 1;
		  lastRow = i;
		}
	  }
	}

window.onload = mergeCells;
</script>
</body>
</html>
