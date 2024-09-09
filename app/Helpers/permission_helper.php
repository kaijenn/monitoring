<?php
// app/Helpers/permission_helper.php
function has_permission($menu_name)
{
    $db = \Config\Database::connect();
    $level = session()->get('status');
    $query = $db->table('permissions')
        ->where('status', $level)
        ->where('menu_name', $menu_name)
        ->get();
    return $query->getRow() && $query->getRow()->can_access;
}
