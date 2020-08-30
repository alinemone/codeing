<?php

use App\Product;
use AliBayat\LaravelCategorizable\Category;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use Illuminate\Http\Request;

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('خانه', route('index'));
});

// Home > [Category]
Breadcrumbs::for('category', function ($trail,$category) {
    $trail->parent('home');
    $trail->push($category->name, route('viewCategory', $category->slug));
});
// Home > Parent Category > [Category]
Breadcrumbs::for('parentCategory', function ($trail,$parentCategory,$category) {
        $trail->parent('home');
        $trail->push($parentCategory->name, route('viewCategory',$parentCategory->slug));
        $trail->push($category->name, route('viewCategory', [$parentCategory->slug, $category->slug]));
});

// Home > [PrentCategory] > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $products  =  Product::with('Categories')->findOrFail($post->id);

    foreach($products->Categories as $parent){
        if ($parent->parent_id == null){
            $parCat = $parent;
        }
    }
    foreach($products->Categories as $child){
        if ($child->parent_id != null){
            $childCat = $child;
        }
    }
    $trail->parent('parentCategory',$parCat, $childCat);
    $trail->push($post->title, route('Product.single', $post->id));

});

//Home > برچسب > tag
Breadcrumbs::for('tags', function ($trail,$tag) {
    $trail->parent('home');
    $trail->push($tag->title, route('viewTag', $tag->slug));
});

// Home > [search]
Breadcrumbs::for('search', function ($trail,$search) {
    $trail->parent('home');
    $trail->push(' جستجو : ');
    $trail->push($search, route('search',$search));
});





