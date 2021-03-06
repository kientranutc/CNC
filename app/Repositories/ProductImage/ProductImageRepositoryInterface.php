<?php
namespace  App\Repositories\ProductImage;

interface  ProductImageRepositoryInterface
{
  public function all();

  public function find($id);

  public function save($data);

  public function update($data, $id);

  public function findAttribute($att, $name);

  public function delete($id);

  public function deleteItem($id);
}

?>