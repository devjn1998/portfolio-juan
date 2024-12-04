@if($project)
    <div class="box-project">
        <h4 class="title-project">
            <a href="{{ $project->urlsite }}" target="_blank">{{ $project->title }}</a>
        </h4>
        <p class="description-project">{{ $project->description }}</p>
        <img class="image-project" width="700rem" src="{{ asset('img/events/' . $project->image) }}"
            alt="{{ $project->title}}">
    </div>
@else
    <p>Projeto não encontrado.</p>
@endif