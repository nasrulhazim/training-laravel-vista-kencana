@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-header">Invalid Activation Account</div>
			<div class="card-body">
				<p>You have clicked on invalidate account activation link.</p>
				<p>Click <a href="{{ route('account.activation.request') }}">here</a> to resend your account activation e-mail.</p>
			</div>
		</div>
	</div>
@endsection