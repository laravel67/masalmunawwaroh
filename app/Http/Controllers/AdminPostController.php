<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminPostController extends Controller
{
    public function __construct()
    {
        return view()->share('title', 'Kelola Postingan');
    }
    
    public function index()
    {

        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::latest()->get();
        $subTitle = 'Buat Postingan/Artikel';
        return view('dashboard.posts.create', compact('categories', 'subTitle'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts,slug',
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'nullable|image|max:1024|file',
        ]);
        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('thumbnail-post', 'public');
        }
        $storage = "/postimages";
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?);/', $src, $groups);
                if (isset($groups['mime'])) {
                    $mimeType = $groups['mime'];
                    $fileExtension = explode('/', $mimeType);
                    if (count($fileExtension) > 1) {
                        $fileNameContentRand = uniqid() . '_' . time();
                        $filePath = "$storage/$fileNameContentRand." . $fileExtension[1];
                        $image = Image::make($src)->resize(1200, 1200)->encode($mimeType, 100)->save(public_path($filePath));
                        $new_src = asset($filePath);
                        $img->removeAttribute('src');
                        $img->setAttribute('src', $new_src);
                        $img->setAttribute('class', 'img-responsive');
                    }
                }
            }
        }
        $validated['body'] = $dom->saveHTML();
        $validated['user_id'] = Auth::id();
        $validated['excerpt'] = Str::limit(strip_tags($request->body), 200);
        Post::create($validated);
        return redirect()->route('apost.index')->with('success', 'Postingan Berhasil ditambahkan!');
    }


    public function show(Post $post)
    {
        $subTitle = 'Detail Artikel';
        return view('dashboard.posts.show', compact('subTitle', 'post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::latest()->get();
        $subTitle = 'Update Postingan/Artikel';
        return view('dashboard.posts.edit', compact('post', 'subTitle', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required',
            'slug'=>'required|unique:posts,slug,'.$post->id,
            'category_id' => 'required|max:255',
            'body' => 'required',
            'image' => 'nullable|image|max:1024|file',
        ];
        $validated = $request->validate($rules);
       
        $oldBody = $post->body;
        $domOld = new \DOMDocument();
        libxml_use_internal_errors(true);
        $domOld->loadHTML($oldBody, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $oldImages = $domOld->getElementsByTagName('img');
        foreach ($oldImages as $oldImg) {
            $oldSrc = $oldImg->getAttribute('src');
            $oldImagePath = str_replace(asset('/'), '', $oldSrc);
            if (file_exists(public_path($oldImagePath))) {
                unlink(public_path($oldImagePath));
            }
        }

        if ($request->file('image')) {
            if ($post->image) {
                Storage::delete($post->image);
            }
            $validated['image'] = $request->file('image')->store('thumbnail-post', 'public');
        }

        $storage = "/postimages";
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->body, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        $images = $dom->getElementsByTagName('img');
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            if (preg_match('/data:image/', $src)) {
                preg_match('/data:image\/(?<mime>.*?);/', $src, $groups);
                if (isset($groups['mime'])) {
                    $mimeType = $groups['mime'];
                    $fileExtension = explode('/', $mimeType);
    
                    if (count($fileExtension) > 1) {
                        $fileNameContentRand = uniqid() . '_' . time();
                        $filePath = "$storage/$fileNameContentRand." . $fileExtension[1];
                        
                        $image = Image::make($src)->resize(1200, 1200)->encode($mimeType, 100)->save(public_path($filePath));
    
                        $new_src = asset($filePath);
                        $img->removeAttribute('src');
                        $img->setAttribute('src', $new_src);
                        $img->setAttribute('class', 'img-responsive');
                    }
                }
            }
        }

        $validated['body'] = $dom->saveHTML();
        $validated['user_id'] = Auth::id();
        $validated['excerpt'] = Str::limit(strip_tags($request->body), 200);
        $post->update($validated);
        return redirect(route('apost.index'))->with('success', 'Postingan Berhasil diubah!');
    }

    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    // public function paginate(Request $request)
    // {
    //     $posts = Post::orderBy('id', 'desc')->paginate(10);
    //     return view('dashboard.posts.pagination', compact('posts'))->render();
    // }

    // public function search(Request $request)
    // {
    //     $posts = Post::join('categories', 'posts.category_id', '=', 'categories.id')->where(function ($query) use ($request) {
    //         $query->where('posts.title', 'like', '%' . $request->search_string . '%')
    //             ->orWhere('categories.name', 'like', '%' . $request->search_string . '%');
    //     })
    //         ->orderBy('posts.id', 'desc')
    //         ->paginate(10);

    //     if ($posts->count() >= 1) {
    //         return view('dashboard.posts.pagination', compact('posts'))->render();
    //     } else {
    //         return response()->json([
    //             'status' => 'not_found'
    //         ]);
    //     }
    // }
}
