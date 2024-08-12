@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Validate Parentheses') }}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('valid.parentheses') }}">
                        @csrf
                        <label for="parentheses">Enter a string of parentheses:</label>
                        <input type="text" id="parentheses" name="parentheses" required>
                        <button type="submit">Validate</button>
                    </form>

                    @if(session('result'))
                        <p>Result: {{ session('result') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
