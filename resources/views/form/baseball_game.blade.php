@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Baseball Game Score Calculator') }}</div>

                <div class="card-body">
                    

                    <form method="POST" action="{{ route('calculate.score') }}">
                        @csrf
                        <label for="ops">Enter operations (comma-separated):</label>
                        <input type="text" id="ops" name="ops" placeholder='e.g., 5,2,C,D,+' required>
                        <button type="submit">Calculate Score</button>
                    </form>

                    @if(isset($totalSum))
                    <h2>Total Score: {{ $totalSum }}</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection