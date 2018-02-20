<?php

namespace App\Models\Painel;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'image',
        'description',
        'year',
        'active'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function addCategory($category){
        if (is_string($category)) {
            $category = Category::where('name','=',$category)->firstOrFail();
        }

        if($this->existCategory($category)){
            return;
        }
        return $this->categories()->attach($category);

    }

    public function existCategory($category)
    {
        if (is_string($category)) {
            $category = Category::where('name','=',$category)->firstOrFail();
        }
        return (boolean) $this->categories()->find($category->id);

    }

    public function deleteCategory($category)
    {
        if (is_string($category)) {
            $category = Category::where('name','=',$category)->firstOrFail();
        }
        return $this->categories()->detach($category);
    }
    
    public function existThisCategory($category)
    {
      $researchCategories = $this->categories;
      return $categories->intersect($researchCategories)->count();
    }

    public function users()
    {
        return $this->belongsToMany(App\Models\User::class);
    }

    public function getTextCategoriesAttribute($value)
    {
        $categories = $this->categories;
        $text = "";
        foreach ($categories as $key => $value) {
          if($key == 0){
            $text .= $value->name;
          }else{
            $text .= ", ".$value->name;
          }

        }
        return $text;
    }

    public function newResearch($request, $nameFile = '')
    {
        $data = $request->all();
        $data['active'] = $request->has('active');
        $data['image'] = $nameFile;
        return $this->create($data);
    }

    public function updateResearch($request, $nameFile = '')
    {
        $data = $request->all();
        $data['active'] = $request->has('active');
        $data['image'] = $nameFile;
        
        return $this->update($data);
    }


}
