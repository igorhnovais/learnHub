@extends('layouts.main')

@section('title', $course->title)

@section('content')

  <div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-6">
        <img src="{{ $course->image }}" class="img-fluid" alt="{{ $course->title }}">
      </div>
      <div id="info-container" class="col-md-6">
        <h1>{{ $course->title }}</h1>
        <p class="courses-participants"><ion-icon name="people-outline"></ion-icon> {{ count($course->users) }} Alunos</p>
        <p class="course-owner"><ion-icon name="star-outline"></ion-icon> Professor(a): {{ $courseOwner['name'] }}</p>
        @if(!$hasUserJoined)
          <form action="/courses/join/{{ $course->id }}" method="POST">
            @csrf
            <a href="/courses/join/{{ $course->id }}" 
              class="btn btn-primary" 
              id="event-submit"
              onclick="event.preventDefault();
              this.closest('form').submit();">
              Confirmar Interesse
            </a>
          </form>
        @else
          <p class="already-joined-msg">Você já está participando deste evento!</p>
        @endif
      </div>
      <div class="col-md-12" id="description-container">
        <h3>Sobre o curso:</h3>
        <p class="event-description">{{ $course->description }}</p>
      </div>
    </div>
  </div>

@endsection