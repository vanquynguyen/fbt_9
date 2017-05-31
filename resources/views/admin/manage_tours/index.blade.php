@extends('layouts.admin')

@section('content')
    <div class="col-sm-8 col-md-9 content_admin">
        <h1>{{ trans('messages.manage_tour') }}</h1><hr>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="form-group col-md-offset-4 col-md-6">
            {!! Form::open(['method' => 'get', 'route' => 'tour.index']) !!}
            <div class="col-md-9 form-group ">
                {!! Form::text('tour', null, ['id'=>'search', 'class' => 'form-control pull-left', 'placeholder' => 'Tour name']) !!}
            </div>
            <div class="col-md-2 form-group"> 
                {!! Form::submit(trans('messages.search'), ['class' => 'btn btn-success']) !!}
            </div>    
            {!! Form::close() !!}
        </div>
        <a href="{{ route('tour.create') }}" class="pull-right text-center btn btn-primary col-md-2">{{ trans('messages.new_tour') }}</a>
        <table id="index" class="table">
            <thead>
                <th>ID</th>
                <th>{{ trans('messages.name') }}</th>
                <th>{{ trans('messages.description') }}</th>
                <th>{{ trans('messages.duration') }}</th>
                <th>{{ trans('messages.price') }}</th>
                <th>{{ trans('messages.category') }}</th>
                <th>{{ trans('messages.itinerary') }}</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($tours as $tour)
                    <tr>
                        <td>{{ $tour->id }}</td>
                        <td>{{ $tour->name }}</td>
                        <td class="col-md-4">{{ $tour->description }}</td>
                        <td>{{ $tour->duration }}</td>
                        <td>{{ $tour->price }}</td>
                        <td>{{ $tour->category_id }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('itineraries.tour', ['id' => $tour->id]) }}">{{trans('messages.itinerary')}}</a>
                        </td>
                        <td>
                            {!! Form::open(['method' => 'delete', 'route' => ['tour.destroy', $tour->id], 'class'=>'pull-left', 'id' => 'formDelete']) !!}
                                {!! Form::button(trans('messages.delete'), ['class' => 'btn btn-danger del', 'data-id' => $tour->id, 'data-href' => route('tour.destroy', ['id' => $tour->id])]) !!}
                            {!! Form::close() !!}
                            <a class="btn btn-info" href="{{ route('tour.edit', ['id' => $tour->id]) }}">{{ trans('messages.edit') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pull-right">
        @if (isset($tours)) 
            {{ $tours->links() }}
        @endif
        </div>
    </div>
@endsection
