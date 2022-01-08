<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Noauth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('isLoggedIn')) {

			if (session()->get('role') == "user") {
				return redirect()->to(base_url('user'));
			}

            if (session()->get('role') == "superadmin") {
				return redirect()->to(base_url('superadmin'));
			}

            if (session()->get('role') == "analis_sk") {
				return redirect()->to(base_url('analis/sk'));
			}

            if (session()->get('role') == "analis_nk") {
				return redirect()->to(base_url('analis/nk'));
			}
        }

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
