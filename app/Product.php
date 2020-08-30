<?php

namespace App;

use AliBayat\LaravelCategorizable\Categorizable;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;


class Product extends Model implements Searchable
{
    use Sluggable , Categorizable,SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function browsers(){
        return $this->belongsToMany(browser::class);
    }

    public function designs(){
        return $this->belongsToMany(design::class);
    }

    public function filewithproduct(){
        return $this->belongsToMany(filewithproduct::class);
    }

    public function language_create(){
        return $this->belongsToMany(language_create::class);
    }


    public function productstatuse(){
        return $this->belongsToMany(Productstatus::class);
    }
    public function status(){
        return $this->belongsToMany(Productstatus::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'product_tag')->withTimestamps();
    }

    public function path(){
        return "/item/$this->slug";
    }
//    comments Path
    public function comments(){
        return "/item/$this->slug/comments";
    }
//    relation comment
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function scopeSearch($query , $keywords)
    {

//        $keywords = explode(' ',$keywords);
        $query->Where('title' , 'LIKE' , '%' . $keywords . '%');
        return $query;
    }


    /**
     * @inheritDoc
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getSearchResult(): SearchResult
    {
        $url = $this->path();
        return new SearchResult($this, $this->title,$this->small_image, $url);
    }

    public function download()
    {
        if (auth()->check()){
            $status = false;
            if (auth()->user()->checkBuyers($this)){
                $status = true;
            }
            $timestapm = Carbon::now()->addHour(5)->timestamp;
            $hash = Hash::make('GTMjaslASaSLahkdnsdjdhjs'. $this->id .auth()->user()->id.$timestapm);
            return $status ? "/download/$this->id?m=$hash&t=$timestapm" : '/#';
        }
    }



}
