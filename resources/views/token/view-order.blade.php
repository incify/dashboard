@extends('layouts.app')
@section('template_title')
	Transaction details
@endsection
@section('content')
<div class="padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header light lt">
            <h3>{{$currency}} funds only</h3>
          </div>
          <div class="box-body">
            <p class="text-center text-muted">
							@if ($currency == 'BTC')
							The funds will be credited after we get confirmations from the network.<br/><b>Please note</b> that the address the system gave you for this funding is unique and can only be used once.
							@elseif($currency == 'ETH')
              To make smooth & fast ETH transaction without rejection, set GAS LIMIT to 200,000 and gas price to 50 GWEI.<br/>Ethereum network is experiencing much higher traffic than usual. Please be patient.
							@elseif($currency == 'BCH')
							The funds will be credited after we get confirmations from the network.<br/><b>Please note</b> that the address the system gave you for this funding is unique and can only be used once.
							@elseif($currency == 'LTC')
							The funds will be credited after we get confirmations from the network.<br/><b>Please note</b> that the address the system gave you for this funding is unique and can only be used once.
							@endif
            </p>
            <div class="row">
              <div class="col-md-6">
                <p>Send {{$sent}} <b>{{$currency}}</b> to this address:</p>
                <div class="address-container">
                  <div class="form-group">
                    <input id="value" class="form-control" type="text" readonly="" value="{{$address}}">
                  </div>
                  <button onclick="document.getElementById('value').select();	document.execCommand('copy'); return false;" class="btn primary">Copy to clipboard</button>
                </div>
              </div>
              <div class="col-md-6">
                {!! QrCode::size(220)->generate($address); !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('footer_scripts')
@endsection
