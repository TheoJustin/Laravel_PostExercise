<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Faker\Factory as FakerFactory;


class BookController extends Controller
{
    public function home(){
        return view('home');
    }

    public function viewBooks(){
        // $books = DB::table('books')->select('*')->get();
        $books = Book::paginate(5);
        return view('viewbooks', compact('books'));
    }

    public function searchBooks(Request $request){
        $perPage = 5;
        $query = DB::table('books')
            ->select('*')
            ->where('title', 'like', '%' . $request->title . '%');
        $books = $query->paginate($perPage);
        return view('viewbooks', compact('books'));
    }

    public function addBooks(){
        return view('addbooks');
    }

    public function addBooks_post(Request $request){
        $faker = FakerFactory::create();

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'url' => $faker->imageUrl(),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];

        DB::table('books')->insert($data);

        return redirect()->route('viewBooks');
    }

    public function updateBooks($book_id){
        $book = Book::find($book_id);
        if (!$book) {
            return redirect()->route('viewBooks');
        }
        return view('updatebooks', compact('book'));
    }

    public function updateBooksPut($book_id, Request $request){
        $book = Book::find($book_id);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
        ];
        $book->update($data);
        return redirect()->route('viewBooks');
    }

    public function deleteBooks($book_id){
        $book = Book::find($book_id);
        $book->delete();
        return redirect()->route('viewBooks');
    }

}
