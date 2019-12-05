<?php declare(strict_types=1);

namespace App\Http\Controllers;

final class HomeController
{
    public function index()
    {
        $name = "Marcin";

        require base_path() . 'resources/views/home.view.php';
    }

    public function store()
    {
        echo json_encode([
            'status' => 'success',
        ]);
    }
}
