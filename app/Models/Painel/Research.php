<?php

namespace App\Models\Painel;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Research extends Model implements TableInterface
{
    protected $fillable = [
        'category_id',
        'title',
        'description',
        'year',
        'active'
    ];

    public function getTableHeaders()
    {
        return ['ID','Imagem', 'Título', 'Ano', 'Categorias', 'Descrição', 'Ativa'];
    }

    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'ID':
                return $this->id;
            case 'Imagem':
                return $this->image;
            case 'Título':
                return $this->title;
            case 'Ano':
                return $this->year;
            case 'Categorias':
                return $this->textCategories;
            case 'Descrição':
                return $this->description;
            case 'Ativa':
                return $this->active?'Sim': 'Não';
        }
    }


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


}
