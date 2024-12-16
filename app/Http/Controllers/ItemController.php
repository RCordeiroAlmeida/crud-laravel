<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{

    public function create(){
        $items = Item::orderBy('name')->get();
        return view('create', compact('items'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max: 10',
        ]);

        Item::create([
            'name' => $request->name,
            'status' => 1, 
        ]);

        return redirect()->back()->with('success', 'Item created successfully');
    }

    public function destroy($id){
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Item deleted successfully');     
    }

    public function edit($id){
        $item = Item::findOrFail($id);
        $items = Item::orderBy('name')->get();
        return view('create', compact('items', 'item'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max: 10',
        ]);

        $item = Item::findOrFail($id);
        $item->update([
            'name' => $request->name,
            'status' => '1',
        ]);

        return redirect()->route('create')->with('success', 'Item atualizado com sucesso!');
    }
}