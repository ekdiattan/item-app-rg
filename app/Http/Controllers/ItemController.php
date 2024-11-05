<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $item = Item::all();

        return response()->json($item);
    }
    public function store(Request $request)
    {
        $item = Item::create(array_merge(['item_code' => Str::random(10)], $request->all()));

        return response()->json($item, 201);
    }
    public function show(int $id)
    {
        $item = Item::find($id);
        return response()->json($item);

    }

    public function update(Request $request, int $id)
    {

        $item = Item::find($id);
        $item->update($request->all());

        return response()->json($item);
    }

    public function destroy(int $id)
    {
        $item = Item::find($id);
        $item->delete();
        
        return response()->json('Data has been deleted!', 204);
    }
}
