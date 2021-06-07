<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\News;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
   
    private $setting;
    private $slider;
    private $category;
    private $product;
    private $news;

    public function __construct(Setting $setting,Slider $slider,Category $category,Product $product, News $news){
    	$this -> setting = $setting;
    	$this -> slider = $slider;
    	$this -> category = $category;
    	$this -> product =$product;
        $this -> news = $news;
    }
    public function home(){
    	//get setting
    	$settings = $this -> setting -> select('setting_key','setting_value') -> where('is_active',1) ->whereNotIn('id',[6,7])->get();
    	//get slider
    	$sliders = $this -> slider -> select('name','nametwo','namethree','namefour','image_name') -> where('is_active',1) -> get();
    	//get category
    	$categories = $this -> category -> select('id','image','title') -> where('is_active',1) -> get();
    	
    	//get product featured
    	$products_featured = $this -> product -> with('category') -> where('is_active',1) -> where('noi_bat',1) -> latest() -> take(5) -> get();

    	//get 3 product latest 
    	$products_latest = $this -> product  -> select('id','image','title','price','new','discount','pro_total_rating','pro_total_number') -> where('is_active',1) ->latest() -> take(3) -> get();

    	//get product bán chạy 

        $products_selling = $this -> product -> leftJoin('categories','products.category_id','=','categories.id')
        ->leftJoin('orders_products','products.id','=','orders_products.product_id')
        
        ->selectRaw('categories.title catTitle,categories.id catId,products.id,products.title,products.product_code,products.image,products.price,products.new,products.discount,products.pro_total_number,products.pro_total_rating,orders_products.product_id idOrder, COALESCE(sum(orders_products.product_qty),0) total')
        ->groupByRaw('catTitle,catId,idOrder,products.id,products.id,products.title,products.product_code,products.image,products.price,products.new,products.discount,products.pro_total_number,products.pro_total_rating')

        ->orderBy('total','desc')
        ->where('products.is_active',1)
        
        
        ->get(); 

    	//get 3 product rating cao
    	//$products_rate = $this -> product -> select('id','image','title','price','new','discount','pro_total_rating','pro_total_number') -> where('is_active',1) -> orderByRaw('pro_total_number / pro_total_rating DESC') -> take(3) -> get();
        $products_rate = $this -> product -> select('id','image','title','price','new','discount','pro_total_rating','pro_total_number') -> where('is_active',1)  -> take(3) -> get();

    	//get 3 product giảm giá
    	$products_sale = $this -> product  -> select('id','image','title','price','new','discount','pro_total_rating','pro_total_number') -> where('is_active',1) -> where('discount','<>',0) ->latest() -> take(3) -> get();

        //get news latest 
        $news = $this -> news  -> select('id','image_name','title','description') -> where('is_active',1) ->latest() -> take(2) -> get();

        // count review
        $review_count = $this -> product -> withCount('reviews')->get();

        

    	return view('frontend.home.home',compact('settings','sliders','categories','products_featured','products_latest','products_selling','products_rate','products_sale','news','review_count'));
    }

    public function searchProducts(Request $request){

        $keyword = $request-> search_product;
        if($request -> search_product){
            $products = $this -> product -> where('title', 'like', "%" . $keyword . "%") -> orWhere('description', 'like', "%" . $keyword . "%") -> paginate(10);
            return view('frontend.product.search',compact('products','keyword'));
        }

    }
}
