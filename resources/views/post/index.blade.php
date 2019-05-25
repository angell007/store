@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="col-md-12">
                <a class="btn btn-success is-pulled-left" href="{{ route('post.create') }}">Nuevo post</a>
            </div>
            <div class="col-md-12">
                @foreach($posts as $post)
                <article class="post" data-postid="{{ $post->id }}">
                    <p>Title: {{   ($post->title) }}</p>
                    <div class="panel-body">
                        @if($post->file)
                        <figure class="image is-3by1">
                                <img src="/img/{{$post->file}}" style="width: 60%; hight:100px; display: block; margin: 0 auto ;">
                              </figure>
                        @endif
                        <p>
                            Resume: {{ str_limit($post->body, 50) }}
                        </p>
                        <div class="info">
                            <p>
                                Posted by: <span> Posted by {{ $post->user->first_name }} </span>
                                {{-- Tags: <span class="label label-default"> {{ $post->tags->implode('name', '| ') }}</span>
                                --}}
                                <span class="text text-primary"> on {{ $post->created_at }} </span>
                            </p>
                        </div>
                        <div class="interaction">
                            | <a href="{{ route('post.show',  ['post_id' => $post->id]) }}"> Leer mas </a> |
                            {{-- <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a>
                            | --}}
                            {{-- <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? ' You don\'t like this post' : 'Dislike' : 'Dislike'  }}</a>|
                            --}}
                            @if(Auth::user() == $post->user)
                            <a href="#" class="edit">Edit</a> |
                            <a href="{{ route('post.destroy', $post->id) }}">Delete</a>
                        </div>
                        @endif
                        {{-- <span class="btn btn-sm ">Comments <span class="badge">{{ $post->comments_count }}</span></span>
                        --}}
                    </div>
                </article>
                @endforeach
                {{ $posts->render() }}
            </div>
        </div>
    </div>
    @endsection