<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Invoice</title>

		<style>
			.invoice-box {
				max-width: 800px;
				/* margin: auto; */
				margin-left: 10px;
				padding-left: 30px;
                padding-right: 30px;
                /* padding-bottom: 30px; */
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(3) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(3) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(3) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<?php
			$setting = \App\Models\Setting::find(1);
		?>
		<div class="invoice-box">
			<center><img src="{{ public_path('/fotoSetting/'.$setting->logo) }}" style="width: 50%; max-width: 200px" /></center>
			<center><span>{{$setting->name_application }}</span></center><br><pre >Jl. Raya Hankam Ujung Aspal RT 004/006 No. 428 Kel. Jatimurni<br> Kec. Pondok Melati, Kota Bekasi, 17431</pre>
			Date: {{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->isoFormat('DD MMMM YYYY ') }} <center><span style="margin-bottom: 10px;">Laporan stock barang</span></center>
			<table cellpadding="0" cellspacing="0">
				<tr class="heading">
					<th>no</th>
				    <th>Nama Product</th>
					<th>Satuan</th>
                    <th>stock tersisa</th>
				</tr>
				@php
				$no = 1;
				@endphp
                @foreach ($menus as $dt)

				<tr class="item">
				    <td style="text-align: center;">{{$no++}}</td>
                    <td style="text-align: center;">{{ $dt->name }}</td>
					<td style="text-align: center;">{{ $dt->satuan }}</td>
                    <td style="text-align: center;">{{ $dt->stock }}</td>

				</tr>
                @endforeach
			</table>
		</div>
	</body>
</html>
