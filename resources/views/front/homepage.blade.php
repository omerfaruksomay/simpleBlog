
<!-- Main Content-->
@extends('front.layouts.master')
@section('content')

        <div class="col-md-9 col-xl-7">

            @foreach($articles as $article)

                <!-- Post preview-->
            <div class="post-preview">
                <a href="{{route('single',[$article->getCategory->slug,$article->slug])}}">
                    <h2 class="post-title">{{$article->title}}</h2>
                    <h3 class="post-subtitle">{{Str::limit($article->content,75)}}</h3>
                </a>
                <p class="post-meta"> Kategori:
                    <a href="{{route('category',$article->getCategory->slug)}}">{{$article->getCategory->name}}</a>

                    <span class="float-end">{{$article->created_at->diffForHumans()}}</span>
                </p>

            </div>
                @if(!$loop->last)
            <hr class="my-4" />
                @endif
            @endforeach
            <div>
                {{$articles->links()}}
            </div>
            </div>

@include('front.widget.category-widget')

@endsection
