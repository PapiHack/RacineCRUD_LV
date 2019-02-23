<?php

namespace RacineCRUD\GestionUtilisateur;

interface UtilisateurRepositoryInterface
{
    public function store(array $inputs);
    public function update($id, array $inputs);
    public function destroy($id);
    public function getById($id);
    public function getPaginate($n);
}