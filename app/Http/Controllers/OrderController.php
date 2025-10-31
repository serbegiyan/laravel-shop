<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Services\Contracts\OrderServiceInterface;
use App\Services\Contracts\BasketServiceInterface;

class OrderController extends Controller
{
    public function __construct(
        private OrderServiceInterface $orderService,
        private BasketServiceInterface $basketService
    ) {}

    public function create(Request $request)
    {
        $number = $request->user_number;
        $products = $this->basketService->getByUserNumber($number);

        $details = $this->orderService->prepareOrderDetails($products);

        return view('order', [
            'products' => $products,
            'all_purchases' => $details['all_purchases'],
            'number' => $number,
            'order_price' => $details['order_price'],
            'details_purchases' => $details['details_purchases']
        ]);
    }

    public function store(OrderRequest $request)
    {
        $data = $request->validated();
        $number = $data['number'];
        $email = $data['user_email'];
        unset($data['number']);

        $products = $this->basketService->getByUserNumber($number);

        foreach ($products as $product) {
            $product->delete();
        }

        $this->orderService->createOrder($data);
        $order = $this->orderService->getLatestOrderByEmail($email);

        $purchase = $this->basketService->getByUserNumber($number);
        $all_purchases = $purchase->count() ?: '';

        return view('send_order', compact('order', 'all_purchases'));
    }
}

