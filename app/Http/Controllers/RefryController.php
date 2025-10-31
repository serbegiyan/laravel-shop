<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Refry;
use App\Http\Requests\RefryCommentRequest;
use App\Services\Contracts\BasketServiceInterface;
use App\Services\Contracts\CommentServiceInterface;
use App\Services\Contracts\RefryServiceInterface;

class RefryController extends Controller
{
    public function __construct(
        private RefryServiceInterface $refryService,
        private BasketServiceInterface $basketService,
        private CommentServiceInterface $commentService
    ) {}

    public function index(Request $request)
    {
        $refries = $this->refryService->getFilteredList($request->all());
        $product = $this->refryService->getDefaultPreview();
        $filters = $this->refryService->getFilterOptions();
        $total = $refries->total();

        $user_number = $request->session()->get('user_number');
        $purchase = $this->basketService->getByUserNumber($user_number);
        $all_purchases = $purchase->count() ?: '';

        return view('refries', [
            'refries' => $refries,
            'product' => $product,
            'brends' => $filters['brends'],
            'nofrosts' => $filters['nofrosts'],
            'purchase' => $purchase,
            'total' => $total,
            'all_purchases' => $all_purchases
        ]);
    }

    public function indexComments(Refry $refry, Request $request)
    {
        $product = $refry;
        $comments = $this->commentService->getPaginatedForProduct($product, $request->all());

        $user_number = $request->session()->get('user_number');
        $purchase = $this->basketService->getByUserNumber($user_number);
        $all_purchases = $purchase->count() ?: '';

        return view('comments', compact('product', 'comments', 'all_purchases'));
    }

    public function show(Refry $refry, Request $request)
    {
        $product = $refry;
        $variants = $this->refryService->getVariants($refry);
        $options = $this->refryService->getProductOptions($refry);
        $total = $this->commentService->getTotalComments($product);
        $rating = $this->commentService->getAverageRating($product);

        $user_number = $request->session()->get('user_number');
        $purchase = $this->basketService->getByUserNumber($user_number);
        $all_purchases = $purchase->count() ?: '';

        return view('card', compact('product', 'variants', 'purchase', 'options', 'total', 'rating', 'all_purchases'));
    }

    public function createcomment(Refry $refry, Request $request)
    {
        $product = $refry;
        $id = Auth::id();

        $user_number = $request->session()->get('user_number');
        $purchase = $this->basketService->getByUserNumber($user_number);
        $all_purchases = $purchase->count() ?: '';

        return view('createcomment', compact('product', 'id', 'all_purchases'));
    }

    public function storecomment(RefryCommentRequest $request)
    {
        $data = $request->validated();
        $comment = $this->commentService->create($data);

        return redirect()->route('refriesComments.index', $comment->commentable_id);
    }
}

