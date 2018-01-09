<?php
namespace  App\Repositories\Products;

interface  ProductsRepositoryInterface
{
  public function all();

  public function find($id);

  public function save($data);

  public function update($data, $id);

  public function findAttribute($att, $name);

  public function delete($id);

  public function searchAndListProduct($name, $category, $status, $limit);

}

?>