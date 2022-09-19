<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $userModel = new \App\Models\UsersModel();
        
        $session = \Config\Services::session();
        $mresponse = \Config\Services::response();

        $logged = $session->get('logged');
        if ($logged == true || $logged == 'true') {
            $token = $session->get("token");

            $valid_token = $userModel->getuser_by_token($token);
            if (!$valid_token) {
                $session->setFlashdata('error', 'Sesi telah berakhir, mohon login ulang');
                return redirect()->to('auth');
            } else {
                return true;
            }
        } else {
            return $mresponse->setStatusCode(403)->setBody(
                view('errors/403')
            );
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
