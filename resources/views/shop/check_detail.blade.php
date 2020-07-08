<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table > 
        <th>商品id:</th>
        <th></th>
        <th>商品名稱:</th>
        <th></th>
        <th>商品價格:</th>    
        <th>購買數量:</th>
    
    @if(Session::has('product_array'))
    
        @foreach (Session::get('product_array') as $key_01 => $array)
        <tr>
            @foreach($array as $key_02 => $value) 
            <input type=hidden value="{!! $key_01!!}" name="key_01" id="key_01">
            <input type=hidden value="{!! $key_02 !!}" name="key_02" id="key_02">           
                <td>    {{ $array[$key_02]->product_id }}     </td>
                <td></td>
                <td>     {{ $array[$key_02]->product_name }}   </td>
                <td></td>
                <td>    {{ $array[$key_02]->product_price }}  </td>               
            @endforeach
            
            <td>
                    @foreach(Session::get('buynumber') as $key_02 => $buynumber)
                        @if($key_01 == $key_02)
                        {{ $buynumber }}
                        @endif
                    @endforeach
            </td>
            <td>
            @if(Session::has('subtotal'))           
                @foreach (Session::get('subtotal') as $key_03 => $sub)
                    @if(!empty($sub))
                        @if($key_01 == $key_03 )
                            小計{{ $sub }}
                        @endif
                    @endif
                @endforeach
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
        
        <td>
            @if(Session::has('total_number'))           
                {{ (Session::get('total_number'))}} 
                
            @endif  

        </td>
        
        <td>
            @if(Session::has('total_price'))  
                {{ (Session::get('total_price')) }}  

            @endif  

        </td>
    </tr> 
  </table>
  <table>
   
    <form class="form-horizontal" method="POST" action="{{ route('buy_detail') }}">
        {{ csrf_field() }}
        <tr><p>收件人姓名 {{ $ship_name }}   <input type=hidden value={{ $ship_name }} id="ship_name" name="ship_name"></p></tr>
        <tr><p>收件人地址 {{ $ship_add }}   <input type=hidden value={{ $ship_add }} id="ship_add" name="ship_add"></p></tr>
        <tr><p>收件人電話 {{ $ship_tel }}   <input type=hidden value={{ $ship_tel }} id="ship_tel" name="ship_tel"></p></tr>
        <button type="submit">結帳</button>
    </form>    
  
  </table>
  {{--  <input type=button value="結帳"  onclick="window.location='{{ route('check_infor')}}'">--}}
</body>
</html>