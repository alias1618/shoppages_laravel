@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">修改商品資料</div>
                @if(isset($product))
                @foreach($product as $object)


                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('editproduct_update') }}">
                        {{ csrf_field() }}
                    <input id="product_id" type="hidden" class="form-control" name="product_id" value="{{ $object->product_id }}">
                        <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                            <label for="product_name" class="col-md-4 control-label">商品名稱</label>

                            <div class="col-md-6">
                                <input id="product_name" type="text" class="form-control" name="product_name" value="{{ $object->product_name }}" required autofocus>

                                @if ($errors->has('product_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('product_number') ? ' has-error' : '' }}">
                            <label for="product_number" class="col-md-4 control-label">商品庫存數量</label>

                            <div class="col-md-6">
                                <input id="product_number" type="text" class="form-control" name="product_number" value="{{ $object->product_number }}" required>

                                @if ($errors->has('product_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('product_price') ? ' has-error' : '' }}">
                                <label for="product_price" class="col-md-4 control-label">商品定價</label>
    
                                <div class="col-md-6">
                                    <input id="product_price" type="text" class="form-control" name="product_price" value="{{ $object->product_price }}" required>
    
                                    @if ($errors->has('product_price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('product_price') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                    <label for="product_buy_price" class="col-md-4 control-label">商品進價</label>
        
                                    <div class="col-md-6">
                                        <input id="product_buy_price" type="text" class="form-control" name="product_buy_price" value="{{ $object->product_buy_price }}" required>
                                    </div>
                                </div>

                        <div class="form-group{{ $errors->has('product_status_id') ? ' has-error' : '' }}">
                                <label for="product_status_id" class="col-md-4 control-label">商品狀態</label>
                                
                                <div class="col-md-6">
                                    {{-- <input id="product_status_id" type="text" class="form-control" name="product_status_id" value="{{ $object->product_status_id }}" required autofocus> --}}
                                    <select name="product_status_id" id="product_status_id" >
                                            <option value="0" {{ ($object->product_status_id=="0")?'selected':'' }} ></option>
                                            <option value="1" {{ ($object->product_status_id=="1")?'selected':'' }} >販賣中</option>
                                            <option value="2" {{ ($object->product_status_id=="2")?'selected':'' }} >缺貨中</option>
                                            <option value="3" {{ ($object->product_status_id=="3")?'selected':'' }} >停止販賣</option>

                                    </select>  
                                    @if ($errors->has('product_status_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('product_status_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        <div class="form-group{{ $errors->has('product_category_id') ? ' has-error' : '' }}">
                            <label for="product_category_id" class="col-md-4 control-label">商品類別</label>

                            <div class="col-md-6">
                                {{-- <input id="product_category_id" type="text" class="form-control" name="product_category_id" value="{{ $object->product_category_id }}" required> --}}
                                <select name="product_category_id" id="product_category_id" >
                                        <option value="0" {{ ($object->product_category_id=="0")?'selected':'' }} ></option>
                                        <option value="1" {{ ($object->product_category_id=="1")?'selected':'' }} >罐頭</option>
                                        <option value="2" {{ ($object->product_category_id=="2")?'selected':'' }} >飲料</option>
                                        <option value="3" {{ ($object->product_category_id=="3")?'selected':'' }} >零食</option>
                                        <option value="4" {{ ($object->product_category_id=="4")?'selected':'' }} >醬料</option>
                                        <option value="5" {{ ($object->product_category_id=="5")?'selected':'' }} >冷凍食品</option>
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
                                    <input id="product_describe" type="text" class="form-control" name="product_describe" value="{{ $object->product_describe }}" required autofocus>
    
                                    @if ($errors->has('product_describe'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('product_describe') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        @endforeach
                        @endif

                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    修改
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection