<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\SubCategory;
use App\Models\Post;
use App\Models\Media;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\purifier;


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

        return view('admin.category.create');
    }

    public function editcategory() {
        return view('admin.category.create');
    }

    public function storecategory(Request $request) {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:categories,slug|max:255',
         
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



//subcategory functions

    public function showsubcategory() {
        return view('admin.subcategory.show');
    }

    public function createsubcategory() {

        return view('admin.subcategory.create');
    }

    public function editsubcategory() {
        return view('admin.subcategory.create');
    }

    public function storesubcategory(Request $request) {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:categories,slug|max:255',
         
        ]);

        // Auto-generate slug if empty
        if (!$validated['slug']) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        SubCategory::create($validated);

        return redirect()->route('createsubcategory')->with('success', 'subCategory created successfully!');

    }

    public function updatesubcategory() {

    }

    public function deletesubcategory() {

    }


//post

    public function showpost() {
        return view('admin.post.show');
    }



    public function createpost() {

        $categories = Category::all();
        $subcategories = SubCategory::all();
        $tags = Tag::all();

    return view('admin.post.create', compact('categories', 'subcategories', 'tags'));

    }




    public function editpost() {
        return view('admin.post.create');
    }



    /* public function storePost(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:posts,slug',
            'description' => 'nullable|string|max:500',
            'content' => 'required|string',
            'categories' => 'required|array',
            'categories.*.id' => 'required|exists:categories,id',
            'categories.*.subcategories' => 'array',
            'categories.*.subcategories.*' => 'exists:sub_categories,id',
            'media.*.type' => 'required|in:image,videotube,aivideo',
            'media.*.path' => 'required',
            'media.*.thumbnail' => 'nullable|image',
            'tags' => 'nullable|string',
        ]);

        \DB::transaction(function() use ($validated, $request) {

            // Create post
            $post = Post::create([
                'title' => $validated['title'],
                'slug' => $validated['slug'],
                'description' => $validated['description'] ?? null,
                'content' => $validated['content'],
                'author_id' => auth()->id(),
                'published_at' => now(),
            ]);

            // Attach categories + subcategories
            $pivotData = [];
            foreach ($validated['categories'] as $cat) {
                $categoryId = $cat['id'];
                $subcategories = $cat['subcategories'] ?? [];

                foreach ($subcategories as $subId) {
                    $pivotData[$subId] = ['category_id' => $categoryId];
                }

                if (empty($subcategories)) {
                    $pivotData[0] = ['category_id' => $categoryId]; // optional, handle null subcategory
                }
            }

            if (!empty($pivotData)) {
                $post->placements()->attach($pivotData);
            }

            // Handle media
            if ($request->has('media')) {
                foreach ($request->media as $index => $media) {
                    $data = [
                        'type' => $media['type'],
                        'caption' => $media['caption'] ?? null,
                        'order' => $index,
                    ];

                    if ($media['type'] === 'image' && isset($media['path'])) {
                        $data['path'] = $media['path']->store('media', 'public');
                    } else {
                        $data['path'] = $media['path']; // YouTube URL or AI video
                        if (!empty($media['thumbnail']) && $media['thumbnail'] instanceof \Illuminate\Http\UploadedFile) {
                            $data['thumbnail'] = $media['thumbnail']->store('thumbnails', 'public');
                        }
                    }

                    $post->media()->create($data);
                }
            }

            // Handle tags
            if ($request->filled('tags')) {
                $tags = collect(explode(',', $request->tags))
                    ->map(fn($t) => trim($t))
                    ->filter()
                    ->map(fn($tagName) => Tag::firstOrCreate(['name' => $tagName])->id);

                $post->tags()->sync($tags);
            }
        });

        return redirect()
            ->route('createpost')
            ->with('success', 'Post created successfully!');
    } */



            public function storePost(Request $request)
{
    // Validate input
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'slug' => 'required|string|unique:posts,slug',
        'description' => 'nullable|string|max:500',
        'content' => 'required|string', // TinyMCE HTML
        'categories' => 'required|array',
        'categories.*.id' => 'required|exists:categories,id',
        'categories.*.subcategories' => 'array',
        'categories.*.subcategories.*' => 'exists:sub_categories,id',
        'media.*.type' => 'required|in:image,videotube,aivideo',
        'media.*.path' => 'required',
        'media.*.thumbnail' => 'nullable|image',
        'tags' => 'nullable|string',
    ]);

    \DB::transaction(function () use ($validated, $request) {

        //  Create the post
        $post = Post::create([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'description' => $validated['description'] ?? null,
            //'content' => clean($validated['content']), // sanitize HTML from TinyMCE
            'content' => Purifier::clean($validated['content']),
            'author_id' => auth()->id(),
            'published_at' => now(),
        ]);

        //  Attach categories & subcategories
        $pivotData = [];
        foreach ($validated['categories'] as $cat) {
            $categoryId = $cat['id'];
            $subcategories = $cat['subcategories'] ?? [];

            foreach ($subcategories as $subId) {
                $pivotData[$subId] = ['category_id' => $categoryId];
            }

            if (empty($subcategories)) {
                $pivotData[0] = ['category_id' => $categoryId];
            }
        }

        if (!empty($pivotData)) {
            $post->placements()->attach($pivotData);
        }

        //  Handle media
        if ($request->has('media')) {
            foreach ($request->media as $index => $media) {
                $data = [
                    'type' => $media['type'],
                    'caption' => $media['caption'] ?? null,
                    'order' => $index,
                ];

                if ($media['type'] === 'image' && isset($media['path']) && $media['path'] instanceof \Illuminate\Http\UploadedFile) {
                    $data['path'] = $media['path']->store('media', 'public');
                } else {
                    $data['path'] = $media['path']; // YouTube or TinyMCE image URL
                    if (!empty($media['thumbnail']) && $media['thumbnail'] instanceof \Illuminate\Http\UploadedFile) {
                        $data['thumbnail'] = $media['thumbnail']->store('thumbnails', 'public');
                    }
                }

                $post->media()->create($data);
            }
        }

        // 🏷️ Handle tags
        if ($request->filled('tags')) {
            $tags = collect(explode(',', $request->tags))
                ->map(fn($t) => trim($t))
                ->filter()
                ->map(fn($tagName) => Tag::firstOrCreate(['name' => $tagName])->id);

            $post->tags()->sync($tags);
        }
    });

    return redirect()
        ->route('createpost')
        ->with('success', 'تم إنشاء المقال بنجاح!');
}





    public function updatepost() {

    }

    public function deletepost() {

    }

    public function test() {
return view ('test');
    }




     public function upload(Request $request)
{
    if ($request->hasFile('file')) {
        $path = $request->file('file')->store('tinymce', 'public');

        return response()->json([
            'location' => asset('storage/' . $path) // ✅ correct path

        ]);
    }

    return response()->json(['error' => 'No file uploaded'], 422);
}


}
