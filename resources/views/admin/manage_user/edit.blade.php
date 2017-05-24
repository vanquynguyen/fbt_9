@extends('layouts.admin')

@section('content')
    <div class="col-sm-8 col-md-9 content_admin">
        <h1>{{ trans('messages.edit') }} - {{ $user->name }}</h1><hr>
       
        {!! Form::model($user,[
                  'role' => 'form',
                  'files' => true,
                  'method' => 'PUT',
                  'action' => ['Admin\UserController@update',$user->id],
              ]) !!}
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            {{ Form::hidden('id', "$user->id") }}
            <div class="form-group">
                {!! Form::label('name', trans('messages.name')) !!}
                <div>
                    {!! Form::text('name', $user->name, [
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
                {!! Form::email('email', $user->email, [
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
                {!! Form::label('avatar', trans('messages.avatar')) !!}
                {!! Form::file('avatar') !!}
                @if ($errors->has('avatar'))
                    <span class="help-block">
                    <strong>{{ $errors->first('avatar') }}</strong>
                    </span>
                @else
                    <img src="@if(isset($user->avatar)) {{ $user->avatar }} @endif">
                @endif
            </div>
            <div class="form-group">
                {!! Form::label('address', trans('messages.address')) !!}
                <div>
                    {!! Form::text('address', $user->address, [
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
                    {!! Form::text('phone', $user->phone, [
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
                        {!! Form::radio('gender', config('custom.male'), ($user->gender == config('custom.male'))) !!}{{trans('messages.male')}}
                    </label>
                </div>
                <div class="radio">
                    <label>
                        {!! Form::radio('gender', config('custom.female'), ($user->gender == config('custom.female'))) !!}{{ trans('messages.female') }}
                    </label>
                </div>    
            </div>
            <div>
                {!! Form::label('level', trans('messages.level')) !!}
                <div class="radio">
                    <label>
                        {!! Form::radio('level', config('custom.admin', ($user->level == config('custom.admin')))) !!}{{ trans('messages.admin') }}
                    </label>
                </div>
                <div class="radio">
                    <label>
                        {!! Form::radio('level', config('custom.user'), ($user->level == config('custom.user'))) !!}{{ trans('messages.user') }}
                    </label>
                </div>
            </div>
             {!! Form::submit(trans('messages.edit'), ['class' => 'btn btn-success']) !!}
       {!! Form::close() !!}
    </div>
@endsection
