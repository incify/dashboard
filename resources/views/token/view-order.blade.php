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
            <h3>Transaction details</h3>
          </div>
          <div class="box-body">
            <p class="m-0 text-center text-muted">
              To make smooth & fast ETH transaction without rejection, set GAS LIMIT to 200,000 and gas price to 50 GWEI.Ethereum network is experiencing much higher traffic than usual. Please be patient.
            </p>
            <div class="row">
              <div class="col-md-6">
                <p>Send 1.000000 <b>ETH</b> to this address:</p>
                <div class="address-container">
                  <div class="form-group">
                    <input id="value" class="form-control" type="text" readonly="" value="0x9E5961AF40F278e55EAa21c2eEea998F262b4DD1">
                  </div>
                  <button onclick="document.getElementById('value').select();	document.execCommand('copy'); return false;" class="btn primary">Copy to clipboard</button>
                </div>
              </div>
              <div class="col-md-6">
                {!! QrCode::size(220)->generate('0x9E5961AF40F278e55EAa21c2eEea998F262b4DD1'); !!}
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
