<?php

namespace App\Http\Controllers;

use App\Models\Taj;
use App\Models\Guru;
use App\Models\Post;
use App\Models\User;
use App\Models\Mapel;
use App\Models\Sarana;
use App\Models\Student;
use App\Models\Category;
use App\Models\Sambutan;
use App\Models\Achievment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'admin')
            ->orWhere('role', 'user')
            ->count();
        $userId = Auth::user()->id;
        $postByUser = Post::where('user_id', $userId)->count();
        $posts = Post::count();
        $categoris = Category::count();
        // $mapel = Mapel::count();
        $guru = Guru::count();
        $sarana = Sarana::count();
        $achievment = Achievment::count();
        $newestTa = Taj::latest('id')->first();
        $newestTaId = $newestTa ? $newestTa->id : null;

        if ($newestTaId) {
            $students = Student::where('ta_id', $newestTaId)->count();
        } else {
            $students = 0; // atau nilai default lain yang sesuai
        }
        $students = Student::where('ta_id', $newestTaId)->count();

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'users' => $users,
            'postByUser' => $postByUser,
            'posts' => $posts,
            'category' => $categoris,
            'sarana' => $sarana,
            'guru' => $guru,
            'achievment' => $achievment,
            'student' => $students
        ]);
    }

    public function slider()
    {
        view()->share('title', 'Slide Heade Web');
        return view('dashboard.pengaturan.slide');
    }

}
