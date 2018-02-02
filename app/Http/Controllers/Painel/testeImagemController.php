<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;

class testeImagemController extends Controller
{
    public function teste1()
    {
      return view("teste1");
    }

    public function teste1Post(Request $request)
    {
        //dd($request->all());
     $this->validate($request,[
        "image"=>"required|image|dimensions:min_width=600,min_height=600"
      ],[
        "image.required"=>"Escolha uma imagem!",
      ]);
    
      if($request->hasFile('image')){
        //dd("entrou");
       // $image = $request->file('image');
      
        $image = $request->image;
        $image_name = time().$image->getClientOriginalName();
       
       // dd( $image_name);

        $image->move("media/img/",$image_name);

        //$image = Image::make("media/img/".$image_name)->resize(300, 200)->save("media/img/300_200_".$image_name);
        //$image = Image::make("media/img/".$image_name)->fit(1200,600)->brightness(-20)->save("media/img/slide3_".$image_name);
        $image = Image::make("media/img/".$image_name)->fit(198, 132)->save("media/img/resources/198_132_".$image_name);
        $image = Image::make("media/img/".$image_name)->fit(300, 200)->save("media/img/products/300_200_".$image_name);
        $image = Image::make("media/img/".$image_name)->fit(465, 418)->save("media/img/products/galeria/465_418_".$image_name);
        $image = Image::make("media/img/".$image_name)->fit(48,48)->save("media/img/profile/48_48_".$image_name);
        $image = Image::make("media/img/".$image_name)->fit(28,28)->save("media/img/profile/28_28_small_".$image_name);

       // dd($image);
      // dd("feito");
      }

      return "OK";
    }

    public function teste2()
    {
      return view("teste2");
    }

    public function teste2Post(Request $request)
    {
      if($request->hasFile('images')){
       // dd("existe");
        $images = $request->images;
       // dd($images);
        $imageRules = array(
          'image' => 'required|image|dimensions:min_width=600,min_height=600',
        );

        foreach($images as $image){
            $imageArray = array('image' => $image);
            $imageValidator = Validator::make($imageArray, $imageRules);
            if ($imageValidator->fails()) {
                return redirect('painel/teste2')
                            ->withErrors($imageValidator)
                            ->withInput();
            }
        }

        foreach ($images as $image) {
          $image_name = time().$image->getClientOriginalName();
          $image->move("media/multiplas/",$image_name);
        }

      }

      return "OK";
    }

}
