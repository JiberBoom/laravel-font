@inject('sidebar','App\Sidebar')
@section('style')

@endsection
<div class="col-md-2"  style="margin-left: -10px">
    <div class="panel panel-primary">
        <div class="panel-heading">操作面板</div>

        <div class="panel-body">
            {!! Menu::get('MyNavBar')->asUl( ['class'=>'nav nav-list'],['class'=>'nav nav-list tree'] ) !!}
        </div>
    </div>
</div>




