<?php 

namespace App\Repos\Blog;
use Illuminate\Http\Request;
interface IBlogRepository 
{
  public function getAll();
  public function getById($id);
  public function save(Request $request);
  public function update(Request $request, $id);
  public function delete($id);
}