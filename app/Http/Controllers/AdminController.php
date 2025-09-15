<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

//category functions


    public function showcategory() {
        return view('admin.category.show');
    }

    public function createcategory() {

        $categories = Category::all();
        return view('admin.category.create', compact('categories'));
    }

    public function editcategory() {
        return view('admin.category.create');
    }

    public function storecategory(Request $request) {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:categories,slug|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        // Auto-generate slug if empty
        if (!$validated['slug']) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        Category::create($validated);

        return redirect()->route('createcategory')->with('success', 'Category created successfully!');
    }

    public function updatecategory() {

    }

    public function deletecategory() {

    }

//post

    public function showpost() {
        return view('admin.post.show');
    }



    public function createpost() {

        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }




    public function editpost() {
        return view('admin.post.create');
    }


    public function storepost(Request $request) {

        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug',
            'description' => 'required|string|max:500',
            'content' => 'required|string',
            'media_type' => 'required|in:image,video',
            'media_file' => 'required_if:media_type,image|file|mimes:jpg,jpeg,png,gif|max:2048',
            'video_url' => 'required_if:media_type,video|url',
        ]);

        if (!$validated['slug']) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        // Create post
        $post = Post::create([
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'description' => $validated['description'],
            'content' => $validated['content'],
        ]);

        // Handle media
        if ($validated['media_type'] === 'image' && $request->hasFile('media_file')) {
            $path = $request->file('media_file')->store('posts', 'public');
            Media::create([
                'post_id' => $post->id,
                'type' => 'image',
                'file_path' => $path,
            ]);
        } elseif ($validated['media_type'] === 'video') {
            // Extract YouTube ID from URL
            preg_match("/(?:youtu\.be\/|youtube\.com\/watch\?v=)([^\&\?\/]+)/", $validated['video_url'], $matches);
            $video_id = $matches[1] ?? null;

            Media::create([
                'post_id' => $post->id,
                'type' => 'video',
                'file_path' => $video_id,
                'thumbnail' => "https://img.youtube.com/vi/{$video_id}/hqdefault.jpg",
            ]);
        }

        return redirect()->route('createpost')->with('success', 'Post created successfully!');

    }

    public function updatepost() {

    }

    public function deletepost() {

    }
}
