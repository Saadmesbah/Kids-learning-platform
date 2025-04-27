<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Element;
use Illuminate\Http\Request;

class LearningController extends Controller
{
    public function index()
    {
        $categories = Category::with('elements')->get();
        return view('learning.index', compact('categories'));
    }

    public function showCategory(Category $category)
    {
        $elements = $category->elements;
        return view('learning.category', compact('category', 'elements'));
    }

    public function showElement(Element $element)
    {
        return view('learning.element', compact('element'));
    }
}
