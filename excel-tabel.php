<?php
include "koneksi.php";
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=MonitorIncoming_From".$_REQUEST['date_from']."_to".$_REQUEST['date_to'].".xls");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Download Excel - MONITORING INCOMING PART</title>
    <style>
		tfoot {
			background-color: #3f87a6;
			color: #fff;
		}

		tbody {
			background-color: #e4f0f5;
		}

		caption {
			padding: 10px;
			caption-side: bottom;
		}

		table {
			border-collapse: collapse;
			border: 2px solid rgb(200, 200, 200);
			letter-spacing: 1px;
			font-family: sans-serif;
			font-size: .8rem;
			position: relative;
			border-collapse: collapse; 
		}

		td{
			border: 1px solid rgb(190, 190, 190);
			padding: 5px 10px;	
		}
		
		thead {
			border: 1px solid rgb(190, 190, 190);
			padding: 5px 10px;
			position: sticky;
			top: 0;
			background-color: #3f87a6;
			color: #fff;
		}
	</style>
</head>
<body>
<h1><center>MONITORING KEDATANGAN PART SUPPLIER</center></h1>
<table width="100%" border="1" id="datatable">
	<thead>
		<tr>
			<th colspan="2" scope="col">DATE</th>
			<th colspan="2" scope="col">JAM<br>KEDATANGAN</th>
			<th rowspan="2" scope="col">NO</th>
			<th rowspan="2" scope="col">PART NAME</th>
			<th rowspan="2" scope="col">PO. NO</th>
			<th rowspan="2" scope="col">QTY PO</th>
			<th rowspan="2" scope="col">SUPPLIER</th>
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
$cari = mysqli_query($conn,"select * from incoming where date_p >='".$_REQUEST['date_from']."' and date_p <='".$_REQUEST['date_to']."' order by id");
if (mysqli_num_rows($cari) == 0){
?>
	<tr>
		  <td align="center" colspan="15"><h1>DATA MASIH KOSONG</h1></td>
	</tr>
<?php
}else{
	while($data = mysqli_fetch_array($cari)){
		$id 			= $data['id'];
		$date_p 		= date("d-m-Y",strtotime($data["date_p"]));
		$date_a 		= date("d-m-Y",strtotime($data["date_a"]));
		$jamdatang_p 	= date("H:i",strtotime($data["date_p"]));
		$jamdatang_a 	= date("H:i",strtotime($data["date_a"]));
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
		
		echo "<tr>
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
		<td>$ket</td>
		</tr>";
		$no++;
	}
}
?>
  </tbody>
</table>
<script type="text/javascript">
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
