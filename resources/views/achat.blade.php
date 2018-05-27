@extends('template')
@section('titre')
Les articles
@endsection
@section('header')
    @if(Auth::check())
        <div class="btn-group pull-right">

            {!! link_to('logout', 'Deconnexion', ['class' => 'btn btn-warning']) !!}
        </div>
    @else
        {!! link_to('login', 'Se connecter', ['class' => 'btn btn-info pull-right']) !!}
    @endif
@endsection

@section('contenu')

<body>

<header>

    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <a class="btn btn-link" href="{{ route('categorie',"info") }}">

                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                <strong>Album</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>


<main role="main">
    {!! $links !!}


        <div class="container">
            <?php  $i=0 ?>

            <div class="col-md-8">

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
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
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
        <div class="col-md-4">
            <li>
                <ul>prout</ul>
                <ul>prout</ul>
            </li>

        </div>


        </div>



</main>

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