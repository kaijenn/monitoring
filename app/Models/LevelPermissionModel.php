<?php

namespace App\Models;

use CodeIgniter\Model;

class LevelPermissionModel extends Model
{
    protected $table = 'permissions'; // Ganti dengan nama tabel yang sesuai
    protected $primaryKey = 'id_permission';

    protected $allowedFields = ['status', 'menu_name', 'can_access'];

    public function getPermissionsByLevel($level)
    {
        return $this->where('status', $level)->findAll();
    }

    public function updatePermissionsByLevel($level, $permissions)
    {
        // Hapus hak akses lama untuk level ini
        $this->where('status', $level)->delete();

        // Simpan hak akses baru
        if ($permissions) {
            foreach ($permissions as $permission) {
                $data = [
                    'status' => $level,
                    'menu_name' => $permission,
                    'can_access' => 1,
                ];
                $this->insert($data);
            }
        }
    }
}
