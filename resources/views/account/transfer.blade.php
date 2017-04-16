@extends('.\layouts.app')
<style>
    .transfer_save{
        position: relative;
        left: 250px;
    }
    #money{
        position: relative;
        left: 28px;
    }
</style>
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">转账</div>

                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{url('account/transfer/save')}}" class="transfer_save">

                            {{ csrf_field() }}
                            对方卡号：<input type="text" name="card_id"><br><br>
                            金额：<input type="text" id="money" name="account"><br><br>
                            支付密码：<input type="password" name="pwd"><br><br>
                            <button>确定</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection