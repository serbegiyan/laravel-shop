<?php

namespace App\Http\Controllers;

use App\Http\Requests\SmartphoneCommentRequest;
use App\Models\Basket;
use App\Models\Comment;
use App\Models\Smartphone;
use App\Services\Contracts\BasketServiceInterface;
use App\Services\Contracts\CommentServiceInterface;
use App\Services\Contracts\SmartphoneServiceInterface;
use Illuminate\Http\Request;
use EloquentFilter\ModelFilter;
use Illuminate\Support\Facades\Auth;


class SmartphoneController extends Controller
{
    public function __construct(
        private SmartphoneServiceInterface $smartphoneService,
        private BasketServiceInterface $basketService,
        private CommentServiceInterface $commentService
    ) {}
    public function index(Request $request)
    {
        $smartphones = $this->smartphoneService->getFilteredList($request->all());
        $user_number = $request->session()->get('user_number');

        $total = $smartphones->total();

        $filters = $this->smartphoneService->getFilterOptions();

        $purchase = $this->basketService->getByUserNumber($user_number);
        $all_purchases = $purchase->count() ?: '';

        $product = $smartphones->first();

        return view('smartphones', [
            'smartphones' => $smartphones,
            'product' => $product,
            'brends' => $filters['brends'],
            'rams' => $filters['rams'],
            'memories' => $filters['memories'],
            'purchase' => $purchase,
            'total' => $total,
            'all_purchases' => $all_purchases
        ]);
    }

    public function indexComments(Smartphone $smartphone, Request $request)
    {
        $product = $smartphone;

        $comments = $this->commentService->getPaginatedForProduct($product, $request->all());

        $user_number = $request->session()->get('user_number');
        $purchase = $this->basketService->getByUserNumber($user_number);
        $all_purchases = $purchase->count() ?: '';

        return view('comments', compact('product', 'comments', 'all_purchases'));
    }

    public function show(Smartphone $smartphone, Request $request)
    {
        $product = $smartphone;

        $variants = $this->smartphoneService->getVariants($product);

        $details = $this->smartphoneService->getProductDetails($product);

        $user_number = $request->session()->get('user_number');
        $purchase = $this->basketService->getByUserNumber($user_number);
        $all_purchases = $purchase->count() ?: '';

        return view('card', [
            'product' => $product,
            'variants' => $variants,
            'purchase' => $purchase,
            'options' => $details['options'],
            'total' => $details['total'],
            'rating' => $details['rating'],
            'all_purchases' => $all_purchases
        ]);
    }

    public function createcomment(Smartphone $smartphone, Request $request)
    {
        $product = $smartphone;
        $id = Auth::id();

        $user_number = $request->session()->get('user_number');
        $purchase = $this->basketService->getByUserNumber($user_number);
        $all_purchases = $purchase->count() ?: '';

        return view('createcomment', compact('product', 'id', 'all_purchases'));
    }


    public function storecomment(SmartphoneCommentRequest $request)
    {
        $data = $request->validated();

        $comment = $this->commentService->create($data);

        return redirect()->route('smartphonesComments.index', $comment->commentable_id);
    }

}
