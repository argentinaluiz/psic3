<?php

namespace App\Models\Painel;

use Bootstrapper\Interfaces\TableInterface;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements TableInterface
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'details',
        'old_price',
        'price',
        'description',
        'featured',
        'active'
    ];

     /**
     * A list of headers to be used when a table is displayed
     *
     * @return array
     */
    public function getTableHeaders()
    {
        return ['ID', 'Nome', 'Preço anterior', 'Preço', 'Categorias', 'Destaque', 'Ativo'];
    }

    /**
     * Get the value for a given header. Note that this will be the value
     * passed to any callback functions that are being used.
     *
     * @param string $header
     * @return mixed
     */
    public function getValueForHeader($header)
    {
        switch ($header) {
            case 'ID':
                return $this->id;
            case 'Nome':
                return $this->name;
            case 'Preço anterior':
                return $this->textOldPrice;
            case 'Preço':
                return $this->textPrice;
            case 'Categorias':
                return $this->textCategories;
            case 'Destaque':
                return $this->featured?'Sim': 'Não';
            case 'Ativo':
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
      $productCategories = $this->categories;
      return $categories->intersect($productCategories)->count();
    }

    public function users()
    {
        return $this->belongsToMany(App\Models\User::class);
    }

    public function imagens()
    {
      return $this->hasMany(Gallery::class);
    }

    public function getTextPriceAttribute($value)
    {
        $valor = "R$ ".number_format($this->price,2,",",".");
        return $valor;
    }

    public function getTextOldPriceAttribute($value)
    {
        $valor = "R$ ".number_format($this->old_price,2,",",".");
        return $valor;
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

    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder();
    }









  
}
