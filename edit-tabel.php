<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Input Incoming QC</title>
<style>
		body {
			background-image: url('images/mil.png');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
		
		tbody {
			background-color: #e4f0f5;
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
	</style>
</head>
<?php 
include "koneksi.php";
if(isset($_POST['submit'])){
    $id 	= $_POST['id'];
	$wplan 	= $_POST['wplan']." ".$_POST['wplans'];
	$wact 	= $_POST['wact']." ".$_POST['wacts'];
	
	$part 	= $_POST['part'];
        if($part != ""){
            $cari = mysqli_query($conn,"SELECT * FROM part_sup WHERE no = '$part'");
		    $dtparsup = mysqli_fetch_array($cari);
            $partname 	= $dtparsup['PartName'];
            $supplier 	= $dtparsup['Supplier'];
            $parte = "partname='$partname', supplier='$supplier',";
        }else{
            $parte = "";
        }
	$no_po 	= $_POST['no_po'];
	$qty_po = $_POST['qty_po'];
	$delvtype 	= $_POST['delvtype'];
        if($delvtype != ""){
            $dlv = "delvtype='$delvtype',";
        }else{
            $dlv = "";
        }
	$qtydatang_p 	= $_POST['qtydatang_p'];
	$qtydatang_a 	= $_POST['qtydatang_a'];
	$qtydatang_sat 	= $_POST['qtydatang_sat'];
        if($qtydatang_sat != ""){
            $qdsat = "qtydatang_sat='$qtydatang_sat',";
        }else{
            $qdsat = "";
        }
	$stat_ok 	= $_POST['stat_ok'];
	$stat_ng 	= $_POST['stat_ng'];
	$qtyaql 	= $_POST['qtyaql'];
	$ket 	= $_POST['ket'];

	$insert = mysqli_query($conn,"update incoming set date_p='$wplan', date_a='$wact', $parte no_po='$no_po', qty_po='$qty_po', $dlv qtydatang_p='$qtydatang_p', qtydatang_a='$qtydatang_a', $qdsat qtyaql='$qtyaql', stat_ok='$stat_ok', stat_ng='$stat_ng', ket='$ket'  where id='$id'");

	if($insert){
		echo "<script>location.href='index.php'</script>"; 
	}else{
		echo "INSERT GAGAL";
	}
}
?>
<body>
<?php
$cari = mysqli_query($conn,"select * from incoming where id='".$_REQUEST['id']."'");
if (mysqli_num_rows($cari) == 0){
	echo "<script>alert('not found');location.href='index.php'</script>";
}else{
    $data = mysqli_fetch_array($cari);
	$id 			= $data['id'];
    $date_p 		= date("Y-m-d",strtotime($data["date_p"]));
	$jamdatang_p 	= date("H:i",strtotime($data["date_p"]));
	if($data["date_a"] !='0000-00-00 00:00:00'){
		$date_a 		= date("Y-m-d",strtotime($data["date_a"]));
		$jamdatang_a 	= date("H:i",strtotime($data["date_a"]));
	}else{
		$date_a 		= "-";
		$jamdatang_a 	= "-";
	}
    $partname 		= $data['partname'];
    $no_po 			= $data['no_po'];
	$qty_po			= $data['qty_po'];
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
<form method="post" action="edit-tabel.php">
<input type="hidden" id="id" name="id" value="<?php echo $_REQUEST['id']; ?>">
<table width="90%">
  <tbody>
	<tr>
		<th scope="row" align="right">Date & Hour Plan : &nbsp;</th>
		<td><input type="date" id="wplan" name="wplan" value="<?php echo $date_p; ?>" required>&nbsp;<input type="time" id="wplans" name="wplans" value="<?php echo $jamdatang_p; ?>" required></td>
	</tr>
	<tr>
		<th scope="row" align="right">Date & Hour Actual : &nbsp;</th>
		<td><input type="date" id="wact" name="wact" value="<?php echo $date_a; ?>">&nbsp;<input type="time" id="wacts" name="wacts" value="<?php echo $jamdatang_a; ?>"></td>
	</tr>
    <tr>
      <th scope="row" align="right">Part Name & Supplier : &nbsp;</th>
	  <td>
		<select name="part" id="part">
            <option selected value="">-- <?php echo $partname." - ".$supplier; ?> --</option>
			<?php
			$cari_man = mysqli_query($conn,"select * from part_sup");
			while($data_man = mysqli_fetch_array($cari_man)){
			?>
				<option value="<?php echo $data_man['no']; ?>"><?php echo $data_man['PartName']; ?> - <?php echo $data_man['Supplier']; ?></option>
			<?php
			}
			?>
		</select>
	  </td>
    </tr>
	<tr>
      <th scope="row" align="right">Po No : &nbsp;</th>
      <td><input type="text" name="no_po" id="no_po" value="<?php echo $no_po; ?>" required></td>
    </tr>
	<tr>
      <th scope="row" align="right">Qty PO : &nbsp;</th>
      <td><input type="text" name="qty_po" id="qty_po" value="<?php echo $qty_po; ?>" required></td>
    </tr>
	<tr>
      <th scope="row" align="right">Tipe Pengiriman : &nbsp;</th>
      <td><select name="delvtype" id="delvtype">
            <option selected value="">-- <?php echo $delvtype; ?> --</option>
			<option value="LOKAL">Lokal</option>
			<option value="IMPORT">Import</option>
		</select>
	  </td>
    </tr>
	<tr>
	  <th scope="row" align="right">QTY Kedatangan : &nbsp;</th>
		<th scope="row">
		<table width="100%" >
			<tr>
			<th scope="row" bgcolor="green" ><font color="white">Plan</font></th>
			<th scope="row" bgcolor="green" ><font color="white">Aktual</font></th>
			<th scope="row" bgcolor="green" ><font color="white">Pcs / Set</font></th>
			</tr>
			<tr>
			<td><input type="number" name="qtydatang_p" id="qtydatang_p" value="<?php echo $qtydatang_p; ?>" ></td>
			<td><input type="number" name="qtydatang_a" id="qtydatang_a" value="<?php echo $qtydatang_a; ?>"></td>
			<td><select name="qtydatang_sat" id="qtydatang_sat">
                <option selected value="">-- <?php echo $qtydatang_sat; ?> --</option>
				<option value="PCS">PCS</option>
				<option value="SET">SET</option>
			</select></td>
			</tr>
		</table>
		</th>
	</tr>
	<tr>
	  <th  align="right" scope="row">Status : &nbsp;</th>
		<th scope="row">
		<table width="100%" >
			<tr>
			<th scope="row" bgcolor="green"><font color="white">OK</font></th>
			<th scope="row" bgcolor="green"><font color="white">NG</font></th>
			</tr>
			<tr>
			<td><input type="number" name="stat_ok" id="stat_ok" value="<?php echo $stat_ok; ?>"></td>
			<td><input type="number" name="stat_ng" id="stat_ng" value="<?php echo $stat_ng; ?>"></td>
			</tr>
		</table>
		</th>
	</tr>
	<tr>
      <th scope="row" align="right">QTY AQL : &nbsp;</th>
      <td><input type="text" name="qtyaql" id="qtyaql" value="<?php echo $qtyaql; ?>"></td>
    </tr>
    <tr>
      <th scope="row" align="right">Keterangan : &nbsp;</th>
      <td><textarea name="ket" id="ket"><?php echo $ket; ?></textarea></td>
    </tr>
    <tr>
		<th colspan="2" scope="row">
            <div style="width:50%;float:left;"><a href="index.php" class="button">&#10096; Back</a>
			<div style="width:50%;float:right;text-align: right;valign: middle"><input type="submit" class="button" name="submit" id="submit" value="&#9998; Submit"></div>
		</th>
      </tr>
  </tbody>
</table>
</form>
<?php } ?>
<script>
</script>
</body>
</html>