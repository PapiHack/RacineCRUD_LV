<?php

namespace RacineCRUD\GestionUtilisateur;

use RacineCRUD\Utilisateur;
use RacineCRUD\GestionUtilisateur\UtilisateurRepositoryInterface;

/**
 * @author PapiHack
 * 
 * Classe permettant de gérer un utilisateur (Pattern Repository)
 */
class UtilisateurRepository implements UtilisateurRepositoryInterface
{

    private $user;

    public function __construct(Utilisateur $user)
    {
        $this->user = $user;
    }

    public function getPaginate($n)
    {
        return $this->user->paginate($n);
    }

    public function getById($id)
    {
        return $this->user->findOrFail($id);
    }

    private function save(Utilisateur $user, array $inputs)
    {
        $user->nom = $inputs['nom'];
        $user->prenom = $inputs['prenom'];
        $user->email = $inputs['email'];
        $user->tel = $inputs['tel'];
        $user->password = bcrypt($inputs['password']);
        $user->save();
    }

    public function store(array $inputs)
    {
        $user = new $this->user;

        $this->save($user, $inputs);

        return $user;
    }

    public function update($id, array $inputs)
    {
        $this->save($this->getById($id), $inputs);
    }

    public function destroy($id)
    {
        return $this->getById($id)->delete();
    }
    
}