@inject('sidebar','App\Sidebar')

<div class="col-md-2">
    <div class="panel panel-default">
        <div class="panel-heading">操作面板</div>

        <div class="panel-body">
            {!! Menu::get('MyNavBar')->asUl( ['class'=>'nav nav-list'],['class'=>'nav nav-list tree'] ) !!}
        </div>
    </div>
</div>


