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
                    <div class="panel-heading">账户操作</div>

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

                                @else
                                <p>您当前帐户余额为：{{$account}}</p>
                                <li><a href="{{url('account/transfer')}}">转账</a></li>
                                <li><a href="{{url('account/in')}}" class="operation">存款</a></li>
                                <li><a href="{{url('account/out')}}" class="operation">取款</a></li>
                            @endif


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection