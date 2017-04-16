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
                    <div class="panel-heading">历史记录</div>

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
                        <p>您的历史记录为：</p>
                        <ul>
                            <li>
                               <div> 类型：&nbsp;&nbsp;金额:</div>

                            </li>
                            @foreach($records as $record)
                            <li>
                               <p>{{$record->in_or_out}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$record->quantity}}</p>

                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection