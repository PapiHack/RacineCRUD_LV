@extends('layout')

@section('title')
    RacineCRUD - Ajout
@endsection

@section('content')
<br/>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="jumbotron">
                    <h1>Projet - RacineCRUD version Laravel by <a href="http://itdev.site" title="visit itdev's website" target="_blank"> &commat;the_it_dev</a></h1>
                    <p><a href="{{ route('user.list') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Retour à la l'accueil</a></p>   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h2>Ajout d'un user</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <form action="{{ route('user.store') }}" method="POST">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" class="form-control"/>
                        @if ($errors->has('nom'))
                            <p style="color: red;"> {{ $errors->first('nom') }} </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" name="prenom" id="prenom" class="form-control"/>
                        @if ($errors->has('prenom'))
                            <p style="color: red;"> {{ $errors->first('prenom') }} </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <input type="email" name="email" id="email" class="form-control"/>
                        @if ($errors->has('email'))
                            <p style="color: red;"> {{ $errors->first('email') }} </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tel">Telephone</label>
                        <input type="text" name="tel" id="tel" class="form-control"/>
                        @if ($errors->has('tel'))
                            <p style="color: red;"> {{ $errors->first('tel') }} </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-control"/>
                        @if ($errors->has('password'))
                            <p style="color: red;"> {{ $errors->first('password') }} </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirmer mot de passe</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Ajouter"/>
                        <a href="{{ route('user.list') }}" class="btn btn-danger">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection