@extends('layouts.admin')

@section('content')
    <div class="col-sm-8 col-md-9 content_admin">
        <h1>{{ trans('messages.itinerary') }}</h1><hr>
        {!! Form::open(['method' => 'post', 'route' => 'itinerary.store', 'enctype' => 'multipart/form-data']) !!}
            {!! Form::hidden('tour_id', $id) !!}
            <!-- Name -->
            <div class="form-group">
                {!! Form::label('day', trans('messages.day')) !!}
                <div>
                    {!! Form::selectRange('day', $maxDay+1, 20, null, ['class' => 'form-control']) !!}
                    @if ($errors->has('day'))
                        <span class="help-block">
                             <strong>{{ $errors->first('day') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!-- description -->
            <div class="form-group">
                {!! Form::label('description', trans('messages.description')) !!}
                {!! Form::textarea('description', null, ['placeholder' => 'Description', 'class' => 'form-control', 'required' => 'required']) !!}
                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('desription') }}</strong>
                    </span>
                @endif
            </div>
            {!! Form::submit(trans('messages.add'), ['class' => 'btn btn-default']); !!}
        {!! Form::close() !!}
    </div>
@endsection
