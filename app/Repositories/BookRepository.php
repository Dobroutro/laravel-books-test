<?php 

namespace App\Repositories;

use App\Models\Book;

class BookRepository extends BaseRepository {

    /**
     * Create a new BookRepository instance.
     *
     * @param  App\Models\Book $book
     * @return void
     */
    public function __construct(Book $book)
    {
        $this->model = $book;
    }

    /**
     * Get Books collection.
     *
     * @param  int  $n
     * @return Illuminate\Support\Collection
     */
    public function index($n)
    {
        return $this->model
        ->with('author')
        ->orderBy('purchase_year', 'desc')
        ->paginate($n);
    }

    /**
     * Store a Book.
     *
     * @param  App\Http\Requests\BookCreateRequest  $request
     * @param  int   $user_id
     * @return App\Models\Book
     */
    public function store($request)
    {   
        $inputs = $request->all();

        $item = new $this->model;    

        $item->author_id = $inputs['author_id'];
        $item->purchase_year = $inputs['purchase_year'];
        $item->title = $inputs['title'];
        $item->note = $inputs['note'];

        $item->save();

        $this->updateImageName($request, $item);
        
        return $item;
    }

    /**
     * Create or update a Book.
     *
     * @param  App\Models\Book $item
     * @param  array  $inputs
     * @return App\Models\Book
     */
    private function saveItem($item, $inputs)
    {   
        $item->author_id = $inputs['author_id'];
        $item->purchase_year = $inputs['purchase_year'];
        $item->title = $inputs['title'];
        $item->note = $inputs['note'];

        $item->save();

        return $item;
    }

    /**
     * Get Book collection.
     *
     * @param  App\Models\Book $item
     * @return array
     */
    public function edit($item)
    {

        return compact('item');
    }

    /**
     * Update a Book.
     *
     * @param  App\Http\Requests\BookEditRequest  $request
     * @param  App\Models\Book $item
     * @return void
     */
    public function update($request, $item)
    {   
        $inputs = $request->all();
        $item = $this->saveItem($item, $inputs);
        $this->updateImageName($request, $item);     
    }

    /**
     * Update a Image name.
     *
     * @param  App\Http\Requests\BookEditRequest  $request
     * @param  App\Models\Book $item
     * @return void
     */
    private function updateImageName($request, $item)
    {

        $image = $request->file('image');
        if($image) {
            $input['imagename'] = $item->id.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/books/');
            $image->move($destinationPath, $input['imagename']);

            $item->imagename = $input['imagename'];
            $item->save();
        }   
    }

    /**
     * Destroy a post.
     *
     * @param  App\Models\Book $item
     * @return void
     */
    public function destroy($item) {

        $item->delete();
    } 

    /**
     * Get search collection.
     *
     * @param  int  $n
     * @param  string  $search
     * @return Illuminate\Support\Collection
     */
    public function search($n, $search)
    {

        return $this->model
        ->with('author')
        ->where('title', 'like', "%$search%")
        ->orWhere('title', 'note', "%$search%")
        ->orderBy('purchase_year', 'desc')
        ->paginate($n);
    }    
}