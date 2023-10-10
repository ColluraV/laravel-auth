@extends('layouts.app')

@section('content')
    <div class="container-fluid darkBanner py-5 ">

        <div class="row form-container justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">


                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf()
                    
                    <h1 class="form-title text-center">Modifica l'elemento nel database</h1>
                    <div class="my-3 mb-3">
                        <label for="title" class="form-label fw-bold">Titolo</label>
                        <input name="title" type="text" class="form-control" value="{{$project->title}}" >
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">Descrizione</label>
                        <input name="description" type="text" class="form-control" value="{{$project->description}}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label fw-bold">Immagine</label>
                        <input name="image" type="file" class="form-control" accept="image/*">
                        <img src="{{ asset('/storage/'. $project->image)}}" style="width: 250px">
                        <div class="form-text">anteprima immagine</div>
                    </div>
                    <div class="mb-3">
                        <label for="url_link" class="form-label fw-bold">Collegamento</label>
                        <input name="url_link" type="text" class="form-control" value="{{$project->url_link}}">
                    </div>
                    <div class="mb-3">
                        <label for="publication_date" class="form-label fw-bold">Data rilascio progetto</label>
                        <input name="publication_date" type="date" class="form-control" value="{{$project->publication_date}}">

                    <div class="d-flex text-center justify-content-center gap-2 my-4">
                        <a type="submit" href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Annulla</a>
                        <button class="btn btn-primary">Conferma</button>
                    </div>
                </form>
            </div>


        </div>



    @endsection