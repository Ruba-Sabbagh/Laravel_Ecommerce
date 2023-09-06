<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class Categories extends Component
{
    public $editedcategoryindex= null;
    public $category=[];
    
    protected $rule = [
        'category.*.name' => ['required'],
    ];

    public $validationaction =[
        'category.*.name' => 'name',
    ];

    public function render()
    {
        $this->category=Category::all()->toArray();
        return view('admin.allcategory');
    }

    public function editCategory($categoryIndex){
        $this->editedcategoryindex = $categoryIndex;
    }

    public function saveCategory($categoryIndex){
        $category = $this->category[$categoryIndex] ?? NULL;
        if(!is_null($category)){
            $editcategory = Category::find($category['id']);
            if($editcategory){
                $editcategory->update($category);
            }
        }
        $this->editedcategoryindex =null;
    }
}
