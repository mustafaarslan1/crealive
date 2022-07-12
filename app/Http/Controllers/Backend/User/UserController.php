<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $page_title = 'Kullanıcıları Listele';

        return view('backend.users.index', compact('page_title'));
    }

    public function json()
    {
        $user = auth()->user();
        $edit_allowed = $user->group_id == 1 ? true : false;
        $delete_allowed = $user->group_id == 1 ? true : false;

        $users = User::with('group')->get();

        return Datatables::of($users)
            ->addColumn('edit_allowed', function () use ($edit_allowed) {
                return $edit_allowed;
            })->addColumn('delete_allowed', function () use ($delete_allowed) {
                return $delete_allowed;
            })->make(true);
    }

    public function add(): \Illuminate\Contracts\View\View
    {
        $page_title = 'Yeni Kullanıcı Ekle';
        $page_description = 'Yeni kullanıcı ekleyebilirsiniz.';

        $user_groups = UserGroup::all();

        return view('backend.users.add', compact('page_title', 'page_description', 'user_groups')); //phpcs:ignore
    }

    public function update(int $user_id): \Illuminate\Contracts\View\View
    {
        $page_title = 'Kullanıcı Düzenle';
        $page_description = 'Seçtiğiniz kullanıcıyı düzenleyebilirsiniz.';

        $user_groups = UserGroup::all();

        $detail = User::find($user_id);

        return view('backend.users.add', compact('page_title', 'page_description', 'detail', 'user_groups')); //phpcs:ignore
    }

    public function save(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $this->request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'user_group' => 'required',
        ]);

        $niceNames = array(
            'name' => 'İsim',
            'email' => 'Email',
            'password' => 'Şifre',
            'user_group' => 'Kullanıcı Türü',
        );

        $validator->setAttributeNames($niceNames);

        if ($validator->fails()) {
            return response()->json([
                'message' => error_formatter($validator),
                'errors' => $validator->errors(),
            ]);
        }

        if (isset($data['id'])) {
            $user = User::find($data['id']);
        } else {
            $user = new User();
        }
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->group_id = $data['user_group'];
        $user->save();

        $result = array(
            'status' => 1,
            'redirect' => route('user-index'),
            'message' => 'Başarıyla kaydettiniz.'
        );
        return response()->json($result);
    }

    public function delete(int $user_id): \Illuminate\Http\JsonResponse
    {
        $user = User::find($user_id);
        $user->delete();

        $result = array(
            'status' => 1,
            'message' => 'Başarıyla sildiniz'
        );

        return response()->json($result);
    }
}
