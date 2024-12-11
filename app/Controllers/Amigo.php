<?php

namespace App\Controllers;

use App\Models\Tree;
use App\Models\HistorialArboles;

class Amigo extends BaseController
{
    public function dashboard() // Método para mostrar el dashboard del amigo
    {
        return view('amigo/dashboard');
    }

    public function listAvailableTrees() // metodo para mostrar arboles disponibles en amigo
    {
        $treeModel = new \App\Models\Tree();

        // Obtener árboles disponibles junto con el nombre comercial de la especie
        $data['arboles'] = $treeModel->select('arboles.*, especies.nombre_comercial AS especie')
            ->join('especies', 'especies.id = arboles.especie_id', 'left')
            ->where('arboles.estado', 'disponible')
            ->findAll();

        return view('amigo/trees/list_available', $data);
    }


    public function buyTree($tree_id) // Método para comprar un árbol
    {
        $treeModel = new \App\Models\Tree();

        // Obtener el árbol junto con el nombre de la especie
        $data['arbol'] = $treeModel->select('arboles.*, especies.nombre_comercial AS especie_nombre')
            ->join('especies', 'arboles.especie_id = especies.id')
            ->where('arboles.id', $tree_id)
            ->first();

        // Validar si el árbol existe
        if (!$data['arbol']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('El árbol no existe.');
        }

        return view('amigo/trees/buy', $data);
    }


    public function storePurchase($tree_id) // Método para guardar la compra de un árbol
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

    public function listMyTrees() // Método para mostrar los árboles del amigo
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


    public function viewTree($tree_id) // Método para ver un árbol en detalle
    {
        $treeModel = new \App\Models\Tree();

        // Obtener el árbol con el nombre de la especie y verificar que pertenezca al usuario actual
        $tree = $treeModel->select('arboles.*, especies.nombre_comercial AS especie_nombre')
            ->join('especies', 'arboles.especie_id = especies.id')
            ->where('arboles.id', $tree_id)
            ->where('arboles.amigo_id', session('user')['id'])
            ->first();

        if (!$tree) {
            return redirect()->back()->with('error', 'El árbol no existe o no te pertenece.');
        }

        // Renderizar la vista con los detalles del árbol
        return view('amigo/trees/view_tree', ['arbol' => $tree]);
    }


    public function viewHistorial($id) // Método para ver el historial de un árbol
    {
        $historialModel = new \App\Models\HistorialArboles();
        $treeModel = new \App\Models\Tree();

        // Verificar si el árbol pertenece al amigo actual e incluir el nombre de la especie
        $amigoId = session()->get('user')['id'];
        $arbol = $treeModel->select('arboles.*, especies.nombre_comercial AS especie_nombre')
            ->join('especies', 'arboles.especie_id = especies.id')
            ->where('arboles.id', $id)
            ->where('arboles.amigo_id', $amigoId)
            ->first();

        if (!$arbol) {
            return redirect()->to('/amigo/mis-arboles')->with('error', 'No tienes permiso para ver este árbol.');
        }

        // Obtener solo los campos necesarios del historial
        $data['historial'] = $historialModel->select('fecha, tamano, foto')
            ->where('arbol_id', $id)
            ->findAll();

        $data['arbol'] = $arbol;

        // Cargar la vista
        return view('amigo/trees/historial', $data);
    }
}
