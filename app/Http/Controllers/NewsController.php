<?php
namespace App\Http\Controllers;
use Auth;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class NewsController extends Controller
{
    public function __construct(Request $request){
        $this->middleware('auth');
    }
    public function home(){
      return view('app');
    }
    public function logout(Request $request){
      Auth::logout();
      return redirect()->route('login');
    }
    public function listnews(Request $request){
      $data["message"] = "保存されました。";
      $data["code"] = 1;
      $list = News::query();
      if($request->get('search')) {
        $search = $request->get('search');
        $list = $list->where('title', 'like', "%{$search}%");
      }
      $list = $list->orderBy('created_at', 'desc')->get();
      $data['response'] = $list;
      return response()->json($data, 200);
    }
    public function store(Request $request){
      $news = new News();
      $news->fill($request->get('news'));
      $news->save();

      $data["message"] = "保存されました。";
      $data["code"] = 1;

      return response()->json($data, 200);
    }

    public function update(Request $request, $id){
      $data["message"] = "情報です。";
      $data["code"] = 1;
      $data["response"] = News::find($id);
      return response()->json($data, 200);
    }

    public function save(Request $request, $id){
      $news = News::find($id);
      $news->fill($request->get('news'));
      $news->save();
      $data["message"] = "保存されました。";
      $data["code"] = 1;
      return response()->json($data, 200);
    }

    public function delete(Request $request, $id){
      $news = News::find($id);
      $news->delete();
      $data["message"] = "削除されました。";
      $data["code"] = 1;
      return response()->json($data, 200);
    }
}
			