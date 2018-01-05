<?php
namespace  App\Repositories\News;
use App\Models\News;
use App\Models\Categories;
class NewsRepository implements NewsRepositoryInterface
{
    public function all()
    {
        return News::all();
    }

    public function find($id)
    {
        return News::find($id);
    }

    public function save($data)
    {
        $news = new News();
        if (isset($data['title'])) {
            $news->title = $data['title'];
            $news->slug  = str_slug($data['title'], ' ');
        } else {
            $news->title = '';
            $news->slug  = '';
        }
        if (isset($data['image'])) {
            $news->image = $data['image'];
        } else {
            $news->image = '';
        }
        if (isset($data['description'])) {
            $news->description = $data['description'];
        } else {
            $news->description = '';
        }
        if (isset($data['category_id'])) {
            $news->category_id = $data['category_id'];
        } else {
            $news->category_id = -1;
        }
        if (isset($data['status'])) {
            $news->status = $data['status'];
        } else {
            $news->status = 1;
        }
        if (isset($data['tag'])) {
            $news->tag = $data['tag'];
        } else {
            $news->tag = '';
        }
        $news->viewed = 0;
        return $news->save();
    }

    public function update($data, $id)
    {
        $news = News::find($id);
        if ($news) {
            if (isset($data['title'])) {
                $news->title = $data['title'];
                $news->slug  = str_slug($data['title'], ' ');
            } else {
                $news->title = '';
                $news->slug  = '';
            }
            if (isset($data['image'])) {
                $news->image = $data['image'];
            } else {
                $news->image = '';
            }
            if (isset($data['description'])) {
                $news->description = $data['description'];
            } else {
                $news->description = '';
            }
            if (isset($data['category_id'])) {
                $news->category_id = $data['category_id'];
            } else {
                $news->category_id = -1;
            }
            if (isset($data['status'])) {
                $news->status = $data['status'];
            } else {
                $news->status = 1;
            }
            if (isset($data['tag'])) {
                $news->tag = $data['tag'];
            } else {
                $news->tag = '';
            }
            return $news->save();
        } else {
            return false;
        }
    }

    public function findAttribute($att, $name)
    {
        return News::where($att, $name)->first();
    }

    public function delete($id)
    {
        $news = News::find($id);
        if ($news) {
            return $news->delete();
        } else {
            return false;
        }
    }
    public function checkExistNameNews($id, $name)
    {
        return News::where('id', '<>', $id)
                    ->where('title', $name)
                    ->count();
    }

    public function  getListAnSearch($title, $categoryId, $status, $limit)
    {
        $result = News::select('news.*', 'categories.name as category_name')
                ->join('categories', 'categories.id', '=', 'news.category_id');
           if (!empty($title)) {
               $result->where('news.title', 'like', "%$title%");
           }
           if ($categoryId != -1) {
               $result->where('news.category_id', $categoryId);
           }
           if ($status!= -1) {
               $result->where('news.status', $status);
           }
        return $result->orderBy('news.created_at', 'DESC')->paginate($limit);
    }
}

?>