@extends('layouts.admin')

@section('content')
    <div class="col-sm-8 col-md-9 content_admin">
        <h1>{{ trans('messages.edit') }} - {{ $tour->name }}</h1><hr>
        {!! Form::open(['method' => 'put', 'route' => ['tour.update', $tour->id], 'enctype' => 'multipart/form-data']) !!}
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <!-- Name -->
            <div class="form-group">
                {!! Form::label('name', trans('messages.name')) !!}
                <div>
                    {!! Form::text('name', $tour->name, ['placeholder' => 'Tour Name', 'class' => 'form-control', 'required' => 'required']) !!}
                    @if ($errors->has('name'))
                        <span class="help-block">
                             <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!-- Image -->
            <div class="form-group">
                {!! Form::label('image', trans('messages.image')) !!}
                {!! Form::file('image') !!}
                    <span class="help-block">
                    <strong>{{ $errors->first('image') }}</strong>
                    </span>
                <img src="@if(isset($tour->image)) {{ asset($tour->image) }} @endif">
            </div>
            <!-- description -->
            <div class="form-group">
                {!! Form::label('description', trans('messages.description')) !!}
                {!! Form::textarea('description', $tour->description, ['placeholder' => 'Description', 'class' => 'form-control', 'required' => 'required']) !!}
                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('desription') }}</strong>
                    </span>
                @endif
            </div>
            <!-- duration -->
            <div class="form-group">
                {!! Form::label('duration', trans('messages.duration')) !!}
                {!! Form::selectRange('duration', 1, 20, $tour->duration, ['class' => 'form-control']) !!}
            </div>
            <!-- price -->
            <div class="form-group">
                {!! Form::label('price', trans('messages.price')) !!}
                {!! Form::number('price', $tour->price, ['class' => 'form-control']) !!}
            </div>
            
            <!-- min-quantity -->
            <div class="form-group">
                {!! Form::label('min-quantity', trans('messages.min_quantity')) !!}
                {!! Form::selectRange('min_quantity', 1, 20, $tour->min_quantity, ['class' => 'form-control']) !!}
            </div>
            <!-- max-quantity -->
            <div class="form-group">
                {!! Form::label('max-quantity', trans('messages.max_quantity')) !!}
                {!! Form::selectRange('max_quantity', 2, 20, $tour->max_quantity, ['class' => 'form-control']) !!}
            </div>
            <!-- promotion -->
            <div class="form-group">
                {!! Form::label('promotion', trans('messages.promotion')) !!}
                {!! Form::number('promotion', $tour->promotion, ['class' => 'form-control']) !!}
            </div>
            <!-- single-supplement -->
            <div class="form-group">
                {!! Form::label('single-supplement', trans('messages.single_supplement')) !!}
                {!! Form::number('single_supplement', $tour->single_supplement, ['class' => 'form-control']) !!}
            </div>
            <!-- category id -->
            <div class="form-group">
                {!! Form::label('category_id', trans('messages.category')) !!}
                {!! Form::select('category_id',  $categories, $tour->category_id, ['class' => 'form-control']) !!}
            </div>
            {!! Form::submit(trans('messages.edit'), ['class' => 'btn btn-default']); !!}
        {!! Form::close() !!}
    </div>
@endsection
