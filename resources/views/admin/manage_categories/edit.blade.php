@extends('layouts.admin')

@section('content')
    <div class="col-sm-8 col-md-9 content_admin">
        <h1>{{ trans('messages.edit') }} - {{ $category->name }}</h1><hr>
        {!! Form::open(['method' => 'put', 'route' => ['category.update', $category->id], 'enctype' => 'multipart/form-data']) !!}
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="form-group">
                {!! Form::label('name', trans('messages.name')) !!}
                <div>
                    {!! Form::text('name', $category->name, ['placeholder' => 'Categry Name', 'class' => 'form-control', 'required' => 'required']) !!}
                    @if ($errors->has('name'))
                        <span class="help-block">
                             <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('description', trans('messages.description')) !!}
                {!! Form::textarea('description', $category->description, ['placeholder' => 'Description', 'class' => 'form-control', 'required' => 'required']) !!}
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('parent_id', trans('messages.parent_id')) !!}
                {!! Form::select('parent_id', $parents, $category->parent_id, ['class' => 'form-control', 'placeholder' => 'None'])!!}
            </div>
            <div>
                {!! Form::label('cat_type', trans('messages.cat_type')) !!}
                <div class="radio">
                    <label>
                        {{ Form::radio('cat_type', config('custom.post'), ($category->cat_type == config('custom.post'))) }}{{ trans('messages.post') }}
                    </label>
                </div>
                <div class="radio">
                    <label>
                        {!! Form::radio('cat_type', config('custom.tour'), ($category->cat_type == config('custom.tour'))) !!}{{ trans('messages.tour') }}
                    </label>
                </div>    
            </div>
            {!! Form::submit(trans('messages.edit'), ['class' => 'btn btn-default']); !!}   
        {!! Form::close() !!}
    </div>
@endsection
