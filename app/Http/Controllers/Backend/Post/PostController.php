<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $page_title = 'Yazıları Listele';

        return view('backend.posts.index', compact('page_title'));
    }

    public function json()
    {
        $user = auth()->user();

        $posts = Post::all();

        return Datatables::of($posts)
            ->addColumn('edit_allowed', function ($posts) use ($user) {
                if ($user->group_id == 1) {
                    return true;
                }else {
                    if ($posts->user_id == $user->id) {
                        return true;
                    }else {
                        return false;
                    }
                }
            })->make(true);
    }

    public function add(): \Illuminate\Contracts\View\View
    {
        $page_title = 'Yeni Yazı Ekle';
        $page_description = 'Yeni yazı ekleyebilirsiniz.';

        $categories = Category::all();

        return view('backend.posts.add', compact('page_title', 'page_description', 'categories')); //phpcs:ignore
    }

    public function update(int $post_id): \Illuminate\Contracts\View\View
    {
        $categories = Category::all();

        $detail = Post::find($post_id);

        $selected_categories = PostCategory::where('post_id', $detail->id)->pluck('category_id')->toArray();

        $page_title = 'Yazıyı Düzenle';
        $page_description = 'Seçtiğiniz yazıyı düzenleyebilirsiniz.';

        return view('backend.posts.add', compact('page_title', 'page_description', 'categories', 'detail', 'selected_categories')); //phpcs:ignore
    }

    public function save(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $this->request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
            'content' => 'required',
            'categories' => 'required'
        ]);

        $niceNames = array(
            'title' => 'Başlık',
            'content' => 'İçerik',
            'categories' => 'Kategori'
        );

        $validator->setAttributeNames($niceNames);

        if ($validator->fails()) {
            return response()->json([
                'message' => error_formatter($validator),
                'errors' => $validator->errors(),
            ]);
        }

        $user = Auth::user();
        if (isset($data['id'])) {
            $post = Post::find($data['id']);
        } else {
            $post = new Post();
        }
        $post->user_id = $user->id;
        $post->title = $data['title'];
        $post->description = $data['description'] ?? null;
        $post->content = $data['content'];
        $post->save();

        $delete_old_categories = PostCategory::where('post_id', $post->id)->delete();
        foreach ($data['categories'] as $c) {
            $add_category = new PostCategory();
            $add_category->post_id = $post->id;
            $add_category->category_id = $c;
            $add_category->save();
        }

        $result = array(
            'status' => 1,
            'redirect' => route('post-index'),
            'message' => 'Başarıyla kaydettiniz.'
        );
        return response()->json($result);
    }

    public function delete(int $post_id): \Illuminate\Http\JsonResponse
    {
        $post = Post::find($post_id);
        $post->delete();

        $result = array(
            'status' => 1,
            'message' => 'Başarıyla kaydettiniz.'
        );

        return response()->json($result);
    }
}
