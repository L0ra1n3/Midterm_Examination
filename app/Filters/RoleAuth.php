<?php namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        $role = $session->get('role');
        $isLoggedIn = $session->get('logged_in') ?? $session->get('isLoggedIn');

        if (!$isLoggedIn) {
            return redirect()->to('/login');
        }

        $path = trim($request->getUri()->getPath(), '/');

        // Always allow announcements
        if ($path === 'announcements') {
            return;
        }

        // Admin can access /admin/*
        if ($role === 'admin') {
            if (strpos($path, 'admin') === 0) {
                return;
            }
        }

        // Teacher can access /teacher/*
        if ($role === 'teacher') {
            if (strpos($path, 'teacher') === 0) {
                return;
            }
        }

        // Student can access /student/* and /announcements (already allowed above)
        if ($role === 'student') {
            if (strpos($path, 'student') === 0) {
                return;
            }
        }

        // If none of the allowed paths matched, deny and redirect
        $session->setFlashdata('error', 'Access Denied: Insufficient Permissions');
        return redirect()->to('/announcements');
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}


