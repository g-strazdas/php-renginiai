@extends('main')
@section('content')
    <div class="container">
        <h2 class="mb-4">Atnaujinti informaciją apie renginį</h2>
        @include('_partials/errors')
        <form action="/update/{{$event->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <input type="text" name="name" class="form-control" placeholder="Renginio pavadinimas">
            </div>
            <div class="form-group mb-4">
                <input type="text" name="place" class="form-control" placeholder="Renginio vieta">
            </div>
            <div class="form-group mb-4">
                <input type="text" name="starts" class="form-control" placeholder="Pradžia">
            </div>
            <div class="form-group mb-4">
                <input type="text" name="ends" class="form-control" placeholder="Pabaiga">
            </div>
            <div class="form-group mb-4">
                <input type="text" name="organizer" class="form-control" placeholder="Organizatorius">
            </div>
            <div class="form-group mb-4">
                <input type="text" name="phone" class="form-control" placeholder="Kontaktinis tel.">
            </div>
            <div class="form-group mb-4">
                <textarea name="description"  id="" cols="30" rows="10" placeholder="Renginio aprašymas" class="form-control"></textarea>
            </div>
            <div class="form-group mb-4">
                <label>Paveikslėlis</label>
                <input type="file" name="logo" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary mb-4">Saugoti</button>
        </form>
    </div>
@endsection
