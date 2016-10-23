<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repos\Blog\BlogRepository;
use App\Models\User;

class BlogsController extends Controller
{
  private $_blog;
  function __construct(BlogRepository $blog)
  {
    $this->_blog = $blog;
  }

  public function index() 
  {
    return $this->_blog->getAll();
  }

  public function show($id) 
  {
    return $this->_blog->getById($id);
  }

  public function store(Request $request)
  {
    return $this->_blog->save($request);
  }

  public function update(Request $request , $id)
  {
    return $this->_blog->update($request , $id);
  }

  public function destroy($id)
  {
    return $this->_blog->delete($id);
  }

  public function _withUser($id)
  {
    return Blog::where('id' , $this->_blog->getById($id)->user_id);
  }
}
