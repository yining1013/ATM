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
                    <div class="panel-heading">修改密码</div>

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

                            <form method="post" action="{{url('card/save_pwd')}}">
                                原支付密码：<input type="password" name="old_pwd">
                                新支付密码：<input type="password" name="new_pwd">
                                确认新密码：<input type="password" name="pwd_confirm">
                                <button>确认</button>
                            </form>


                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection