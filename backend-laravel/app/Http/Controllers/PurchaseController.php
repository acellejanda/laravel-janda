<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    //
    // E. every purchase with buyer's full name and each product bought
    public function index()
    {
        return response()->json(Purchase::with('user:email,first_name,last_name', 'products')->get());
    }
    public function show($id) { return response()->json(Purchase::with('user', 'products')->findOrFail($id)); }
    public function store(Request $r) { return response()->json(Purchase::create($r->all()), 201); }
    public function update(Request $r, $id) {
        $p = Purchase::findOrFail($id); $p->update($r->all()); return response()->json($p);
    }
    public function destroy($id) { Purchase::findOrFail($id)->delete(); return response()->noContent(); }

    // B. Filtering
    public function totalAtLeast100() { return response()->json(Purchase::where('total_price', '>=', 100)->get()); }
    public function byJohn() { return response()->json(Purchase::where('email', 'john@example.com')->get()); }
    public function smallQuantity() {
        return response()->json(DB::table('purchase_product')->where('product_quantity', '<=', 2)->get());
    }
}
