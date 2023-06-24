@extends('layouts.app')
@section('content')
    <div class="container">
        {{-- input rechercher --}}
        <form method="POST" action="{{ route('rechercher') }}" onsubmit="rechercher(event)" id="idRechercher">
            @csrf
            <div class="form-group" style="display:flex;margin-bottom:10px;">
                <input type='text' class="form-control" style="width:50%" id="inputId">
                <button type="submit" class="btn btnr  " style="margin-left: 10px">Rechercher</button>
            </div>
            <style>
                .btnr {
                    border: #00008B solid;
                    border-radius: 10px;
                }

                .btnr:hover {
                    background-color: #00008B;
                    color: white;
                }

                .card:hover {
                    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.16), 0 4px 10px rgba(0, 0, 0, 0.23);
                }

                .btnD {
                    background-color: #00008B;
                    color: white;
                }

                .btn:hover {
                    border: #00008B solid;
                    margin-left: 5px;
                    border-radius: 10px;
                }

                .card-img-top {
                    width: 260px;
                    height: 230px;
                }

                .divt {
                    text-align: center;
                }

                .card {
                    margin-top: 9px;
                }
                .pContact{
                    color:#00008B;
                    text-align: center;
                }
            </style>
        </form>
        {{-- afficher les donnes - --}}
        <div id="res">
            <div class="row">
                @foreach ($variableAn as $annonce)
                    <div class="card" style="width: 18rem;margin-left:10px;">
                        <img class="card-img-top" src="{{ asset('image/' . $annonce->image) }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title divt">{{ $annonce->titre }}</h5>
                            <div class="divt">{{ Carbon\Carbon::parse($annonce->created_at)->diffForHumans() }}</div>
                            <p class="card-text divt">{{ $annonce->description }}</p>
                            <p class="divt">{{ $annonce->ville->nom }}</p>
                            <p class="card-text divt" style="color: #C71585">{{ $annonce->prix }} DH</p>
                            @guest
                            <p class="pContact">Connectez-vous pour pouvoir contacter le vendeur</p>
                            @endguest

                            @if (Auth::check() && Auth::user()->id !== $annonce->user_id)
                                <a class="btn btn btnr w-100"
                                    href="{{ route('create', ['id_vendeur' => $annonce->user_id, 'id_annonce' => $annonce->id]) }}">Contacter
                                    le vendeur
                                </a><br>
                            @endif
                            @if (Auth::check() && Auth::user()->id == $annonce->user_id)
                            <form action="{{ route('delete', ['annonce' => $annonce->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn btnr w-100 mt-2" type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cette annonce ?')">Supprimer</button>
                            </form>

                            <a class="btn btn btnr w-100" href="{{route('edit',['id'=>$annonce->id])}}">modifier</a>

                              
                            @endif
                            
                          
                        </div>
                    </div>
                    
                        
                @endforeach
            </div>
        </div>
        {{ $variableAn->links() }}
    @endsection
    @section('extra-js')
    <script>
        function rechercher(event) {
            event.preventDefault()
            const mot = document.getElementById("inputId").value
            const url = document.getElementById("idRechercher").getAttribute("action")
                axios.post(`${url}`, {
                        mot: mot,
                    })
                    .then(function(response) {
                        //stock les annonces
                        const annonces = response.data.annonces;
                        const resl = document.getElementById("res");
                        resl.innerHTML = "";
                        let count = 0; // counter for number of annonces displayed
                        for (let i = 0; i < annonces.length; i++) {
                            let annonceC = document.createElement("div");
                            annonceC.classList.add('card', "ml-5", 'mt-2');
                            annonceC.style.width = '19.5rem';
                            annonceC.style.marginLeft = "10px";
                            annonceC.style.marginLeft = '10px';
                            const cardBody = document.createElement('div');
                            cardBody.classList.add('card-body');
                            let img = document.createElement("img");
                            img.setAttribute("src", "image/" + annonces[i].image);
                            img.classList.add('card-img-top', 'img');
                            img.style.marginBottom = "15px";
                            let titre = document.createElement("h5");
                            titre.classList.add("card-title", "divt");
                            titre.innerHTML = annonces[i].titre;
                            let description = document.createElement("p");
                            description.innerHTML = annonces[i].description;
                            description.classList.add("divt");
                            // let ville = document.createElement("p");
                            // ville.innerHTML = annonces[i].Ville.nom;
                            // ville.classList.add("divt");
                            let prix = document.createElement("p");
                            prix.innerHTML = annonces[i].prix + "DH";
                            prix.classList.add('divt');
                            prix.style.color = "#C71585";
                            const contactBtn = document.createElement('a');
                            contactBtn.classList.add('btn', 'btnr', 'divt');
                            contactBtn.style.width = "100%";
                            contactBtn.textContent = 'Contacter le vendeur';
                            cardBody.appendChild(img);
                            cardBody.appendChild(titre);
                            cardBody.appendChild(description);
                            // cardBody.appendChild(ville);
                            cardBody.appendChild(prix);
                            cardBody.appendChild(contactBtn);
                            annonceC.appendChild(cardBody);
                            if (count % 4 === 0) {
                                let row = document.createElement("div");
                                row.classList.add("row");
                                resl.appendChild(row);
                            }
                            let rows = resl.getElementsByClassName("row"); // get all rows
                            rows[rows.length - 1].appendChild(annonceC); // append the col to the last row
                            count++;

                        }

                    })
                    .catch(function(error) {
                        console.log(error)
                    })
            }
   
           

       
        </script>
    </div>
@endsection
