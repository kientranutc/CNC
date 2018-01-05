<?php
namespace  App\Repositories\Categories;

interface  CategoryRepositoryInterface
{
  public function all();

  public function find($id);

  public function save($data);

  public function update($data, $id);

  public function findAttribute($att, $name);

  public function delete($id);

  public function checkExistNameCategory($id, $name);

  public function getCategoryNews();


}

?>