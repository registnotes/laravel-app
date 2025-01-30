<?php



namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // ユーザー一覧を表示
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // ユーザー登録フォームを表示
    public function create()
    {
        return view('users.create');
    }

    // ユーザーを保存
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|string|unique:users,user_id',
            'user_name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'user_id' => $request->user_id,
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'ユーザーを登録しました');
    }
}

