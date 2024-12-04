@extends('layouts.main')
@section('title', 'Produto')
@section('content')

<div id="event-createProject-container" class="col-md-6 offset-md-3">
    <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="form-label-title" for="title">Título do Projeto:</label>
            <input class="form-control" type="text" id="title" name="title"></input>
        </div>
        <div class="form-group-midias">
            <label class="form-label-title" for="image">Imagem do Projeto:</label>
            <input class="form-control-file" type="file" id="image" name="image"></input>
            <label class="form-label-title" for="imagegif">GIF do Projeto:</label>
            <input class="form-control-file" type="file" id="imagegif" name="imagegif"></input>
        </div>
        <div class="form-group">
            <label class="form-label-title" for="urlsite">URL do Projeto:</label>
            <input class="form-control" type="text" id="urlsite" name="urlsite"></input>
        </div>
        <div class="form-group">
            <label class="form-label-title" for="urlrepository">URL do Repositório:</label>
            <input class="form-control" type="text" id="urlrepository" name="urlrepository"></input>
        </div>
        <div class="form-group">
            <label class="form-label-title" for="technologies">Tecnologias usadas:</label>
            <div class="checkboxes-technologies">
                @foreach($technologies as $technology)
                    <div>
                        <input type="checkbox" name="technologies[]" value="{{ $technology->name }}">
                        <label>{{ $technology->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <label class="form-label-title" for="description">Descrição do projeto:</label>
            <textarea class="form-control" type="description" id="description" name="description"></textarea>
        </div>

        <div class="button-submit-container">
            <input onclick="hiddenMessage()" type="submit" class="button-submit" value="Postar Projeto">
        </div>
    </form>
</div>

@endsection