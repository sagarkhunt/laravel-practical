@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p>{{ __('You are logged in!') }}</p>

                    <!-- First Button Form -->
                    <form action="{{ route('valid.parentheses.form') }}" method="GET" style="display: inline;">
                        <button type="submit" class="btn btn-primary">Valid Parentheses</button>
                    </form>

                    <!-- Second Button Form -->
                    <form action="{{ route('show.form') }}" method="GET" style="display: inline;">
                        <button type="submit" class="btn btn-secondary">Baseball Game</button>
                    </form>

                    <!-- Third Button -->
                    <form action="/admin/users" method="GET" style="display: inline;">
                        <button type="submit" class="btn btn-secondary">User List</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection