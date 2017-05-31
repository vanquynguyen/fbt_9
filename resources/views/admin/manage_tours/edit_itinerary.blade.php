@extends('layouts.admin')

@section('content')
    <div class="col-sm-8 col-md-9 content_admin">
        <h1>{{ trans('messages.edit') }} - Day {{ $itinerary->day }}</h1><hr>
        {!! Form::open(['method' => 'put', 'route' => ['itinerary.update', $itinerary->id], 'enctype' => 'multipart/form-data']) !!}
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            {!! Form::hidden('tour_id', $itinerary->tour_id) !!}
            {!! Form::hidden('day', $itinerary->day) !!}
            <!-- description -->
            <div class="form-group">
                {!! Form::label('description', trans('messages.description')) !!}
                {!! Form::textarea('description', $itinerary->description, ['placeholder' => 'Description', 'class' => 'form-control', 'required' => 'required']) !!}
                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('desription') }}</strong>
                    </span>
                @endif
            </div>
            {!! Form::submit(trans('messages.edit'), ['class' => 'btn btn-default']); !!}
        {!! Form::close() !!}
    </div>
@endsection
