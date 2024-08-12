@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Management') }}</div>

                <div class="card-body">
                    <div class="container mt-0">
                        <h1>Edit User</h1>

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('users.update', $user->id) }}" method="POST" class="mt-4">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" id="password" name="password" class="form-control">
                                <small class="form-text text-muted">Leave blank if you don't want to change the password</small>
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password:</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Role:</label>
                                <select id="role" name="is_admin" class="form-select" required>
                                    <option value="" disabled>Select Role</option>
                                    <option value="admin" {{ old('role', $user->is_admin) == '1' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ old('role', $user->is_admin) == '0' ? 'selected' : '' }}>User</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Update User</button>
                            <a href="{{ route('users.index') }}" class="btn btn-secondary mt-0">Cancel</a>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection