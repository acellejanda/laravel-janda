<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Product, Purchase, User};
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
  // C. Aggregating
    public function summary()
    {
        return response()->json([
            'total_inventory'   => Product::sum('inventory_quantity'),
            'average_inventory' => Product::avg('inventory_quantity'),
            'highest'           => Product::orderByDesc('inventory_quantity')->first(),
            'lowest'            => Product::orderBy('inventory_quantity')->first(),
        ]);
    }

    // D. Grouping, filtering, sorting
    public function inventory()
    {
        $perManufacturer = fn () => Product::select('manufacturer')->groupBy('manufacturer');

        return response()->json([
            'total_per_manufacturer' => $perManufacturer()->selectRaw('SUM(inventory_quantity) as total')->get(),
            'avg_per_manufacturer'   => $perManufacturer()->selectRaw('AVG(inventory_quantity) as average')->get(),
            'avg_sorted_asc'         => $perManufacturer()->selectRaw('AVG(inventory_quantity) as average')->orderBy('average', 'asc')->get(),
            'avg_sony_apple'         => $perManufacturer()->whereIn('manufacturer', ['Sony', 'Apple'])
                                            ->selectRaw('AVG(inventory_quantity) as average')->get(),
            'highest_per_manufacturer' => Product::whereIn('inventory_quantity', function ($q) {
                $q->selectRaw('MAX(p2.inventory_quantity)')->from('product as p2')
                  ->whereColumn('p2.manufacturer', 'product.manufacturer');
            })->get(),
            'lowest_per_manufacturer' => Product::whereIn('inventory_quantity', function ($q) {
                $q->selectRaw('MIN(p2.inventory_quantity)')->from('product as p2')
                  ->whereColumn('p2.manufacturer', 'product.manufacturer');
            })->get(),
        ]);
    }   

    public function manufacturers()
    {
        return response()->json(
            Product::select('manufacturer')
                ->selectRaw('COUNT(DISTINCT name) as distinct_names')
                ->groupBy('manufacturer')->get()
        );
    }

    public function purchaseTrends()
    {
        return response()->json(
            Purchase::selectRaw('YEAR(purchase_time) as year, COUNT(*) as total')
                ->groupBy('year')->havingRaw('COUNT(*) > 100')->get()
        );
    }

    // E. Joins
    public function sales()
    {
        return response()->json(
            DB::table('purchase_product')
                ->select('code', 'product_name')
                ->selectRaw('SUM(product_quantity) as total_sold')
                ->groupBy('code', 'product_name')
                ->orderByDesc('total_sold')->get()
        );
    }

    public function customers()
    {
        return response()->json(
            User::join('purchase', 'user.email', '=', 'purchase.email')
                ->select('user.email', 'user.first_name', 'user.last_name')
                ->selectRaw('SUM(purchase.total_price) as total_spent')
                ->groupBy('user.email', 'user.first_name', 'user.last_name')->get()
        );
    }
}
