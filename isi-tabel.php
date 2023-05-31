<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Input Incoming QC</title>
</head>
<?php 
include "koneksi.php";
if(isset($_POST['submit'])){
	// $wplan 	= str_replace("T", " ", $_POST['wplan']);
	// $wact 	= str_replace("T", " ", $_POST['wact']);
	
	$wplan 	= $_POST['wplan']." ".$_POST['wplans'];
	$wact 	= $_POST['wact']." ".$_POST['wacts'];
	
	$part 	= $_POST['part'];
		$cari = mysqli_query($conn,"SELECT * FROM part_sup WHERE no = '$part'");
		$dtparsup = mysqli_fetch_array($cari);
	$partname 		= $dtparsup['PartName'];
	$supplier 	= $dtparsup['Supplier'];

	$no_po 	= $_POST['no_po'];
	$qty_po = $_POST['qty_po'];
	$delvtype 	= $_POST['delvtype'];
	$qtydatang_p 	= $_POST['qtydatang_p'];
	$qtydatang_a 	= $_POST['qtydatang_a'];
	$qtydatang_sat 	= $_POST['qtydatang_sat'];
	$stat_ok 	= $_POST['stat_ok'];
	$stat_ng 	= $_POST['stat_ng'];
	$qtyaql 	= $_POST['qtyaql'];
	$ket 	= $_POST['ket'];

	

	$insert = mysqli_query($conn,"insert into incoming(date_p,date_a,partname,no_po,qty_po,supplier,delvtype,qtydatang_p,qtydatang_a,qtydatang_sat,qtyaql,stat_ok,stat_ng,ket) values('$wplan','$wact','$partname','$no_po','$qty_po','$supplier','$delvtype','$qtydatang_p','$qtydatang_a','$qtydatang_sat','$qtyaql','$stat_ok','$stat_ng','$ket')");
	
	// echo "insert into incoming(date_p,date_a,partname,no_po,supplier,delvtype,qtydatang_p,qtydatang_a,qtydatang_sat,qtyaql,stat_ok,stat_ng,ket) values('$wplan','$wact','$partname','$no_po','$supplier','$delvtype','$qtydatang_p','$qtydatang_a','$qtydatang_sat','$qtyaql','$stat_ok','$stat_ng','$ket')";
	if($insert){
		echo "<script>location.href='index.php'</script>"; 
	}else{
		echo "INSERT GAGAL";
	}
}
?>
<body>
<form method="post" action="isi-tabel.php">
<table width="90%">
  <tbody>
	<tr>
		<th scope="row" align="right">Date & Hour Plan : &nbsp;</th>
		<td><input type="date" id="wplan" name="wplan" required>&nbsp;<input type="time" id="wplans" name="wplans" required></td>
	</tr>
	<tr>
		<th scope="row" align="right">Date & Hour Actual : &nbsp;</th>
		<td><input type="date" id="wact" name="wact">&nbsp;<input type="time" id="wacts" name="wacts"></td>
	</tr>
    <tr>
      <th scope="row" align="right">Part Name & Supplier : &nbsp;</th>
	  <td>
		<select name="part" id="part">
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
      <td><input type="text" name="no_po" id="no_po" required></td>
    </tr>
	<tr>
      <th scope="row" align="right">QTY PO : &nbsp;</th>
      <td><input type="text" name="qty_po" id="qty_po" required></td>
    </tr>
	<tr>
      <th scope="row" align="right">Tipe Pengiriman : &nbsp;</th>
      <td><select name="delvtype" id="delvtype">
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
			<td><input type="number" name="qtydatang_p" id="qtydatang_p" value="0"></td>
			<td><input type="number" name="qtydatang_a" id="qtydatang_a" value="0"></td>
			<td><select name="qtydatang_sat" id="qtydatang_sat">
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
			<td><input type="number" name="stat_ok" id="stat_ok" value="0"></td>
			<td><input type="number" name="stat_ng" id="stat_ng" value="0"></td>
			</tr>
		</table>
		</th>
	</tr>
	<tr>
      <th scope="row" align="right">QTY AQL : &nbsp;</th>
      <td><input type="text" name="qtyaql" id="qtyaql"></td>
    </tr>
    <tr>
      <th scope="row" align="right">Keterangan : &nbsp;</th>
      <td><textarea name="ket" id="ket"></textarea></td>
    </tr>
    <tr>
		<th colspan="2" scope="row">
			<div style="width:50%;float:right;text-align: right;valign: middle"><input type="submit" class="button" name="submit" id="submit" value="&#9998; Submit"></div>
		</th>
      </tr>
  </tbody>
</table>
</form>
	
<script>
</script>
</body>
</html>