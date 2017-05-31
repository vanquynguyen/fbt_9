@extends('layouts.admin')

@section('content')
    <div class="col-sm-8 col-md-9 content_admin">
        <h1>{{ trans('messages.new_tour') }}</h1><hr>
        {!! Form::open(['method' => 'post', 'route' => 'tour.store', 'enctype' => 'multipart/form-data']) !!}
            <!-- Name -->
            <div class="form-group">
                {!! Form::label('name', trans('messages.name')) !!}
                <div>
                    {!! Form::text('name', null, ['placeholder' => 'Tour Name', 'class' => 'form-control', 'required' => 'required']) !!}
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
            <!-- duration -->
            <div class="form-group">
                {!! Form::label('duration', trans('messages.duration')) !!}
                {!! Form::selectRange('duration', 1, 20, null, ['class' => 'form-control']) !!}
            </div>
            <!-- price -->
            <div class="form-group">
                {!! Form::label('price', trans('messages.price')) !!}
                {!! Form::number('price', null, ['class' => 'form-control']) !!}
            </div>
            
            <!-- min-quantity -->
            <div class="form-group">
                {!! Form::label('min-quantity', trans('messages.min_quantity')) !!}
                {!! Form::selectRange('min_quantity', 1, 20, null, ['class' => 'form-control']) !!}
            </div>
            <!-- max-quantity -->
            <div class="form-group">
                {!! Form::label('max-quantity', trans('messages.max_quantity')) !!}
                {!! Form::selectRange('max_quantity', 2, 20, null, ['class' => 'form-control']) !!}
            </div>
            <!-- promotion -->
            <div class="form-group">
                {!! Form::label('promotion', trans('messages.promotion')) !!}
                {!! Form::number('promotion', null, ['class' => 'form-control']) !!}
            </div>
            <!-- single-supplement -->
            <div class="form-group">
                {!! Form::label('single-supplement', trans('messages.single_supplement')) !!}
                {!! Form::number('single_supplement', null, ['class' => 'form-control']) !!}
            </div>
            <!-- category id -->
            <div class="form-group">
                {!! Form::label('category_id', trans('messages.category')) !!}
                {!! Form::select('category_id',  $categories, 0, ['class' => 'form-control']) !!}
            </div>
            {!! Form::submit(trans('messages.add'), ['class' => 'btn btn-default']); !!}
        {!! Form::close() !!}
    </div>
@endsection
