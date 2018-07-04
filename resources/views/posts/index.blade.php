@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	Daily Post
                    <a href="{{ route('posts.create') }}" 
                        class="btn btn-success float-right btn-sm">
                        New Post
                    </a>
                </div>
                <div class="card-body">
                    <div class="float-right">
                        {{ $posts->links() }}
                    </div>
                    <table class="table">
                        <tr>
                            <th class="text-center">#</th>
                            <th>Owner</th>
                            <th>Post</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($posts as $key => $post)
                            <tr>
                                <td class="text-center">
                                    {{ ($key + 1) + ($posts->currentPage() - 1) * ($posts->perPage()) }}
                                </td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->post }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('posts.show', $post->id) }}" 
                                            class="btn btn-sm btn-info">
                                            Details        
                                        </a>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">
                                            Edit
                                        </a>
                                        <div onclick="
                                                if(confirm('Are you sure want to delete this post?')) {
                                                    document.getElementById('delete-post-{{ $post->id }}').submit();
                                                }
                                            " 
                                            class="btn btn-sm btn-danger">
                                                Delete
                                            </div>
                                            <form 
                                                id="delete-post-{{ $post->id }}"
                                                method="POST" 
                                                action="{{ route('posts.destroy', $post->id) }}"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="float-right">
                        {{ $posts->links() }}
                    </div>
                </div>
          	</div>
        </div>
    </div>
</div>
@endsection