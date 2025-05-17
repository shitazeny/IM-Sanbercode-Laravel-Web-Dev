<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\genresModel;
use App\Models\booksModel;
use App\Models\commentsModel;
use App\Models\profileModel;

class userController extends Controller
{
    public function showGenre()
    {
        $genres = genresModel::all();

        return view('genre', compact('genres'));
    }

    public function showBook()
    {
        $books = booksModel::all();

        return view('book', compact('books'));
    }

    public function showHome()
    {
        return view('user.home');
    }

    public function showProfile()
    {
        return view('user.profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'age' => 'nullable|numeric',
        'address' => 'nullable|string|max:255',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->save();

        $profile = $user->profile;

        if (!$profile) {
            $profile = new profileModel();
            $profile->user_id = $user->id;
        }

        $profile->age = $request->age;
        $profile->address = $request->address;
        $profile->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
    }
        
    public function showGenreUser(Request $request)
    {
        $query = genresModel::query();

        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('name', '=', $request->search)
                ->orWhere('description', '=', $request->search);
            });
        }

        $genres = $query->get();

        return view('user.genre', ['genres' => $genres]);
    }

    public function showBookUser(Request $request)
    {
        $query = booksModel::with(['genre', 'comments.user']); 

        if ($request->has('search') && $request->search != '') {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $books = $query->get();

        return view('user.book', compact('books'));
    }

    public function showBookDetail($id)
    {
        $book = booksModel::with('genre', 'comments')->findOrFail($id);
        return view('user.book_detail', compact('book'));
    }

    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $book = booksModel::findOrFail($id);

        $comment = $book->comments()->create([
            'content' => $request->text,
            'user_id' => auth()->id(),
        ]);

        $comment->load('user');

        return response()->json($comment);
    }
}
