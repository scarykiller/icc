@extends('template')

@section('contenu')
    <br>
    <div class="col-sm-offset-3 col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading">Ajout d'un produit</div>
            <div class="panel-body">
                {!! Form::open(['route' => 'produit.store']) !!}
                <div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Titre']) !!}
                    {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                    {!! Form::textarea ('description', null, ['class' => 'form-control', 'placeholder' => 'Description']) !!}
                    {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                    {!! Form::text('price', null, array('class' => 'form-control', 'placeholder' => 'Entrez le prix')) !!}
                    {!! $errors->first('price', '<small class="help-block">:message</small>') !!}
                </div>
                <div class="form-group {{ $errors->has('img') ? 'has-error' : '' }}">
                    {!! Form::text('img', null, array('img' => 'form-control', 'placeholder' => "Entrez l'Url d'une image")) !!}
                    {!! $errors->first('img', '<small class="help-block">:message</small>') !!}

                </div>


                {!! Form::submit('Envoyer !', ['class' => 'btn btn-info pull-right']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <a href="javascript:history.back()" class="btn btn-primary">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
    </div>
@endsection