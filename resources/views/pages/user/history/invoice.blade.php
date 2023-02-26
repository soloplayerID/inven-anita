<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Invoice</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
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
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="4">
						<table>
							<tr>
								<td >

									@if ($setting->logo == null)

									@else
									<img src="{{ public_path('/fotoSetting/'.$setting->logo) }}" style="width: 50%; max-width: 300px" />
									@endif
									<br>{{$setting->name_application }}<br>Jl. Raya Hankam Ujung Aspal RT 004/006 No. 428 Kel. Jatimurni Kec. Pondok Melati, <br>Kota Bekasi, 17431

								</td>
                                <td></td>
                                @foreach ($order->unique('code_transaksi') as $item)

								<td>
                                    Invoice #: {{ $item->code_transaksi }}<br />
									Created: {{ \Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->isoFormat('D MMMM YYYY') }}<br />
                                    Customer: {{ $item->customer->name }}<br />
                                    Petugas:{{ $item->user->name }}

								</td>
                                @endforeach
							</tr>
						</table>
					</td>
				</tr>

				{{-- <tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Sparksuite, Inc.<br />
									12345 Sunny Road<br />
									Sunnyville, CA 12345
								</td>

								<td>
									Acme Corp.<br />
									John Doe<br />
									john@example.com
								</td>
							</tr>
						</table>
					</td>
				</tr> --}}

				{{-- <tr class="heading">
					<td>Payment Method</td>

					<td>Check #</td>
				</tr> --}}

				{{-- <tr class="details">
					<td>Check</td>

					<td>1000</td>
				</tr> --}}

				<tr class="heading">
				    <td>No</td>
					<td>Item</td>
                    <td>Quantity</td>
                    <td>Satuan</td>
					<td>Price</td>
				</tr>
				@php
				$no = 1;
				@endphp
                @foreach ($order as $item)

				<tr class="item">
				    <td>{{$no++}}</td>
                    <td>{{ $item->nameMenu->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->nameMenu->satuan }}</td>
					<td>RP. {{ number_format($item->jumlah_harga) }}</td>

				</tr>
                @endforeach

				{{-- <tr class="item">
					<td>Hosting (3 months)</td>
                    <td>2</td>

					<td>$75.00</td>
				</tr>

				<tr class="item last">
					<td>Domain name (1 year)</td>
                    <td>3</td>

					<td>$10.00</td> --}}
				</tr>

				<tr class="total">
					<td></td>
                    <td></td>
                    <td></td>


					<td>Total: RP .{{ number_format($jumlahHarga) }}</td>
				</tr>
			</table>
		</div>
	</body>
</html>
