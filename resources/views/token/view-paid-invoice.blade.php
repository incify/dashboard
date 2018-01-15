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
          <div class="box-header text-center light lt">
            <h3>Thank You for purchasing {{$token_name}} Tokens!</h3>
          </div>
          <div class="box-body">
            <p class="text-center text-muted">
							<b>Funds were successfully deducted from your account.</b><br />
							Your tokens will be delivered straight to ETH wallet by the end of ICO.<br />
In case you don't have an Ethereum wallet, it will be created automatically.
            </p>
						<p class="text-center"><a href="/token/paid-invoice-detail/{{$order->id}}" class="btn btn-outline b-primary text-primary">View Invoice Detail</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('footer_scripts')
@endsection
