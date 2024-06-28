<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $title = 'Home Page';
    return view('home', compact('title'));
})->name('home');

Route::get('/about', function () {
    $title = 'About Page';
    return view('about', compact('title'));
})->name('about');


Route::get('/posts', function () {
    $filters = request()->only(['search', 'category', 'author']);;  // Collect filters from request
    $posts = Post::filter($filters)->orderBy('id', 'desc')->get();  // Pass filters to scopeFilter method
    $title = 'All Posts';
    return view('posts', compact('posts', 'title'));
})->name('posts');

Route::get('/post/{slug}', function ($slug) {
    $title = 'Detail Post';
    // Fetch the post using the 'slug' column
    $post = Post::where('slug', $slug)->firstOrFail();
    return view('post', compact('post', 'title'));
})->name('post');

// Route::get('/posts/author/{user}', function (User $user) {
//     $title = 'Posts By: ' . $user->name;
//     $posts = $user->posts;
//     return view('posts', compact('posts', 'title'));
// })->name('author');

// Route::get('/posts/category/{category}', function (Category $category) {
//     $title = 'Posts in Category: ' . $category->name;
//     $posts = $category->posts;
//     return view('posts', compact('posts', 'title'));
// })->name('category');


// Route::get('/posts', function () {
//     $posts = [
//         [
//             'title' => 'Judul Pertama',
//             'slug' => 'judul-pertama',
//             'author' => 'Murtaki Shihab',
//             'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit reiciendis hic, quae blanditiis molestias cum enim doloribus eum corporis eaque vero quos ducimus, alias, commodi necessitatibus beatae ipsum quasi repellendus! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit reiciendis hic, quae blanditiis molestias cum enim doloribus eum corporis eaque vero quos ducimus, alias, commodi necessitatibus beatae ipsum quasi repellendus! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit reiciendis hic, quae blanditiis molestias cum enim doloribus eum corporis eaque vero quos ducimus, alias, commodi necessitatibus beatae ipsum quasi repellendus!',
//             'publish_at' => '2024-05-01'
//         ],
//         [
//             'title' => 'Judul Kedua',
//             'slug' => 'judul-kedua',
//             'author' => 'Murtaki Shihab',
//             'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit reiciendis hic, quae blanditiis molestias cum enim doloribus eum corporis eaque vero quos ducimus, alias, commodi necessitatibus beatae ipsum quasi repellendus! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit reiciendis hic, quae blanditiis molestias cum enim doloribus eum corporis eaque vero quos ducimus, alias, commodi necessitatibus beatae ipsum quasi repellendus! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit reiciendis hic, quae blanditiis molestias cum enim doloribus eum corporis eaque vero quos ducimus, alias, commodi necessitatibus beatae ipsum quasi repellendus!',
//             'publish_at' => '2024-05-02'
//         ],
//         [
//             'title' => 'Judul Ketiga',
//             'slug' => 'judul-ketiga',
//             'author' => 'Murtaki Shihab',
//             'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit reiciendis hic, quae blanditiis molestias cum enim doloribus eum corporis eaque vero quos ducimus, alias, commodi necessitatibus beatae ipsum quasi repellendus! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit reiciendis hic, quae blanditiis molestias cum enim doloribus eum corporis eaque vero quos ducimus, alias, commodi necessitatibus beatae ipsum quasi repellendus! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit reiciendis hic, quae blanditiis molestias cum enim doloribus eum corporis eaque vero quos ducimus, alias, commodi necessitatibus beatae ipsum quasi repellendus!',
//             'publish_at' => '2024-05-03'
//         ],
//     ];
//     return view('posts', [
//         'posts' => $posts,
//         'title' => 'All Post'
//     ]);
// })->name('blog');
// Route::get('/post/{slug}', function ($slug) {
//     $title = 'Detail Post';
//     $posts = [
//         [
//             'title' => 'Judul Pertama',
//             'slug' => 'judul-pertama',
//             'author' => 'Murtaki Shihab',
//             'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit reiciendis hic, quae blanditiis molestias cum enim doloribus eum corporis eaque vero quos ducimus, alias, commodi necessitatibus beatae ipsum quasi repellendus! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit reiciendis hic, quae blanditiis molestias cum enim doloribus eum corporis eaque vero quos ducimus, alias, commodi necessitatibus beatae ipsum quasi repellendus! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit reiciendis hic, quae blanditiis molestias cum enim doloribus eum corporis eaque vero quos ducimus, alias, commodi necessitatibus beatae ipsum quasi repellendus!',
//             'publish_at' => '2024-05-01'
//         ],
//         [
//             'title' => 'Judul Kedua',
//             'slug' => 'judul-kedua',
//             'author' => 'Murtaki Shihab',
//             'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit reiciendis hic, quae blanditiis molestias cum enim doloribus eum corporis eaque vero quos ducimus, alias, commodi necessitatibus beatae ipsum quasi repellendus! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit reiciendis hic, quae blanditiis molestias cum enim doloribus eum corporis eaque vero quos ducimus, alias, commodi necessitatibus beatae ipsum quasi repellendus! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit reiciendis hic, quae blanditiis molestias cum enim doloribus eum corporis eaque vero quos ducimus, alias, commodi necessitatibus beatae ipsum quasi repellendus!',
//             'publish_at' => '2024-05-02'
//         ],
//         [
//             'title' => 'Judul Ketiga',
//             'slug' => 'judul-ketiga',
//             'author' => 'Murtaki Shihab',
//             'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit reiciendis hic, quae blanditiis molestias cum enim doloribus eum corporis eaque vero quos ducimus, alias, commodi necessitatibus beatae ipsum quasi repellendus! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit reiciendis hic, quae blanditiis molestias cum enim doloribus eum corporis eaque vero quos ducimus, alias, commodi necessitatibus beatae ipsum quasi repellendus! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit reiciendis hic, quae blanditiis molestias cum enim doloribus eum corporis eaque vero quos ducimus, alias, commodi necessitatibus beatae ipsum quasi repellendus!',
//             'publish_at' => '2024-05-03'
//         ],
//     ];

//     $post = Arr::first($posts, function ($post) use ($slug) {
//         return $post['slug'] == $slug;
//     });
//     return view('post', [
//         'post' => $post,
//         'title' => $title
//     ]);
// })->name('post');
Route::get('/contact', function () {
    return view('contact', [
        'title' => 'Contact Page'
    ]);
})->name('contact');
