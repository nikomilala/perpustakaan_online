<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view orders', ['only' => ['index']]);
        $this->middleware('permission:create orders', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit orders', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete orders', ['only' => ['destroy']]);
        // $this->middleware('permission:return orders', ['only' => ['return']]);
        $this->middleware('permission:create orders offline', ['only' => ['offline']]);
    }
    public function create(Book $book)
    {
        return view('orders.create', compact('book'));
    }

    public function store(Request $request)
    {

        $user = auth()->user();
        $bookId = $request->book_id;
        $order = new Order([
            'user_id' => $user->id,
            'book_id' => $bookId,
            'rented_at' => now(),
        ]);
        Book::where('id', $bookId)->update(['status' => 'rented', 'stok' => DB::raw('stok - 1')]);
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Your order has been placed successfully');
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);

        return view('orders.index', compact('orders'));
    }

//    public function return(Book $book)
//    {
//        dd($book->id);
//        DB::beginTransaction();
//
//        try {
//            $order = Order::where('user_id', Auth::user()->id)->where('book_id', $book->id)->whereNull('returned_at')->firstOrFail();
//
//            $order->returned_at = now();
//            $order->save();
//
//            $book->status = 'available';
//            $book->save();
//
//            DB::commit();
//
//            return redirect()->route('orders.index')->with('success', 'Book returned successfully!');
//        } catch (\Exception $e) {
//            DB::rollback();
//
//            return back()->with('error', 'Failed to return book.');
//        }
//    }
    public function return(Order $order)
    {
        $order->returned_at = now();
        $order->save();
        $order->book()->update(['status' => 'available', 'stok' => DB::raw('stok + 1')]);
        return redirect()->route('orders.index')->with('success', 'Your book has been returned successfully');
    }
}
