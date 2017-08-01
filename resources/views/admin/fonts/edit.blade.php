@extends('layouts.app')


@section('content')
    @include('../layouts.sidebar')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-heading">编辑字体</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="/fonts/{{$infos->id}}" enctype="multipart/form-data">

                            {{method_field('PATCH')}}

                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('font_url') ? ' has-error' : '' }}">
                                <label for="font_url" class="col-md-4 control-label">字体文件</label>

                                <div class="col-md-6">
                                    <input type="file" class="form-control" >

                                    <span>{{$infos->font_url}}</span>

                                    @if ($errors->has('font_url'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('font_url') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('thumb_url') ? ' has-error' : '' }}">
                                <label for="thumb_url" class="col-md-4 control-label">缩略图</label>
                                <div class="col-md-6">
                                    @if($infos->thumb_url)
                                        <img src="{{$infos->thumb_url}}" id="old_thumb_url" width="80" height="80" alt="">
                                    @endif
                                    <font-thumb-upload></font-thumb-upload>
                                    @if ($errors->has('thumb_url'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('thumb_url') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('preview_url') ? ' has-error' : '' }}">
                                <label for="preview_url" class="col-md-4 control-label">预览图</label>
                                <div class="col-md-6">

                                    @if($infos->preview_url)
                                        <img src="{{$infos->preview_url}}" id="old_preview_url" width="80" height="80" alt="">

                                    @endif
                                    <font-preview-upload></font-preview-upload>
                                    @if ($errors->has('preview_url'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('preview_url') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">字体名</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $infos->name }}" required >

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('language_id') ? ' has-error' : '' }}">
                                <label for="language_id" class="col-md-4 control-label">语种</label>
                                <div class="col-md-6">

                                    <select name="language_id" class="js-multiple-ajax form-control" multiple="multiple" required>
                                        <option value="{{$infos->language_id}}" selected="selected">{{$infos->code}}</option>
                                    </select>

                                    @if ($errors->has('language_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('language_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('download') ? ' has-error' : '' }}">
                                <label for="download" class="col-md-4 control-label">下载量</label>

                                <div class="col-md-6">
                                    <input id="download" type="text" class="form-control" name="download" value="{{ $infos->download }}" required >
                                    @if ($errors->has('download'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('download') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                                <label for="author" class="col-md-4 control-label">作者</label>

                                <div class="col-md-6">
                                    <input id="author" type="text" class="form-control" name="author" value="{{ $infos->author }}" required >
                                    @if ($errors->has('author'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
                                <label for="desc" class="col-md-4 control-label">描述</label>

                                <div class="col-md-6">
                                    <input id="desc" type="text" class="form-control" name="desc" value="{{ $infos->desc }}" required >
                                    @if ($errors->has('desc'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                <label for="price" class="col-md-4 control-label">价格</label>

                                <div class="col-md-6">
                                    <input id="price" placeholder="单位：元" type="text" class="form-control" name="price" value="{{ $infos->price }}" required >
                                    @if ($errors->has('price'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('tags') ? ' has-error' : '' }}">
                                <label for="tags" class="col-md-4 control-label">标签</label>

                                <div class="col-md-6">
                                    <select name="tags" id="" class="form-control">

                                        <option value="0" @if($infos->tags ==0 ) selected @endif>正常</option>
                                        <option value="1" @if($infos->tags==1) selected @endif>最新</option>

                                        <option value="2"  @if($infos->tags==2) selected @endif>最热</option>

                                    </select>
                                    @if ($errors->has('tags'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('tags') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('is_pay') ? ' has-error' : '' }}">
                                <label for="is_pay" class="col-md-4 control-label">是否付费</label>

                                <div class="col-md-6">
                                    <select name="is_pay" id="" class="form-control">
                                        <option value="0" @if($infos->is_pay ==0 ) selected @endif>否</option>
                                        <option value="1" @if($infos->is_pay ==1 ) selected @endif>是</option>

                                    </select>
                                    @if ($errors->has('is_pay'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('is_pay') }}</strong>
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

        //以下是优化后的select2样式
        function formatLanguage (language) {

            return "<div class='select2-result-repository clearfix'>" +

                        "<div class='select2-result-repository__meta'>" +

                            "<div class='select2-result-repository__title'>" +

            language.code ? language.code : "en"   +

                            "</div>" +

                        "</div>" +

                    "</div>";

        }


        function formatLanguageSelection (language) {

            return language.code || language.text;

        }


        $(".js-multiple-ajax").select2({

            tags: true,

            placeholder: '选择语种',

            minimumInputLength: 2,

            ajax: {

                url: '/api/languages',

                dataType: 'json',

                delay: 50,

                data: function (params) {

                    return {

                        q: params.term

                    };

                },

                processResults: function (data, params) {

                    return {

                        results: data

                    };

                },

                cache: false

            },

            templateResult: formatLanguage,

            templateSelection: formatLanguageSelection,

            escapeMarkup: function (markup) { return markup; }

        });
    </script>
@endsection
