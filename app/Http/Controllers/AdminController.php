<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\View;
use App\Models\Media;
use App\Models\Comment;
use App\Models\Visitor;
use App\Models\Category;
use App\Models\Subscriber;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mews\Purifier\Facades\purifier;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index() {

           $now = Carbon::now();

        // Define date ranges
        $startOfThisMonth = $now->copy()->startOfMonth();
        $endOfThisMonth   = $now->copy()->endOfMonth();

        $startOfLastMonth = $now->copy()->subMonth()->startOfMonth();
        $endOfLastMonth   = $now->copy()->subMonth()->endOfMonth();

        // --- This month's stats ---
        $thisMonth = [
            'posts'         => Post::whereBetween('created_at', [$startOfThisMonth, $endOfThisMonth])->count(),
            'visitors'      => Visitor::whereBetween('created_at', [$startOfThisMonth, $endOfThisMonth])->count(),
            'comments'      => Comment::whereBetween('created_at', [$startOfThisMonth, $endOfThisMonth])->count(),
            'subscriptions' => Subscriber::whereBetween('created_at', [$startOfThisMonth, $endOfThisMonth])->count(),
        ];

        // --- Last month's stats ---
        $lastMonth = [
            'posts'         => Post::whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->count(),
            'visitors'      => Visitor::whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->count(),
            'comments'      => Comment::whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->count(),
            'subscriptions' => Subscriber::whereBetween('created_at', [$startOfLastMonth, $endOfLastMonth])->count(),
        ];

        // --- Evolution (% difference) ---
        $evolution = [];
        foreach ($thisMonth as $key => $value) {
            $prev = $lastMonth[$key];
            $evolution[$key] = $prev > 0 ? round((($value - $prev) / $prev) * 100, 1) : 0;
        }

        // --- Lifetime stats per author ---
        $authors = User::withCount(['posts'])
            ->with(['posts' => function ($q) {
                $q->withCount(['comments', 'views']);
            }])
            ->get()
            ->map(function ($user) {
                $totalComments = $user->posts->sum('comments_count');
                $totalVisitors = $user->posts->sum('views_count');
                return [
                    'user' => $user,
                    'posts' => $user->posts_count,
                    'comments' => $totalComments,
                    'visitors' => $totalVisitors,
                     'created_at' => $user->created_at, // make sure this exists
                ];
            });

        return view('admin.dashboard', [
            'stats' => $thisMonth,
            'evolution' => $evolution,
            'authors' => $authors,
        ]);
    }


//category functions////////////////////


    public function showcategory() {
        
         $categories = Category::withCount([
        // Count posts with image media
        'posts as image_count' => function ($query) {
            $query->whereHas('media', fn($q) => $q->where('type', 'image'));
        },
        // Count posts with video media
        'posts as video_count' => function ($query) {
            $query->whereHas('media', fn($q) => $q->whereIn('type', ['videotube', 'aivideo']));
        },
    ])->latest()->get();

    return view('admin.category.show', compact('categories'));
    }

    public function createcategory() {

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

   // Show edit form
    public function editcategory($id)
    {
        $category = Category::findOrFail($id); // fetch the category
        return view('admin.category.edit', compact('category'));
    }

    // Handle update
    public function updatecategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:categories,slug,' . $category->id,
        ]);

        // Update category
        $category->update([
            'name' => $validated['name'],
            'slug' => $validated['slug'] ?? null,
        ]);

        return redirect()->route('showcategory')
                         ->with('success', 'Category updated successfully!');
    }

    public function deletecategory($id) {

        $category = Category::findOrFail($id);
            $category->delete();

            return redirect()->route('showcategory')->with('success', 'Category deleted successfully.');

    }

///end category //////////////////////////////////////////////////////////


////    //subcategory functions ////////////////////////////////////

   public function showsubcategory() {
        
         $subcategories = SubCategory::withCount([
        // Count posts with image media
        'posts as image_count' => function ($query) {
            $query->whereHas('media', fn($q) => $q->where('type', 'image'));
        },
        // Count posts with video media
        'posts as video_count' => function ($query) {
            $query->whereHas('media', fn($q) => $q->whereIn('type', ['videotube', 'aivideo']));
        },
    ])->latest()->get();

    return view('admin.subcategory.show', compact('subcategories'));
    }

    public function createsubcategory() {

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

        return redirect()->route('createsubcategory')->with('success', 'SubCategory created successfully!');
    }

   // Show edit form
    public function editsubcategory($id)
    {
        $subcategory = SubCategory::findOrFail($id); // fetch the category
        return view('admin.subcategory.edit', compact('subcategory'));
    }

    // Handle update
    public function updatesubcategory(Request $request, $id)
    {
        $subcategory = SubCategory::findOrFail($id);

        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|unique:categories,slug,' . $subcategory->id,
        ]);

        // Update category
        $subcategory->update([
            'name' => $validated['name'],
            'slug' => $validated['slug'] ?? null,
        ]);

        return redirect()->route('showsubcategory')
                         ->with('success', 'subCategory updated successfully!');
    }

    public function deletesubcategory($id) {

        $subcategory = SubCategory::findOrFail($id);
            $subcategory->delete();

            return redirect()->route('showsubcategory')->with('success', 'subcategory deleted successfully.');

    }





