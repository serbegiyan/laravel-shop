<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BasketRequest;
use App\Services\Contracts\BasketServiceInterface;

class BasketController extends Controller
{
    public function __construct(
        private BasketServiceInterface $basketService
    ) {}

    public function index(Request $request)
    {
        $userNumber = $request->user_number;

        $products = $this->basketService->getByUserNumber($userNumber);
        $total = $this->basketService->getTotalCount($products);
        $count = $this->basketService->getTotalPrice($products);
        $all_purchases = $total ?: '';

        return view('basket', compact('products', 'count', 'total', 'all_purchases'));
    }

    public function store(BasketRequest $request)
    {
        $data = $request->validated();
        $request->session()->put('user_number', $request->user_number);

        $this->basketService->addToBasket($data);

        return redirect()->route($request->product_type . '.index');
    }

    public function delete(Request $request)
    {
        $this->basketService->removeFromBasket(
            $request->user_number,
            $request->name
        );

        return back();
    }

    public function edit(Request $request)
    {
        $this->basketService->updateProduct(
            $request->user_number,
            $request->name,
            $request->quantity,
            $request->total_price
        );

        return back();
    }
}
