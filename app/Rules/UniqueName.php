<?php
namespace App\Rules;

use App\Models\Category;
use Illuminate\Contracts\Validation\Rule;
use App\Models\YourModel;

class UniqueName implements Rule
{
    public function passes($attribute, $value)
    {
        return Category::where('name', $value)->exists();
    }

    public function message()
    {
        return 'The :attribute has already been taken.';
    }
}
