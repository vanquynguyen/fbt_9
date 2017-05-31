@extends('layouts.app')

@section('content')
<div class="col-md-9">
    <h3>{{ trans('messages.special_tours') }}</h3>
    {!! Form::open(['method' => 'get', 'route' => 'tour.index', 'class' =>'row search-tour']) !!}
        <div class="col-md-6 form-group ">
            {!! Form::text('search', null, ['id'=>'search', 'class' => 'form-control pull-left', 'placeholder' => 'Enter your destinations']) !!}
        </div>
        <div class="col-md-1 form-group pull-left"> 
            {!! Form::button(trans('messages.search'), ['class' => 'btn btn-success']) !!}
        </div>
    {!! Form::close() !!}
    <div class="tours">
        @foreach ($tours as $tour)
        <div >
            <div class="tour"> 
                <img src="{{ asset($tour->image) }}" alt="" class="col-md-4 img_inner fleft">
                <div class="extra_wrapper">
                    <p class="text1"><a href="{{ route('tour.detail', ['id' => $tour->id]) }}">{{ $tour->name }}</a></p>
                    <p class="price">{{ trans('messages.price') }} : <b>{{ $tour->price }} $</b></p>
                    <p>{{ $tour->description }}</p>
                    <a href="{{ route('tour.detail', ['id' => $tour->id]) }}" class="btn btn-primary">{{ trans('messages.detail') }}</a>
                </div>
            </div>
        </div>
        @endforeach
        <div>
            {{ $tours->links() }}
        </div> 
    </div>
</div>
<div class="col-md-3">
    <h3>Categories</h3>
    <ul class="list2 l1">
        @foreach ($categories as $category)
            <li><a href="#">{{ $category->name }}</a></li>
        @endforeach
    </ul>
</div>
@endsection
