<?php

namespace App\Http\Controllers;
use App\Http\Requests\Store1;
use App\Models\Annonce;
use App\Models\User;
use App\Models\Ville;
use  Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
class ControlAnnonce extends Controller 
{  

  use RegistersUsers;
  
  public function __construct(){

    $this->middleware('auth')->only(['create']);
  }

 //récupérer les valeur (afficher des annonces)
    public function index(){
      $variableAn = Annonce::orderBy('created_at', 'DESC')->paginate(4);
      return view('recupAnnonce',compact('variableAn'));
    }

    // function pour return formulaire 
    public function create()
    {
      $villes = Ville::orderBy('created_at', 'DESC')->get();
        return view('create',compact('villes'));
    }

    public function store(Store1 $requestt)
    {
      //image
      $file= $requestt -> image ->getClientOriginalExtension();
      $file_name= time().'.'.$file;
      $path = 'image';
      $patt=  $requestt -> image ->move($path,$file_name);
      // stock les donnes au database
      $validated = $requestt->validated();
      // la méthode validated() est utilisée pour récupérer les données validées à partir de l'objet Request 
      $An = new Annonce();
      $An->image = $file_name; 
      $An->titre = $validated['titre'];
      $An->description = $validated['description'];

      $An->prix = $validated['prix'];
      $An->id_ville = $requestt->id_ville;  
      $An-> user_id = auth()->user()->id;
      $An->save();
          return redirect('/validPg')->with('bien', 'votre annonce a été bien déposée');
    }

    public function rechercher( Request $request){
      
      $vAnnonce = DB::table('annonces')->where('titre','LIKE',"%$mot%")->orwhere('description','LIKE',"%$mot%")
      ->orderBy("created_at","DESC")->get();
      return response()->json(['reussir'=>true,'annonces'=>$vAnnonce]);
      
    } 
    public function monannonces($id){
      $annonces = DB::table('annonces')->orderBy('created_at', 'DESC')->where('user_id', $id)->paginate(4);
      return view('annonce', compact('annonces'));
      
    }
    public function delete(annonce $annonce){
      $annonce->delete(); 
      return redirect()->route('affiche');
    }
    
 
  public  function edit($id)
  {
    $data= DB::table('annonces')->where('id',$id)->first();
    $villes = Ville::orderBy('created_at', 'DESC')->get();

       return view('edit',compact('data','villes'));
    
  }
  public function update(Request $request, $id)
{
   
        $file = $request->file('image');
        $file_name = time() . '.' . $file->getClientOriginalExtension();
        $path = 'image';
        $file->move($path, $file_name);
        
        DB::table('annonces')->where('id', $id)->update([
        'image' => $file_name,
        'titre' => $request->titre,
        'description' => $request->description,
        'prix' => $request->prix,
        'id_ville' => $request->id_ville
    ]);

    return redirect()->route('affiche');
}


     
      
      
      
      
    }
    
    