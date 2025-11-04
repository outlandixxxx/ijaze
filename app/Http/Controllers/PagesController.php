<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\View;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index() {
        
        $posts = Post::with('media')->latest()->take(20)->get();
                // Fetch latest 20 posts for each category
        $news = Post::with('media', 'categories')
            ->whereHas('categories', fn($q) => $q->where('name', 'news'))
            ->latest()
            ->take(20)
            ->get();

        $sport = Post::with('media', 'categories')
            ->whereHas('categories', fn($q) => $q->where('name', 'sport'))
            ->latest()
            ->take(20)
            ->get();

        $shahid = Post::with('media', 'categories')
            ->whereHas('categories', fn($q) => $q->where('name', 'shahid'))
            ->latest()
            ->take(20)
            ->get();

        $ainews = Post::with('media', 'categories')
            ->whereHas('categories', fn($q) => $q->where('name', 'ainews'))
            ->latest()
            ->take(20)
            ->get();

        $diverse = Post::with('media', 'categories')
        ->whereHas('categories', fn($q) => $q->where('name', 'diverse'))
        ->latest()
        ->take(20)
        ->get();

        return view ('pages.index', compact('posts','news', 'sport', 'shahid', 'ainews', 'diverse')) ;
    }



    public function news() {

    $tabs = [
            'politic' => 'politic',
            'economy' => 'economy',
            'society' => 'society',
            'cultureart' => 'cultureart',
            'technology' => 'technology',
        ];

        $tabPosts = [];

        foreach ($tabs as $tab => $subcategoryname) {
            $subcategory = SubCategory::where('name', $subcategoryname)->first();

            if ($subcategory) {
                // ✅ All posts for the grid
                $tabPosts[$tab]['all'] = Post::with('media')
                    ->whereHas('subcategories', fn($q) => $q->where('sub_categories.id', $subcategory->id))
                                ->whereHas('media', fn($q) => $q->where('type', 'aivideo')) // only posts with video

                    ->latest()
                    ->get();

                // ✅ Last 10 posts for the carousel
                $tabPosts[$tab]['carousel'] = Post::with('media')
                    ->whereHas('subcategories', fn($q) => $q->where('sub_categories.id', $subcategory->id))
                                ->whereHas('media', fn($q) => $q->where('type', 'aivideo')) // only posts with video

                    ->latest()
                    ->take(10)
                    ->get();

                // ✅ Top 10 posts by views for the swiper
                $tabPosts[$tab]['top'] = Post::with('media')
                    ->withCount('views')
                    ->whereHas('subcategories', fn($q) => $q->where('sub_categories.id', $subcategory->id))
                                ->whereHas('media', fn($q) => $q->where('type', 'aivideo')) // only posts with video

                    ->orderByDesc('views_count')
                    ->take(10)
                    ->get();
            } else {
                $tabPosts[$tab]['all'] = collect();
                $tabPosts[$tab]['carousel'] = collect();
                $tabPosts[$tab]['top'] = collect();
            }
        }

        return view('pages.news.news', compact('tabPosts'));

    }

    public function sport() {

        $posts = Post::with('media')
            ->whereHas('categories', function ($q) {
                $q->where('categories.name', 'sport');
            })
            ->latest()
            ->take(9)
            ->get();

        // Featured post (latest one)
        $featured = $posts->first();

        // Other 8 posts
        $others = $posts->skip(1)->take(8);

        //all posts 
    $allposts = Post::with('media')
            ->whereHas('categories', function ($q) {
                $q->where('categories.name', 'sport');
            })
            ->latest()
            ->skip(9)
            ->get();


        return view ('pages.sport.sport', compact('featured', 'others','allposts')) ;
    }



    public function shahid() {

            $category = Category::where('name', 'shahid')->firstOrFail();

            // Get subcategories that have posts under this category

                $subCategories = SubCategory::whereHas('posts', function ($q) use ($category) {
        $q->where('post_category_subcategory.category_id', $category->id);
    })->get();

            $subCategoriesData = [];

            foreach ($subCategories as $subCategory) {
                // All posts of this subcategory (filtered by Shahid category)
                $allPosts = $subCategory->posts()
                    ->with('media')
        ->where('post_category_subcategory.category_id', $category->id)
                    ->latest()
                    ->get();

                // Top 10 most viewed posts of this subcategory (filtered by Shahid category)
                $topPosts = $subCategory->posts()
                    ->with('media')
        ->where('post_category_subcategory.category_id', $category->id)
                    ->withCount('views')
                    ->orderBy('views_count', 'desc')
                    ->take(10)
                    ->get();

                $subCategoriesData[$subCategory->name] = [
                    'subCategory' => $subCategory,
                    'allPosts'    => $allPosts,
                    'topPosts'    => $topPosts,
                ];
            }


    return view('pages.chahid.chahid', compact('category', 'subCategoriesData'));

    }




    public function ai() {

 $tabs = [
    'politic'    => 'politic',
    'society'    => 'society',
    'economy' => 'economy',
    'cultureart'      => 'cultureart',
    'diverse'    => 'diverse',
];

$tabPosts = [];

foreach ($tabs as $tab => $subcategoryname) {
    $subcategory = SubCategory::where('name', $subcategoryname)->first();

    if ($subcategory) {
        // 🔹 All posts for this subcategory in category = ainews
        $tabPosts[$tab]['all'] = Post::with('media')
            ->whereHas('subcategories', function ($q) use ($subcategory) {
                $q->where('sub_categories.id', $subcategory->id);
            })
            ->whereHas('categories', function ($q) {
                $q->where('categories.name', 'ainews');
            })
            ->latest()
            ->get();

        // 🔹 Last 10 posts (for carousel)
        $tabPosts[$tab]['carousel'] = Post::with('media')
            ->whereHas('subcategories', function ($q) use ($subcategory) {
                $q->where('sub_categories.id', $subcategory->id);
            })
            ->whereHas('categories', function ($q) {
                $q->where('categories.name', 'ainews');
            })
            ->latest()
            ->take(10)
            ->get();

        // 🔹 Top 10 posts by views (for swiper)
        $tabPosts[$tab]['top'] = Post::with('media')
            ->withCount('views')
            ->whereHas('subcategories', function ($q) use ($subcategory) {
                $q->where('sub_categories.id', $subcategory->id);
            })
            ->whereHas('categories', function ($q) {
                $q->where('categories.name', 'ainews');
            })
            ->orderByDesc('views_count')
            ->take(10)
            ->get();
    } else {
        $tabPosts[$tab]['all'] = collect();
        $tabPosts[$tab]['carousel'] = collect();
        $tabPosts[$tab]['top'] = collect();
    }
}

return view('pages.ai.ai', compact('tabPosts'));


    }





    public function amusing() {

              $subcategories = ['famous', 'life', 'moroccan', 'health'];
    $data = [];

    foreach ($subcategories as $name) {
        $data[$name] = Post::with('media')
            ->whereHas('subcategories', function ($q) use ($name) {
                $q->where('sub_categories.name', $name);
            })
            ->latest()
            ->get();
    }

    return view('pages.amusing.amusing', compact('data'));
    }



    public function article($slug)
{
    $post = Post::with('media', 'tags', 'categories')
        ->where('slug', $slug)
        ->firstOrFail();

    // ✅ Track unique view
    $userId = Auth::id();
    $ip = request()->ip();

    $alreadyViewed = View::where('post_id', $post->id)
        ->when($userId, fn($q) => $q->where('user_id', $userId))
        ->when(!$userId, fn($q) => $q->where('ip_address', $ip))
        ->where('created_at', '>', now()->subHours(6)) // optional: count again after 6 hours
        ->exists();

    if (!$alreadyViewed) {
        View::create([
            'post_id' => $post->id,
            'user_id' => $userId,
            'ip_address' => $ip,
        ]);

       
    }

    // previous posts (image type)
    $previousImages = Post::with('media')
        ->whereHas('media', fn($q) => $q->where('type', 'image'))
        ->where('id', '<', $post->id)
        ->latest()
        ->take(10)
        ->get();


    // previous posts (video type)
    $previousVideos = Post::with('media')
        ->whereHas('media', fn($q) => $q->whereIn('type', ['videotube', 'aivideo']))
        ->where('id', '<', $post->id)
        ->latest()
        ->take(10)
        ->get();


    // related posts (same tags)
    $relatedPosts = Post::with('media')
        ->whereHas('tags', fn($q) => $q->whereIn('tags.id', $post->tags->pluck('id')))
        ->where('id', '!=', $post->id)
        ->take(8)
        ->get();

    return view('pages.post', compact('post', 'previousImages', 'previousVideos', 'relatedPosts'));
}

    public function tag($name)
    {
        $posts = Post::with(['media','tags'])
            ->whereHas('tags', function ($q) use ($name) {
                $q->where('name', $name);
            })
            ->latest()
            ->get();

        return view('pages.tagpost', compact('posts', 'name'));
    }


       

            public function policy()
{
    $locale = app()->getLocale();
    $privacy = json_decode(file_get_contents(resource_path('lang/privacy.json')), true);
    $content = $privacy[$locale];
    
    return view('pages.policy', compact('content'));
}

       

         public function staffer() {

           
            $locale = app()->getLocale();
    $editorial = json_decode(file_get_contents(resource_path('lang/staffer.json')), true);
    $content = $editorial[$locale];
    
    return view('pages.staffer', compact('content'));
        }
        
    }
