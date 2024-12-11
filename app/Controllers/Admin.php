<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Tree;
use App\Models\Species;
use App\Models\HistorialArboles;


class Admin extends BaseController
{
    public function dashboard() //mostrar dash en la vista de admin
    {
        $userModel = new \App\Models\User();
        $treeModel = new \App\Models\Tree();

        $data = [
            'totalAmigos' => $userModel->where('rol', 'amigo')->countAllResults(),
            'totalArbolesDisponibles' => $treeModel->where('estado', 'disponible')->countAllResults(),
            'totalArbolesVendidos' => $treeModel->where('estado', 'vendido')->countAllResults(),
        ];

        return view('admin/dashboard', $data);
    }


    public function listSpecies() //mostrar lista de especies en la vista de admin
    {
        $speciesModel = new Species();
        $data['species'] = $speciesModel->findAll();

        return view('admin/species/list', $data);
    }

    public function createSpecies() //crear especie en la vista de admin
    
    {
        return view('admin/species/create');
    }

    public function storeSpecies() //guardar especie en la vista de admin
    {
        $speciesModel = new Species();

        $speciesModel->insert([
            'nombre_comercial' => $this->request->getPost('nombre_comercial'),
            'nombre_cientifico' => $this->request->getPost('nombre_cientifico'),
        ]);

        return redirect()->to('/admin/especies')->with('success', 'Especie creada correctamente.');
    }

    public function editSpecies($id) //editar especie en la vista de admin
    {
        $speciesModel = new Species();
        $data['species'] = $speciesModel->find($id);

        return view('admin/species/edit', $data);
    }

    public function updateSpecies($id) //actualizar especie en la vista de admin
    {
        $speciesModel = new Species();

        $speciesModel->update($id, [
            'nombre_comercial' => $this->request->getPost('nombre_comercial'),
            'nombre_cientifico' => $this->request->getPost('nombre_cientifico'),
        ]);

        return redirect()->to('/admin/especies')->with('success', 'Especie actualizada correctamente.');
    }

    public function deleteSpecies($id) //eliminar especie en la vista de admin
    {
        $speciesModel = new Species();
        $speciesModel->delete($id);

        return redirect()->to('/admin/especies')->with('success', 'Especie eliminada correctamente.');
    }

    public function listTrees() //mostrar lista de arboles en la vista de admin
    {
        $treeModel = new Tree();

        $data['trees'] = $treeModel->select('arboles.*, especies.nombre_comercial AS especie')
            ->join('especies', 'especies.id = arboles.especie_id', 'left')
            ->findAll();

        return view('admin/trees/list', $data);
    }


    public function createTree() //crear arbol en la vista de admin
    {
        $speciesModel = new Species();
        $data['species'] = $speciesModel->findAll();

        return view('admin/trees/create', $data);
    }

    public function storeTree() //guardar arbol en la vista de admin
    {
        $treeModel = new Tree();

        // Subir la foto del árbol
        $file = $this->request->getFile('foto');
        if ($file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move('uploads/trees', $fileName);
        } else {
            $fileName = null;
        }

        $treeModel->insert([
            'especie_id' => $this->request->getPost('especie_id'),
            'ubicacion' => $this->request->getPost('ubicacion'),
            'estado' => $this->request->getPost('estado'),
            'precio' => $this->request->getPost('precio'),
            'foto' => $fileName,
        ]);

        return redirect()->to('/admin/arboles')->with('success', 'Árbol creado correctamente.');
    }

    public function editTree($id) //editar arbol en la vista de admin
    {
        $treeModel = new Tree();
        $speciesModel = new Species();

        $data['tree'] = $treeModel->find($id);
        $data['species'] = $speciesModel->findAll();

        return view('admin/trees/edit', $data);
    }

    public function updateTree($id) //actualizar arbol en la vista de admin
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

    public function deleteTree($id) //eliminar arbol en la vista de admin
    {
        $treeModel = new Tree();
        $tree = $treeModel->find($id);

        // Eliminar la foto si existe
        if ($tree && $tree['foto'] && file_exists('uploads/trees/' . $tree['foto'])) {
            unlink('uploads/trees/' . $tree['foto']);
        }

        $treeModel->delete($id);

        return redirect()->to('/admin/arboles')->with('success', 'Árbol eliminado correctamente.');
    }

    public function createUser() //crear usuario en la vista de admin
    {
        return view('admin/users/create'); 
    }

    public function listUsers()     //mostrar lista de usuarios en la vista de admin
    {
        $userModel = new User();

        // Obtener solo usuarios con rol 'admin' o 'operador'
        $data['users'] = $userModel->whereIn('rol', ['admin', 'operador'])->findAll();

        return view('admin/users/list', $data);
    }

