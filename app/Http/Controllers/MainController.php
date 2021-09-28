<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertise;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(){
    	$advertises = Advertise::where('expire', '>', date('YY-m-d'))->with(['cat', 'creator'])->orderBy('created_at', 'DESC')/*->take(10)->get()*/;
        $categories = Category::get(['id', 'title']);
    	// return $advertises;
        return view('main', ['advertises' => $advertises->simplePaginate(4), 'categories' => $categories]);
    }

    public function search(Request $req){
        // dd($req->input());
        $ph = '%' . $req->input('search-field') . '%';
        $advertises = Advertise::where('advertises.title', 'LIKE', $ph)->orWhere('advertises.note', 'LIKE', $ph)->with(['cat', 'creator'])->orderBy('advertises.created_at', 'DESC')/*->take(10)->get()*/;
        // return $advertises/*->get()->collect(['advertises.*'])*/;
        return view('search', ['advertises' => $advertises->simplePaginate(4)]);
    }

    public function getMyAds(){
        $advertises = Advertise::where('expire', '>', date('YY-m-d'))->with(['cat'])->without(['creator'])->where('user', Auth::id())->orderBy('created_at', 'DESC');
        return view('main', ['advertises' => $advertises->simplePaginate(4)]);
    }

    public function getAds($id){
        $creditional = ['id' => $id];
        $related = [];
        $advertise = Advertise::where('expire', '>', date('YY-m-d'))->with(['cat', 'creator'])->where($creditional)->first();
        if($advertise)
            $related = Advertise::where('category', '=', $advertise->category)->with(['creator'])->take(4)->get();
        // return [/*$related,*/ $advertise->];
        return view('view-ads', ['advertise' => $advertise, 'related' => $related]);
        // return $advertise;
    }

    public function getAdvertisesByCategory($id){
        $creditional = ['category' => $id];
        $advertises = Advertise::where('expire', '>', date('YY-m-d'))->with('creator')->without('cat')->where($creditional)->orderBy('created_at', 'DESC');
        // return [$advertises];
        $categories = Category::orderBy('created_at', 'DESC')->get(['id', 'title']);
        // return $advertises;
        return view('main', ['advertises' => $advertises->simplePaginate(4), 'categories' => $categories]);
    }

    public function createAdvertises(){
    	$advertises = [];
    	for ($i=0; $i < 10; $i++) { 
    		$advertise = [
    			'title' => floor(rand()),
    			'note' => floor(rand()),
    			'category' => floor(rand()) % 100,
    			'amount' => floor(rand()),
                'user' => floor(rand()) % 10 + 1,
    			'expire' => date('YY-m-d')
    		];
    		$advertises[] = $advertise;
    		Advertise::create($advertise);
    	}
    	return $advertises;
    }

    public function saveAdvertise(Request $req){
            $spec_titles = $req->input('spec_title');
            $spec_values = $req->input('spec_value');

            $len = count($spec_titles);
            // return [$spec_titles, $spec_values ,$len];
            $specs = [];
            for($i = 0; $i < $len; $i++){
                $specs[] = [
                    'title' => $spec_titles[$i],
                    'value' => $spec_values[$i],
                ];
            }

            $fields = ['title' => $req->input('title'), 'category' => $req->input('category'), 'note' => $req->input('note'), 'amount' => $req->input('amount'), 'user' => Auth::id(), 'specs' => json_encode($specs), 'expire' => date('Y-m-d H:m:s',strtotime('+30 days',strtotime('now')))];
            Advertise::insert($fields);
        return redirect('/advertises');
    }

    public function createAdvertise(){
            $categories = Category::get(['title', 'id']);
            return view('create-advertise', ['categories' => $categories]);
    }

    public function createCategories(){
        $Categories = [];
        for ($i=0; $i < 10; $i++) { 
            $category = [
                'title' => floor(rand()),
                'note' => floor(rand())
            ];
            $Categories[] = $category;
            Category::create($category);
        }
        return $Categories;
    }
}
