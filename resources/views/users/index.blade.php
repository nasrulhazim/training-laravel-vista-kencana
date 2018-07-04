@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	User Management
                    <a href="{{ route('users.create') }}" 
                        class="btn btn-success float-right btn-sm">
                        New User
                    </a>
                </div>
                <div class="card-body">
                    <div class="float-right">
                        {{ $users->links() }}
                    </div>
                    <table class="table">
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($users as $key => $user)
                            <tr>
                                <td class="text-center">
                                    {{ ($key + 1) + ($users->currentPage() - 1) * ($users->perPage()) }}
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('users.show', $user->id) }}" 
                                            class="btn btn-sm btn-info">
                                            Details        
                                        </a>
                                        @hasanyrole('developer|administrator')
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                            Edit
                                        </a>
                                        @endhasanyrole
                                        <div onclick="
                                                if(confirm('Are you sure want to delete this user?')) {
                                                    document.getElementById('delete-user-{{ $user->id }}').submit();
                                                }
                                            " 
                                            class="btn btn-sm btn-danger">
                                                Delete
                                            </div>
                                            <form 
                                                id="delete-user-{{ $user->id }}"
                                                method="POST" 
                                                action="{{ route('users.destroy', $user->id) }}"
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
                        {{ $users->links() }}
                    </div>
                </div>
          	</div>
        </div>
    </div>
</div>
@endsection