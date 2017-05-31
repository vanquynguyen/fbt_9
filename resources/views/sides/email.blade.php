<h2>Thank you for using our service !</h2>
<p>{{ trans('messages.tour') }} : <b>{{ $booking->tour->name }}</b></p>
<p>{{ trans('messages.fullname') }} : <b>{{ $booking->fullname }}</b></p>
<p>{{ trans('messages.email') }} : <b>{{ $booking->email }}</b></p>
<p>{{ trans('messages.departure_date') }} : <b>{{ $booking->departure_date }}</b></p>
<p>{{ trans('adult') }} : <b>{{ $booking->adult }}</b></p>
<p>{{ trans('child') }} : <b>{{ $booking->child }}</b></p>
<p>{{ trans('infant') }} : <b>{{ $booking->infant }}</b></p>
<h3>{{ trans('total_amount') }} : {{ $booking->total_amount }} $</h3>
