@extends('layouts.app')


@section('content')
    @include('../layouts.sidebar')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">增加权限</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{url('/permissions/create')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">权限名</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required >

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('guard_name') ? ' has-error' : '' }}">
                                <label for="guard_name" class="col-md-4 control-label">权限Guard</label>

                                <div class="col-md-6">
                                    <input id="guard_name" type="text" class="form-control" name="guard_name" value="{{ old('guard_name') }}" placeholder="web" required >
                                    @if ($errors->has('guard_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('guard_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        提交
                                    </button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>


    </script>
@endsection
