<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class ContactTestController extends Controller
{
    /**
     * フォーム入力ページを表示
     */
    public function index()
    {

        $categories = Category::all(); // ← categoriesテーブルから全件取得
        return view('inquiry.form', compact('categories'));
    }

    /**
     * 確認ページを表示
     */
    public function confirm(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'last_name'   => 'required|string|max:50',
            'first_name'  => 'required|string|max:50',
            'email'       => 'required|email',
            'tel'         => 'required',
            'address'    => 'required|string|max:255',
            'building'   => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'gender'      => 'required|in:male,female,other',
            'message'     => 'required|max:120',
        ], [
            'category_id.required' => 'お問い合わせの種類を選択してください',
            'message.required'     => 'お問い合わせ内容を入力してください',
            'message.max'          => 'お問い合わせ内容は120文字以内で入力してください',
            'gender.required'      => '性別を選択してください',
            'gender.in'            => '性別は「男性・女性・その他」から選択してください',
            'email.required'       => 'メールアドレスを入力してください',
            'email.email'          => 'メールアドレスはメール形式で入力してください',
        ]);

        // 氏名をまとめる（DBに name カラムがある場合）
        $validated['name'] = $validated['last_name'] . ' ' . $validated['first_name'];

        // 「戻る」ボタンが押された場合
        if ($request->input('action') === 'back') {
            return redirect()->route('inquiry.form')->withInput();
        }

        // ★ category_id からカテゴリ名を取得
        $category = Category::find($validated['category_id']);
        $categoryName = $category ? $category->content : '';

        // 確認画面を表示
        return view('inquiry.confirm', [
            'inputs' => $validated,
            'categoryName' => $categoryName,
        ]);
    }
    /**
     * 完了ページを表示
     */
    public function thanks(Request $request)
    {
        $data = $request->validate([
            'first_name'  => 'required',
            'last_name'   => 'required',
            'gender'      => 'required',
            'email'       => 'required|email',
            'tel'         => 'required',
            'address'     => 'required',
            'building'    => 'nullable|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'message'     => 'required|max:120',
        ]);

        Contact::create([
            'last_name'   => $data['last_name'],
            'first_name'  => $data['first_name'],
            'email'       => $data['email'],
            'tel'         => $data['tel'],
            'gender'      => $data['gender'],
            'address'     => $data['address'],
            'building'    => $data['building'] ?? null,
            'category_id' => $data['category_id'],
            'detail'      => $data['message'], // DBは detail カラム
        ]);

        return view('inquiry.thanks');
    }
}
