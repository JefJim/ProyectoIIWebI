<?php

namespace App\Models;

use CodeIgniter\Model;

class HistorialArboles extends Model
{
    protected $table            = 'historial_arboles'; // Nombre de la tabla
    protected $primaryKey       = 'id'; // Llave primaria
    protected $useAutoIncrement = true; // Auto incremento
    protected $returnType       = 'array'; // Tipo de retorno: array
    protected $useSoftDeletes   = false; // Sin eliminaciones suaves
    protected $protectFields    = true; // Protege los campos

    // Campos permitidos para operaciones de inserción/actualización
    protected $allowedFields = ['arbol_id', 'fecha', 'tamano', 'foto'];
    

    // Configuración de fechas
    protected $useTimestamps = false; 
    protected $createdField  = 'created_at'; // Campo de creación
    protected $updatedField  = 'updated_at'; // Campo de actualización
    protected $dateFormat    = 'datetime'; // Formato de fecha

    // Reglas de validación (si es necesario)
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false; // No omitir validación

    // Callbacks (opcional)
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
