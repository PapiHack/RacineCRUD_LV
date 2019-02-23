<?php

namespace RacineCRUD\Http\Controllers;

use Illuminate\Http\Request;
use RacineCRUD\Http\Controllers\Controller;
use RacineCRUD\Http\Requests\UtilisateurCreateRequest;
use RacineCRUD\Http\Requests\UtilisateurUpdateRequest;
use RacineCRUD\GestionUtilisateur\UtilisateurRepositoryInterface;

class UtilisateurController extends Controller
{
    private $userPerPage = 3;

    public function index(UtilisateurRepositoryInterface $user)
    {
        $users = $user->getPaginate($this->userPerPage);
        $links = $users->render();
        return view('Utilisateur/index', compact('users', 'links'));
    }

    public function create()
    {
        return view('Utilisateur/create');
    }

    public function store(UtilisateurCreateRequest $request,
                          UtilisateurRepositoryInterface $user)
    {
        $utilisateur = $user->store($request->all());
        return redirect()->route('user.list')->with('ajout', 'Utilisateur bien ajouté !');
    }

    public function edit($id, UtilisateurRepositoryInterface $user)
    {
        $utilisateur = $user->getById($id);
        return view('Utilisateur/edit', compact('utilisateur'));
    }

    public function update($id, UtilisateurUpdateRequest $request,
                           UtilisateurRepositoryInterface $user)
    {
        $utilisateur = $user->update($id, $request->all());
        return redirect()->route('user.list')->with('modif', 'Utilisateur mis à jour !');
    }

    public function delete($id, UtilisateurRepositoryInterface $user)
    {
        $utilisateur = $user->destroy($id);
        return redirect()->route('user.list')->with('sup', 'Utilisateur supprimé !');
    }
}
