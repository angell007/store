@extends('layouts.app')

@section('content')
<div class="container">
   {{-- <div class="row"> --}}
        <div class="col-md-12">
                <h3 class="   title   ">  Questionario !! </h3>
                <br>
                <form method="POST" action="{{ route('encuesta.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="pregunta1" class="col-md-4 col-form-label text-md-right">{{ __('Pregunta # 1') }}</label>

                        <div class="col-md-6">
                            <input id="pregunta1" type="text" class="form-control @error('pregunta1') is-invalid @enderror" name="pregunta1" value="{{ old('pregunta1') }}" required autocomplete="name" autofocus>

                            
                        </div>
                    </div>                                     

                    <div class="form-group row">
                        <label for="pregunta2" class="col-md-4 col-form-label text-md-right">{{ __('Pregunta # 2 ') }}</label>

                        <div class="col-md-6">
                            <input id="pregunta2" type="text" class="form-control @error('pregunta2') is-invalid @enderror" name="pregunta2" value="{{ old('pregunta2') }}" required autocomplete="pregunta2">

                        </div>
                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                        <input type="hidden" name="post_id" id="" value="{{ $post }}">
                        <input type="hidden" name="user_id" id="" value="{{ $user }}">
                    </div>
                </form>
            </div>
            
        </div>
@endsection
