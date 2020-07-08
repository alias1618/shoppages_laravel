<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <button type="button" class="btn btn-default" onclick="window.location='{{ route('index')}}'">index</button>

{{-- dd(Session::get('cart')) --}}
{{--  
    @foreach (Session::get('cart') as $item)
    {{ $item->product_id }}
    {{ $item->product_name }}
    {{ $item->product_price }}
    @endforeach


    @foreach (Session::get('buynumbers') as $buynumber)
    {{ $buynumber }}
    @endforeach
--}}    
    {{-- var_dump(Session::get('product_array'))  --}}
    <table >
        
            <th>商品id:</th>
            <th></th>
            <th>商品名稱:</th>
            <th></th>
            <th>商品價格:</th>
            <th>刪除商品:</th>
            <th>購買數量:</th>
        
        @if(Session::has('product_array'))
        
            @foreach (Session::get('product_array') as $key_01 => $array)
            <tr>
                @foreach($array as $key_02 => $value) 
                <input type=hidden value="{!! $key_01!!}" name="key_01" id="key_01">
                <input type=hidden value="{!! $key_02 !!}" name="key_02" id="key_02">
                
                {{--  <input type=hidden value="{{ $array[$key_02]->product_id }}" name=id >--}}
                    <td>    {{--  key:{{ $key_01 }}key1:{{ $key_02 }}商品id: --}} {{ $array[$key_02]->product_id }}     </td>
                    <td></td>
                    <td>    {{-- key:{{ $key_01 }}key1:{{ $key_02 }}商品名稱: --}} {{ $array[$key_02]->product_name }}   </td>
                    <td></td>
                    <td>   {{-- key:{{ $key_01 }}key1:{{ $key_02 }}商品價格: --}} {{ $array[$key_02]->product_price }}  </td>
                    <td><input type=button value=delete  onclick="window.location='{{ route('product_delete', [$key_01])}}'"></td>
                @endforeach
                <form method="post" action="{{ route('product_number_change') }}">
                    {{ csrf_field() }}
                <td>
                    <select name="buynumber[]" id="buynumber">  
                        @foreach(Session::get('buynumber') as $key_02 => $buynumber)
                            @if($key_01 == $key_02)
                            {{--  <option value="0">0</option>--}}
                            <option value="1" @if($buynumber == "1") selected="selected"@endif>1</option>
                            <option value="2" @if($buynumber == "2") selected="selected"@endif>2</option>
                            <option value="3" @if($buynumber == "3") selected="selected"@endif>3</option>
                            <option value="4" @if($buynumber == "4") selected="selected"@endif>4</option>
                            <option value="5" @if($buynumber == "5") selected="selected"@endif>5</option>
                            {{--  <option value="{{ $buynumber }}">{{ $buynumber }}</option>--}}
                            {{-- <td>{{ --  key:$key {{ $buynumber }}</td> --}}
                            @endif
                        @endforeach
                    </select>
                </td>

                <td>
    {{--  
                    @if ( !empty($subtotal))
                        {{ var_dump($subtotal) }} 
                    @endif
     --}}
                @if(Session::has('subtotal'))           
                    @foreach (Session::get('subtotal') as $key_03 => $sub)
                        @if(!empty($sub))
                            @if($key_01 == $key_03 )
                                小計{{ $sub }}
                            @endif
                        @endif
                    @endforeach

                    {{--商品價格 var_dump(Session::get('product_price')) --}}
                    {{--    
                    @foreach(Session::get('product_price') as $key => $price)
                        {{ $price->product_price}}
                    @endforeach
                    --}}
                    
                    {{--購買數量 var_dump(Session::get('buynumber')) --}}
                    {{-- 
                    @foreach( Session::get('buynumber') as $key =>$buynumber) 
                        {{ $buynumber }}
                    @endforeach
                     --}}
                @endif                    
                </td>
            </tr>

            @endforeach
        @endif
        <tr>
            <td>合計</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            
            <td>
                @if(Session::has('total_number'))           
                    {{ (Session::get('total_number'))}} 
                    
                @endif  
                {{--  @if (!empty($total_number)) {{ $total_number }} @endif--}}
            </td>
            <td></td>
            <td>
                @if(Session::has('total_price'))  
                    {{ (Session::get('total_price')) }}  
{{--  
                    @foreach (Session::get('total_price') as $key => $price)
                        {{ $price }}
                    @endforeach
--}}
                @endif  
                {{--  @if (!empty($total_price)){{ $total_price }}@endif--}}
            </td>
            {{--  
            @foreach ($total_number as $tn)
                {{ $tn }}
            @endforeach
            @foreach ($total_price as $tp)
                {{ $tp }}
            @endforeach
            --}}
        </tr> 
      </table>        
      {{--  <input type=button value=  onclick="window.location='{{ route('product_delete', [$key_01])}}'">change number--}}
      {{--  <button type="button" class="btn btn-default" onclick="window.location='{{ route('product_number_change')}}'">改變商品數量</button>--}}

      <button>改變商品數量</button>
    </form>
    <td><input type=button value="結帳"  onclick="window.location='{{ route('check_infor')}}'"></td>
      {{-- var_dump(Session::get('product_array')) }}
k{{ var_dump(Session::get('k')) --}}
{{-- var_dump(Session::get('k1')) }}
{{--  
@if (Session::has('test001'))
    {{ Session::get('test001') }}
@endif    
--}}

{{--  
        @foreach (Storage::get('product') as $product))
            {{ $product->product_id }}
        @endforeach
--}}   
   
{{--  
    @foreach ($product as $buynumber)
    {{ $buynumber->product_id }}
    {{ $buynumber->product_name }}
    @endforeach
--}}



    {{-- var_dump($product_json) --}}
    {{-- var_dump(Storage::get('product')) --}}
    {{--  $data_1=Storage::get('product')--}}
    {{--  

    --}}
    {{-- $data = json_decode(Storage::get('product'), true)--}}
      
    {{-- var_dump($data2) --}}
{{--  
    @foreach ($data['product'] as $product)
    {{ $product['product_id'] }}
    @endforeach
--}}
{{--  
    <div class="details" style="display:none">{{ $data = json_decode(Storage::get('product')) }}</div>
    {{ dd($data) }}
--}}
{{--  
    <div class="details" style="display:none">{{ $datas = (Storage::get('product')) }}</div>
    {{-- $datas = (Storage::get('product')) --}}
    {{--  
    <div class="details" style="display:none">{{ $data = json_encode($datas) }}</div>
    --}}
    {{-- $data = json_decode($datas) --}}
    {{--
    {{ dd($data) }}
    --}}
    {{-- $data['product_id'] --}}
    {{--var_dump($data)-- }}
    {{-- var_dump(Storage::get('product')) --}}
    {{--  
    @foreach (json_decode(Storage::get('product')) as $product)
    {{ $product }}
    @endforeach
    --}}
    {{-- Storage::get('product') --}}
{{--  
    @foreach (Storage::get('product') as $product)
    {{ $product->product_id }}
    @endforeach
--}}
    {{-- var_dump(Session::get('product_json')) --}}
    {{-- var_dump(Session::get('product_array')) --}}

{{--   
    @foreach (Session::get('product_array') as $product_array)
            {{ $product_array->product_id }}
            {{ $product_array->product_name }}
    @endforeach
--}}

    {{-- (Session::get('product_array')) --}}

    {{-- Session::flush() }}

    
{{--  
    @foreach (Session::get('product_array') as $product_array)
    {{ $product_array->product_id }}
    @endforeach 
--}} 

    {{--Session::flush()-- }}
    {{-- session::forget('product_array') --}}
    
 {{--   
    @foreach (Session::get('product.array') as $product_arrays)
            {{ $product_arrays }}
    @endforeach  
--}}
    
{{--  
    @foreach (Session::get('product_array') as $product_array)
    {{ $product_array['product_id']  }}
    @endforeach 
--}}    
    
    
{{--    
    @foreach (Session::get('product_array') as $product_array)
    {{ $product_array }}
    @endforeach 
--}}

    {{-- dd(Session::get('product_array')) --}}
{{--  
    @foreach (Session::get('product_array') as $key => $product_array)
    
        {{ $product_array['product_id'][$key] }}
    @endforeach   
--}}

    {{-- dd($product_array) --}}
    {{-- print_r($product)  --}}

    {{--  
    @foreach (Session::get('cart') as $item)
        {{ $item->product_id }}
        {{ $item->product_name }}
        {{ $item->product_price }}
    @endforeach
    --}}
    {{-- dd($product_array) --}}
    {{-- Session()->get('cart') --}}

    {{-- $product_decode->product_id }}
    {{-- work --}}
    {{-- isset($product_json['product_id']) --}}
    {{--dd($product_json) --}}
    {{-- printf($product_json) --}}
    {{-- $product_json['cart']['product_name'] --}}


    {{--  $product_json['product_id'] --}}

    {{-- var_dump($product_json) --}}
    {{--    
    @foreach(json_decode($product_json, true) as $value)
        Member ID: {{ $value['product_name'] }}   
    @endforeach
    --}}


    {{-- Session::get('cart')['product_id'] --}}




{{-- dd(Session::get('cart')) --}}
{{-- 
    @foreach (Session::get('cart') as $item)
        {{ $item->product_id }}
    @endforeach
 --}}



{{--  
    @if(Session::has('cart'))
        @foreach (Session::get('cart') as $item)
            {{ $item->product_id }}
        @endforeach
    @endif
--}}
    {{-- Session::get('cart', 'product_id') }}
        {{-- $item["product_id"] --}}
    
    {{-- 

    @foreach (Session::get('cart') as $item)
        {{ $item['product_id'] }}
        {{ $item['product_name'] }}
        {{ $item['product_price'] }}
        {{ $item['buynumber'] }}
    @endforeach 
    
    --}}

    {{-- Session::get('cart') }}
        {{-- work --}}
    {{--  
        {{-- $product_json }} 
        {{--  var date = {{ Session::get('cart') }};--}}
        {{-- json_encode( Session::get('cart'), true )[ 'product_id' ] --}}
        
    {{--  
    @foreach(Session::get('cart') as $item)
        $itemData = json_decode($item->data, true); 
        {{ $itemData['product_id'] }}
    @endforeach


        @foreach (Session::get('cart', 'default') as $item)
                {{ $item['product_id'] }}
        @endforeach

--}}




    {{--  $value --}}
    {{-- '123456' --}}
    {{-- session()->get('product_name') --}}
    {{-- session()->get('test') }}
    {{-- session()->get('user.teams') --}}
    {{-- (Session::all()) --}}
    {{-- dd($product_array) }}
    {{-- dd($merge) --}}
    {{-- print_r($merge) --}}
    {{-- print_r($product_array) }}
    {{-- ($product_array) }}
    {{-- $buynumber --}} 
    {{-- $number_json --}} 
    {{-- var_dump($product) --}}
    {{-- 
    Session::flush() }}
    {{--  
    @if(Session::has('cart'))
        {{ Session::all() }}
    @endif
    --}}
    {{--     
    @if(Session::has('cart'))  
        @foreach (Session::get('cart') as $item)
        {{ $item['product_id'] }}
        {{ $item['product_name'] }}
        {{ $item['product_price'] }}
        {{ $item['buynumber'] }}
        @endforeach 
    @endif
    --}}
    {{-- session('cart')[0]['product_id'] --}}
    {{--   
    @foreach (Session::get('cart') as $item)
    {{ $item['product_id'] }}
    {{ $item['product_name'] }}
    {{ $item['product_price'] }}
    {{ $item['product_name'] }}
    @endforeach 
    --}}


    {{-- $item->product_name }}
    {{ $item->product_number --}}
    {{--  @endforeach
    --}}
    {{-- dd($product) }}
    {{-- dd($products_02) --}}
    {{-- $product_name --}}
    {{-- session()->get('cart') --}}
    {{-- var_dump($test) --}}
    {{--      
    @foreach ($product_array as $item)
        {{ $item->product_id }}
        {{ $item->product_name }}
        {{ $item->product_number }}    
        {{ $item->buynumber }}
    @endforeach
    --}} 
    {{-- dd($buyproduct) --}}
    {{-- print_r($buyproduct) --}}
</body>
</html>