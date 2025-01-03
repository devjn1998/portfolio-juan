@extends('layouts.main')
@section('title', 'Portfólio Juan Dev')
@section('content')

<section id="landing-page">
    <div class="apresentation">
        <div class="contacts" data-aos="fade-right" data-aos-delay="500">
            <img id="imgLogo" class="apr_h" src="/img/olaeusoujuan.png" alt="Olá Eu Sou Juan">
            <div class="button-contacts">
                <a class="button-contact-one"
                    href="https://drive.google.com/drive/folders/1zRo5mDJs5gTjvLfefBpt35v765bm5soV"
                    target="_blank">Download
                    CV</a>
                <a class="button-contact-two" href="https://contate.me/desenvolvedorjuanmacedo" target="_blank">Entrar
                    em contato</a>
            </div>
        </div>
        <div data-aos="fade-left" data-aos-delay="500">
            <img id="imgFoto" class="apr_f" src="/img/fotoImg.png" alt="Foto de Juan">
        </div>
    </div>
    <div class="about-us-container">
        <div class="about-us" data-aos="fade-up" data-aos-delay="500">
            <h1 class="about-us-title">Sobre mim</h1>
            <p class="about-us-text" data-aos="fade-left" data-aos-delay="1500">
                Desenvolvedor Front-End com experiência em Vue.js, React, JavaScript, TypeScript e Styled Components,
                além
                de consumo de
                APIs REST. Apaixonado pelo desenvolvimento de componentes reutilizáveis. Também possui experiência em
                Back-End,
                utilizando as tecnologias Laravel, Spring Boot e Node.js. Atualmente, cursando Análise e Desenvolvimento
                de
                Sistemas na
                Estácio e Desenvolvedor Full Stack Java na Ebac.
            </p>
        </div>
    </div>
</section>

<section id="skills">
    <div id="habilidades">
        <div class="skills" data-aos="fade-right" data-aos-delay="500">
            <h1 class="skills-title mb-5">Habilidades</h1>
            <div class="boxes mt-5 mb-5">
                <div class="box card" width="12rem">
                    <p class="description-skills">HTML5</p>
                    <img src="/img/icons/icon-html.png" alt="HTML5">
                </div>
                <div class="box card" width="12rem">
                    <p class="description-skills">CSS3</p>
                    <img src="/img/icons/icon-css.png" alt="css3">
                </div>
                <div class="box card" width="12rem">
                    <p class="description-skills">JavaScript</p>
                    <img src="/img/icons/icon-javascript.png" alt="javascript">
                </div>
                <div class="box card" width="12rem">
                    <p class="description-skills">VueJS</p>
                    <img src="/img/icons/icon-vue.png" alt="vuejs">
                </div>
                <div class="box card" width="12rem">
                    <p class="description-skills">ReactJS</p>
                    <img src="/img/icons/icon-react.png" alt="reactjs">
                </div>
                <div class="box card" width="12rem">
                    <p class="description-skills">Bootstrap</p>
                    <img src="/img/icons/icon-bootstrap.png" alt="bootstrap">
                </div>
                <div class="box card" width="12rem">
                    <p class="description-skills">Sass</p>
                    <img src="/img/icons/icon-sass.png" alt="sass">
                </div>
                <div class="box card" width="12rem">
                    <p class="description-skills">Gulp</p>
                    <img src="/img/icons/icon-gulp.png" alt="gulp">
                </div>
                <div class="box card" width="12rem">
                    <p class="description-skills">Java</p>
                    <img src="/img/icons/icon-java.png" alt="java">
                </div>
                <div class="box card" width="12rem">
                    <p class="description-skills">Spring</p>
                    <img src="/img/icons/icon-spring.png" alt="spring">
                </div>
                <div class="box card" width="12rem">
                    <p class="description-skills">Laravel</p>
                    <img src="/img/icons/icon-laravel.png" alt="laravel">
                </div>
            </div>
        </div>
    </div>
</section>

<div id="projetos">
    <div class="projects" data-aos="fade-left" data-aos-delay="500">
        <h1 class="skills-title mb-5">Projetos</h1>
        <div style="text-align: center;" class="project-table">
            @forelse($projects as $project)
                <div class="box-project" onclick="openProjectModal({{ $project->id }})">
                    <h4 class="title-project"><a>{{ $project->title }}</a></h4>
                    <p class="description-project">{{ $project->description }}</p>
                    <img class="image-project" width="700rem" src="{{ asset('img/events/' . $project->image) }}"
                        alt="{{ $project->title}}">
                </div>

            @empty
                <div>
                    <h4>Não há projetos cadastrados</h4>
                </div>
            @endforelse

        </div>
        <div id="project-modal" class="modal" style="display: none;">
            <div class="modal-content">
                <span class="close-button" onclick="closeProjectModal()">
                    &times;
                </span>
                <h2 id="modal-title"></h2>
                <p id="modal-description"></p>
                <h5 class="mt-5">Tecnologias usadas</h5>
                <div class="modal-technologies mb-4">
                    @isset($project)
                        @if($project->technologies)
                            @foreach ($project->technologies as $technology)
                                <p style="margin: 8px;" class="technologies-names">
                                    {{ $technology->name }}
                                </p>
                            @endforeach
                        @else
                            <p>Nenhuma tecnologia cadastrada para este projeto.</p>
                        @endif
                    @endisset

                </div>
                <img id="modal-gif" src="" alt="" style="max-width: 100%; height: auto;">
                <div class="modal-links">
                    <a href="#" target="_blank" id="modal-link">Acessar site</a>
                    <a href="#" target="_blank" id="modal-repo">Acessar repositório</a>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="soluctions" data-aos="fade-right">
    <div class="soluctionsapresentation">
        <div class="soluction-img">
            <img src="/img/soluctionsapresentation.png" alt="Apresentação">
        </div>
        <div class="soluction-form">
            <form id="contact-me" class="card" action="https://formsubmit.co/juandev1998@gmail.com" method="POST"
                enctype="multipart/form-data">
                <h2 class="p-4">Me envie uma mensagem</h2>
                <div class="form-campo">
                    <label for="nome">Seu nome: </label>
                    <input type="text" name="nome" id="nome">
                </div>
                <div class="form-campo">
                    <label for="email">Seu e-mail: </label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="form-campo">
                    <label for="telefone">Seu telefone: </label>
                    <input type="tel" name="telefone" id="telefone">
                </div>
                <div class="form-campo">
                    <label for="bairro">Mensagem:</label>
                    <textarea name="mensagem" id="mensagem"></textarea>
                </div>
                <div class="alinhamento">
                    <button class="btn btn-success" type="submit">Enviar</button>
                </div>

                <input type="hidden" name="_subject" value="Alguém enviou uma mensagem do site Juan Dev">
                <input type="text" name="_honey" style="display:none">
                <input type="hidden" name="_captcha" value="false">
            </form>
        </div>
    </div>
</div>
@endsection
