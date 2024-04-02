@extends('layouts.main')

@section('title', 'Criar Curso')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1 class="mt-3">Crie o seu Curso</h1>
  <form action="/courses" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="image">Imagem do Curso:</label>
      <input type="file" id="image" name="image" class="from-control-file">
    </div>
    <div class="form-group">
      <label for="title">Curso:</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Curso">
    </div>
    <div class="form-group">
      <label for="date">Data do lançamento do Curso:</label>
      <input type="date" class="form-control" id="date" name="date" value="{{ date('Y-m-d') }}">
    </div>
    <div class="form-group">
      <label for="title">Descrição:</label>
      <textarea name="description" id="description" class="form-control" placeholder="Descreva o que terá no Curso"></textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="Criar Curso">
  </form>
</div>

@endsection