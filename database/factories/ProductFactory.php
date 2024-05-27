<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Code;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $photos = [
        //     'storage/frontend/images/sofa.png',
        //     'storage/frontend/images/bed.png',
        //     'storage/frontend/images/chair.png',
        //     'storage/frontend/images/lamp.png',
        //     'storage/frontend/images/table.png'
        // ];
        
        
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph(),
            'category_id' =>  Category::inRandomOrder()->first()->id,
            'admin_id' => Admin::inRandomOrder()->first()->id,
            'supplier_id' => Supplier::inRandomOrder()->first()->id,
            // 'photo' => $this->faker->randomElement($photos),
            'price' => $this->faker->randomNumber(2),
            'stock' => $this->faker->randomNumber(2),
            'uuid' => Str::uuid()->__toString(),
            'created_at'=> Carbon::now(),
            'product_code' => strtoupper($this->faker->lexify('??-##')),
        ];
    }
}
