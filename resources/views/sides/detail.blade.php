@extends('layouts.app')

@section('content')
<div class="col-md-9">
    <h3>{{ $tour->name }}</h3>
    <div>
        <img src="{{ $tour->image }}" alt="{{ $tour->name }}">
    </div>
    <!-- Nav tabs -->
    <div class="detail-tour">
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#description" role="tab" data-toggle="tab">{{ trans('messages.description') }}</a></li>
            <li><a href="#itinerary" role="tab" data-toggle="tab">{{ trans('messages.itinerary') }}</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content detail-tour-content">
            <div class="tab-pane active" id="description">{{ $tour->description }}</div>
            <div class="tab-pane" id="itinerary">
                @foreach ($itineraries as $itinerary)
                    <div class="panel panel-default">
                        <div class="panel-heading"><p class="panel-title">{{ $itinerary->day }}</p></div>
                        <div class="panel-body">{{ $itinerary->description }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div><br>

    <!-- booking -->
    <a href="{{ route('booking.index', ['id' => $tour->id]) }}" class="pull-left text-center btn btn-primary col-md-2">{{ trans('messages.booking') }}</a>
</div>
@endsection
