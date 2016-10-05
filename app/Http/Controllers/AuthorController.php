<?php

namespace App\Http\Controllers;

use App\Repositories\AuthorRepository;

use App\Http\Requests\AuthorCreateRequest;
use App\Http\Requests\AuthorEditRequest;



class AuthorController extends Controller
{

    /**
     * The UserRepository instance.
     *
     * @var App\Repositories\AuthorRepository
     */
    protected $item_repo;

    /**
     * Create a new AuthorController instance.
     *
     * @param  App\Repositories\AuthorRepository $item_repo
     * @return void
     */
    public function __construct(AuthorRepository $item_repo)
    {
        $this->item_repo = $item_repo;

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
        
        return view('author.index', compact('items', 'links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorCreateRequest $request)
    {
        $this->item_repo->store($request->all());

        return redirect('authors')->with('ok', 'Author Added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->item_repo->getById($id);

        return view('author.edit',  $this->item_repo->edit($item));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorEditRequest $request,$id)
    {
        $item = $this->item_repo->getById($id);

        $this->item_repo->update($request->all(), $item);

        return redirect('authors')->with('ok', 'Author record updated');        
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

        return redirect('authors')->with('ok', 'Author Deleted');      
    }
}
