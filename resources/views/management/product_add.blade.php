@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">新增商品</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('productAdd') }}" enctype="multipart/form-data"> 
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('fail') ? ' has-error' : '' }}">
                            <label for="product_name" class="col-md-4 control-label">商品名稱</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control" name="product_name" value="{{ old('product_name') }}" required autofocus>

                                @if ($errors->has('fail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fail') ? ' has-error' : '' }}">
                            <label for="product_number" class="col-md-4 control-label">商品庫存數量</label>

                            <div class="col-md-6">
                                <input id="product_number" type="number" class="form-control" name="product_number" required>

                                @if ($errors->has('fail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}
            
                                    <div class="form-group{{ $errors->has('product_price') ? ' has-error' : '' }}">
                                        <label for="product_price" class="col-md-4 control-label">商品金額</label>
            
                                        <div class="col-md-6">
                                            <input id="product_price" type="number" class="form-control" name="product_price" value="{{ old('product_price') }}" required autofocus>
            
                                            @if ($errors->has('product_price'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('product_price') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
            
            
                                    <div class="form-group{{ $errors->has('product_status_id') ? ' has-error' : '' }}">
                                            <label for="product_status_id" class="col-md-4 control-label"></label>
                
                                            <div class="col-md-6">
                                                <input id="product_status_id" type="hidden" class="form-control" name="product_status_id" value="1" required>
                
                                                @if ($errors->has('product_status_id'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('product_status_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    
                                    <div class="form-group{{ $errors->has('product_buy_price') ? ' has-error' : '' }}">
                                        <label for="product_buy_price" class="col-md-4 control-label">商品進價</label>
            
                                        <div class="col-md-6">
                                            <input id="product_buy_price" type="number" class="form-control" name="product_buy_price" value="{{ old('product_buy_price') }}" required autofocus>
            
                                            @if ($errors->has('product_buy_price'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('product_buy_price') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('product_category_id') ? ' has-error' : '' }}">
                                            <label for="product_category_id" class="col-md-4 control-label">商品類別</label>

                                            <div class="col-md-6">
                                                {{--  <input id="product_category_id" type="text" class="form-control" name="product_category_id" value="{{ old('product_category_id') }}" required autofocus>--}}
                                                <select name="product_category_id" id="product_category_id" >
                                                    <option value="0"></option>
                                                    <option value="1">罐頭</option>
                                                    <option value="2">飲料</option>
                                                    <option value="3">零食</option>
                                                    <option value="4">醬料</option>
                                                    <option value="5">冷凍食品</option>
                                                </select>    
                                                @if ($errors->has('product_category_id'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('product_category_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    


                                        <div class="form-group{{ $errors->has('product_describe') ? ' has-error' : '' }}">
                                                <label for="product_describe" class="col-md-4 control-label">商品敘述</label>
                    
                                                <div class="col-md-6">
                                                    <input id="product_describe" type="text" class="form-control" name="product_describe" value="{{ old('product_describe') }}" required>
                    
                                                    @if ($errors->has('product_describe'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('product_describe') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="upload_file" class="col-md-4 control-label">圖片上傳</label>
                                                <div class="col-md-6 col-md-offset-4">
                                                    <input type="file" name="file" class="form-control">
                                                </div>
                                            </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    新增
                                </button>

                                {{-- <a class="btn btn-link" href="{{ //route('password.request') }}"> 
                                    Forgot Your Password?   
                                </a>
                                --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection