<?php

namespace App\Http\Controllers\Dashboard;

use App\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $categories = Category::whenSearch(request()->search)->paginate(5);
        $authors = Author::whenSearch(request()->search)
            ->withCount('books')->paginate(5);
        return view('dashboard.authors.index', compact('authors'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.authors.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
           // 'bio' => 'required',
           // 'image' => 'required|image',
        ]);

        $request_data = $request->except(['image']);
        if ($request->image) {
            $image = Image::make($request->image)->resize(255, 378)->encode('jpg');
            Storage::disk('local')->put('public/authors/' . $request->image->hashName(), (string)$image, 'public');
            $request_data['image'] = $request->image->hashName();
        }


        Author::create($request_data);
        /* Category::create($request->all());*/

        session()->flash('success', 'Data Added successfully');
        return redirect()->route('dashboard.authors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
        return view('dashboard.authors.edit', compact('author'));
    }

    public function update(Request $request, $id)
    {

        $author = Author::findOrFail($id);
        $request->validate([
            'name' => ['required',
                Rule::unique('authors', 'name')->ignore($author->id)],
            'bio' => 'required',
            'image' => 'sometimes|nullable|image',
        ]);

        $request_data = $request->except(['image']);
        if ($request->image) {
            $this->remove_previous('image', $author);
            $image = Image::make($request->image)->resize(255, 378)->encode('jpg');
            Storage::disk('local')->put('public/authors/' . $request->image->hashName(), (string)$image, 'public');
            $request_data['image'] = $request->image->hashName();
        }


        $author->update($request_data);

        session()->flash('success', __('Data updated successfully'));
        return redirect()->route('dashboard.authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //////////////////////////////
        $author = Author::findOrFail($id);

        //////////////////////////////

        if ($author->image != null && $author->image != 'default.jpg') {
            Storage::disk('local')->delete('public/authors/' . $author->image);
        }

        $author->delete();
        session()->flash('success', 'Data deleted successfully');
        return redirect()->route('dashboard.authors.index');
    }


    private function remove_previous($image_type, $author)
    {
        if ($image_type == 'image') {
            if ($author->image != null && $author->image != 'default.png') {
                Storage::disk('local')->delete('public/authors/' . $author->image);
            }
        }
    }
}
