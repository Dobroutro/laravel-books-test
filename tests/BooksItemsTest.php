<?php 

class BooksItemsTest extends TestCase {
    
    public function setUp()
    {
        parent::setUp();
        Auth::loginUsingId(1);
    }

    protected function parseJson(Illuminate\Http\JsonResponse $response)
    {
        return json_decode($response->getContent());
    }
    protected function assertIsJson($data)
    {
        $this->assertEquals(0, json_last_error());
    }

    public function testMustBeAuthenticated()
    {
        Auth::logout();
        $response = $this->call('GET', 'books');
        $this->assertEquals(302, $response->status());
    }

    public function testFetchesAllBooks()
    {
        $parameters = 
        $response = $this->call('GET', 'books');
        $this->assertEquals(200, $response->status());
    }

    public function testCreateBook()
    {
        $item = [
            'title' => 'New book',
            'purchase_year' => 'New book',
            'image'    => 'foo.jpg',
            'author_id' => 2
        ];
        $response = $this->call('POST', 'books', $item);
        $this->assertEquals(302, $response->status());
        $this->assertRedirectedTo('/');
    }
}