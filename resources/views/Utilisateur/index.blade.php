@extends('layout')

@section('title')
    RacineCRUD - index
@endsection

@section('content')
<br/>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="jumbotron">
                    <h1>Projet - RacineCRUD version Laravel by <a href="http://itdev.site" title="visit itdev's website" target="_blank"> &commat;the_it_dev</a></h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h2 style="text-decoration: underline;">Liste des users</h2>

                <p> <a href="{{ route('user.create') }}" class="btn btn-success"><i class="fa fa-user-plus"></i>Ajouter un user</a> </p>

                @if (Session::has('ajout'))
                    <div class="alert alert-success alert-dismissable col-lg-6">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>{{ Session::get('ajout') }}</h4>
                    </div>
                @endif

                @if (Session::has('modif'))
                    <div class="alert alert-warning alert-dismissable col-lg-6">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>{{ Session::get('modif') }}</h4>
                    </div>
                @endif

                @if (Session::has('sup'))
                    <div class="alert alert-danger alert-dismissable col-lg-6">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>{{ Session::get('sup') }}</h4>
                    </div>
                @endif

                @if (count($users))
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Operations</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td> {{ $user->prenom }} {{ $user->nom }} </td>
                                <td> {{ $user->email }} </td>
                                <td> {{ $user->tel }} </td>
                                <td><a href="{{ route('user.edit', ['id'=>$user->id]) }}" class="btn btn-warning" title="Editer"><i class="fa fa-edit"></i></a> <a href="{{ route('user.delete', ['id'=>$user->id]) }}" class="btn btn-danger" name="sup" title="Supprimer"><i class="fa fa-trash"></i></a> </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <h4>Pas encore de user. Veuillez en ajouter.</h4>
                @endif
            </div>
        </div>
        {{ $links }}
    </div>

    <script>
        var sup = document.getElementsByName('sup');
        for(var i = 0; i < sup.length; i++)
        {
            sup[i].onclick = function(e){
                if(!confirm("Voulez-vous vraiment supprimer cet utilisateur ?"))
                {
                    e.preventDefault();
                }
            }
        }

        $('.close').click(function(){
            $('.alert').hide("slow");
        })
    </script>
@endsection
    
