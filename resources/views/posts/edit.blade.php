@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Post
                    <a href="{{ route('posts.index') }}" 
                        class="btn btn-sm btn-default float-right">
                        Back
                    </a>
                </div>
                <div class="card-body">
                    <form method="POST" 
                        action="{{ route('posts.update', $post->id) }}" 
                        aria-label="{{ __('Update Post') }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="post" class="col-md-4 col-form-label text-md-right">{{ __('Post') }}</label>

                            <div class="col-md-6">
                                <input id="post" type="text" class="form-control{{ $errors->has('post') ? ' is-invalid' : '' }}" name="post" value="{{ old('post', $post->post) }}" required autofocus>

                                @if ($errors->has('post'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('post') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Post') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection