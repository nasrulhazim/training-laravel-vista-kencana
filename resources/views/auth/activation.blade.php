@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Activation Account</div>
                <div class="card-body">
                    @if(isset($notice))
                        <div class="alert alert-warning">{{ $notice }}</div>
                    @endif
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('account.activation.resend') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="">
                                <input id="email" type="email" class="form-control" 
                                name="email" value="{{ old('email') }}" 
                                placeholder="Please enter your e-mail address" 
                                required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Resend Activation E-mail
                                </button>

                                <a class="btn btn-link float-right" 
                                    href="{{ url('/password/reset') }}">
                                    Forgot Your Password?
                                </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection