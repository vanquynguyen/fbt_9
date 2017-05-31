@extends('layouts.admin')

@section('content')
    <div class="col-sm-8 col-md-9 content_admin">
        <h1>{{ trans('messages.itinerary') }}</h1><hr>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <a href="{{route('itinerary.createTour', ['id' => $id])}}" class="pull-right text-center btn btn-primary col-md-2">{{ trans('messages.new_itinerary') }}</a>
        <table id="index" class="table">
            <thead>
                <th>ID</th>
                <th>{{ trans('messages.day') }}</th>
                <th>{{ trans('messages.description') }}</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($itineraries as $itinerary)
                    <tr>
                        <td>{{ $itinerary->id }}</td>
                        <td>{{ $itinerary->day }}</td>
                        <td class="col-md-7">{{ $itinerary->description }}</td>
                        <td>
                            {!! Form::open(['method' => 'delete', 'route' => ['itinerary.destroy', $itinerary->id], 'class'=>'pull-left', 'id' => 'formDelete']) !!}
                                {!! Form::button(trans('messages.delete'), ['class' => 'btn btn-danger del', 'data-id' => $itinerary->id, 'data-href' => route('itinerary.destroy', ['id' => $itinerary->id])]) !!}
                            {!! Form::close()!!}
                            <a class="btn btn-info" href="{{ route('itinerary.edit', ['id' => $itinerary->id]) }}">{{ trans('messages.edit') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pull-right">
        @if (isset($itineraries)) 
            {{ $itineraries->links() }}
        @endif
        </div>
    </div>
@endsection
