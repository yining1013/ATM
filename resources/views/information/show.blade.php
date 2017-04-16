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

                            姓名：<input type="text" name="name" value="{{$information->name}}"><br><br>
                            手机：<input type="text" name="phone" value="{{$information->phone}}"><br><br>
                            性别：<input type="text" name="sex" value="{{$information->sex}}"><br><br>
                            年龄：<input type="text" name="age" value="{{$information->age}}"><br><br>
                            ID:<input type="text" name="ID_card_number" value="{{$information->ID_card_number}}"><br><br>

                       <a href="{{url('information/edit')}}">修改</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection