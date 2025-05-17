<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\genresModel;
use App\Models\booksModel;
use App\Models\usersModel;
use App\Models\commentsModel;

class adminController extends Controller
{
    public function showHome()
    {
        return view('admin.home');
    }

    public function showGenre(Request $request)
    {
        $query = genresModel::query();

        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('name', '=', $request->search)
                ->orWhere('description', '=', $request->search);
            });
        }

        $datagenre = $query->get();

        return view('admin.genre', ['data_genre' => $datagenre]);
    }

    public function addGenre(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
        ]);

        genresModel::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('admin.genre')->with('success', 'Penambahan berhasil!');
    }

    public function updateGenre(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $genre = genresModel::findOrFail($id);

        $genre->name = $request->name;
        $genre->description = $request->description;
        $genre->save();

        return redirect()->route('admin.genre')->with('success', 'Data Genre berhasil diupdate.');
    }

    public function deleteGenre($id)
    {
        $hapusGenre=genresModel::find($id);
        $hapusGenre->delete();

        return redirect()->back();
    }

    public function showBook(Request $request)
    {
        $query = booksModel::query();

        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('title', '=', $request->search);
            });
        }

        $databook = $query->get();
        $genres = genresModel::all(); 

        return view('admin.book', [
            'data_book' => $databook,
            'genres' => $genres,
        ]);
    }

    public function addBook(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'summary' => 'required|string',
            'image' => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'stok' => 'required|numeric',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $image = $request->file('image')->move(public_path('img_book'), time() . '-' . $request->file('image')->getClientOriginalName());

        booksModel::create([
            'title' => $validated['title'],
            'summary' => $validated['summary'],
            'image' => 'img_book/' . basename($image),
            'stok' => $validated['stok'],
            'genre_id' => $validated['genre_id'],
        ]);

        return redirect()->route('admin.book')->with('success', 'Penambahan berhasil!');
    }

    public function updateBook(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'summary' => 'required|string',
            'image' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'stok' => 'required|numeric',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $book = booksModel::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($book->image && file_exists(public_path($book->image))) {
                unlink(public_path($book->image));
            }

            $image = $request->file('image')->move(
                public_path('img_book'),
                time() . '-' . $request->file('image')->getClientOriginalName()
            );

            $book->image = 'img_book/' . basename($image);
        }

        $book->title = $validated['title'];
        $book->summary = $validated['summary'];
        $book->stok = $validated['stok'];
        $book->genre_id = $validated['genre_id'];
        $book->save();

        return redirect()->route('admin.book')->with('success', 'Data buku berhasil diupdate.');
    }

    public function deleteBook($id)
    {
        $hapusBook=booksModel::find($id);
        $hapusBook->delete();

        return redirect()->back();
    }

    public function showUser(Request $request)
    {
        $search = $request->input('search');

        $query = usersModel::with('profile')
            ->where('role', 'user');

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $users = $query->get();

        return view('admin.user', ['users' => $users]);
    }

    public function deleteUser($id)
    {
        $hapusUser=usersModel::find($id);
        $hapusUser->delete();

        return redirect()->back();
    }

    public function showComments()
    {
        $comments = commentsModel::with(['user', 'book'])->latest()->get();
        return view('admin.comments', compact('comments'));
    }
}
