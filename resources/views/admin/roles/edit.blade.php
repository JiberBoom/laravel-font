@extends('layouts.app')


@section('content')
    @include('../layouts.sidebar')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">编辑角色</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="{{url('/roles/'.$infos->id)}}" enctype="multipart/form-data">

                            {{method_field('PATCH')}}

                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="font_url" class="col-md-4 control-label">角色名</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" value="{{$infos->name}}" name="name">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('guard_name') ? ' has-error' : '' }}">
                                <label for="download" class="col-md-4 control-label">角色Guard</label>

                                <div class="col-md-6">
                                    <input disabled id="guard_name" type="text" class="form-control" name="guard_name" value="{{ $infos->guard_name }}" required >
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
