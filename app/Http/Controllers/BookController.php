<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Exports\BookExport;
use App\Exports\TitleExport;
use App\Exports\AuthorExport;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

use function PHPUnit\Framework\isNull;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->get();

        return view('index',compact('books'));
    }
    public function export()
    {
        return view('export');
    }

    public function down(Request $request)
    {
       $title= $request->title;
       $author= $request->author;
       $val= $request->button;
      if($val == "csv"){
       if(!is_null($title) and !is_null($author)){
        $file_name = 'books'.date('Y_m_d_H_i_s').'.csv';
        return Excel::download(new BookExport, $file_name);
       }elseif (!is_null($title)  and is_null($author)){
        $file_name = 'titles'.date('Y_m_d_H_i_s').'.csv';
        return Excel::download(new TitleExport, $file_name);
       }    elseif (is_null($title)  and !is_null($author)){
        $file_name = 'authors'.date('Y_m_d_H_i_s').'.csv';
        return Excel::download(new AuthorExport, $file_name);
   }else{
    return view('export');
   }
}else{
    if(!is_null($title) and !is_null($author)){
        $books=Book::select('id','title','author')->get();
        return response()->xml(['books' => $books->toArray()])->header('Content-Type', 'text/xml');

       }elseif (!is_null($title)  and is_null($author)){
        $books=Book::select('id','title')->get();

        return response()->xml(['books' => $books->toArray()])->header('Content-Type', 'text/xml');


       }    elseif (is_null($title)  and !is_null($author)){
        $books=Book::select('id','author')->get();
        return response()->xml(['books' => $books->toArray()])->header('Content-Type', 'text/xml');

   }else{
    return view('export');
   }
}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title' => 'required',
            'author' => 'required',
        ]);

        Book::create($request->all());

        return redirect()->route('index')->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        return view('edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'author' => 'required',
        ]);
        Book::where('id', $id)->update(array('author' => $request->author));
        return redirect()->route('index')->with('success','Product created successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book= Book::find($id);
        $book->delete();
        return redirect()->route('index')->with('success','Product created successfully.');

    }
}
