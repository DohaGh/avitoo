@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Contacter le vendeur</h1>
        <form action="{{route('message.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Votre message</label>
                <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea><br>
               <input type="hidden" name="id_vendeur" value="{{$id_vendeur}}">
               <input type="hidden" name="id_annonce" value="{{$id_annonce}}">
               <input type="hidden" name="id_acheteur" value="{{auth()->user()->id}}">
            </div>
            <button type="submit" class="btn btn-success">Envoyer le message</button><br>
        </form>
        
    </div>
@endsection
