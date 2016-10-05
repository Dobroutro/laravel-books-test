<?php 

namespace App\Repositories;

use App\Models\Author;

class AuthorRepository extends BaseRepository {

    /**
     * Create a new AuthorRepository instance.
     *
     * @param  App\Models\Author $item
     * @return void
     */
    public function __construct(Author $item)
    {
        $this->model = $item;
    }

    /**
     * Get all items.
     *
     * @return Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Get comments collection.
     *
     * @param  int  $n
     * @return Illuminate\Support\Collection
     */
    public function index($n)
    {
        return $this->model
        ->latest()
        ->paginate($n);
    }

    /**
     * Store a comment.
     *
     * @param  array $inputs
     * @param  int   $user_id
     * @return void
     */
    public function store($inputs)
    {
        $item = new $this->model;    

        $item->name = $inputs['name'];
        $item->note = $inputs['note'];

        $item->save();
    }

    /**
     * Create or update a Author.
     *
     * @param  App\Models\Author $item
     * @param  array  $inputs
     * @return App\Models\Author
     */
    private function saveItem($item, $inputs)
    {
        $item->name = $inputs['name'];
        $item->note = $inputs['note'];

        $item->save();

        return $item;
    }

    /**
     * Get Author collection.
     *
     * @param  App\Models\Author $item
     * @return array
     */
    public function edit($item)
    {

        return compact('item');
    }

    /**
     * Update a Author.
     *
     * @param  array  $inputs
     * @param  App\Models\Author $item
     * @return void
     */
    public function update($inputs, $item)
    {
        $item = $this->saveItem($item, $inputs);
    }

    /**
     * Destroy a post.
     *
     * @param  App\Models\Author $item
     * @return void
     */
    public function destroy($item) {

        $item->delete();
    }
}