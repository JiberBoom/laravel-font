@extends('layouts.app')

@section('content')
    @if($q)
        @if($fonts->total() >0 )
        <div class="row">
            {{--字体搜索结果--}}
            <div class="col-md-12">
                <div class="panel panel-default list-panel search-results">
                    <div class="panel-heading">
                        <h3 class="panel-title ">
                            <i class="fa fa-search"></i> 关于 “<span class="highlight">{{ $q }}</span>” 的字体搜索结果, 共 {{ $fonts->total() }} 条
                        </h3>
                    </div>

                    <div class="panel-body ">

                        <div class="table-responsive ">
                            <table class="table table-striped table-bordered table-hover" >
                                <th class="info">字体名</th>
                                <th class="info">大小</th>
                                <th class="info">作者</th>
                                <th class="info">描述</th>
                                <th class="info">唯一标识</th>
                                <th class="info">下载量</th>
                                <th class="info">缩略图url</th>
                                <th class="info">预览图url</th>
                                <th class="info">字体url</th>
                                <th class="info">MD5</th>
                                <th class="info">价格</th>

                                @foreach($fonts as $font)
                                    <tr>

                                        <td>
                                            {{$font->name}}
                                        </td>
                                        <td>{{$font->size}}</td>
                                        <td>{{$font->author}}</td>
                                        <td>
                                            @if(isset($font->highlight['desc']))
                                                @foreach($font->highlight['desc'] as $item)
                                                    {!! $item !!}
                                                @endforeach
                                            @else
                                                {{$font->desc}}
                                            @endif

                                        </td>
                                        <td>{{$font->unique_str}}</td>
                                        <td>{{$font->download}}</td>
                                        <td>
                                            @if(isset($font->highlight['thumb_url']))
                                                @foreach($font->highlight['thumb_url'] as $item)
                                                    {!! $item !!}
                                                @endforeach
                                            @else
                                                {{$font->thumb_url}}
                                            @endif

                                        </td>
                                        <td>
                                            @if(isset($font->highlight['preview_url']))
                                                @foreach($font->highlight['preview_url'] as $item)
                                                    {!! $item !!}
                                                @endforeach
                                            @else
                                                {{$font->preview_url}}
                                            @endif

                                        </td>
                                        <td>{{$font->font_url}}</td>
                                        <td>
                                            @if(isset($font->highlight['md5']))
                                                @foreach($font->highlight['md5'] as $item)
                                                    {!! $item !!}
                                                @endforeach
                                            @else
                                                {{$font->md5}}
                                            @endif

                                        </td>
                                        <td>{{$font->price}}</td>

                                    </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                    {{ $fonts->links() }}
                </div>
            </div>
        </div>

        @endif
        <div class="row">
            {{--用户搜索结果--}}
            @if($users->total() >0 )
            <div class="col-md-6">
                <div class="panel panel-default list-panel search-results">
                    <div class="panel-heading">
                        <h3 class="panel-title ">
                            <i class="fa fa-search"></i> 关于 “<span class="highlight">{{ $q }}</span>” 的用户搜索结果, 共 {{ $users->total() }} 条
                        </h3>
                    </div>

                    <div class="panel-body ">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" >
                                <th class="info">姓名</th>
                                <th class="info">邮箱</th>
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        @if(isset($user->highlight['name']))
                                            @foreach($user->highlight['name'] as $item)
                                                {!! $item !!}
                                             @endforeach
                                            @else
                                            {{$user->name}}
                                        @endif

                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                    {{ $users->links() }}
                </div>
            </div>
            @endif

            {{--语种搜索结果--}}
            @if($languages->total() >0 )
            <div class="col-md-6">
                <div class="panel panel-default list-panel search-results">
                    <div class="panel-heading">
                        <h3 class="panel-title ">
                            <i class="fa fa-search"></i> 关于 “<span class="highlight">{{ $q }}</span>” 的语种搜索结果, 共 {{ $languages->total() }} 条
                        </h3>
                    </div>

                    <div class="panel-body ">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" >
                                <th class="info">语种code</th>
                                <th class="info">语种描述</th>
                                <th class="info">语种类别</th>

                            @foreach($languages as $language)
                                    <tr>
                                        <td>{{$language->code}}</td>
                                        <td>{{$language->desc}}</td>
                                        <td>{{$language->category}}</td>

                                    </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                    {{ $languages->links() }}
                </div>
            </div>
                @endif
        </div>


    @else
        <div class="row text-center">
            <div class="col-md-12">
                <br>
                <h2>你会搜索到什么？</h2>
                <br>
                <p>学习学习再学习</p>
            </div>
        </div>
    @endif
@endsection