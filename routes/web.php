<?php

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


Auth::routes();
Route::get('test','front\ProductController@create');
///////////// front end rout group /////////////
Route::group(['prefix'=>'{local?}', 'middleware' => "SetLocaleLanguage"],function () {
  Route::get('/','front\FrontController@index');
  Route::get('/about','front\FrontController@about_us');
  Route::get('/contact','front\FrontController@contact');
  //article
  Route::get('articles','front\BlogController@get');
  Route::resource('article','front\BlogController');
  Route::get('/article/filter/cat/{id}','front\BlogController@search_by_category');
  Route::get('/article/filter/tag/{id}','front\BlogController@search_by_tag');
  Route::get('/article/filter/search/{id}','front\BlogController@search');
  Route::get('/article/get/blog/{id}','front\BlogController@get_blog');
  Route::post('/article/comment/add/{id}','front\BlogController@add_comment');
  //catgory product
  Route::resource('category','front\CategoryController');
  Route::get('/category/get/{id}','front\CategoryController@get_products');
  //prodcut
  Route::resource('product','front\ProductController');
  Route::get('/product/get/{id}','front\ProductController@get_product');
  Route::get('/product/price/get/{id}/{size}','front\ProductController@size_price');
  Route::post('/product/rate/add','front\ProductController@add_rate');
  Route::get('/product/rate/get/{id}','front\ProductController@get_rate');
Route::group([
  'middleware' => ['auth','user']
  ],
  function(){
    //cart
    Route::resource('cart','front\CartController');
    Route::get('cart/get/data','front\CartController@get_cart');
    Route::post('cart/change/quantity/price/{id}/{quantity}','front\CartController@change_quantity_price');
    Route::delete('cart/remove/all','front\CartController@remove_all');
    Route::get('cart/calculate/shipping','front\CartController@calculate_shipping');
    Route::post('cart/checkout/cart','front\CartController@checkout');
    //wish list
    Route::resource('wishlist','front\WishController');
    Route::get('wishlist/get/data','front\WishController@get_wish');
    //profile
    Route::resource('profile','front\OrderController');
  });

/////////////// admin panel rout group /////////////////
Route::get('/adminpanel/login','admin\AdminController@showLoginForm');
Route::group([
  'prefix' => 'adminpanel',
  'middleware' => ['admin']
  ],
  function(){
    Route::get('/','admin\AdminController@index');
    //category
    Route::get('/categorys','admin\CategoryController@get_category');
    Route::resource('category','admin\CategoryController');
    Route::get('category/filter/{offset}','admin\CategoryController@show_offset_number');
    Route::get('category/search/{key}','admin\CategoryController@search_category');
    //sub category
    Route::get('/sub_categorys','admin\SubCategoryController@get_sub_category');
    Route::resource('sub_category','admin\SubCategoryController');
    Route::get('sub_category/filter/{offset}','admin\SubCategoryController@show_offset_number');
    Route::get('sub_category/search/{key}','admin\SubCategoryController@search_sub_category');
    Route::get('sub_category/category/get','admin\SubCategoryController@get_category');
    //Product
    Route::resource('product','admin\ProductController');
    Route::get('products','admin\ProductController@get_product');
    Route::get('product/image/{id}','admin\ProductController@remove_image');
    Route::get('product/filter/{offset}','admin\ProductController@show_offset_number');
    Route::get('product/search/{key}','admin\ProductController@search_product');
    Route::get('product/category/get/{id}','admin\ProductController@get_category');
    //about us
    Route::resource('about','admin\AboutController');
    // our people
    Route::get('/peoples','admin\PeopleController@get_people');
    Route::resource('people','admin\PeopleController');
    Route::get('people/filter/{offset}','admin\PeopleController@show_offset_number');
    Route::get('people/search/{key}','admin\PeopleController@search');
    // Blog_catgory
    Route::get('/blog_categorys','admin\BlogCategoryController@get');
    Route::resource('blog_category','admin\BlogCategoryController');
    Route::get('blog_category/filter/{offset}','admin\BlogCategoryController@show_offset_number');
    Route::get('blog_category/search/{key}','admin\BlogCategoryController@search');
    // tag
    Route::get('/blog_tags','admin\TagController@get');
    Route::resource('blog_tag','admin\TagController');
    Route::get('blog_tag/filter/{offset}','admin\TagController@show_offset_number');
    Route::get('blog_tag/search/{key}','admin\TagController@search');
    // Blog
    Route::get('/blogs','admin\BlogController@get');
    Route::resource('blog','admin\BlogController');
    Route::get('blog/filter/{offset}','admin\BlogController@show_offset_number');
    Route::get('blog/search/{key}','admin\BlogController@search');
    Route::get('blog/category/{id}','admin\BlogController@search_by_category');
  });

});

Route::get('address/{lat}/{lang}/{en}',function($lat,$lang,$en){
    $url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lang).'&key=AIzaSyAGmN1GmN4mJz32R_E0oX9qGUc8hlEGT8o&language='.$lang.''.'&sensor=false';
    $json = @file_get_contents($url);
    $data=json_decode($json);
    $status = $data->status;
    if($status=="OK")
    return response()->json(['address' => $data->results[0]->formatted_address]);
    else
    return response()->json(['status' => 'error']);
});
Route::get('tsets',function(){
  $products=App\Product::all();
  foreach ($products as $product) {
    $product->shipping_data='Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra.
Version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per ';
    $product->returns_policy='Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra. Version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit.';
    $product->payment_info='Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra. Version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio.';
    $product->save();
  }
});
