<?php

namespace App\Http\Controllers\Dashboard;

use App\Author;
use App\Category;
use App\Http\Controllers\Controller;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Throwable;

class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:read_books')->only(['index']);
        $this->middleware('permission:create_books')->only(['create', 'store']);
        $this->middleware('permission:update_books')->only(['edit', 'update']);
        $this->middleware('permission:delete_books')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all();
        $authors = Author::all();
        $books = book::whenSearch(request()->search)
            ->whenCategory(request()->category)
            ->whenAuthor(request()->author)
            ->with('authors')
            ->with('categories')
            ->withCount('users')->paginate(5);
        return view('dashboard.books.index', compact('books', 'categories','authors'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $authors = Author::all();
        // $book = book::create([]);
        //return view('dashboard.books.create', compact('categories', 'book'));
        return view('dashboard.books.create', compact('categories','authors'));
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
            'description' => 'required',
            'poster' => 'required|image',
            'categories' => 'required|array',
           // 'authors' => 'required|array',
            'year' => 'required',
            'file' => 'required|mimes:doc,docx,pdf,xlx,csv',
        ]);
        $request_data = $request->except(['poster', 'file']);
        if ($request->poster) {
            $poster = Image::make($request->poster)->resize(255, 378)->encode('jpg');
            Storage::disk('local')->put('public/images/' . $request->poster->hashName(), (string)$poster, 'public');
            $request_data['poster'] = $request->poster->hashName();
        }

        $file = $request->file;
  //      Storage::disk('local')->put('public/books/' . $request->file->hashName(), (string)$file, 'public');
    //    $request_data['file'] =  $request->file->hashName();

        if ($request->hasFile('file')) {
            $file = $validation['file'];
            $extension = $file->getClientOriginalExtension();
            $filename = 'book-' . time() . '.' . $extension;
            $path = $file->storeAs('public/books/', $filename);
            $request_data['file'] = $filename;
        }


     //   $book = Book::create($request_data);
       // $book->authors()->sync($request->authors);


        DB::beginTransaction();
        try {
            //dd($request_data);
            $book = Book::create($request_data);
            $book->categories()->sync($request->categories);
            $this->saveAuthors($book, $request);


            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
           // session()->flash('success', 'Data Added successfully');
           // return redirect()->route('dashboard.books.index');
            return redirect()->back();
            throw $e;
        }


        session()->flash('success', 'Data Added successfully');
        return redirect()->route('dashboard.books.index');
    }

    protected function saveAuthors($book, $request)
    {
        $book_authors = [];
        $authors = explode(',', $request->post('authors'));
        foreach ($authors as $author) {
            $author = trim($author);
            $authorModle = Author::firstOrCreate([
                'name' => $author,
            ]);
            $book_authors[] = $authorModle->id;
        }
        $book->authors()->sync($book_authors);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {

        return $book;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        $categories = Category::where('status', 1)->get();
        $authors = Author::all();


        return view('dashboard.books.edit', compact('book', 'categories','authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $book = book::findOrFail($id);

        //update
        $request->validate([
            'name' => [
                'required',
                Rule::unique('books', 'name')->ignore($book->id)
            ],
            'description' => 'required',
            'poster' => 'sometimes|nullable|image',
            'categories' => 'required|array',
            'authors' => 'required|array',
            'year' => 'required',
            'file' => 'required|mimes:doc,docx,pdf,xlx,csv',
        ]);

        $request_data = $request->except(['poster','file']);
        if ($request->poster) {
            $this->remove_previous('poster', $book);
            $poster = Image::make($request->poster)->resize(255, 378)->encode('jpg');
            Storage::disk('local')->put('public/images/' . $request->poster->hashName(), (string)$poster, 'public');
            $request_data['poster'] = $request->poster->hashName();
        }

        $file = $request->file;
        Storage::disk('local')->put('public/books/' . $request->file->hashName(), (string)$file, 'public');
        $request_data['file'] =  $request->file->hashName();


        $book->update($request_data);
        $book->categories()->sync($request->categories);
        $book->authors()->sync($request->authors);

        session()->flash('success', __('Data updated successfully'));
        return redirect()->route('dashboard.books.index');
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
        $book = book::findOrFail($id);

        //////////////////////////////
        Storage::disk('local')->delete('public/images/' . $book->poster);
        Storage::disk('local')->delete('public/books/' . $book->file);
        $book->delete();
        session()->flash('success', 'Data deleted successfully');
        return redirect()->route('dashboard.books.index');
    }


    private function remove_previous($image_type, $book)
    {
        if ($image_type == 'poster') {
            if ($book->poster != null) {
                Storage::disk('local')->delete('public/images/' . $book->poster);
            }
        }
    }


    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    /*    public function changeStatus(Request $request)
        {

            $book = book::findOrFail($request->book_id);
            $book->status = $request->status;
            $book->save();

            // return response()->json(['message' => 'User status updated successfully.']);
            return response()->json(['success' => 'Status change successfully.']);
            // session()->flash('success', 'Status change successfully');
        }*/

}
