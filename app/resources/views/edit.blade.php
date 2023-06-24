@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="post" action="{{route('update',$data->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="file">Ajouter une image </label>
                <input type="file" class="form-control" name="image" id="image" >
            </div>
            <div class="form-group">
                <label for="titre">Titre de l'annonce</label>
                <input type="text" class='form-control'  id="titre" value="{{$data->titre}}"
                    name='titre'>
                
            </div>
            <div class="form-group">
                <label for="description">Description de l'annonce</label>
                <textarea name="description" class="form-control" id="description">{{$data->description}}</textarea>
            </div>
            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="text" class="form-control" name="prix" id="prix" value="{{$data->prix}}">
            </div><br>
           <label>ville</label><br>
           <select name="id_ville" value="{{$data->id_ville}}" class="form-control"  >
            @foreach ($villes as $ville)
                <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
            @endforeach
        </select>
            
            <br> <button type='submit' class='w-100 btn' style="background-color:#00008B; color:white">update</button>
        </form>
    </div>
@endsection