////post ///////////////////////////////////////////////////////

    public function showpost() {
        $userId = Auth::id(); // currently logged-in admin

        // ========== My Posts ==========
        $myPosts = Post::with('media') // eager load media
            ->withCount('comments')
            ->where('author_id', $userId)
            ->latest()
            ->get();

        // Count posts by media type
        $imagePosts = $myPosts->filter(fn($post) => $post->media->first()?->type === 'image')->count();
        $videoPosts = $myPosts->filter(fn($post) => in_array($post->media->first()?->type, ['videotube', 'aivideo']))->count();

        // My Stats for cards
        $myStats = [
        'posts' => $myPosts->count(),
        'views' => $myPosts->sum(fn($post) => $post->views->count()), // collection count
        'comments' => $myPosts->sum('comments_count'),
        'image_posts' => $imagePosts,
        'video_posts' => $videoPosts,
        ];

        $myStats = [
            'posts' => $myPosts->count(),
            'views' => $myPosts->sum(fn($post) => $post->views->count()), // collection count
            'comments' => $myPosts->sum('comments_count'),
            'image_posts' => $imagePosts,
            'video_posts' => $videoPosts,
        ];
        // ========== All Posts ==========
        $allPosts = Post::with('media', 'author')
            ->withCount('comments')
            ->latest()
            ->get();

        $allImagePosts = $allPosts->filter(fn($post) => $post->media->first()?->type === 'image')->count();
        $allVideoPosts = $allPosts->filter(fn($post) => in_array($post->media->first()?->type, ['videotube', 'aivideo']))->count();

        $allStats = [
        'posts' => $allPosts->count(),
        'views' => $allPosts->sum(fn($post) => $post->views->count()),
        'comments' => $allPosts->sum('comments_count'),
        'image_posts' => $allImagePosts,
        'video_posts' => $allVideoPosts,
        ];

        return view('admin.post.show', compact('myPosts', 'allPosts', 'myStats', 'allStats'));
    }




    public function createpost() {

        $categories = Category::all();
        $subcategories = SubCategory::all();
        $tags = Tag::all();

    return view('admin.post.create', compact('categories', 'subcategories', 'tags'));

    }





    public function storepost(Request $request) {
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
                'author_id' => '1',
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

     }


        public function editpost($id)
        {
            $post = Post::with(['categories', 'subcategories', 'media', 'tags'])->findOrFail($id);
            $categories = Category::all();
            $subcategories = SubCategory::all();

            return view('admin.post.edit', compact('post', 'categories', 'subcategories'));
        }

        public function updatepost(Request $request, $id)
        {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|unique:posts,slug,' . $id,
                'description' => 'nullable|string|max:500',
                'content' => 'required|string',
                'categories' => 'required|array',
                'categories.*' => 'exists:categories,id',
                'subcategories' => 'nullable|array',
                'subcategories.*' => 'exists:sub_categories,id',
                'media.*.type' => 'required|in:image,videotube,aivideo',
                'media.*.path' => 'required',
                'media.*.thumbnail' => 'nullable|image',
                'tags' => 'nullable|string',
            ]);

            \DB::transaction(function () use ($validated, $request, $id) {
                $post = Post::findOrFail($id);
                $post->update([
                    'title' => $validated['title'],
                    'slug' => $validated['slug'],
                    'description' => $validated['description'] ?? null,
                    'content' => Purifier::clean($validated['content']),
                ]);

                // 🏷️ Sync categories and subcategories
                $post->categories()->sync($validated['categories']);
                $post->subcategories()->sync($validated['subcategories'] ?? []);

                // 🖼️ Handle media update (simplified)
                if ($request->has('media')) {
                    $post->media()->delete(); // delete old ones if you want
                    foreach ($request->media as $index => $media) {
                        $data = [
                            'type' => $media['type'],
                            'order' => $index,
                        ];

                        if ($media['type'] === 'image' && $media['path'] instanceof \Illuminate\Http\UploadedFile) {
                            $data['path'] = $media['path']->store('media', 'public');
                        } else {
                            $data['path'] = $media['path'];
                            if (!empty($media['thumbnail']) && $media['thumbnail'] instanceof \Illuminate\Http\UploadedFile) {
                                $data['thumbnail'] = $media['thumbnail']->store('thumbnails', 'public');
                            }
                        }

                        $post->media()->create($data);
                    }
                }

                // 🏷️ Sync tags
                if ($request->filled('tags')) {
                    $tags = collect(explode(',', $request->tags))
                        ->map(fn($t) => trim($t))
                        ->filter()
                        ->map(fn($tagName) => Tag::firstOrCreate(['name' => $tagName])->id);
                    $post->tags()->sync($tags);
                }
            });

            return redirect()->route('showpost')->with('success', 'Post updated successfully.');
        }



        public function deletepost($id)
        {
            $post = Post::findOrFail($id);
            $post->delete();

            return redirect()->route('showpost')->with('success', 'Post deleted successfully.');
        }

// end Post///////////////////////////////////////////////////


    public function showsubscribe() {

    return view('admin.subscribe');

    }


    public function showcomment() {

    return view('admin.comment');

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
