
@foreach($order as $var)
<div>{{$var->order_code}}</div>
@foreach($var->OrderDetail as $detail)
<div>{{$detail->product_id}}</div>
@endforeach
@endforeach

