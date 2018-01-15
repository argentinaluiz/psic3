<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'image',
        'details',
        'old_price',
        'price',
        'description',
        'featured',
        'active'
    ];

    public function newProduct($request, $nameFile = '')
    {
        /*
        $data = $request->all();
        //dd($data);
        */
        $data = $request->all();
        $data['featured'] = $request->has('featured');
        $data['active'] = $request->has('active');
        $data['image'] = $nameFile;
        return $this->create($data);
    }

    public function updateProduct($request, $nameFile = '')
    {
        $data = $request->all();
        $data['featured'] = $request->has('featured');
        $data['active'] = $request->has('active');
        $data['image'] = $nameFile;
        
        return $this->update($data);
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Painel\Category');
    }

    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(4);
    }
  
}
