@extends('layouts.app')
@section('content')
<div class="container">
        <div class="columns is-vcentered">
                <div class="column is-12">
    <h2 class="title is-size-3">
         {{ $post->title }}
        <small>by {{ $post->user->name }}</small>
        <a href="{{ route('post.index') }}" class="btn btn-default pull-right">Go Back</a>
    </h2>
    <div class="panel-body box">
        <div class="panel-body">
            @if($post->file)
            <figure class="image is-3by1">
                <img src="/img/{{$post->file}}" style="width: 60%; hight:100px; display: block; margin: 0 auto ;">
            </figure>
            @endif
        </div>
        <p class="has-text-justified">{{ $post->body }}</p>
        @if($post->category && $post->tags )
        <p><strong>Category: </strong>{{ $post->category->name }}</p>
        <p><strong>Tags: </strong>{{ $post->tags->implode('name', ', ') }}</p>
        @endif
        <br>
        @foreach ($post->likes as $item)
        {{-- {{ $item->user_id }} --}}
        @endforeach
        <div class="columns is-vcentered">
                <div class="column is-1 ">
                        @if(isset( $like))
                        <span class="is-flex ">
                                <i class="material-icons has-text-danger">thumb_down</i>
                            <small class="is-flex ">{{ $like }}</small></span>
                        @endif

        <form action="{{ route('like.store') }}" method="post">
        @csrf
        <input type="hidden" name="post_id" id="" value="{{ $post->id }}">
        <input type="hidden" name="user_id" id="" value="{{ Auth::user()->id }}">
        <input type="hidden" name="stado" id="" value="1">
        <input type="submit" value="Like" class="button is-black  is-flex">
        </form>
                </div>
                <div class="column is-1 ">
                        @if(isset( $dislike))
                        <span class="is-flex">
                                <i class="material-icons has-text-info">thumb_up</i>
                                <small class="is-flex">{{ $dislike }}</small></span>
                        
                        @endif
        <form action="{{ route('like.store') }}" method="post">
        @csrf
        <input type="hidden" name="post_id" id="" value="{{ $post->id }}">
        <input type="hidden" name="user_id" id="" value="{{ Auth::user()->id }}">
        <input type="hidden" name="stado" id="" value="0">
        <input type="submit" value="Dislike" class="button is-black is-flex ">
        </form>
        </div>
        </div>
        <div class="columns is-vcentered">
            <div class="column is-10">
                <p class="title is-5 is-pulled-left">Escribe un comentario</p>
                <br>
                <form action="{{ route('comentario.store') }}" method="post">
                @csrf
                <input type="hidden" name="post_id" id="" value="{{ $post->id }}">
                <input type="hidden" name="user_id" id="" value="{{ Auth::user()->id }}">
                <textarea class="form-control" name="body" id="" cols="30" rows="3"></textarea>
                <br>
                <input type="submit" value="Comentar" class="btn btn-success is-pulled-left">
                </form>
            </div>
            <div class="column is-3 is-flex">
                <div class="box ">
                    {{-- {{ dd(Auth::user()->id) }} --}}
                    @if ($post->user_id === Auth::user()->id)
                    <p class="subtitle">Deseas adiccionar encuesta de este post </p>
                    <form action="{{ route('encuesta.update', $post->id ) }}" method="post">
                        @csrf
                        @method('PUT')

                            <input type="submit" value="Ok" class="btn btn-warning is-pulled-right subtitle">
                            <input type="hidden" name="post_id" id="" value="{{ $post->id }}">
                            <input type="hidden" name="user_id" id="" value="{{ Auth::user()->id }}">
                    </form>
                    @else
                    <p class="subtitle">Deseas responder la encuesta de este post </p>
                    <form action="{{ route('opcion.create', $post->id ) }}" method="get">
                            @csrf
                            @method('PUT')
    
                                <input type="submit" value="Ok" class="btn btn-warning is-pulled-right subtitle">
                                <input type="hidden" name="post_id" id="" value="{{ $post->id }}">
                                <input type="hidden" name="user_id" id="" value="{{ Auth::user()->id }}">
                        </form>
                        
                  
                    @endif
                </div>
            </div>
        </div>
        <div class="column ">
            <div class="box content">
                <p class="title"> Commentarios de este post </p>
                @if (isset($post->comentarios))
                @foreach ($post->comentarios as $item)
                <div class="box"> 
                    <p class="has-text-justified" for=""> {{ $item->body }} </p>
                    <p class="has-text-justified is-size-7" for=""> on  {{ $item->created_at }}    </p>
                </div>
                @endforeach
                @else
                <p class="has-text-justified " for="">No hay Commentarios en este post </p>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection