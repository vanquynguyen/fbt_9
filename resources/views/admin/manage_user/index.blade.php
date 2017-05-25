@extends('layouts.admin')

@section('content')
    <div class="col-sm-8 col-md-9 content_admin">
        <h1>{{ trans('messages.manage_users') }}</h1><hr>
        @if (session('message'))
            <div class="alert alert-warning">
                {{ session('message') }}
            </div>
        @endif
        <div class="form-group col-md-offset-4 col-md-6">
            {!! Form::open(['method' => 'get', 'route' => 'user.index']) !!}
            <div class="col-md-9 form-group ">
                {!! Form::text('name', null, ['id'=>'search', 'class' => 'form-control pull-left', 'placeholder' => 'User name']) !!}
            </div>
            <div class="col-md-2 form-group"> 
                {!! Form::submit(trans('messages.search'), ['class' => 'btn btn-success']) !!}
            </div>    
            {!! Form::close() !!}
        </div>
        <a href="{{ route('user.create') }}" class="text-center btn btn-primary col-md-2">{{ trans('messages.new_user') }} </a>
        
        <table id="index" class="table">
            <thead>
                <th>ID</th>
                <th>{{ trans('messages.name') }}</th>
                <th>{{ trans('messages.email') }}</th>
                <th>{{ trans('messages.address') }}</th>
                <th>{{ trans('messages.phone') }}</th>
                <th>{{ trans('messages.gender') }}</th>
                <th>{{ trans('messages.level') }}</th>
                <th></th>
            </thead>
            <tbody>
                @if (isset($users))
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ $user->level }}</td>
                            <td>
                                @if ($user->id != Auth::user()->id)
                                    {!! Form::open([ 'method' => 'delete', 'route' => ['user.destroy', $user->id], 'class'=>'pull-left', 'id' => 'formDelete']) !!}
                                        {!! Form::button(trans('messages.delete'), ['class' => 'btn btn-danger del', 'data-id' => $user->id, 'data-href' => route('user.destroy', ['id' => $user->id])]) !!}
                                    {!! Form::close() !!}
                                @endif
                                <a class="btn btn-info pull-right" href="{{ route('user.edit', ['id' => $user->id]) }}">{{ trans('messages.edit') }}</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="pull-right">
        @if (isset($users)) 
            {{ $users->links() }}
        @endif
        </div>    
    </div>
@endsection
