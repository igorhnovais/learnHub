@extends('layouts.main')

@section('title', 'Dasboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Cursos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-courses-container">
    @if(count($courses) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td scropt="row">{{ $loop->index + 1 }}</td>
                    <td><a href="/courses/{{ $course->id }}">{{ $course->title }}</a></td>
                    <td>{{ count($course->users) }}</td>
                    <td>
                        <a href="/courses/edit/{{ $course->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a> 
                        <form action="/courses/{{ $course->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>
    @else
    <p>Você ainda não tem cursoss, <a href="/courses/create">criar curso</a></p>
    @endif
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Cursos que estou assistindo</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-courses-container">
@if(count($coursesasparticipant) > 0)
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Participantes</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($coursesasparticipant as $course)
            <tr>
                <td scropt="row">{{ $loop->index + 1 }}</td>
                <td><a href="/courses/{{ $course->id }}">{{ $course->title }}</a></td>
                <td>{{ count($course->users) }}</td>
                <td>
                    <form action="/courses/leave/{{ $course->id }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon> 
                            Sair do curso
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach    
    </tbody>
</table>
@else
<p>Você ainda não está participando de nenhum courseo, <a href="/">veja todos os courseos</a></p>
@endif
</div>
@endsection
