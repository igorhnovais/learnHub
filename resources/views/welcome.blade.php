@extends('layouts.main')

@section('title', 'LH Courses')

@section('content')

<div id="courses-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2 class="">Cursos disponíveis</h2>
    @endif
    <div id="cards-container" class="row mb-5 justify-content-center">
        @foreach($courses as $course)
        <div class="card col-md-3 mb-4 ml-4 shadow">
            <img src="/img/courses/{{ $course->image }}" alt="{{ $course->title }}">
            <div class="card-body">
                <p class="card-date">{{ date('d/m/Y', strtotime($course->date)) }}</p>
                <h5 class="card-title">{{ $course->title }}</h5>
                <p class="card-participants">{{ count($course->users) }} Participantes</p>
                <a href="/courses/{{ $course->id }}" class="btn btn-primary">Saber mais</a>
            </div>
        </div>
        @endforeach
        @if(count($courses) == 0 && $search)
            <p class="col-12">Não foi possível encontrar nenhum curso com {{ $search }}! <a href="/">Ver todos</a></p>
        @elseif(count($courses) == 0)
            <p class="col-12">Não há cursos disponíveis</p>
        @endif
    </div>

</div>

@endsection