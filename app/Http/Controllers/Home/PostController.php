<?php

namespace App\Http\Controllers\Home;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Jorenvh\Share\Share;
use App\Http\Controllers\Controller;
use App\Models\Acara;
use App\Models\Agenda;

class PostController extends Controller
{
    public function __construct()
    {
        return view()->share('title', 'Berita');
    }
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = 'kategori : ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' Oleh : ' . $author->name;
        }
        $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString();
        $categories = Category::latest()->get();
        $jadwal = Agenda::where('status', false)->orderBy('id', 'desc')->get();
        return view('home.posts.posts', [
            'posts' => $posts,
            'subtitle' => $title,
            'categories' => $categories,
            'jadwals' => $jadwal
        ]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('home.posts.post', compact('post'));
    }
}
