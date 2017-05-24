@extends('layouts.admin')

@section('content')
    <div class="col-sm-8 col-md-9 content_admin">
        <h1>{{ trans('messages.new_user') }}</h1><hr>
        {!! Form::open([
            'method' => 'post',
            'route' => 'user.store',
            'enctype' => 'multipart/form-data',
        ]) !!}
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="form-group">
                {!! Form::label('name', trans('messages.name')) !!}
                <div>
                    {!! Form::text('name', null, [
                        'placeholder' => 'User Name',
                        'class' => 'form-control',
                        'required' => 'required',
                    ]) !!}
                    @if ($errors->has('name'))
                        <span class="help-block">
                             <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('email', trans('messages.email')) !!}
                {!! Form::email('email', null, [
                    'placeholder' => 'Enter Email',
                    'class' => 'form-control',
                    'required' => 'required',
                ]) !!}
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('password', trans('messages.password')) !!}
                {!! Form::password('password',[
                    'placeholder' => 'Password',
                    'class' => 'form-control',
                    'id' => 'password',
                    'required' => 'required',
                ]) !!}
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('avatar', trans('messages.avatar')) !!}
                {!! Form::file('avatar') !!}
                @if ($errors->has('avatar'))
                    <span class="help-block">
                        <strong>{{ $errors->first('avatar') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('address', trans('messages.address')) !!}
                <div>
                    {!! Form::text('address', null, [
                        'placeholder' => 'Address',
                        'class' => 'form-control',
                        'required' => 'required',
                    ]) !!}
                    @if ($errors->has('address'))
                        <span class="help-block">
                             <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('phone', trans('messages.phone')) !!}
                <div>
                    {!! Form::text('phone', null, [
                        'placeholder' => 'Phone',
                        'class' => 'form-control',
                        'required' => 'required',
                    ]) !!}
                    @if ($errors->has('phone'))
                        <span class="help-block">
                             <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div>
                {!! Form::label('gender', trans('messages.gender')) !!}
                <div class="radio">
                    <label>
                        {!! Form::radio('gender', config('custom.male'), true) !!}{{ trans('messages.male') }}
                    </label>
                </div>
                <div class="radio">
                    <label>
                    {!! Form::radio('gender', config('custom.female')) !!}{{ trans('messages.female') }}
                    </label>
                </div>
            </div>
            <div>
                {!! Form::label('level', 'Level') !!}
                <div class="radio">
                    <label>
                        {!! Form::radio('level', config('custom.admin')) !!}{{ trans('messages.admin') }}
                    </label>
                </div>
                <div class="radio">
                    <label>
                        {!! Form::radio('level', config('custom.user'), true) !!}{{ trans('messages.user') }}
                    </label>
                </div>
            </div>
            {!! Form::submit(trans('messages.add'), ['class' => 'btn btn-default']); !!}
        {!! Form::close() !!}
    </div>
@endsection
