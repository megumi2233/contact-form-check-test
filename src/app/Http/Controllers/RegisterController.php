namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
public function showForm()
{
return view('auth.register');
}

public function register(Request $request)
{
$validated = $request->validate([
'name' => 'required|string|max:50',
'email' => 'required|email|unique:users,email',
'password' => 'required|string|min:8',
], [
'name.required' => 'お名前を入力してください',
'email.required' => 'メールアドレスを入力してください',
'email.email' => 'メールアドレスはメール形式で入力してください',
'email.unique' => 'このメールアドレスは既に登録されています',
'password.required' => 'パスワードを入力してください',
'password.min' => 'パスワードは8文字以上で入力してください',
]);

// ユーザー作成
User::create([
'name' => $validated['name'],
'email' => $validated['email'],
'password' => bcrypt($validated['password']),
]);

return redirect()->route('login')->with('success', '登録が完了しました');
}
}