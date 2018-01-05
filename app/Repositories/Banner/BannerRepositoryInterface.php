<?php
namespace  App\Repositories\Banner;

interface  BannerRepositoryInterface
{
  public function all();

  public function find($id);

  public function save($data);

  public function update($data, $id);

  public function findAttribute($att, $name);

  public function delete($id);

}

?>