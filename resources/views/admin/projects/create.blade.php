@extends('layouts.public')

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

                <form action="{{ route('comic.store') }}" method="POST">
                    @csrf()
                    <h1 class="form-title text-center">Compila il Form per aggiungere l'elemento al database</h1>
                    <h1 class="form-title text-center">Compila il Form per modificare l'elemento nel database</h1>
                    <div class="my-3 mb-3">
                        <label for="title" class="form-label fw-bold">Titolo</label>
                        <input name="title" type="text" class="form-control" value="{{old('title')}}" >
                        <div class="form-text">Inserisci il titolo</div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">Descrizione</label>
                        <input name="description" type="text" class="form-control" value="{{old('description')}}">
                        <div class="form-text">Inserisci la descrizione</div>
                    </div>
                    <div class="mb-3">
                        <label for="thumb" class="form-label fw-bold">Immagine di copertina</label>
                        <input name="thumb" type="text" class="form-control" value="{{old('thumb')}}">
                        <div class="form-text">Inserisci l'url dell'immagine</div>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label fw-bold">Prezzo</label>
                        <input name="price" type="decimal" class="form-control" value="{{old('price')}}">
                        <div class="form-text">Inserisci il prezzo separando i decimali con un punto "."</div>
                    </div>
                    <div class="mb-3">
                        <label for="series" class="form-label fw-bold">Serie</label>
                        <input name="series" type="string" class="form-control" value="{{old('series')}}">
                        <div class="form-text">Inserisci la serie del fumetto</div>
                    </div>
                    <div class="mb-3">
                        <label for="sale_date" class="form-label fw-bold">Data uscita</label>
                        <input name="sale_date" type="date" class="form-control" value="{{old('sale_date')}}">
                        <div class="form-text">Inserisci la datas di pubblicazione</div>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label fw-bold">Tipologia Fumetto</label>
                        <input name="type" type="text" class="form-control" value="{{old('type')}}">
                        <div class="form-text">Inserisci la tipologia della raccolta <br>
                            -in caso di tipologia multipla inserisci le tipologie seguite da una virgola- <br>
                            Tipologie ammesse: graphic novel, comic book, comic strips, tankōbon.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="artists" class="form-label fw-bold">Artisti*</label>
                        <input name="artists" type="text" class="form-control" value="{{old('artists')}}">
                        <div class="form-text">Inserisci gli artisti divisi da una virgola</div>
                    </div>
                    <div class="mb-3">
                        <label for="writers" class="form-label fw-bold">Scrittori*</label>
                        <input name="writers" type="text" class="form-control" value="{{old('writers' )}}">
                        <div class="form-text">Inserisci gli sceneggiatori divisi da una virgola</div>
                    </div>

                    <div class="d-flex text-center justify-content-center gap-2 my-4">
                        <a type="submit" href="{{ route('index') }}" class="btn btn-secondary">Annulla</a>
                        <button class="btn btn-primary">Conferma</button>
                    </div>
                </form>
            </div>


        </div>



    @endsection