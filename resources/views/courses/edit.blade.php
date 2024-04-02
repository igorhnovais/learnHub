@extends('layouts.main')

@section('title', 'Editando: ' . $course->title)

@section('content')

<div id="course-create-container" class="col-md-6 offset-md-3">
  <h1>Editando: {{ $course->title }}</h1>
  <form action="/courses/update/{{ $course->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="image">Imagem do curso:</label>
      <input type="file" id="image" name="image" class="from-control-file">
      <img src="/img/courses/{{ $course->image }}" alt="{{ $course->title }}" class="img-preview">
    </div>
    <div class="form-group">
      <label for="title">courseo:</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Nome do courseo" value="{{ $course->title }}">
    </div>
    <div class="form-group">
      <label for="date">Data do curso:</label>
      <input type="date" class="form-control" id="date" name="date" value="{{ $course->date->format('Y-m-d') }}">
    </div>
    <div class="form-group">
      <label for="title">Descrição:</label>
      <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no courseo?">{{ $course->description }}</textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="Editar curso">
  </form>
</div>

@endsection