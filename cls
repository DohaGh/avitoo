warning: in the working copy of 'app/app/Http/Controllers/HomeController.php', LF will be replaced by CRLF the next time Git touches it
warning: in the working copy of 'app/app/Http/Controllers/MessageController.php', LF will be replaced by CRLF the next time Git touches it
warning: in the working copy of 'app/resources/views/layouts/app.blade.php', LF will be replaced by CRLF the next time Git touches it
warning: in the working copy of 'app/routes/web.php', LF will be replaced by CRLF the next time Git touches it
[1mdiff --git a/app/app/Http/Controllers/HomeController.php b/app/app/Http/Controllers/HomeController.php[m
[1mindex 7cbc2c3..caa6da0 100644[m
[1m--- a/app/app/Http/Controllers/HomeController.php[m
[1m+++ b/app/app/Http/Controllers/HomeController.php[m
[36m@@ -3,7 +3,7 @@[m
 namespace App\Http\Controllers;[m
 [m
 use Illuminate\Http\Request;[m
[31m-[m
[32m+[m[32muse App\Models\message;[m
 class HomeController extends Controller[m
 {[m
     /**[m
[36m@@ -23,6 +23,7 @@[m [mpublic function __construct()[m
      */[m
     public function index()[m
     {[m
[31m-        return view('home');[m
[32m+[m[32m        $message=message::where('id_vendeur','=',auth()->user()->id);[m
[32m+[m[32m        return view('home',compact('message'));[m
     }[m
 }[m
[1mdiff --git a/app/app/Http/Controllers/MessageController.php b/app/app/Http/Controllers/MessageController.php[m
[1mindex 32b7a07..df782bc 100644[m
[1m--- a/app/app/Http/Controllers/MessageController.php[m
[1m+++ b/app/app/Http/Controllers/MessageController.php[m
[36m@@ -3,10 +3,27 @@[m
 namespace App\Http\Controllers;[m
 [m
 use Illuminate\Http\Request;[m
[31m-[m
[32m+[m[32muse App\Models\message;[m
 class MessageController extends Controller[m
 {[m
[31m-    Public function create(){[m
[31m-        return('hi');[m
[32m+[m[32m    Public function __construct(){[m
[32m+[m[32m        $this ->middleware('auth');[m
[32m+[m[32m    }[m
[32m+[m[41m    [m
[32m+[m[32m    Public function create(Request $request){[m
[32m+[m[32m        $id_vendeur = $request['id_vendeur'];[m
[32m+[m[32m        $id_annonce = $request['id_annonce'];[m
[32m+[m[32m         return  view('message',compact('id_vendeur','id_annonce'));[m
[32m+[m[41m      [m
[32m+[m[32m    }[m
[32m+[m[32m    Public function store(Request $request){[m
[32m+[m[32m        $message = new message();[m
[32m+[m[32m        $message -> content = $request['content'];[m
[32m+[m[32m        $message -> id_vendeur = $request['id_vendeur'];[m
[32m+[m[32m        $message -> id_acheteur = $request['id_acheteur'];[m
[32m+[m[32m        $message -> id_annonce = $request['id_annonce'];[m
[32m+[m[32m        $message ->save();[m
[32m+[m[32m        return redirect('/validPg')->with('réussir','Votre message a été bien envoyé');[m
[32m+[m
     }[m
 }[m
[1mdiff --git a/app/public/foto/img1.jpeg b/app/public/foto/img1.jpeg[m
[1mdeleted file mode 100644[m
[1mindex fb50aee..0000000[m
Binary files a/app/public/foto/img1.jpeg and /dev/null differ
[1mdiff --git a/app/public/foto/img2.jpeg b/app/public/foto/img2.jpeg[m
[1mdeleted file mode 100644[m
[1mindex 233d44a..0000000[m
Binary files a/app/public/foto/img2.jpeg and /dev/null differ
[1mdiff --git a/app/public/image/1681997905.png b/app/public/image/1681997905.png[m
[1mdeleted file mode 100644[m
[1mindex 8d7b040..0000000[m
Binary files a/app/public/image/1681997905.png and /dev/null differ
[1mdiff --git a/app/public/image/1681997939.png b/app/public/image/1681997939.png[m
[1mdeleted file mode 100644[m
[1mindex 8d7b040..0000000[m
Binary files a/app/public/image/1681997939.png and /dev/null differ
[1mdiff --git a/app/public/image/1681998048.png b/app/public/image/1681998048.png[m
[1mdeleted file mode 100644[m
[1mindex 8d7b040..0000000[m
Binary files a/app/public/image/1681998048.png and /dev/null differ
[1mdiff --git a/app/public/image/1681998275.png b/app/public/image/1681998275.png[m
[1mdeleted file mode 100644[m
[1mindex 8d7b040..0000000[m
Binary files a/app/public/image/1681998275.png and /dev/null differ
[1mdiff --git a/app/public/image/1681998333.png b/app/public/image/1681998333.png[m
[1mdeleted file mode 100644[m
[1mindex 8d7b040..0000000[m
Binary files a/app/public/image/1681998333.png and /dev/null differ
[1mdiff --git a/app/public/image/1681998804.png b/app/public/image/1681998804.png[m
[1mdeleted file mode 100644[m
[1mindex 8d7b040..0000000[m
Binary files a/app/public/image/1681998804.png and /dev/null differ
[1mdiff --git a/app/resources/views/create.blade.php b/app/resources/views/create.blade.php[m
[1mindex e6bf14e..4b197df 100644[m
[1m--- a/app/resources/views/create.blade.php[m
[1m+++ b/app/resources/views/create.blade.php[m
[36m@@ -5,7 +5,7 @@[m
             @csrf[m
             <div class="form-group">[m
                 <label for="file">Ajouter une image </label>[m
[31m-                <input type="file" class="form-control" name="image" id="image">[m
[32m+[m[32m                <input type="file" class="form-control" name="image" id="image" >[m
             </div>[m
             <div class="form-group">[m
                 <label for="titre">Titre de l'annonce</label>[m
[1mdiff --git a/app/resources/views/layouts/app.blade.php b/app/resources/views/layouts/app.blade.php[m
[1mindex 27278e5..c1c45ae 100644[m
[1m--- a/app/resources/views/layouts/app.blade.php[m
[1m+++ b/app/resources/views/layouts/app.blade.php[m
[36m@@ -32,7 +32,7 @@[m
         <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">[m
             <div class="container">[m
                 <a class="navbar-brand"  href="{{route('welcome')}}">[m
[31m-                 <img style="width:35px" src="foto/imgss1.png" >[m
[32m+[m[32m                 <img style="width:35px" src="./foto/imgss1.png" >[m
                  <img style="width:153px;margin-left:10px;margin-top:2px " src="foto/imgss2.png" > [m
                 </a>[m
                 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">[m
[1mdiff --git a/app/resources/views/recupAnnonce.blade.php b/app/resources/views/recupAnnonce.blade.php[m
[1mindex 3fe451c..e2d5da2 100644[m
[1m--- a/app/resources/views/recupAnnonce.blade.php[m
[1m+++ b/app/resources/views/recupAnnonce.blade.php[m
[36m@@ -80,8 +80,8 @@[m [mfunction rechercher(event) {[m
                             annonceC.style.marginLeft = '10px';[m
                             const cardBody = document.createElement('div');[m
                             cardBody.classList.add('card-body');[m
[31m-                            let img = document.createElement("img");[m
[31m-                            img.setAttribute("src", annonces[i].image);[m
[32m+[m[32m                            let img = document.createElement("img");gff[m
[32m+[m[32m                            img.setAttribute("src", "{{ asset('image/' .$annonce->image) }} ");[m
                             img.classList.add('card-img-top');[m
                             let titre = document.createElement("h5");[m
                             titre.classList.add("card-title");[m
[1mdiff --git a/app/resources/views/validPg.blade.php b/app/resources/views/validPg.blade.php[m
[1mindex f560ec9..56bd046 100644[m
[1m--- a/app/resources/views/validPg.blade.php[m
[1m+++ b/app/resources/views/validPg.blade.php[m
[36m@@ -4,6 +4,11 @@[m
         @if (session()->has('bien'))[m
             <div class="alert alert-success">[m
                 {{ session()->get('bien') }}[m
[32m+[m[32m            @elseif (session()->has('réussir'))[m
[32m+[m[32m                <div class="alert alert-success">[m
[32m+[m[32m                    {{ session()->get('réussir') }}[m
[32m+[m[32m                </div>[m
         @endif[m
[32m+[m
     </div>[m
 @endsection[m
[1mdiff --git a/app/routes/web.php b/app/routes/web.php[m
[1mindex 646fd51..00faa55 100644[m
[1m--- a/app/routes/web.php[m
[1m+++ b/app/routes/web.php[m
[36m@@ -23,6 +23,7 @@[m
 [m
 [m
 Auth::routes();[m
[32m+[m[32mRoute::POST('/message',[App\Http\Controllers\MessageController::class,'store'])->name('message.store');[m
 Route::get('/message/{id_vendeur}/{id_annonce}',[ App\Http\Controllers\MessageController::class,'create'])->name('message.create');[m
 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');[m
 Route::get('/annonce', [App\Http\Controllers\ControlAnnonce::class, 'create'])->name('annonce');[m
