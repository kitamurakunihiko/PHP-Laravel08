<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profile;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }

    
    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);
        
          $profile = new Profile;
          $form = $request->all();
         
         unset($form['_token']);
         
         $profile->fill($form);
         $profile->save();
        
        return redirect('admin/profile/create');
    }
    
    
    public function edit(Request $request)
    {
        // Modelからデータを取得する
        $profile = Profile::find($request->id);
        if (empty($profile)) {
          abort(404);    
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }


    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Profile::$rules);
        // Modelからデータを取得する
        $profile = Profile::find($request->id);
        // 送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        unset($profile_form['_token']);

        // 該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();

        return redirect('admin/news');
    }
    
//     プロフィール一覧が必要な場合
//     public function index(Request $request)
//     {
//         $cond_title = $request->cond_title;
//         if ($cond_title != '') {
//             // 検索されたら検索結果を取得する
//             $posts = News::where('title', $cond_title)->get();
//         } else {
//             // それ以外はすべてのニュースを取得する
//             $posts = News::all();
//         }
//         return view('admin.news.index', ['posts' => $posts, 'cond_title' => $cond_title]);
//   }
    

}