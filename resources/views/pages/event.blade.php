@extends('main')
@section('content')
    <div class="container">
        <h1 class="mt-4">{{$event->name}}</h1>
        <div class="logo">
            <img style="width: 28rem" src="{{asset('/storage/images/'.$event->logo)}}" alt="">
            {{--            {{dd(asset('/storage/images/'.$event->logo))}}--}}
        </div>

        <h3>Kita informacija apie renginį:</h3>
        <ul>
            <li>{{$event->place}}</li>
            <li>{{$event->starts}}</li>
            <li>{{$event->ends}}</li>
            <li>{{$event->organizer}}</li>
            <li>{{$event->phone}}</li>
            <li>{{$event->description}}</li>
        </ul>
        <h4>Veiksmai:</h4>
        <ul>
            <li><a href = "/event/delete/{{$event->id}}">Šalinimas</a></li>
            <li><a href = "/event/update/{{$event->id}}">Duomenų atnaujinimas</a></li>
        </ul>
    </div>
@endsection
