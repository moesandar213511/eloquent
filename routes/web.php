<?php

use App\User;
use App\Blog;
use App\City;
use App\Comment;
use App\Role;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/insert',function(){
	$pass=Hash::make('12345123');
	User::create(['name'=>'Moe Sandar','email'=>'moe@gmail.com','password'=>$pass]);
});

// Route::get('/insert',function(){
//     Cityy::create(['user_id'=>3,'city_name'=>'Mandalay']);
// });

//Route::get('/select',function (){
//   $blog = Blog::all();
//   $var = "";
//   foreach($blog as $bl){
//       $var =  $bl -> title.'<br>'.$bl->content;
//       echo $var;
//   }
//});

//Route::get('/select/{id}/show',function ($id){
//   $blogs = Blog::find($id);
//   echo $blogs -> title.'<br>';
//   echo $blogs -> content;
//});

//Route::get('/select/{id}/ display',function ($id){
//   $user = User::where('id',$id)->firstOrFail();
//   foreach ($user->blog as $bg){
//       echo $bg -> title.'<br>'.$bg -> content.'<br>';
//   }
//});
Route::get('blog/show/{id}',function($id){
  $blogs = Blog::find($id);
  dd($blogs->user).'<br>';
});

Route::get('user/{id}/blog',function($id){
  $user = User::where('id',$id)->firstOrFail();
  echo $user->name."<br>";

  foreach($user->blog as $blog){
    echo $blog.'<br>';
  }
});

Route::get('user/{id}/city',function($id){
  $user = User::where('id',$id)->firstOrFail();
  echo $user->name.'<br>';

  echo $user->city->name;
});

Route::get('user/{id}/role',function($id){
  $user = User::where('id',$id)->firstOrFail();
  echo $user->name.'<br>';

  foreach($user->role as $roles)
    echo $roles->rank;
});

Route::get('city/{id}/blog',function($id){
  $city = City::find($id);
  echo $city->name.'<br>';

  foreach($city->blog as $blogs){
    echo $blogs->title.'<br>'.$blogs->content.'<br>';
  }
});

Route::get('user/{id}/comment',function($id){
   $user = User::find($id);

   foreach($user->comment as $comments){
        echo $comments->content;
   }
});

Route::get('post/{id}/comment',function($id){
   $post = Blog::find($id);

   foreach($post->comment as $comments){
        echo $comments->content;
   }
});


Route::get('/select',function (){
    $blog = Blog::all();
    $var = "";
    foreach($blog as $bl){
        echo $bl -> title.'<br>';
        echo $bl->content.'<br>';
    }
});

?>