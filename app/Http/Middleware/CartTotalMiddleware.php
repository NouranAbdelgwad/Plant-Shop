<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CartTotalMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        // Share the total with all views
        view()->share('cartTotal', $total);

        return $next($request);
    }
}
