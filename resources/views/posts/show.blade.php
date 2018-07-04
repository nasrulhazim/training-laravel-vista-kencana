@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	Post Details
                	<a href="{{ route('posts.index') }}" 
                		class="btn btn-sm btn-default float-right">
                		Back
                	</a>
                </div>
                <div class="card-body">
					<table class="table">
                        <tr>
                            <td class="text-right">Post</td>
                            <td>{{ $post->post }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection