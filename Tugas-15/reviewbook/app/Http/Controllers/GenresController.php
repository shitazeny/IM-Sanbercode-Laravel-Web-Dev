<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GenresModels;

class GenresController extends Controller
{
    public function showGenre(Request $request)
    {
        $query = GenresModels::query();

        if ($request->has('search') && $request->search != '') {
            $query->where(function ($q) use ($request) {
                $q->where('name', '=', $request->search)
                ->orWhere('description', '=', $request->search);
            });
        }

        $datagenre = $query->get();

        return view('genres', ['data_genre' => $datagenre]);
    }

    public function addGenre(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
        ]);

        GenresModels::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('genre')->with('success', 'Penambahan berhasil!');
    }

    public function updateGenre(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $genre = GenresModels::findOrFail($id);

        $genre->name = $request->name;
        $genre->description = $request->description;
        $genre->save();

        return redirect()->route('genre')->with('success', 'Data Genre berhasil diupdate.');
    }

    public function deleteGenre($id)
    {
        $hapusGenre=GenresModels::find($id);
        $hapusGenre->delete();

        return redirect()->back();
    }
}
