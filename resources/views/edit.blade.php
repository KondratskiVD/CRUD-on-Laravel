@extends('parent')

@section('main')
<div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
    <div class="container">
        <div class="col-6">
            @include('components.Form')
        </div>
    </div>
</div>
@endsection