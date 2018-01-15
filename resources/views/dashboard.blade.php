@extends('layouts.app')
@section('template_title')
	Dashboard
@endsection
@section('content')
<div class="padding">
    <div class="row">
      <div class="col-6 col-lg-3">
        <div class="box p-3">
          <div class="d-flex">
            <span class="text-muted">Your {{ env('TOKEN_NAME') }} balance</span>
          </div>
          <div class="py-3 text-center text-lg text-success">{{ $token_balance }}</div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="box p-3">
          <div class="d-flex">
            <span class="text-muted">Referral tokens</span>
          </div>
          <div class="py-3 text-center text-lg text-primary">{{ $token_balance }}</div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-6">
      <div class="list inset box">
        <div class="box-header"><h3>Transactions</h3></div>
        <div class="box-body">
          @foreach ($orders as $order)
          <div class="list-item">
            <div><span class="w-40 avatar text-center text-success">{!!App\Helpers\Helpers::svg_icon($order->currency)!!}</span></div>
            <div class="list-body">
              <div class="float-left">
                @if ($order->status == 'completed')
                <a href="/token/paid-invoice/{{$order->id}}" class="_500">Invert {{$order->sent}} {{$order->currency}}</a>
                <span class="badge badge-pill success pos-rlt text-sm mr-2"><b class="arrow left b-success pull-in"></b>Paid</span>
                @elseif($order->status == 'expired')
                <span class="_500">Invert {{$order->sent}} {{$order->currency}}</span>
                <span class="badge badge-pill danger pos-rlt text-sm mr-2"><b class="arrow left b-danger pull-in"></b>Expired</span>
								@else
								<a href="/token/vieworder/{{$order->id}}" class="_500">Invert {{$order->sent}} {{$order->currency}}</a>
								<span class="badge badge-pill warning pos-rlt text-sm mr-2"><b class="arrow left b-warning pull-in"></b>Pending</span>
                @endif
                <small class="d-block text-muted">{{$order->created_at}}</small>
              </div>
              <div class="float-right text-right">
                <p class="token-balance"><b>{{$order->token}} {{ env('TOKEN_NAME') }}</b></p>
                @if ($order->status == 'completed')
                <a href="/token/paid-invoice/{{$order->id}}" class="btn btn-sm success" href="#">View Invoice</a>
								@elseif($order->status == 'expired')
                @else
                <a href="/token/vieworder/{{$order->id}}" class="btn btn-sm primary" href="#">Invest Now</a>
                @endif
              </div>
            </div>
          </div>
          @endforeach

      </div>
    </div>
</div>
</div>
</div>
@endsection
