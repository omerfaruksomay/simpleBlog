<!-- Main Content-->
@extends('front.layouts.master')
@section('content')
    <div class="col-md-9 col-xl-7">
        <h1>{{$article->title}}</h1>
        <div>
            {!!$article->index!!}

        <p class="post-meta"> Kategori:
            <a href="{{route('category',$article->getCategory->slug)}}">{{$article->getCategory->name}}</a>

            <span class="float-end">{{$article->created_at->diffForHumans()}}</span>
        </p>

        </div>



@endsection
