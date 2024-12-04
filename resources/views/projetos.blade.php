@extends('layouts.main')
@section('title', 'Projetos')
@section('content')


@isset($projects)
    <div class="container-project pb-4">
        <h1 class="project-title mt-5">Tela de Projetos</h1>
        <div class="project-table">
            @forelse($projects as $project)
                <div class="box-project">
                    <h4 class="title-project">{{ $project->title }}</h4>
                    <p class="description-project">{{ $project->description }}</p>
                    <a href="/projetos_teste/{{$project->id}}">
                        <img class="image-project" width="700rem" src="{{ asset('img/events/' . $project->image) }}"
                            alt="{{ $project->title}}">
                    </a>
                </div>
            @empty
                <p>Não há projetos cadastrados</p>
            @endforelse
        </div>
    </div>
@endisset

@if(@isset($projects) == false)
    <div class="container-project pb-4">
        <h1 class="project-title">{{ $project->title }}</h1>
        <div class="projects-single-grid">
            <img class="image-project" src=" {{ asset('img/events/' . $project->image) }}" alt="{{ $project->title}}">
            <div class="projects-single-div">
                <p class="description-project-single">{{ $project->description }}</p>
                <ul class="description-project-ul">
                    <h4>Midia links:</h4>
                    <li>
                        <a href="{{ $project->urlsite }}" target="_blank">Link do projeto: {{ $project->urlsite }}</a>
                    </li>
                    <li>
                        <a href="{{ $project->urlrepository }}" target="_blank">Acessar repositório:
                            {{ $project->urlrepository }}</a>
                    </li>
                </ul>
                <h4>Tecnologias usadas:</h4>
                <div class="technologies-container">
                    @foreach($project->technologies as $technology)
                        <p class="technologies-names" style="margin: 5px">{{ $technology->name }}</p>
                    @endforeach
                </div>
                <input class="btn btn-danger" type="button" value="Excluir projeto"
                    onclick="if(confirm('Tem certeza que deseja excluir este projeto?')){deleteProject({{ $project->id }})}">

            </div>
        </div>
    </div>

@endif
@endsection
