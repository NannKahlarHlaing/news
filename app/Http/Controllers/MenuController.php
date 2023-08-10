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
        $menu_items = MenuItem::all();
        return view('backend.menus.create', compact('pages', 'categories', 'sub_categories'));
    }

    public function create_menu(Request $request){
        $name = $request->input('menu_name');

        Menu::create([
            'name' => $name
        ]);

        return $name;
    }

    public function update_menu($id) {

        $pages = Page::all();
        $categories = Category::all();
        $sub_categories = SubCategory::all();

        if($id == 1){
            $menu_name = 'Main Menu';
        }else if($id == 2){
            $menu_name = 'Footer Menu';
        }

        $menu_items = MenuItem::where('menu_id', $id)->get();

        return view('backend.menus.update', compact('id', 'menu_name', 'menu_items', 'pages', 'categories', 'sub_categories'));

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

    public function update_menuItems(Request $request) {
        $arr = [];
        foreach ($request->formData as $data) {
            $checkboxName = $data['checkboxName'];
            $linkValue = $data['linkValue'];

            $item = MenuItem::where('name', $checkboxName)->where('menu_id', $request->menu_id)->first();

            if($item){
                $item->menu_id = $request->menu_id;
                $item->link = $linkValue;

                $item->save();
            }else{
                MenuItem::create([
                    'menu_id' => $request->menu_id,
                    'name' => $checkboxName,
                    'link' => $linkValue,
                ]);
            }

        }

        foreach ($request->uncheckedData as $item) {
            $name = $item['name'];
            $menuItem = MenuItem::where('name', $name)->where('menu_id', $request->menu_id)->first();
            if ($menuItem) {
                $menuItem->delete();
            }
        }
        return response()->json(['message' => 'Data updated successfully']);
    }


}
