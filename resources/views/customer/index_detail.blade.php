<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('cart') }}">
        {{ csrf_field() }}
    @foreach ($product as $object)
    <img src="{{ asset('uploads/'.$object->product_photo_name)}}" width=10%//>
{{-- <img src="{{ asset('uploads/'.$object->product_photo_name)}}" width=15%/> --}}
    {{ $object->product_name }}
    {{ $object->product_price }}
    <input id="product_id" type="hidden" name="produc`t_id" value="{{ $object->product_id }}">
    
    <select name="buynumber" id="buynumber">
        @foreach ($max_buynumber as $buynumber)            
            <option value="{{ $buynumber }}">{{ $buynumber }}</option>
        @endforeach
    </select>
    
    <input type=submit value=購買>
    @endforeach
    </form>
</body>
</html>