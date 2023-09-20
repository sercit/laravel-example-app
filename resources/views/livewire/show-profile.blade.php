<div class="card">
    <div class="card-header">{{ __('Profile') }}</div>

    <div class="card-body">
        <p>ID: {!! auth()->user()->id !!}</p>
        <p>Name: {!! auth()->user()->name !!}</p>
        <p>Email: {!! auth()->user()->email !!}</p>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{ __('You are logged in!') }}
    </div>
</div>
