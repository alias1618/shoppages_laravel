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
                {{--  <select name="buynumber[]" id="buynumber">  --}}
                    @foreach(Session::get('buynumber') as $key_02 => $buynumber)
                        @if($key_01 == $key_02)
                        {{ $buynumber }}
                        {{--  
                        <option value="1" @if($buynumber == "1") selected="selected"@endif>1</option>
                        <option value="2" @if($buynumber == "2") selected="selected"@endif>2</option>
                        <option value="3" @if($buynumber == "3") selected="selected"@endif>3</option>
                        <option value="4" @if($buynumber == "4") selected="selected"@endif>4</option>
                        <option value="5" @if($buynumber == "5") selected="selected"@endif>5</option>
                        --}}
                        @endif
                    @endforeach
                {{--  </select>--}}
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
   
    <form class="form-horizontal" method="post" action="{{ route('check_detail') }}">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('ship_name') ? ' has-error' : '' }}">
            <tr><p>收件人姓名 <input type=text value="" id="ship_name" name="ship_name"></p></tr>
        </div>
        <div class="form-group{{ $errors->has('ship_add') ? ' has-error' : '' }}">
            <tr><p>收件人地址 <input type=text value="" id="ship_add" name="ship_add"></p></tr>
        </div>
        <div class="form-group{{ $errors->has('ship_tel') ? ' has-error' : '' }}">
            <tr><p>收件人電話 <input type=text value="" id="ship_tel" name="ship_tel"></p></tr>
        </div>
        <button type="submit">結帳</button>
    </form>    
  
  </table>
</body>
</html>