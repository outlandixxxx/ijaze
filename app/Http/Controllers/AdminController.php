<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Media;
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


    public function storePost(Request $request)
{
    $validated = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'title'       => 'required|string|max:255',
        'slug'        => 'nullable|string|unique:posts,slug|max:255',
        'description' => 'required|string|max:500',
        'content'     => 'required|string',
        'media_type'  => 'required|in:image,video',
        'video_url'   => 'nullable|url',
        'media_file'  => 'nullable|file|mimes:jpg,jpeg,png,gif,webp,mp4|max:20480', // 20MB
    ]);

    // Auto slug if empty
    if (!$validated['slug']) {
        $validated['slug'] = Str::slug($validated['title']);
    }

    // Create the post
    $post = Post::create([
        'category_id' => $validated['category_id'],
        'title'       => $validated['title'],
        'slug'        => $validated['slug'],
        'description' => $validated['description'],
        'content'     => $validated['content'],
    ]);

    // Handle media
    if ($validated['media_type'] === 'image' && $request->hasFile('media_file')) {
        $path = $request->file('media_file')->store('uploads/posts', 'public');

        Media::create([
            'post_id'   => $post->id,
            'type'      => 'image',
            'file_path' => $path,
        ]);
    }

    if ($validated['media_type'] === 'video' && $validated['video_url']) {
        Media::create([
            'post_id'   => $post->id,
            'type'      => 'video',
            'file_path' => $validated['video_url'], // store YouTube link instead of file
            'thumbnail' => null, // you can later fetch from YouTube API
        ]);
    }

    return redirect()
        ->route('createpost')
        ->with('success', 'Post created successfully!');
}

    public function updatepost() {

    }

    public function deletepost() {

    }

    public function test() {
return view ('test');
    }

}
