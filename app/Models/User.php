<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table            = 'usuarios'; // Nombre de la tabla
    protected $primaryKey       = 'id'; // Clave primaria
    protected $useAutoIncrement = true; 
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    // Campos permitidos para operaciones como insert() y update()
    protected $allowedFields    = [
        'nombre', 'apellido', 'telefono', 'email',
        'direccion', 'pais', 'contrasena', 'rol'
    ];

    // Opciones adicionales (puedes dejarlas como están o modificarlas según tu necesidad)
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    // Fechas
    protected $useTimestamps = false; // Cambia a true si quieres usar `created_at` y `updated_at`
    protected $dateFormat    = 'datetime';

    // Campos de fechas automáticas (si usas `$useTimestamps = true`)
    protected $createdField  = 'creado_en';
    protected $updatedField  = 'actualizado_en';

    // Validación (opcional)
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
