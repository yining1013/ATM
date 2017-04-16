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


                            @endif


                        </ul>
                        <p>您所绑定的卡号为：{{$card->card_id}}</p>
                        <form action="{{ url('card/'.$card->id) }}" method="POST" style="display: inline;">
                            <input name="_method" type="hidden" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-danger">解绑此卡</button>
                        </form>
                        <a href="{{url('card/change_pwd')}}">修改密码</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection