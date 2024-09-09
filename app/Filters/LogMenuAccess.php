<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\M_projek;

class LogMenuAccess implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $menuName = $request->uri->getSegment(2); // Mendapatkan nama menu dari URI
        $userId = session()->get('id_user');

        if ($userId && $menuName) {
            $menuLogModel = new M_projek();
            $menuLogModel->logMenuAccess($userId, $menuName);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada aksi setelah request selesai
    }
}
