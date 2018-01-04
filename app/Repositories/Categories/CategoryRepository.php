<?php
namespace  App\Repositories\Categories;
use App\Models\Categories;
class CategoryRepository implements  CategoryRepositoryInterface
{
    public function all()
    {
        return Categories::all();
    }

    public function find($id)
    {
        return Categories::find($id);
    }

    public function save($data)
    {
        $categories = new Categories();

        if (isset($data['name'])) {
            $categories->name = $data['name'];
            $categories->slug = str_slug($data['name'], ' ');
        } else {
            $categories->name = '';
            $categories->slug = '';
        }
        if (isset($data['parent_id'])) {
            $categories->parent_id = $data['parent_id'];
        } else {
            $categories->parent_id = 0;
        }
        if (isset($data['category_type'])) {
            $categories->category_type = $data['category_type'];
        } else {
            $categories->category_type = -1;
        }
        if (isset($data['status'])) {
            $categories->status = $data['status'];
        } else {
            $categories->status = 1;
        }
        $categories->save();
    }

    public function update($data, $id)
    {
        $categories = Categories::find($id);
        if ($categories) {
            if (isset($data['name'])) {
                $categories->name = $data['name'];
                $categories->slug = str_slug($data['name'], ' ');
            } else {
                $categories->name = '';
                $categories->slug = '';
            }
            if (isset($data['parent_id'])) {
                $categories->parent_id = $data['parent_id'];
            }
            if (isset($data['category_type'])) {
                $categories->category_type = $data['category_type'];
            } else {
                $categories->category_type = -1;
            }
            if (isset($data['status'])) {
                $categories->status = $data['status'];
            } else {
                $categories->status = 0;
            }
            return $categories->save();
        } else {
            return false;
        }
    }

    public function findAttribute($att, $name)
    {
        return Categories::where($att, $name)->first();
    }

    public function delete($id)
    {
        $categories = Categories::find($id);
        $countParent = Categories::where('parent_id', $id)->count();
        if ($categories) {
            if ($countParent==0) {
                return $categories->delete();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function checkExistNameCategory($id, $name)
    {
        return Categories::where('id', '<>', $id)
                ->where('name', $name)->count();
    }


}
?>