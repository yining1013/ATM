@extends('.\layouts.app')

@section('content')
    <div class="container">
        <div class="panel-body">

        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">个人信息填写</div>

                    <div class="panel-body">
                        <ul class="nav navbar-nav">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>


                            @endif

                        </ul>
                       <form method="post" action="{{url('/information/save')}}">
                           姓名：<input type="text" name="name"><br><br>
                           手机：<input type="text" name="phone"><br><br>
                           性别：<input type="text" name="sex"><br><br>
                           年龄：<input type="text" name="age"><br><br>
                           ID:<input type="text" name="ID_card_number"><br><br>
                          <button>确定</button>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection