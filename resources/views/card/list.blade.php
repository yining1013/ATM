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
                    <div class="panel-heading">银行卡</div>

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

                                <form method="post" action="{{url('card/save')}}">
                                    卡号：<input type="text" name="card_id"><br><br>
                                    支付密码：<input type="text" name="pwd"><br><br>
                                    <button>确定</button>
                                </form>
                            @endif


                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection