@extends('layouts.app')
@section('content')
<h1>prova show</h1>

<div class="d-flex flex-column darkBg">
    <a href={{ route('admin.projects.index') }} class="btn btn-primary m-5">Indietro</a>

    <div class="d-flex justify-content-center flex-wrap text-center">


        <div class="col-12 col-lg-4 px-5 d-flex flex-column justify-content-center">
            <h1 class="text-white">{{ $project->title }}</h1>

            <p class="white-mb0">Descrizione progetto:</p>
            <p>{{ $project->description }}</p>

            <p class="white-mb0">Link:</p>
            <p>{{$project->url_link}}</p>
            <p class="white-mb0">Data pubblicazione :</p>
            <p>{{$project->publication_date}}</p>


        </div>
    </div>

    <div class="d-flex justify-content-center">
        <a href={{ route('admin.projects.edit', $project->id) }} class="btn btn-warning my-5 mx-2">Modifica</a>
        <form class="my-5 mx-2" action="{{ route('admin.projects.destroy', ['id' => $project->id]) }}" method="POST">
            @csrf

            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="Elimina">

        </form>
    </div>


</div>




@endsection