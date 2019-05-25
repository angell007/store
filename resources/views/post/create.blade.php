@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
                <div class="columns is-vcentered">
                        <div class="column is-8" style="margin: 0 auto">
                            <h3 class="title">Plasma tu idea! este es tu inicio ...</h3>
                            <br>
                            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                                @csrf    
                                <div class="form-group">
                                        <label for="title" class="control-label">Title</label>
                                        <input type="text" class="form-control" name= "title">
                                    </div>
                                {{-- <div class="form-group"> --}}
                                    <textarea class="form-control" name="body"  rows="3" placeholder="Your Post"></textarea>
                                {{-- </div> --}}
                
                                <div class="form-group">
                                        <label for="image">Image (only .jpg)</label>
                                        <input type="file" name="file" class="form-control" placeholder=" " class="btn btn-success" >
                                    </div>
                
                                <button type="submit" class="btn btn-primary">Create Post</button>
                            </form>
                        </div>        
                    </div>
    </div>

</div>
@endsection