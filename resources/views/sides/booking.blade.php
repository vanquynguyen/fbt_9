@extends('layouts.app')

@section('content')
<div class="col-md-9">
    <!-- Tour Information -->
    <div class="row">
        <h3>{{ trans('messages.tour_infomation') }}</h3>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <img src="{{ $tour->image }}" class="col-md-6">
        <div class="col-md-6">
            <!-- tour name -->
            <h4>{{ $tour->name }}</h4><hr>
            <!-- Duration -->
            <div>
                <b class="col-md-6">{{ trans('messages.duration') }} :</b>
                <b class="col-md-6">{{ $tour->duration }}</b>
            </div><hr>
            <!-- Price -->
            <div>
                <b class="col-md-6">{{ trans('messages.price') }} ($/Pax) :</b>
                <b class="col-md-6">{{ $tour->price }}</b>
            </div><hr>
            <!-- Min Quantity -->
            <div>
                <b class="col-md-6">{{ trans('messages.min_quantity') }} :</b>
                <b class="col-md-6">{{ $tour->min_quantity }}</b>
            </div><hr>
            <!-- Max Quantity -->
            <div>
                <b class="col-md-6">{{ trans('messages.max_quantity') }} :</b>
                <b class="col-md-6">{{ $tour->max_quantity }}</b>
            </div><hr>
        </div>
    </div>
    {!! Form::open(['method' => 'post', 'role' => 'form', 'route' => ['booking.payment', $tour->id]]) !!}
    <!-- Option -->
    <div>
        <h3>{{ trans('messages.option') }}</h3>
        <div class="form-group col-md-3">
            {!! Form::label('adult', trans('messages.adult')) !!}
            {!! Form::number('adult', $tour->min_quantity, ['class' => 'form-control adult', 'data-id' => $tour->id, 'min' => $tour->min_quantity, 'max' => $tour->max_quantity]) !!}
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('child', trans('messages.child')) !!}
            {!! Form::number('child', 0, ['class' => 'form-control', 'min' => 0]) !!}
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('infant', trans('messages.infant')) !!}
            {!! Form::number('infant', 0, ['class' => 'form-control', 'min' => 0]) !!}
        </div>
        <div class="form-group col-md-3">
            {!! Form::label('departure_date', trans('messages.departure_date')) !!}
            {!! Form::date('departure_date', null, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <!-- Guest infomation -->
    <div>
        <h3>{{trans('messages.guest_infomation')}}</h3>
        <div class="form-group col-md-6 ">
            {!! Form::label('fullname', trans('messages.name')) !!}
            {!! Form::text('fullname', $user->name, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
        <div class="form-group col-md-6 ">
            {!! Form::label('Email', trans('messages.email')) !!}
            {!! Form::text('email', $user->email, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
        <div class=" form-group col-md-6 ">
            {!! Form::label('Phone', trans('messages.phone')) !!}
            {!! Form::text('phone', $user->phone, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
        <div class=" form-group col-md-6 ">
            {!! Form::label('Country', trans('messages.country')) !!}
            {!! Form::text('country', $user->address, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
        
    </div>
    <!-- Orther Request -->
    <div>
        <h3>{{ trans('messages.orther_request') }}</h3>
        <div class="form-group">
            {!! Form::textarea('orther_request', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <!-- Payment Details -->
    <div>
        <h3>{{ trans('messages.payment_details') }}</h3>
        <div>
            <div><b class="col-md-4">{{ trans('messages.subtotal') }}($)</b><b class="sub-total">{{ $tour->price }}</b></div>
            <div><b class="col-md-4">{{ trans('messages.promotion') }}(%)</b><b>{{ $tour->promotion }}</b></div>
            <div><b class="col-md-4">{{ trans('messages.single_supplement') }}($)</b><b>{{ $tour->single_supplement }}</b></div>
            <div><b class="col-md-4">{{ trans('messages.payment_surcharge') }}(10%)</b><b class="payment_surcharge">{{ $tour->paymentSurcharge }}</b></div><hr>
            <div><b class="col-md-4">{{ trans('messages.total_amount') }}($)</b><b class="total_amount">{{ $tour->totalAmount }}</b></div>
        </div><br><hr>
        <div class="form-group col-md-12">
                {!! Form::label('method', 'Method') !!}
                <div class="radio">
                    <label>
                        {!! Form::radio('method_payment', config('custom.stripe'), false, ['class' => 'method']) !!}{{ trans('messages.stripe') }}
                    </label>
                </div>
                <div class="radio">
                    <label>
                        {!! Form::radio('method_payment', config('custom.direct_payment'), true, ['class' => 'method']) !!}{{ trans('messages.direct_payment') }}
                    </label>
                </div>
        </div>
        <div id="payment">
            <div class="form-group col-md-6 ">
                {!! Form::label('card_no', trans('messages.card_no')) !!}
                {!! Form::text('card_no', null, ['class' => 'form-control']) !!}
            </div>
            <div class=" form-group col-md-6 ">
                {!! Form::label('cvc_no', trans('messages.cvc')) !!}
                {!! Form::text('cvc_no', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-6 ">
                {!! Form::label('exp_month', trans('messages.exp_month')) !!}
                {!! Form::text('exp_month', null, ['class' => 'form-control']) !!}
            </div>
            <div class=" form-group col-md-6 ">
                {!! Form::label('exp_year', trans('messages.exp_year')) !!}
                {!! Form::text('exp_year', null, ['class' => 'form-control']) !!}
            </div>
            {!! Form::hidden('total_amount', $tour->total_amount, ['class' => 'form-control amount', 'disable' => 'disable']) !!}
        </div>
    </div>
    <div>
        {!! Form::submit(trans('messages.booking'), ['class' => 'form-control btn btn-success']) !!}
    </div>
    {!! Form::close() !!}
</div>
@endsection
