<?php
namespace App\Http\Controllers;

use App\Http\Requests\Noutbook\NoutbookCommentRequest;
use App\Http\Requests\Noutbook\StoreRequest;
use App\Models\Noutbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Contracts\NoutbookServiceInterface;
use App\Services\Contracts\CommentServiceInterface;
use App\Services\Contracts\BasketServiceInterface;

class NoutbookController extends Controller
{
    public function __construct(
        private NoutbookServiceInterface $noutbookService,
        private CommentServiceInterface $commentService,
        private BasketServiceInterface $basketService
    ) {}

    public function index(Request $request)
    {
        $noutbooks = $this->noutbookService->getFilteredList($request->all());
        $product = $this->noutbookService->getDefaultPreview();
        $filters = $this->noutbookService->getFilterOptions();
        $total = $noutbooks->total();

        $user_number = $request->session()->get('user_number');
        $purchase = $this->basketService->getByUserNumber($user_number);
        $all_purchases = $purchase->count() ?: '';

        return view('noutbooks.index', [
            'noutbooks' => $noutbooks,
            'product' => $product,
            'brends' => $filters['brends'],
            'rams' => $filters['rams'],
            'memories' => $filters['memories'],
            'total' => $total,
            'purchase' => $purchase,
            'all_purchases' => $all_purchases
        ]);
    }

    public function show(Noutbook $noutbook, Request $request)
    {
        $product = $noutbook;
        $variants = $this->noutbookService->getVariants($product);
        $options = $this->noutbookService->getProductOptions($product);
        $total = $this->commentService->getTotalComments($product);
        $rating = $this->commentService->getAverageRating($product);

        $user_number = $request->session()->get('user_number');
        $purchase = $this->basketService->getByUserNumber($user_number);
        $all_purchases = $purchase->count() ?: '';

        return view('card', compact('product', 'variants', 'options', 'purchase', 'total', 'rating', 'all_purchases'));
    }

    public function indexComments(Noutbook $noutbook, Request $request)
    {
        $product = $noutbook;
        $comments = $this->commentService->getPaginatedForProduct($product, $request->all());

        $user_number = $request->session()->get('user_number');
        $purchase = $this->basketService->getByUserNumber($user_number);
        $all_purchases = $purchase->count() ?: '';

        return view('comments', compact('product', 'comments', 'all_purchases'));
    }

    public function create(Request $request)
    {
        $noutbooks = Noutbook::all();

        $user_number = $request->query('user_number');
        $purchase = $this->basketService->getByUserNumber($user_number);
        $all_purchases = $purchase->count() ?: '';

        return view('noutbooks.create', compact('noutbooks', 'all_purchases'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Noutbook::create($data);

        return redirect()->route('noutbooks.index');
    }

    public function createcomment(Noutbook $noutbook, Request $request)
    {
        $product = $noutbook;
        $id = Auth::id();

        $user_number = $request->session()->get('user_number');
        $purchase = $this->basketService->getByUserNumber($user_number);
        $all_purchases = $purchase->count() ?: '';

        return view('createcomment', compact('product', 'id', 'all_purchases'));
    }

    public function storecomment(NoutbookCommentRequest $request)
    {
        $data = $request->validated();
        $comment = $this->commentService->create($data);

        return redirect()->route('noutbooksComments.index', $comment->commentable_id);
    }
}
