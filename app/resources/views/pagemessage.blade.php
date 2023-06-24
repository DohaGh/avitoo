@extends('layouts.app')
@section('content')
    <div class="container">
        <style>
            .btnr {
             border: green solid 2px;
             border-radius: 15px;
         }

         .btnr:hover {
             background-color:green;
             color: white;
         }
     </style>
        <div class="row mt-5 ">
            @foreach ($messages as $message)
            <div class="col col-lg-4 col-md-3 col-sm-2 w-50" >
                    <h5>Envoyer message à {{ $message->user->name }}</h5>
                    <h5 style="border: 2px solid black;border-radius: 15px;padding: 15px ">
                        <div>{{ Carbon\Carbon::parse($message->created_at)->diffForHumans() }}</div>
                        <span style="color: green">nom message:</span> {{ $message->content }}<br>
                        <form action="{{route('delete', ['annonce'=> $message->id_annonce] )}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn btnr w-50 mt-2" type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cette annonce ?')">Supprimer</button>
                        </form>
                    </h5>
                    
                </div>
                @endforeach


        </div>
          
    </div>
    {{$messages->links()}}
@endsection
