<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Http\Requests\CreateCategoryRequest;
use App\Support\Helper;
use App\Http\Requests\UpdateCategoryRequest;
class CategoryController extends Controller
{
    public function __construct(CategoryRepositoryInterface $categories)
    {
        $this->categories = $categories;
        View::share('helper', new Helper());
    }

    public function index(Request $request)
    {
        $categoryAll = $this->categories->all();

        return view('backend.categories.index', compact('categoryAll'));
    }

    public function createForm()
    {
        $categoryAll = $this->categories->all()->toArray();
        return view('backend.categories.create', compact('categoryAll'));
    }
    public function processCreateForm(CreateCategoryRequest $request)
    {
       $dataRequest = $request->except('_token');
       $this->categories->save($dataRequest);
       return Redirect::route('categories.index')->withSuccess('Thêm mới danh mục thành công');
    }

    public function editForm($id)
    {
        $findCategory = $this->categories->find($id);
        $categoryAll = $this->categories->all()->toArray();
        return view('backend.categories.edit', compact('findCategory', 'categoryAll'));
    }

    public function processEditForm(UpdateCategoryRequest $request, $id)
    {
        $dataRequest = $request->except('_token');
        if ($this->categories->checkExistNameCategory($id, $dataRequest['name'])==0) {
               if ($this->categories->update($dataRequest, $id)) {
                   return Redirect::route('categories.index')->withSuccess('Cập nhật danh mục thành công.');
               } else {
                   return Redirect::back()->withErrors('Cập nhật danh mục lỗi.');
               }
            return Redirect::back()->withErrors('Tên danh mục đã tồn tại.');
        }


    }
    public function delete($id)
    {
        if ($this->categories->delete($id)) {
            return Redirect::route('categories.index')->withSuccess('Xóa danh mục thành công.');
        } else {
            return Redirect::route('categories.index')->withErrors('Xóa danh mục lỗi hoặc vẫn còn danh mục con.');
        }
    }

}
