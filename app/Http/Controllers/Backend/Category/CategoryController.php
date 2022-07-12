<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $page_title = 'Kategorileri Listele';

        return view('backend.categories.index', compact('page_title'));
    }

    public function json()
    {
        $user = auth()->user();
        $edit_allowed = $user->group_id == 1 ? true : false;
        $delete_allowed = $user->group_id == 1 ? true : false;

        $categories = Category::with('parent')->get();

        return Datatables::of($categories)
            ->addColumn('edit_allowed', function () use ($edit_allowed) {
                return $edit_allowed;
            })->addColumn('delete_allowed', function () use ($delete_allowed) {
                return $delete_allowed;
            })->make(true);
    }

    public function add(): \Illuminate\Contracts\View\View
    {
        $page_title = 'Yeni Kategori Ekle';
        $page_description = 'Yeni kategori ekleyebilirsiniz.';

        $main_categories = Category::where('is_parent', 1)->get();

        return view('backend.categories.add', compact('page_title', 'page_description', 'main_categories')); //phpcs:ignore
    }

    public function update(int $category_id): \Illuminate\Contracts\View\View
    {
        $page_title = 'Kategori Düzenle';
        $page_description = 'Seçtiğiniz kategoriyi düzenleyebilirsiniz.';

        $main_categories = Category::where('is_parent', 1)->get();

        $detail = Category::find($category_id);

        return view('backend.categories.add', compact('page_title', 'page_description', 'detail', 'main_categories')); //phpcs:ignore
    }

    public function save(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $this->request->all();
        $firm_id = $this->request->user()->firm_id;

        if (isset($data['is_parent'])) {
            $validator = Validator::make($data, [
                'title' => 'required',
            ]);

            $niceNames = array(
                'title' => 'Başlık',
            );

            $validator->setAttributeNames($niceNames);

            if ($validator->fails()) {
                return response()->json([
                    'message' => error_formatter($validator),
                    'errors' => $validator->errors(),
                ]);
            }
        }else {
            $validator = Validator::make($data, [
                'title' => 'required',
                'main_category' => ['required','exists:categories,id'],
            ]);

            $niceNames = array(
                'title' => 'Başlık',
                'main_category' => 'Ana Kategori',
            );

            $validator->setAttributeNames($niceNames);

            if ($validator->fails()) {
                return response()->json([
                    'message' => error_formatter($validator),
                    'errors' => $validator->errors(),
                ]);
            }
        }

        if (isset($data['id'])) {
            $category = Category::find($data['id']);
        } else {
            $category = new Category();
        }
        $category->title = $data['title'];
        $category->description = $data['description'] ?? null;
        if (isset($data['is_parent'])) {
            $category->is_parent = 1;
            $category->parent_id = null;
        }else {
            $category->parent_id = $data['main_category'] ?? null;
            $category->is_parent = 0;
        }
        $category->save();

        $result = array(
            'status' => 1,
            'redirect' => route('category-index'),
            'message' => 'Başarıyla kaydettiniz.'
        );
        return response()->json($result);
    }
}
