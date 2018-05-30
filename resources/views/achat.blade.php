@extends('template')
@section('titre')
Les articles
@endsection
<style>
    #display-on-click
    {
        display: block;

    }
</style>
@section('header')
    <div class="row">
    @if(Auth::check())
        <div class="btn-group pull-right">

            {!! link_to('logout', 'Deconnexion', ['class' => 'btn btn-warning']) !!}
        </div>
    @else
        {!! link_to('login', 'Se connecter', ['class' => 'btn btn-info pull-right']) !!}
    @endif
    </div>

<div class="btn-group pull-left">



</div>


    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <a class="btn btn-link btn-toolbar" href="{{ route('categorie',"info") }} ">
                Informatique
            </a>
            <a class="btn btn-link btn-toolbar" href="{{ route('categorie',"hifi") }} ">
                Hifi
            </a>


                <a class="btn btn-link btn-toolbar" href="{{ route('categorie',"autre") }} ">
                3me Catégorie
                </a>
        </div>
        </div>

@endsection

@section('contenu')


<body>
<main role="main">
    {!! $links !!}


        <div class="container">
            <div class="col-md-4 pull-right">
                <strong>Panier</strong>
            <ul id="test" class="list-group">


                <li id="add-display" class="list-group-item btn" onclick="myFunction()" >Voir les détails du panier</li>
                @if (\Session::exists("cart"))
                    <div id="display-on-click">
                    <?php $prixTot=0; ?>
                        @foreach (\Session::get("cart") as $prod)
                            @if (!($prod[0]->name == ""))

                            <?php $prixTot = $prixTot + $prod[0]->price ?>
                            @endif


                            @endforeach



                        <li class =list-group-item>Prix total : &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$prixTot}}  </li>

                    @foreach (\Session::get("cart") as $prod)
                        <?php $count=0 ?>
                            @foreach (\Session::get("cart") as $testProd)
                            @if($prod[0]->id == $testProd[0]->id && !($prod[0]->name=="") && !($testProd[0]->name==""))
                                <?php $count++ ?>
                            @endif



                            @endforeach
                        @if (!($prod[0]->name == ""))

                            <?php $prixTot = $prixTot + $prod[0]->price ?>
                            <li>{{($prod[0]->name)}} :
@if (isset($prod["quantite"]))
    {{"LOL :" .$prod["quantite"]}}
    @endif
                                {{(($prod[0]->price))}}</li>

                    <br>
                    @endif
                    @endforeach
                    </div>
            </ul>
                @endif

            </div>


        <?php  $i=0 ?>

            <div class="col-md-8 top-right">

                <div class="row">
                    @foreach($produits as $produit)
                        @if ($i==4  )
                        <div class="row">
                            <br>
                            <br>
                            @endif
                        <div class="col-md-3">
                    <div class="row">

                    <div class="card mb-2 box-shadow">
                       <!-- <img class="card-img-top img-responsive img-fluid" src={{$produit->img}} alt="Card_image_cap" height=100 width=100> -->
                        <div class="card-body">
                            <p class="card-text">{{$produit->description}}</p>
                            <p class="card-price">{{$produit->price}}</p>


                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    {!! Form::open(['method' => 'GET', 'route' => ['updatePanier', $produit->id]]) !!}
                                    {!! Form::submit("Ajouter l'article au panier", ['class' => 'btn btn-danger btn-xs ', 'onclick' => 'return confirm(\'Vraiment supprimer cet article ?\')']) !!}
                                    {!! Form::close() !!}
                                    {!! Form::open(['method' => 'GET', 'route' => ['destroyPanier',$produit->id]]) !!}
                                    {!! Form::submit('Supprimer cet article', ['class' => 'btn btn-danger btn-xs ', 'onclick' => 'return confirm(\'Vraiment supprimer cet article ?\')']) !!}
                                    {!! Form::close() !!}




                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                        </div>

                    </div>
                @if($i==3) <!-- Pour mettre sur une deuxieme ligne -->
                    </div>
                    @endif

                </div>

                    <?php $i=$i+1 ?>


                    @endforeach

                </div>




        </div>


        </div>



</main>
</body>
<footer class="text-muted">
    <div class="col-md-offset-0>
    <div class="container">
        <p class="float-right">
            <br>
            <a href="#">Back to top</a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
    </div>
</div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<script src="../../assets/js/vendor/holder.min.js"></script>
</body>
</html>

@endsection
    <script>
        function myFunction() {

            document.getElementById('display-on-click').style.display = 'block';
        }

</script>