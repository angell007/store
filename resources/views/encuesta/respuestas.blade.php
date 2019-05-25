@extends('layouts.app')
@section('content')
    <div class="hero-body">
        <div class="container has-text-justified">
            <div class="columns is-vcentered">
                <div class="column is-5">
                    

                </div>
                <div class="column is-6 is-offset-1">
                   <form action="{{ respuesta.store }}" method="post">
                @csrf
                <select name="respuesta1" id="">
                        <option value="1">Frecuentemente</option>
                        <option value="2">A menudo</option>
                        <option value="3">A veces</option>
                        <option value="4">Raras Veces</option>
                        <option value="5">Nunca</option>
                    </select>

                    <select name="respuesta1" id="">
                            <option value="1">Frecuentemente</option>
                            <option value="2">A menudo</option>
                            <option value="3">A veces</option>
                            <option value="4">Raras Veces</option>
                            <option value="5">Nunca</option>
                        </select>
                        
                <input type="submit" value="Enviar">
                </form>
                </div>
            </div>
        </div>
    </div>
</div>