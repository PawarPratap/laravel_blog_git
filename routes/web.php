<?php

/* use App\Models\Blogs;
use App\Models\BlogTags; */
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(["web"])->group(function () {
    Route::get("/", [HomeController::class, "home"]);
    /* Route::get('/', function () {
        //return view('welcome');*/
    
        //dd('hi'); // dd used to test the model
        //below is to insert manuel record in blogs table
        /* Blogs::insert([
                    "url" => "/",
                    "is_trending" => true,
                    "author" => "Pratap P",
                    "author_image_url" => "https://avatars.githubusercontent.com/u/26257054?v=4",
                    "image_url_portrait" => "https://picsum.photos/300/350",
                    "image_url_landscape" => "https://picsum.photos/360/160",
                    "title" => "laravel blog",
                    "date" => "Jan 24, 2024",
                    "description" => "In this cource we will cover custom laravel blog application using laravel framework",
                    "content" => "This is content. laravel blog application using laravel framework",
    
        ]); */
    
        /* dd(
            Blogs::all()->toArray()
        ); */
    
        //To add blogTags and it's hasMany relation with Blogs
        /* BlogTags::insert(
            [
                "blogs_id" => 1,
                "tag" => "Tag1"
            ]
        ); */
    
        /* dd(
            Blogs::with(["tags"])->where("id", 1)->get()->toArray()
        ); */
    
});


