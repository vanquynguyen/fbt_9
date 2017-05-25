@extends('layouts.admin')

@section('content')
    <div class="col-sm-8 col-md-9 content_admin">
        <h1>{{ trans('messages.manage_categories') }}</h1><hr>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <a href="{{ route('category.create') }}" class="pull-right text-center btn btn-primary col-md-2">{{ trans('messages.new_category') }}</a>
        
        <table id="index" class="table">
            <thead>
                <th>ID</th>
                <th>{{ trans('messages.name') }}</th>
                <th>{{ trans('messages.description') }}</th>
                <th>{{ trans('messages.parent_id') }}</th>
                <th>{{ trans('messages.category_type') }}</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->parent_id }}</td>
                        <td>{{ $category->cat_type }}</td>
                        <td>
                            {!! Form::open(['method' => 'delete', 'route' => ['category.destroy', $category->id], 'class'=>'pull-left', 'id' => 'formDelete']) !!}
                                {!! Form::button(trans('messages.delete'), ['class' => 'btn btn-danger del', 'data-id' => $category->id, 'data-href' => route('category.destroy', ['id' => $category->id])]) !!}
                            {!! Form::close() !!}
                            <a class="btn btn-info" href="{{ route('category.edit', ['id' => $category->id]) }}">{{ trans('messages.edit') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pull-right">
        @if (isset($categories)) 
            {{ $categories->links() }}
        @endif
        </div>    
    </div>
@endsection
