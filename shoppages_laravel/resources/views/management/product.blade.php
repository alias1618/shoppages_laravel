@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
            <div class="panel panel-default">
                <div class="panel-heading">庫存管理
                <a href="{{ URL::route('add') }}">新增商品</a></div>

                        </tr>
                        <div class="container">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>編號ID</th>
                                            <th>商品名稱</th>
                                            <th>商品類別</th>
                                            <th>商品狀態</th>
                                            <th>庫存數量</th>
                                            <th>商品定價</th>
                                            <th>商品進價</th>
                                            <th>商品描述</th>
                                            <th>商品圖片</th>
                                            <th>修改商品資料</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    {{-- @if(isset($product)) --}}
                                    @foreach($product as $object)
                                        <tr>
                                            <td>{{ $object->product_id }}</td>
                                            <td>{{ $object->product_name }}</td>                                            
                                            <td>{{ $object->product_category_name }}</td>                                           
                                            <td>{{ $object->product_status_name }}</td>
                                            <td>{{ $object->product_number }}</td>
                                            <td>{{ $object->product_price }}</td>
                                            <td>{{ $object->product_buy_price }}</td>
                                            <td>{{ $object->product_describe }}</td>
                                            <td><img src="{{ asset('uploads/'.$object->product_photo_name)}}" width=15%/></td>
                                            <td><a href= "{{ route('toedit_prodcut',['product_id' => $object->product_id]) }}">{{ $object->product_id }}</a></td>
                                               
                                        </tr>
                                        @endforeach
                                        {{-- @endif --}}
                                    </tbody>
                                </table>
                                {{--  
                                <div class="col-md-5 col-md-offset-5">
                                    <button type="submit" class="btn btn-primary">
                                            修改
                                    </button>
                                </div>
                                --}}
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



{{--  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product_management</title>
</head>
<body>
    <a href="{{ URL::route('add') }}">新增商品</a>
    {{--<input type="button" value="新增商品" action="{{ route('add') }}">--}}  
    {{--
        <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>編號ID</th>
                    <th>商品名稱</th>
                    <th>商品類別</th>
                    <th>商品狀態</th>
                    <th>庫存數量</th>
                    <th>商品定價</th>
                    <th>商品進價</th>
                    <th>商品描述</th>
                   {{-- <th>圖片</th>--}}
                    {{--<th>修改/刪除圖片</th>--}}
                    {{--
                    <th>修改商品資料</th>
                </tr>
            </thead>
            <tbody>
            {{--@if(isset($product)) --}}
            {{--
                    @foreach ($product as $object)
                    <tr>
                        <td>{{ '00000'.$object->product_id }}</td>
                        <td>{{ $object->product_name }}</td>
                        <td>{{ $object->product_category_name }}</td>
                        <td>{{ $object->product_status_name }}</td> 
                        <td>{{ $object->product_number }}</td>
                        <td>{{ $object->product_price }}</td>
                        <td>{{ $object->product_buy_price }}</td> 
                        <td>{!! nl2br(e ($object->product_describe )) !!}</td>
                        {{--<td><img src="{{asset('image/uploads/product_photo/'. $object->product_photo_name )}}" width=15%/></td> --}}
                        {{--<td>{{ $object->product_price }}</td>--}}
                        {{--
                        <td><a href= "{{ route('toedit_prodcut',['product_id' => $object->product_id]) }}">{{ $object->product_id }}</a></td>
                    </tr>
                    @endforeach
               {{-- @endif --}} 
               {{--
            </tbody>
        </table>
</body>

</html>
--}}