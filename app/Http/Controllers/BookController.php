<?php

namespace App\Http\Controllers;

use App\Repositories\BookRepository;
use App\Repositories\AuthorRepository;

use App\Http\Requests\SearchRequest;
use App\Http\Requests\BookCreateRequest;
use App\Http\Requests\BookEditRequest;

class BookController extends Controller
{
    /**
     * The BookRepository instance.
     *
     * @var App\Repositories\BookRepository
     */
    protected $item_repo;

    /**
     * The AuthorRepository instance.
     *
     * @var App\Repositories\AuthorRepository
     */
    protected $author_repo;


    /**
     * Create a new BookController instance.
     *
     * @param  App\Repositories\BookRepository $item_repo
     * @param  App\Repositories\AuthorRepository $author_repo
     * @return void
     */
    public function __construct(BookRepository $item_repo, AuthorRepository $author_repo)
    {
        $this->item_repo = $item_repo;

        $this->author_repo = $author_repo;

        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->item_repo->index(5);

        $links = $items->render();

        $search = '';

        return view('book.index', compact('items', 'links', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = $this->author_repo->all();        
        
        return view('book.create',compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookCreateRequest $request)
    {
        $item = $this->item_repo->store($request);
                
        return redirect('books')->with('ok', 'Book Added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors = $this->author_repo->all();

        $item = $this->item_repo->getById($id);

        return view('book.edit',  array_merge($this->item_repo->edit($item),compact('authors')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookEditRequest $request, $id)
    {
        $item = $this->item_repo->getById($id);

        $this->item_repo->update($request, $item);        

        return redirect('books')->with('ok', 'Book record updated');       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = $this->item_repo->getById($id);

        $this->item_repo->destroy($item);

        return redirect('books')->with('ok', 'Book Deleted');      
    }

    /**
     * Show  Book
     *
     * @param  App\Http\Requests\SearchRequest $request
     * @return Response
     */
    public function show()
    {
        return redirect('books'); 
    }  

    /**
     * Show and search in Book
     *
     * @param  App\Http\Requests\SearchRequest $request
     * @return Response
     */
    public function searchIndex(SearchRequest $request)
    {
        $search = $request->input('search');

        $items = $this->item_repo->search(5, $search);

        $links = $items->appends(compact('search'))->render();
        
        return view('book.index', compact('items', 'links', 'search'));
    }    
}
