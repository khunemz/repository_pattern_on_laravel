<?php

namespace App\Repos\Blog;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogRepository implements IBlogRepository
{
  public function getAll()
  {
    return Blog::all();
  }

  public function getById($id)
  {
    return Blog::findOrFail($id);
  }

  public function save(Request $request)
  {
    return Blog::create($request->all());
  }

  public function update(Request $request, $id)
  {
    $blog = Blog::findOrFail($id);
    /** ============================= */
    $blog->title = $request->title;
    $blog->body = $request->body;
    $blog->user_id = $request->user_id;
    /** ============================= */
    $blog->save();
    return $blog;
  }

  public function delete($id)
  {
    Blog::findOrFail($id)->delete();
    return response(null , 200);
  }


}