    public function storeUser() //guardar usuario en la vista de admin
    {
        $userModel = new User();

        // Validar que el email no exista
        $email = $this->request->getPost('email');
        $existingUser = $userModel->where('email', $email)->first();

        if ($existingUser) {
            return redirect()->back()->with('error', 'El email ya está registrado. Por favor, utiliza otro.');
        }

        // Validar longitud de la contraseña
        $password = $this->request->getPost('contrasena');
        if (strlen($password) < 8) {
            return redirect()->back()->with('error', 'La contraseña debe tener al menos 8 caracteres.');
        }

        // Cifrar la contraseña
        $password = md5($password);

        $userModel->insert([
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'telefono' => $this->request->getPost('telefono'),
            'email' => $email,
            'direccion' => $this->request->getPost('direccion'),
            'pais' => $this->request->getPost('pais'),
            'contrasena' => $password,
            'rol' => $this->request->getPost('rol'),
        ]);

        return redirect()->to('/admin/usuarios')->with('success', 'Usuario creado correctamente.');
    }

    public function editUser($id) //editar usuario en la vista de admin
    {
        $userModel = new User();

        // Buscar al usuario por su ID
        $data['user'] = $userModel->find($id);

        if (!$data['user']) {
            return redirect()->to('/admin/usuarios')->with('error', 'Usuario no encontrado.');
        }

        return view('admin/users/edit', $data);
    }


    public function updateUser($id) //actualizar usuario en la vista de admin
    {
        $userModel = new User();

        // Validar que el email no esté duplicado (excepto para el usuario actual)
        $email = $this->request->getPost('email');
        $existingUser = $userModel->where('email', $email)->where('id !=', $id)->first();

        if ($existingUser) {
            return redirect()->back()->with('error', 'El email ya está registrado. Por favor, utiliza otro.');
        }

        // Validar longitud de la contraseña si se actualiza
        $password = $this->request->getPost('contrasena');
        if ($password && strlen($password) < 8) {
            return redirect()->back()->with('error', 'La contraseña debe tener al menos 8 caracteres.');
        }

        // Si no se actualiza la contraseña, mantener la existente
        if ($password) {
            $password = md5($password);
        } else {
            $password = $this->request->getPost('existing_password');
        }

        $userModel->update($id, [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'telefono' => $this->request->getPost('telefono'),
            'email' => $email,
            'direccion' => $this->request->getPost('direccion'),
            'pais' => $this->request->getPost('pais'),
            'contrasena' => $password,
            'rol' => $this->request->getPost('rol'),
        ]);

        return redirect()->to('/admin/usuarios')->with('success', 'Usuario actualizado correctamente.');
    }
 
    public function deleteUser($id) //eliminar usuario en la vista de admin
    {
        $userModel = new User();

        // Buscar al usuario por su ID
        $user = $userModel->find($id);

        if (!$user) {
            return redirect()->to('/admin/usuarios')->with('error', 'Usuario no encontrado.');
        }

        // Eliminar al usuario
        $userModel->delete($id);

        return redirect()->to('/admin/usuarios')->with('success', 'Usuario eliminado correctamente.');
    }

    public function listAmigos() //mostrar lista de amigos en la vista de admin
    {
        $userModel = new \App\Models\User();

        // Obtener todos los usuarios con rol 'amigo'
        $data['amigos'] = $userModel->where('rol', 'amigo')->findAll();

        return view('admin/amigos/list', $data);
    }

    public function viewArbolesAmigo($amigo_id) //mostrar arboles de amigo en la vista de admin
    {
        $treeModel = new \App\Models\Tree();

        // Obtener todos los árboles relacionados con el amigo junto con el nombre de la especie
        $data['arboles'] = $treeModel->select('arboles.*, especies.nombre_comercial AS especie')
            ->join('especies', 'especies.id = arboles.especie_id', 'left')
            ->where('arboles.amigo_id', $amigo_id)
            ->findAll();

        $data['amigo_id'] = $amigo_id;

        return view('admin/amigos/arboles', $data);
    }

    public function saveHistorial($arbol_id) //guardar historial en la vista de admin
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


    public function viewHistorial($arbol_id) //mostrar historial en la vista de admin
    {
        $historialModel = new \App\Models\HistorialArboles();

        // Obtener solo el historial relacionado con el árbol especificado
        $data['historial'] = $historialModel->where('arbol_id', $arbol_id)->findAll();

        // Pasar el ID del árbol a la vista para referencia
        $data['arbol_id'] = $arbol_id;

        return view('admin/trees/historial', $data);
    }


    public function updateHistorialForm($tree_id) //actualizar historial en la vista de admin
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
