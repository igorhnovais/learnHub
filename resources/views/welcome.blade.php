@extends('layouts.main')

@section('title', 'LH Courses')

@section('content')

<div id="search-container" class="col-md-12 mb-5">
    <h1>Busque um curso</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
</div>
<div id="courses-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Cursos disponíveis</h2>
    <p class="subtitle">Veja os cursos disponíveis</p>
    @endif
    <div id="cards-container" class="row mb-5">
        @foreach($courses as $course)
        <div class="card col-md-3">
            <img src="{{ $course->image }}" alt="{{ $course->title }}">
            <div class="card-body">
                <p class="card-date">{{ date('d/m/Y', strtotime($course->date)) }}</p>
                <h5 class="card-title">{{ $course->title }}</h5>
                <p class="card-participants"> {{ count($course->users) }} Participantes</p>
                <a href="/courses/{{ $course->id }}" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        @endforeach
        @if(count($courses) == 0 && $search)
            <p>Não foi possível encontrar nenhum curso com {{ $search }}! <a href="/">Ver todos</a></p>
        @elseif(count($courses) == 0)
            <p>Não há cursos disponíveis</p>
        @endif
    </div>
</div>

@endsection