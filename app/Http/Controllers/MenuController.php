<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        return view('backend.menus.index');
    }

    public function create_form(){
        $pages = Page::all();
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        return view('backend.menus.create', compact('pages', 'categories', 'sub_categories'));
    }

    public function create_menu(Request $request){
        $name = $request->input('menu_name');

        Menu::create([
            'name' => $name
        ]);

        return $name;
    }

    public function create_menuItems(Request $request){

        $request->validate([
            'menu_id' => 'required',
            'formData' => 'required|array',
            'formData.*.checkboxName' => 'required|string',
            'formData.*.linkValue' => 'nullable|string',
        ]);

        foreach ($request->formData as $data) {
            $checkboxName = $data['checkboxName'];
            $linkValue = $data['linkValue'];

            MenuItem::create([
                'menu_id' => $request->menu_id,
                'name' => $checkboxName,
                'link' => $linkValue,
            ]);
        }
        return response()->json(['message' => 'Data saved successfully']);

    }
}
