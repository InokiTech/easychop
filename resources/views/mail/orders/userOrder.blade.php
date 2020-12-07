@component('mail::message')
# Order Notification

You just palced an order.

<strong> ORDER DETAILS </strong>
@component('mail::table')
| Order                 |  Details                                                |
|:--------------------- |:------------------------------------------------------- |
| Order Id              | {{$order->order_id}}                                    |
| Order Cost            | {{money($order->grand_total)}}                          |
| Delivery Fullname     | {{$order->shipping_fullname}}                           |
| Delivery Address      | {{$order->shipping_address.', '.$order->shipping_city}} |
| Delivery Phone        | {{$order->shipping_phone}}                              |
@endcomponent

<strong> ITEMS DETAILS </strong>
@component('mail::table')
| Item Name             |  Quantity               |  Price                  |  Sub-Total                                                     |
| --------------------- |:-----------------------:|:-----------------------:|:--------------------------------------------------------------:|
@foreach($orderItems as $item)
| {{$item->name}}       | {{$item->quantity}}     | {{money($item->price)}}        | {{money(Cart::session(auth()->id())->get($item->id)->getPriceSum())}} |
@endforeach
| <strong>Grand Total</strong>  |                 |                                | <strong>{{money(Cart::session(auth()->id())->getTotal())}}</strong>   |

@endcomponent

Thanks for your patronage,<br>
{{ config('app.name') }}
@endcomponent
