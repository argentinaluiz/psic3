<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'details',
        'old_price',
        'price',
        'description',
        'featured',
        'active'
    ];

    public function newProduct($request)
    {
        /*
        $data = $request->all();
        //dd($data);
        */
        $data = $request->all();
        $data['featured'] = $request->has('featured');
        $data['active'] = $request->has('active');
        return $this->create($data);
    }

    public function updateProduct($request)
    {
        $data = $request->all();
        $data['featured'] = $request->has('featured');
        $data['active'] = $request->has('active');
        
        return $this->update($data);
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Site\Category');
    }


    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder();
    }
  
}
