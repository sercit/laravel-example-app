@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="action.php">
            @foreach($fields as $field)
                <input type="text" name="{{$field}}" placeholder="{{$field}}"><br>
            @endforeach()
                <input type="submit" value="Send">
            </form>
        </div>
    </div>
</div>
@endsection
