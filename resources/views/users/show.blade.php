@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	User Details
                	<a href="{{ route('users.index') }}" 
                		class="btn btn-sm btn-default float-right">
                		Back
                	</a>
                </div>
                <div class="card-body">
					<table class="table">
                        <tr>
                            <td class="text-right">Name</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td class="text-right">E-mail</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection