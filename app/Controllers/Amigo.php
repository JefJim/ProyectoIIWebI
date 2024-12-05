<?php

namespace App\Controllers;

use App\Models\Tree;
use App\Models\HistorialArboles;

class Amigo extends BaseController
{
    public function dashboard()
    {
        return view('amigo/dashboard');
    }

    public function listAvailableTrees()
    {
        $treeModel = new Tree();

        // Obtener árboles disponibles
        $data['arboles'] = $treeModel->where('estado', 'disponible')->findAll();

        return view('amigo/trees/list_available', $data);
    }

    public function buyTree($tree_id)
    {
        $treeModel = new Tree();
        $data['arbol'] = $treeModel->find($tree_id);

        return view('amigo/trees/buy', $data);
    }

    public function storePurchase($tree_id)
    {
        $treeModel = new Tree();
        $session = session();

        // Actualizar el árbol como vendido y asociarlo al amigo
        $treeModel->update($tree_id, [
            'estado'    => 'vendido',
            'amigo_id'  => $session->get('user')['id'],
        ]);

        return redirect()->to('/amigo/mis-arboles')->with('success', '¡Has comprado el árbol con éxito!');
    }

    public function listMyTrees()
    {
        $treeModel = new \App\Models\Tree();
        $speciesModel = new \App\Models\Species();

        $userId = session()->get('user')['id'];

        // Obtener los árboles con el nombre de la especie
        $arboles = $treeModel->where('amigo_id', $userId)
            ->select('arboles.*, especies.nombre_comercial AS especie_nombre')
            ->join('especies', 'arboles.especie_id = especies.id')
            ->findAll();

        return view('amigo/trees/my_trees', ['arboles' => $arboles]);
    }


    public function viewTree($tree_id)
    {
        $treeModel = new \App\Models\Tree();

        // Verificar que el árbol exista y que pertenezca al usuario actual
        $tree = $treeModel->where('id', $tree_id)->where('amigo_id', session('user')['id'])->first();

        if (!$tree) {
            return redirect()->back()->with('error', 'El árbol no existe o no te pertenece.');
        }

        // Renderizar la vista con los detalles del árbol
        return view('amigo/trees/view_tree', ['arbol' => $tree]);
    }

    public function viewHistorial($id)
    {
        $historialModel = new \App\Models\HistorialArboles();
        $treeModel = new \App\Models\Tree();
    
        // Verificar si el árbol pertenece al amigo actual
        $amigoId = session()->get('user')['id'];
        $arbol = $treeModel->where('id', $id)->where('amigo_id', $amigoId)->first();
    
        if (!$arbol) {
            return redirect()->to('/amigo/mis-arboles')->with('error', 'No tienes permiso para ver este árbol.');
        }
    
        // Obtener el historial del árbol
        $data['historial'] = $historialModel->where('arbol_id', $id)->findAll();
        $data['arbol'] = $arbol;
    
        // Cargar la vista
        return view('amigo/trees/historial', $data);
    }
    
}
