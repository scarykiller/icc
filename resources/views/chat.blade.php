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
    <div class="row pull-right">

        {!! link_to('logout', 'Deconnexion', ['class' => 'btn btn-warning']) !!}
    </div>




@endsection

@section('contenu')


    <body>
    <main role="main">
        <div class="container">


                <div class="row">


                                <div class="col-sm-8 pull-left" >
                                    @foreach($commentaires as $commentaire)

                                    <div class="card-text">{{$commentaire->users->name}} a dit :</div>
                                    <div class="card-text"> {{$commentaire->message}} </div>
                                        <div class="card-text">{{$commentaire->timestamp}} </div>

                                    <br>

                    @endforeach
                                </div>


                                    <div class="col-sm-4 pull-right top-right" >
                                        <div class="panel panel-info top">
                                            <div class="panel-heading">Ajout d'un message</div>
                                                <div class="panel-body">
                                            {!! Form::open(['route' => 'commentaire.store']) !!}
                                                    <div class="form-group" >
                                                {!! Form::text('message', null, ['class' => 'form-control', 'placeholder' => 'message']) !!}
                                                    </div>
                                            {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
                                            {!! Form::close() !!}
                                                    </div>
                                                </div>
                                    </div>




                </div>
                                </div>
            </div>


    </main>
    </body>
    <footer class="text-muted">
        <div class="col-md-offset-0">

            <p class="float-right">
                <br>
                <a href="#">Back to top</a>
            </p>
            <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
        </div><
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