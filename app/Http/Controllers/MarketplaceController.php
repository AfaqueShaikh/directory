<?php

namespace App\Http\Controllers;

use App\Http\Helpers\GeneralHelper;
use App\Models\WebsiteTracker;
use App\Modules\Categories\Models\Category;
use App\Modules\Products\Models\Product;
use App\Modules\Settings\Models\Settings;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;

class MarketplaceController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        if (auth()->check()) {
            $categories = Category::where('active', 1)
                ->where('parent_id', 0)
                ->where('category_type', 'marketplace')
                ->with('products')
                ->get();

            return view('marketplace.index', compact('categories'));
        }

        return redirect("login")
            ->with('warning', 'You are not allowed to access');
    }

    /**
     * Write code on Method for product detail
     *
     * @return response()
     */
    public function productDetail($categoryId, $productId)
    {
        if (auth()->check()) {
            $product = Product::where('active', 1)
                ->where('slug', $productId)
                ->first();
            return view('marketplace.product-detail', compact('product'));
        }

        return redirect("login")
            ->with('warning', 'You are not allowed to access');
    }


}
