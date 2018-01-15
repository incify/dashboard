@extends('layouts.app')
@section('template_title')
	Invoice
@endsection
@section('content')
<div class="padding">
	<a href="#" class="btn btn-sm primary float-right hidden-print" onclick="window.print();">Print</a>
	<p><i class="fa fa-apple fa fa-3x"></i></p>
	<div class="row">
		<div class="col-6">
		</div>
		<div class="col-6 text-right">
			<p class="text-md mt-4">#{{$order->id}}</p>
			<p>{{$order->created_at}}</p>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<div class="box p-3">
				<h6>Apple Inc.</h6>
				<p class="text-muted">
					<p><a href="http://www.apple.com">www.apple.com</a></p>
					<p>1 Infinite Loop<br>95014 Cuperino, CA<br>United States</p><p>Telephone: 800-692-7753<br>Fax: 800-692-7753</p>
				</p>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="box p-3">
				<strong class="text-muted">BILL TO:</strong>
				<h6>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h6>
				<p class="text-muted">{{Auth::user()->email}}</p>
			</div>
		</div>
	</div>
	<p>Order date: <strong>{{$order->created_at}}</strong><br>Order status: <span class="badge success">{{$order->status}}</span><br>Order ID: <strong>#{{$order->id}}</strong></p>
	<div class="table-responsive">
		<table class="table table-striped white b-a">
			<thead>
				<tr>
					<th style="width: 60px">QTY</th><th>DESCRIPTION</th>
					<th style="width: 140px">RATE</th>
					<th style="width: 90px">TOTAL</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{$order->token}}</td>
					<td>{{$token_name}} Token</td>
					<td>{!! App\Helpers\Helpers::token_rate($order->currency) !!}</td>
					<td>{{ number_format($order->sent, 6) }} {{$order->currency}}</td>
				</tr>
				<tr>
					<td colspan="3" class="text-right no-border"><strong>Total</strong></td>
					<td><strong>{{ number_format($order->sent, 6) }} {{$order->currency}}</strong></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection
@section('footer_scripts')
@endsection
