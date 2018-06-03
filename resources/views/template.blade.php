<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Le coin du feu</title>
    {!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
		{!! Html::style('https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css') !!}
		<!--[if lt IE 9]>

    {{ Html::style('https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js') }}
    {{ Html::style('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
    <![endif]-->
    <style> textarea { resize: none; } </style>
</head>
<body>
<header class="jumbotron">
    <div class="container">
        <h1 class="page-header">{!! link_to_route('home', 'Le site Communautaire') !!}</h1>
        <div class="navbar-left">
        <div class="nav navbar-default ">
            {!! link_to_route('produit.index', 'Page des Produits') !!}
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {!! link_to_route('post.index','Les articles du blog') !!}
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {!! link_to_route('commentaire.index','La buvette !') !!}
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {!! link_to_route('confirmAchat','Liste des Achats !') !!}

        </div>


            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <?php $user =\Auth::user()->attributesToArray(); ?>
                <?php $user = $user['avatar']; ?>

                <img src="{{ asset('img/'.$user) }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
            </a>

        </div>
        <div class="navbar-right ">
            <div class="nav btn btn-info">
                {!! link_to_route('profile.show','Profil Utilisateur') !!}



            </div>


        </div>
        @yield('header')
    </div>
</header>
<div class="container">
    @yield('contenu')
</div>
</body>
</html>