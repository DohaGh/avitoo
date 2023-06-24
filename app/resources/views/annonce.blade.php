@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-5">
                 <style>
            .btnr {
             border:  solid;
             border-radius: 10px;
         }

         .btnr:hover {
             background-color: green;
             color: white;
         }
     </style>
            @foreach ($annonces as $annonce)
                <div class="card" style="width: 17.5rem;
                      margin-left: 10px;">
                    <img class="card-img-top" style="width: 258px;height: 215px;" src="{{ asset('image/' . $annonce->image) }}"
                        alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center">{{ $annonce->titre }}</h5>
                        <div style="text-align: center">{{ Carbon\Carbon::parse($annonce->created_at)->diffForHumans() }}</div>
                        <p class="card-text" style="text-align: center">{{ $annonce->description }}</p>

                        <p class="card-text" style="color: #C71585;text-align: center" >{{ $annonce->prix }} DH</p>
                    </div>
                    <form action="{{route('delete', ['annonce'=> $annonce->id] )}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn btnr w-100 mt-2" type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cette annonce ?')" >Supprimer</button>
                    </form>
                </div>
            @endforeach
        </div>
        <p>{{ $annonces->links() }}</p>
    </div>
@endsection
