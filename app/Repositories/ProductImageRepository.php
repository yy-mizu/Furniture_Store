<?php

namespace App\Repositories;

use App\Models\Product_Image;
use Illuminate\Support\Str;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//use Your Model

/**
 * Class ProductImageRepository.
 */
class ProductImageRepository 
{
    /**
     * @return string
     *  Return the model
     */
    public function saveRecords($img , $uuid)
    {
        $total_img = count($img);
        
        $product_data  = DB::table('products')->where('uuid', '=', $uuid) ->get();
        
        for($i = 0 ; $i < $total_img ; $i++)
        {
            $uuid = Str::uuid()->toString();
            // dd($img[$i]);
            $image = $uuid.'.'.$img[$i]->getClientOriginalExtension();
            $img[$i] -> move(public_path('img/products/') , $image);

            if($i == 0)
            {
                $primary_img = new Product_Image();
                $primary_img->product_id = $product_data[0]->id;
                $primary_img->name = $product_data[0]->name;
                $primary_img->primary_img = true;
                $primary_img->img = $image;
                $primary_img->save();

            }

            else{
                $sec_img = new Product_Image();
                $sec_img->product_id = $product_data[0]->id;
                $sec_img->name = $product_data[0]->name;
                $sec_img->primary_img = false;
                $sec_img->img = $image;
                $sec_img->save();
            }
        }

        return redirect()->route('admin.productlist');
    }

    public function updateRecords($img , $id)
    {
        $total_img = count($img);
        
        $product_data  = DB::table('products')->where('id', '=', $id) ->get();
        
        for($i = 0 ; $i < $total_img ; $i++)
        {
            $uuid = Str::uuid()->toString();
            // dd($img[$i]);
            $image = $uuid.'.'.$img[$i]->getClientOriginalExtension();
            $img[$i] -> move(public_path('img/products/') , $image);

            if($i == 0)
            {
                $primary_img = new Product_Image();
                $primary_img->product_id = $product_data[0]->id;
                $primary_img->name = $product_data[0]->name;
                $primary_img->primary_img = true;
                $primary_img->img = $image;
                $primary_img->save();

            }

            else{
                $sec_img = new Product_Image();
                $sec_img->product_id = $product_data[0]->id;
                $sec_img->name = $product_data[0]->name;
                $sec_img->primary_img = false;
                $sec_img->img = $image;
                $sec_img->save();
            }
        }

        return redirect()->route('admin.productlist');
    }
}
