<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body {
        /* background-image: url("foto/img3.jpeg"); */
        background-repeat: no-repeat;
        background-size: cover;
        height: 100vh;

        background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(79, 69, 69, 0.75)), url("foto/img3.jpeg")
    }

    .div {
        margin-top: 29vh;
        position: relative;
        margin-left: 58vh;

    }

    .btnI {
        width: 200px;
        border-radius: 15px;
        margin-bottom: 5px;
        margin-top: 10px;
        background-color: #CD5C5C;
        color: white
    }

    .btn:hover {
        background-color: white;
        color: #00008B;
    }

    .p {
        color: white;
        font-size: xx-large;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif
    }
    .card{
        width:17rem;
        height: 10rem;
        border-radius: 15px;
    }

    p {
        color: white;
    }
</style>

<body>
    <div class="div">
        <h6 class="p">
            Vendez, achetez, louez tout ce que <br>
            vous voulez, vous le trouverez ici
        </h6>
        <p>Voulez-vous mettre en vente ou louer un appartement, des appareils
             électroménagers, une voiture<br><span>
                </span> ou tout ce que vous voulez mettre en annonce ?
              Ce site vous aidera à publier votre annonce.<br>
    
            <br>
        </p>
        <a class="btn btnI  " href="{{ route('affiche') }} ">Bienvenue</a>
        
    </div>
</body>

</html>
