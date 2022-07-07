<?php

namespace App\Http\Controllers;

use Dentro\Yalr\Attributes\Get;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    #[Get('tasks/kategori/{kategori:nama_kategori}')]
    public function show(Kategori $kategori)
    {
        return view('kategori.index', [
            'title' => $kategori -> nama_kategori,
            'task'=> $kategori -> task
        ]);
    }
}
