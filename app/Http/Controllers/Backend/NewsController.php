<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Repositories\News\NewsRepositoryInterface;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Support\Helper;
use App\Http\Requests\CreateNewsRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UpdateNewsRequest;

class NewsController extends Controller
{
    public function __construct(NewsRepositoryInterface $news, CategoryRepositoryInterface $categories)
    {
        $this->news = $news;
        $this->categories = $categories;
        View::share('helper', new Helper());
    }

    public function index(Request $request)
    {
        $categoryNews = $this->categories->getCategoryNews();

        $title = $request->get('title', '');
        $categoryId =  $request->get('category_id', -1);
        $status =  $request->get('status', -1);
        $limit = $request->get('limit', 10);
        $stt = ($request->get('page',1)-1)*$limit;
        $dataNews = $this->news->getListAnSearch($title, $categoryId, $status, $limit);
        return view('backend.news.index', compact('categoryNews','stt', 'dataNews'));
    }
    public function createForm()
    {
        $categoryNews = $this->categories->getCategoryNews();
        return view('backend.news.create', compact('categoryNews'));
    }

    public function processCreateForm(CreateNewsRequest $request)
    {
        $dataRequest = $request->except('_token');
        if ($this->news->save($dataRequest)) {
            return Redirect::route('news.index')->withSuccess('Thêm  mới bản tin thành công.');
        } else {
            return Redirect::back()->withErrors('Lỗi thêm mới bản tin.');
        }
    }

    public function editForm($id)
    {
        $categoryNews = $this->categories->getCategoryNews();
        $dataEdit = $this->news->find($id);
        return view('backend.news.edit', compact('dataEdit', 'categoryNews'));
    }

    public function processEditForm(UpdateNewsRequest $request, $id)
    {
        $dataRequest = $request->except('_token');
        if ($this->news->checkExistNameNews($id, $dataRequest['title'])==0) {
            if ($this->news->update($dataRequest, $id)) {
                return Redirect::route('news.index')->withSuccess('Sửa bản tin thành công.');
            } else {
                return Redirect::back()->withErrors('Lỗi sửa bản tin.');
            }
        } else {
            return Redirect::back()->withErrors('Tiêu đề đã tồn tại.');
        }
    }
    public function delete($id)
    {
        if ($this->news->delete($id)) {
            return Redirect::route('news.index')->withSuccess('Xóa bản tin thành công.');
        } else {
            return Redirect::route('news.index')->withErrors('Lỗi xóa bản tin.');
        }
    }
}
