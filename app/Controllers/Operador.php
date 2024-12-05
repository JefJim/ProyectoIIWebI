<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Tree;
use App\Models\Species;
use App\Models\HistorialArboles;


class Operador extends BaseController
{
    public function dashboard()
    {
        $userModel = new \App\Models\User();
        $treeModel = new \App\Models\Tree();

        $data = [
            'totalAmigos' => $userModel->where('rol', 'amigo')->countAllResults(),
            'totalArbolesDisponibles' => $treeModel->where('estado', 'disponible')->countAllResults(),
        ];

        return view('operador/dashboard', $data);
    }

    public function listTrees()
    {
        $treeModel = new Tree();

        $data['trees'] = $treeModel->select('arboles.*, especies.nombre_comercial AS especie')
            ->join('especies', 'especies.id = arboles.especie_id', 'left')
            ->findAll();

        return view('admin/trees/list', $data);
    }

    public function updateTree($id)
    {
        $treeModel = new Tree();

        // Subir nueva foto si se proporciona
        $file = $this->request->getFile('foto');
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/trees', $fileName);
        } else {
            $fileName = $this->request->getPost('existing_foto');
        }

        $treeModel->update($id, [
            'especie_id' => $this->request->getPost('especie_id'),
            'ubicacion' => $this->request->getPost('ubicacion'),
            'estado' => $this->request->getPost('estado'),
            'precio' => $this->request->getPost('precio'),
            'foto' => $fileName,
        ]);

        return redirect()->to('/admin/arboles')->with('success', 'Árbol actualizado correctamente.');
    }


    public function saveHistorial($arbol_id)
    {
        // Verifica el valor de $arbol_id
        if (!$arbol_id) {
            return redirect()->back()->with('error', 'ID del árbol no válido.');
        }

        $historialModel = new \App\Models\HistorialArboles();

        if ($foto = $this->request->getFile('foto')) {
            if ($foto->isValid() && !$foto->hasMoved()) {
                $newName = $foto->getRandomName();
                $foto->move('uploads', $newName);

                $historialModel->insert([
                    'arbol_id' => $arbol_id, // Asegúrate de que este valor sea correcto
                    'fecha'    => date('Y-m-d H:i:s'),
                    'tamano'   => $this->request->getPost('tamano'),
                    'foto'     => $newName,
                ]);

                return redirect()->to("/admin/arboles/$arbol_id/historial")->with('success', 'Actualización registrada con éxito.');
            }
        }

        return redirect()->back()->with('error', 'Error al subir la foto.');
    }


    public function viewHistorial($arbol_id)
    {
        $historialModel = new \App\Models\HistorialArboles();

        // Obtener solo el historial relacionado con el árbol especificado
        $data['historial'] = $historialModel->where('arbol_id', $arbol_id)->findAll();

        // Pasar el ID del árbol a la vista para referencia
        $data['arbol_id'] = $arbol_id;

        return view('admin/trees/historial', $data);
    }


    public function updateHistorialForm($tree_id)
    {
        $treeModel = new \App\Models\Tree();

        // Obtener información del árbol
        $tree = $treeModel->find($tree_id);

        if (!$tree) {
            return redirect()->back()->with('error', 'El árbol no existe.');
        }

        // Pasar información del árbol a la vista
        return view('admin/trees/update_historial', ['arbol' => $tree]);
    }
}