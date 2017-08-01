@extends('layouts.app')

@section('content')
    @include('./layouts.sidebar')
<div class="container">

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">欢迎回来</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
