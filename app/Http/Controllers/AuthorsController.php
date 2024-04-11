<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\BookAuthor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::paginate(20);

        return view('authors.index')->with([
            "authors" => $authors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("authors.create");
    }

    /**
     * Display all the authored books
     * 
     * @param int $id
     */
    public function authored(int $id) {
        $author = Author::find($id);
 
        if (!$author) {
            abort(404, "Resource does not exist!");
        }

        $books = $author->books()->paginate(3);

        return view("authors.authored")->with([
            "books" => $books,
            "author" => $author
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string|max:255|unique:authors,name",
            "address" => "required|string|max:255",
            "phone" => "required|string|max:64",
            "img" => "nullable|image|max:10240",
            "items" => "nullable|string",
        ]);

        $author = new Author();

        $author->fill($validated);

        if ($request->hasFile("img")) {
            $file = $request->file('img');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            $author->img = $filePath;
        }

        $author->save();
        $items = json_decode($validated["items"], true);
        
        foreach ($items as $key => $value) {
            $author->books()->attach($key);
        }

        return redirect()->route("authors.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $author = Author::find($id);

        if (!$author) {
            abort(404, "Resource does not exist!");
        }

        $books = $author->books()->get(["name"]);

        return view("authors.show")->with([
            "author" => $author,
            "books" => $books
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $author = Author::find($id);

        if (!$author) {
            abort(404, "Resource does not exist!");
        }

        $books = BookAuthor::query()->where("author_id", "=", $author->id)->get("book_id");
        $items = [];
        
        foreach ($books as $key => $value) {
            $items[$value->book_id] = 1;
        }

        $items = json_encode($items);

        return view("authors.edit")->with([
            "author" => $author,
            "items" => $items
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $author = Author::find($id);

        if (!$author) {
            abort(404, "Resource does not exist!");
        }

        $validated = $request->validate([
            "name" => "nullable|string|max:255|unique:authors,name",
            "address" => "nullable|string|max:255",
            "phone" => "nullable|string|max:64",
            "img" => "nullable|image|max:10240",
            "items" => "nullable|string"
        ]);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            
            if ($author->img) {
                Storage::disk('public')->delete($author->img);
            }
    
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
    
            $author->img = $filePath;
        }

        $author->name = $validated["name"] ?? $author->name;
        $author->address = $validated["address"] ?? $author->address;
        $author->phone = $validated["phone"] ?? $author->phone;
        $author->save();

        $items = json_decode($validated["items"], true);
        $author->books()->sync(array_keys($items) ?? []);

        return redirect()->route("authors.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $author = Author::findOrFail($id);
        $author->books()->detach();

        if ($author->img) {
            Storage::disk("public")->delete($author->img);
        }

        $author->delete();
        return response(null);
    }
}
