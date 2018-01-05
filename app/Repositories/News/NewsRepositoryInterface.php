<?php
namespace  App\Repositories\News;

interface  NewsRepositoryInterface
{
  public function all();

  public function find($id);

  public function save($data);

  public function update($data, $id);

  public function findAttribute($att, $name);

  public function delete($id);

  public function checkExistNameNews($id, $name);

  public function  getListAnSearch($title, $categoryId, $status, $limit);

}

?>