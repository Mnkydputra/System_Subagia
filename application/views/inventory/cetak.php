
<html>
<head>
<style>
body {font-family: sans-serif;
	font-size: 10pt;
}
p {	margin: 0pt; }
table.items {
	border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
	border-left: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #000000;
	font-variant: small-caps;
}
.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #000000;
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
.items td.totals {
	text-align: right;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: "." center;
}
</style>
</head>
<body>

<!--mpdf
<htmlpageheader name="myheader">
<table width="100%"><tr>
<td width="50%" style="color:#0000BB; "><span style="font-weight: bold; font-size: 14pt;">KWE</span><br />LOGISTIK<br /><span style="font-family:dejavusanscondensed;">Air Way Bills :</span><br /><span><?=$delivery->awb?></span></td>
<td width="50%" style="text-align: right;"></td>
<td><br/></td>
<td>
       <img class="barcodecell"><barcode code="<?php echo base_url('i/P_requirment/Status/').$delivery->po_number?>" type="QR" disableborder="1" class="barcode" size="0.8" error="M" rowspan="4">    
</td>
</tr></table>
</htmlpageheader>

<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
Page {PAGENO} of {nb}
</div>
</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->

<div style="text-align: right">Date: <?= date('d F Y', strtotime($delivery->tanggal))?></div>

<table width="100%" style="font-family: serif;" cellpadding="10"><tr>
<td width="45%" style="border: 0.1mm solid #888888; "><span style="font-size: 7pt; color: #555555; font-family: sans;">SOLD TO:</span><br /><br /> <?= $delivery->customer?> <br /><?= $delivery->shipment?> </td>
<td width="10%">&nbsp;</td>
<td width="45%"></td>
</tr></table>

<br />

<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>
<td width="20%">No</td>
<td width="20%">Shipref / Ship ID</td>
<td width="20%">Product Number</td>
<td width="20%">Description</td>
<td width="20%">Quantity</td>
<td width="20%">Total Pallet</td>
</tr>
</thead>
<tbody>
	<?php $no=1;
	foreach($delivery_order as $delivery_order) : ?>
<tr>
	<td  style="text-align: center; font-style: italic;"><?= $no++?></td>
    <td  style="text-align: center; font-style: italic;"><?= $delivery_order->shipref ?></td>
    <td  style="text-align: center; font-style: italic;"><?= $delivery_order->product_number ?></td>
    <td  style="text-align: center; font-style: italic;"><?= $delivery_order->product_desc ?></td>
    <td  style="text-align: center; font-style: italic;"><?= $delivery_order->quantity ?></td>
	<td  style="text-align: center; font-style: italic;"><?= $delivery_order->pallet?></td>
</tr>
<?php endforeach ?>
<!-- END ITEMS HERE -->
</tbody>
</table>

<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="6">
<thead>
<tr>
<td width="30%">Supervisor/Manager</td>
<td width="20%">Security Check</td>
<td width="30%">Driver/Co-Driver</td>
<td width="20%">Receiver</td>
</tr>
</thead>
<tbody>

<tr>
<td class="totals" style="text-align: center; font-style: italic;" colspan="1" rowspan="2" ></td>
<td class="totals" style="text-align: center; font-style: italic;" colspan="1" rowspan="4"></td>
<td class="totals" style="text-align: center; font-style: italic;" colspan="1" rowspan="2"><?= $delivery->supir?></td>
<td class="totals" style="text-align: center; font-style: italic;" colspan="1" rowspan="2"></td>
</tr>
<!-- END ITEMS HERE -->

<tr>
	<td class="blanktotal" colspan="3" rowspan="6"></td>
	<td class="totals"></td>
	<td class="totals cost">......</td>
	<td class="totals"></td>
</tr>
</tbody>
</table>
<br />
<table width="100%" style="font-family: serif;" cellpadding="10"><tr>
<td width="45%" style="border: 0.1mm solid #888888; "><span style="font-size: 7pt; color: #555555; font-family: sans;">Truck Type</span><br /><br /> <?= $delivery->truck?></td>
<td width="10%">&nbsp;</td>
<td width="45%" style="border: 0.1mm solid #888888;"><span style="font-size: 7pt; color: #555555; font-family: sans;">Status</span><br /><br /> <?= $delivery->status?></td>
</tr></table>
`
</body>
</html>