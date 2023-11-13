<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
use App\Models\Model\Category;
use App\Models\Model\Product;
use App\Models\Model\customer;
use App\Models\Model\Partition;
use App\Models\Model\bill;
use App\Models\Model\Img;
use App\Models\Model\contact;
use App\Models\Model\Rate;
use App\Models\Model\infouser;
use App\Models\Model\sigin;
use App\Models\Model\detail_bill;
use App\Models\Model\stock;
use App\Models\Model\status;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\EditCateRequest;
use App\Http\Requests\contactRequest;
use App\Http\Requests\PayRequest;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;
use App\cart;
use Carbon\Carbon;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $data['slider'] = DB::table('be_products')->join('stock','be_products.prod_id','=','stock.stock_prod')->inRandomOrder()->take(6)->get();
    $data['news'] = DB::table('be_products')->join('stock','be_products.prod_id','=','stock.stock_prod')->orderBy('prod_id','desc')->take(6)->get();
    $data['categorie'] = Category::all();
    return view('frontend.home',$data);
});

Route::post('/',function(contactRequest $request){
    $contact = new contact;
    $contact->cont_name = $request->name;
    $contact->cont_email = $request->email;
    $contact->cont_text = $request->text;
    $contact->save();
    return back();
});
Route::post('/sigin',function(Request $request){
    $sigin = new sigin;
    $sigin->sigin_email = $request->emailsigin;
    $data = sigin::where('sigin_email',$request->emailsigin)->count();
    if($request->emailsigin != NULL && $data == 0){
        $sigin->save();
    }
    return back();
});

Route::get('detail{id}/{slug}.html',function($id){
    $data['item'] = Product::find($id);
    $data['stock'] = stock::where('stock_prod', $id)->first();
    $data['order'] = detail_bill::where('dtail_pord', $id)->join('order_bill','detail_order.dtail_bill','=','order_bill.bill_id')->where('bill_sta',4)->sum('dtail_quantity');
    $a = Product::where('prod_id', $id)->value('prod_cate');
    $data['cate'] = Category::find($a);
    $data['ratecount'] = Rate::where('rate_prod', $id)->count();
    $data['slider1'] = DB::table('be_products')->join('stock','be_products.prod_id','=','stock.stock_prod')->inRandomOrder()->take(4)->get();
    $data['slider2'] = DB::table('be_products')->join('stock','be_products.prod_id','=','stock.stock_prod')->inRandomOrder()->take(4)->get();
    $data['slider3'] = DB::table('be_products')->join('stock','be_products.prod_id','=','stock.stock_prod')->inRandomOrder()->take(4)->get();
    $data['rate']= DB::table('rate')->join('customer','rate.rate_cus','=','customer.cus_id')->where('rate_prod', $id)->orderBy('rate_id','desc')->Paginate(3);
    if(Auth::check()){
        $data['bill']= DB::table('detail_order')->join('order_bill','detail_order.dtail_bill','=','order_bill.bill_id')->where('bill_sta',4)->where('bill_cus',Auth::user()->cus_id)->where('dtail_pord',$id)->get();
    }
    $data['img'] = Img::where('img_prod',$id)->get();

    return view('frontend.detail',$data);
});

Route::post('detail{id}/{slug}.html',function(Request $request, $id ){
    $rate = new Rate;
    $rate->rate_star = $request->star;
    $rate->rate_text = $request->note;
    $rate->rate_date = Carbon::now()->format('d-m-Y');
    $rate->rate_prod = $id;
    $rate->rate_cus = Auth::user()->cus_id;
    $rate->save();
    return back();
});

Route::get('category{id}/{slug}.html',function($id){
    $data['cate'] = Category::find($id);
    $data['item'] = DB::table('be_products')->join('stock','be_products.prod_id','=','stock.stock_prod')->where('prod_cate',$id)->orderBy('prod_name','asc')->Paginate(4);
    $data['name'] = "A-Z";
    return view('frontend.category',$data);
});
Route::get('category{id}/{slug}.html/new',function($id ){
    $data['cate'] = Category::find($id);
    $data['item'] = DB::table('be_products')->join('stock','be_products.prod_id','=','stock.stock_prod')->where('prod_cate',$id)->orderBy('prod_id','desc')->Paginate(4);
    $data['name'] = "Mới nhất";
    return view('frontend.category',$data);
});
Route::get('category{id}/{slug}.html/old',function($id ){
    $data['cate'] = Category::find($id);
    $data['item'] = DB::table('be_products')->join('stock','be_products.prod_id','=','stock.stock_prod')->where('prod_cate',$id)->orderBy('prod_id','asc')->Paginate(4);
    $data['name'] = "Cũ nhất";
    return view('frontend.category',$data);
});
Route::get('category{id}/{slug}.html/priceReduce',function($id ){
    $data['cate'] = Category::find($id);
    $data['item'] = DB::table('be_products')->join('stock','be_products.prod_id','=','stock.stock_prod')->where('prod_cate',$id)->orderBy('prod_price','desc')->Paginate(4);
    $data['name'] = "Giá từ cao đến thấp";
    return view('frontend.category',$data);
});
Route::get('category{id}/{slug}.html/priceIncrease',function($id ){
    $data['cate'] = Category::find($id);
    $data['item'] = DB::table('be_products')->join('stock','be_products.prod_id','=','stock.stock_prod')->where('prod_cate',$id)->orderBy('prod_price','asc')->Paginate(4);
    $data['name'] = "Giá từ thấp đến cao";
    return view('frontend.category',$data);
});
Route::get('category{id}/{slug}.html/A-Z',function($id ){
    $data['cate'] = Category::find($id);
    $data['item'] = DB::table('be_products')->join('stock','be_products.prod_id','=','stock.stock_prod')->where('prod_cate',$id)->orderBy('prod_name','asc')->Paginate(4);
    $data['name'] = "A-Z";
    return view('frontend.category',$data);
});

Route::get('new',function(){
    $data['news'] = DB::table('be_products')->join('stock','be_products.prod_id','=','stock.stock_prod')->orderBy('prod_id','desc')->take(12)->get();
    return view('frontend.categorynew',$data);
});

Route::get('menu',function(){
    $data['item']= DB::table('be_categories')->join('be_products','be_categories.cate_id','=','be_products.prod_cate')->get();
    $data['list'] = $data['item']->unique('prod_cate');
    $data['categorie'] = Category::all();
    return view('frontend.menu',$data);
});

Route::get('search',function(Request $request){
    $result = $request->result;
    $data['keyword'] = $result;
    $result = str_replace(' ','%',$result);
    $data['item'] = DB::table('be_products')->join('stock','be_products.prod_id','=','stock.stock_prod')->where('prod_name','like','%'.$result.'%')->get();

    return view('frontend.search',$data);
});

// Route::group(['prefix'=>'cart'],function(){
//     Route::get('add{id}',function($id){
//         $product = Product::find($id);
//         Cart::add($id, $product, 1, $product->pord_price, ['img' => $product->product_img]);
//         return back();
//     });
// });

Route::get('addcart{id}',function (Request $req, $id) {    
    $product = Product::find($id);
    if($product != null){
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart-> AddCart($product,$id);

        $req->Session()->put('Cart',$newCart);

    }
    return view('frontend.cart');
});


Route::get('deletecart{id}',function (Request $req, $id) {    
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart-> DeleteCart($id);

        if(Count($newCart->products) > 0){
            $req->Session()->put('Cart',$newCart);
        }
        else{
            $req->Session()->forget('Cart');
        }
        return view('frontend.cart');
});


Route::get('nextcart{id}',function (Request $req, $id) {
    $product = Product::find($id);
    $oldCart = Session('Cart') ? Session('Cart') : null;
    $newCart = new Cart($oldCart);
    $newCart-> NextCart($id);
    $req->Session()->put('Cart',$newCart);
    return view('frontend.cart');
});


Route::get('prevcart{id}',function (Request $req, $id) {
    $product = Product::find($id);
    $oldCart = Session('Cart') ? Session('Cart') : null;
    $newCart = new Cart($oldCart);
    $newCart-> PrevCart($id);
    $req->Session()->put('Cart',$newCart);
    return view('frontend.cart');
});


Route::get('cartmenu',function(){
    return view('frontend.cart-menu');
});

Route::get('pay',function(){
    if(Auth::check()){ 
        $data['user'] = infouser::where('info_cus',Auth::user()->cus_id)->first();
        return view('frontend.pay',$data);
    }
    else{
        return redirect()->intended('/login');
    }
});

Route::post('pay',function(PayRequest $request){
    
    if(isset($_POST['cod'])){
        $cart = Session::get('Cart');
    $bill = new bill;
    $bill->bill_name = $request->name;
    $bill->bill_phone = $request->phone;
    $bill->bill_address = $request->address;
    $bill->bill_note = $request->note;
    $bill->bill_total = $cart->totalPrice;
    $bill->bill_date = Carbon::now()->format('d-m-Y');
    $bill->bill_cus = Auth::user()->cus_id;
    $bill->bill_sta = 1;
    $bill->save();

   

    foreach($cart->products as $item){
        $bill_detai =new detail_bill;
        $bill_detai->dtail_quantity = $item['quanty'];
        $bill_detai->dtail_pord = $item['productInfo']->prod_id;
        $bill_detai->dtail_bill = $bill->bill_id;
        $bill_detai->save();

    } 
    
    foreach($cart->products as $item){
    $stock = new stock;
    $arr['stock_quantity'] = stock::where('stock_prod',$item['productInfo']->prod_id)->value('stock_quantity') - $item['quanty'];
    $stock::where('stock_prod',$item['productInfo']->prod_id)->update($arr);
    } 
    
    Session::forget('Cart');
    return redirect(asset('/order'.$bill->bill_id));
    }
    elseif(isset($_POST['redirect'])){
        $cart = Session::get('Cart');
        $bill = new bill;
        $bill->bill_name = $request->name;
        $bill->bill_phone = $request->phone;
        $bill->bill_address = $request->address;
        $bill->bill_note = $request->note;
        $bill->bill_total = $cart->totalPrice;
        $bill->bill_date = Carbon::now()->format('d-m-Y');
        $bill->bill_cus = Auth::user()->cus_id;
        $bill->bill_sta = 1;
        $bill->save();
    
       
    
        foreach($cart->products as $item){
            $bill_detai =new detail_bill;
            $bill_detai->dtail_quantity = $item['quanty'];
            $bill_detai->dtail_pord = $item['productInfo']->prod_id;
            $bill_detai->dtail_bill = $bill->bill_id;
            $bill_detai->save();
    
        } 
        
        
        foreach($cart->products as $item){
        $stock = new stock;
        $arr['stock_quantity'] = stock::where('stock_prod',$item['productInfo']->prod_id)->value('stock_quantity') - $item['quanty'];
        $stock::where('stock_prod',$item['productInfo']->prod_id)->update($arr);
        } 
        Session::forget('Cart');
        Session::save();

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8888/doan/user";
        $vnp_TmnCode = "CGXZLS0Z";//Mã website tại VNPAY 
        $vnp_HashSecret = "XNBCJFAKAZQSGTARRLGCHVZWCIOIGSHN"; //Chuỗi bí mật
        
        $vnp_TxnRef = $bill->bill_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Noi dung thanh toan';
        $vnp_OrderType = 'billpay';
        $vnp_Amount = $bill->bill_total * 100;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );
        
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
            // vui lòng tham khảo thêm tại code demo
            
        
    }
    
});

Route::get('user',function(){
    // DB::table('order_bill')->join('status','order_bill.bill_sta','=','status.sta_id')
    $data['users'] = infouser::where('info_cus',Auth::user()->cus_id)->first();
    $data['user'] = DB::table('order_bill')->join('status','order_bill.bill_sta','=','status.sta_id')->where('bill_cus',Auth::user()->cus_id)->orderBy('bill_id','desc')->Paginate(8);
    return view('frontend.user',$data);
});

Route::get('useredit',function(){
    Auth::user()->cus_id;
    $data['user'] = infouser::where('info_cus',Auth::user()->cus_id)->first();
    return view('frontend.useredit',$data);
});

Route::get('status{id}',function($id){        
    $order = bill::find($id);
    $order->bill_sta = 5;
    $order->save();
    foreach(detail_bill::where('dtail_bill',$id)->get() as $item){
        $stock = new stock;
        $arr['stock_quantity'] = stock::where('stock_prod',$item->dtail_pord)->value('stock_quantity') + $item->dtail_quantity;
        $stock::where('stock_prod',$item->dtail_pord)->update($arr);
    } 
    return back();
});

Route::get('password',function(){
    Auth::user()->cus_id;
    return view('frontend.password');
});

Route::post('password',function(PasswordRequest $request){   
    $user = customer::find(Auth::user()->cus_id);
    $user->password = bcrypt($request->password);
    $user->save();
    return redirect('/user');
    
});

Route::post('useredit',function(EditUserRequest $request){          
    // $user = new customer;
    $user = customer::find(Auth::user()->cus_id);
    $user->cus_name = $request->name;
    $user->cus_slug = str_slug($request->name);
    $user->cus_email = $request->email;

    if($request->hasFile('img')){
            $img = $request->img->getClientOriginalName();
            $user->cus_img = $img;
            $request->img->storeAs('avataruser',$img);
            Storage::delete('avataruser/'.Auth::user()->cus_img);
        }
    $user->save();


    $users =  infouser::where('info_cus',Auth::user()->cus_id)->first();
    $users->phone = $request->phone;
    $users->address = $request->address;
    $users->save();

    return redirect('/user');
});

Route::get('register',function(){
    return view('backend.sigin');
});
Route::post('register',function(AddUserRequest $request){         
    $user = new customer;
    $user->cus_name = $request->name;
    $user->cus_email = $request->email;
    $user->cus_slug = str_slug($request->name);
    $user->password =bcrypt($request->password);
    $user->cus_par = 2;
    $user->save();

    $users = new infouser;
    $users->info_cus = $user->cus_id;
    $users->save();
    return redirect('/login');
});
Route::get('about',function(){
    return view('frontend.about');
});

Route::get('order{id}',function($id){
    $data['bill'] = bill::find($id);
    $data['detai'] = detail_bill::where('dtail_bill',$id)->get();
    $data['list']= DB::table('detail_order')->join('be_products','detail_order.dtail_pord','=','be_products.prod_id')->where('dtail_bill',$id)->get();
    $data['status']= DB::table('detail_order')->join('order_bill','detail_order.dtail_bill','=','order_bill.bill_id')->where('dtail_bill',$id)->first();
    return view('frontend.order',$data);
});


Route::get('img/delete{id}',function($id){        
    Img::destroy($id);
    return back();
});

Route::get('faq',function(){
    return view('frontend.faq');
});

Route::get('contact',function(){
    return view('frontend.contact');
});
Route::post('contact',function(contactRequest $request){         
    $contact = new contact;
    $contact->cont_name = $request->name;
    $contact->cont_email = $request->email;
    $contact->cont_text = $request->text;
    $contact->save();

    return back();
});
Route::post('faq',function(contactRequest $request){         
    $contact = new contact;
    $contact->cont_name = $request->name;
    $contact->cont_email = $request->email;
    $contact->cont_text = $request->text;
    $contact->save();

    return back();
});




Route::group(['prefix'=>'login','middleware'=>'CheckLogedIn'],function(){
        Route::get('/',function(){
            return view('backend.login');
        });
        Route::post('/',function(Request $request){
            $arr =['cus_email'=> $request->email,'password'=> $request->password];
            if(Auth::attempt($arr) && Auth::user()->cus_par == 2){
                return redirect()->intended('/');
            }else{
                return back()-> withInput()->with('error','Tài khoản hoặc mật khẩu không đúng');
            }
        });
    });


    Route::get('logout',function(){
        Auth::logout();
        return redirect()->intended('/');
    });
    Route::group(['prefix'=>'admin'],function(){
        Route::group(['prefix'=>'login'],function(){
            Route::get('/',function(){
                return view('backend.loginadmin');
            });
            Route::post('/',function(Request $request){
                $arr =['cus_email'=> $request->email,'password'=> $request->password];
                if(Auth::attempt($arr) && Auth::user()->cus_par == 1){
                    return redirect()->intended('admin/home');
                }else{
                    return back()-> withInput()->with('error','Tài khoản hoặc mật khẩu không đúng');
                }
            });
        });
    });
    
    Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'],function(){
        Route::get('home',function(){
            $data['prod'] = Product::count();
            $data['cate'] = Category::count();
            $data['cus'] = customer::count();
            $data['bill'] = bill::count();
            $data['sum'] = bill::where('bill_sta',4)->sum('bill_total');
            return view('backend.index',$data);
        });

        Route::group(['prefix'=>'category'],function(){
            Route::get('/',function(){                            
                $data['catelist'] = Category::all();
                return view('backend.category',$data);
            });

            Route::post('/',function(AddCateRequest $request){         
                $category = new Category;
                $category->cate_name = $request->name;
                $category->cate_slug = str_slug($request->name);
                $category->save();
                return back();
            });

            Route::get('edit{id}',function($id){      
                $data['cate'] = Category::find($id);
                return view('backend.editcategory',$data);
            });

            Route::post('edit{id}',function(EditCateRequest $request,$id){         
                $category = Category::find($id);
                $category->cate_name = $request->name;
                $category->cate_slug = str_slug($request->name);
                $category->save();
                return redirect()->intended('admin/category');
            });
            Route::get('delete{id}',function($id){        
                Category::destroy($id);
                return back();
            });
        });


        Route::group(['prefix'=>'product'],function(){
            Route::get('/',function(){                            
                $data['productlist']= DB::table('be_products')->join('be_categories','be_products.prod_cate','=','be_categories.cate_id')->orderBy('prod_id','desc')->get();
                return view('backend.product',$data);
            });
            

            Route::get('add',function(){                         
                $data['catelist'] = Category::all();
                
                return view('backend.addproduct',$data);
            });
            Route::post('add',function(AddProductRequest $request){         
                $filename = $request->img->getClientOriginalName();
                $product = new Product;
                $product->prod_name = $request->name;
                $product->prod_slug = str_slug($request->name);
                $product->prod_img = $filename;
                $product->prod_price = $request->price;
                $product->prod_size = $request->size;
                $product->prod_materials = $request->materials;
                $product->prod_description = $request->description;
                $product->prod_cate = $request->cate;
                $product->save();
                $request->img->storeAs('avatar',$filename);

                $stock = new stock;
                $stock->stock_quantity = 0;
                $stock->stock_prod = $product->prod_id;
                $stock->save();
                return redirect('admin/product');
            });


            Route::get('edit{id}',function($id){                                 
                $data['product'] = Product::find($id);
                $data['listcate'] = Category::all();
                $data['img'] = Img::where('img_prod',$id)->get();
                return view('backend.editproduct',$data);
               
            });
            Route::post('edit{id}',function(Request $request,$id){          
                $product = new Product;
                $arr['prod_name'] = $request->name;
                $arr['prod_slug'] = str_slug($request->name);
                $arr['prod_price'] = $request->price;
                $arr['prod_size'] = $request->size;
                $arr['prod_materials'] = $request->materials;
                $arr['prod_description'] = $request->description;
                $arr['prod_cate'] = $request->cate;

                if($request->hasFile('img')){
                    $img = $request->img->getClientOriginalName();
                    $arr['prod_img'] = $img;
                    $request->img->storeAs('avatar',$img);
                    Storage::delete('avatar/'.Product::find($id)->prod_img);

                }
                if($request->hasFile('images')){
                    foreach ($request->file('images') as $imagefile) {
                        $imgs = new Img;
                        $imgs->img_prod = $id;
                        $imgs->imgnames = $imagefile->getClientOriginalName();
                        $imagefile->storeAs('img',$imagefile->getClientOriginalName());
                        $imgs->save();
                    }
                }
                $product::where('prod_id',$id)->update($arr);
                return redirect('admin/product');
               
            });


            Route::get('delete{id}',function($id){       
                Product::destroy($id);
                return back();
            });
            
        });

        Route::group(['prefix'=>'user'],function(){
            Route::get('/',function(){                            
                $data['userlist']= DB::table('customer')->join('be_partition','customer.cus_par','=','be_partition.par_id')->orderBy('cus_id','desc')->get();
                return view('backend.admin',$data);
            });
            
            Route::get('add',function(){                         
                $data['userlist'] = Partition::all();
                return view('backend.adduser',$data);
            });

            Route::post('add',function(AddUserRequest $request){         
                $filename = $request->img->getClientOriginalName();
                $user = new customer;
                $user->cus_name = $request->name;
                $user->cus_email = $request->email;
                $user->cus_slug = str_slug($request->name);
                $user->cus_img = $filename;
                $user->password =bcrypt($request->passwords);
                $user->cus_par = $request->par;
                $user->save();
                $users = new infouser;
                $users->info_cus = $user->cus_id;
                $users->save();
                $request->img->storeAs('avataruser',$filename);
                return redirect('admin/user');
            });

            Route::get('edit{id}',function($id){                                 
                $data['user'] = customer::find($id);
                $data['userlist'] = Partition::all();
                $data['users'] = infouser::where('info_cus',$id)->first();
                return view('backend.edituser',$data);
               
            });

            Route::post('edit{id}',function(Request $request,$id){         
                $user = new customer;
                $arr['cus_name'] = $request->name;
                $arr['cus_slug'] = str_slug($request->name);
                $arr['cus_email'] = $request->email;
                if($request->password == customer::where('cus_id',$id)->value('password'))
                {
                    $arr['password'] = $request->password;
                }
                else
                {
                    $arr['password'] = bcrypt($request->password);
                }
                $arr['cus_par'] = $request->par;

                 if($request->hasFile('img')){
                    $img = $request->img->getClientOriginalName();
                    $arr['cus_img'] = $img;
                    $request->img->storeAs('avataruser',$img);
                }
                $users = new infouser;
                $arrs['phone'] = $request->phone;
                $arrs['address'] = $request->address;
                $arrs['info_cus'] = $id;


                $user::where('cus_id',$id)->update($arr);
                $users::where('info_cus',$id)->update($arrs);
                return redirect('admin/user');
               
            });

            Route::get('delete{id}',function($id){        
                customer::destroy($id);
                return back();
            });

           

        });
        Route::get('rate/delete{id}',function($id){
            Rate::destroy($id);
            return back();
        });
        

        Route::group(['prefix'=>'bill'],function(){
            Route::get('/',function(){   
                $data['statuslist'] = status::all();   
                $data['userlist']= DB::table('order_bill')->join('status','order_bill.bill_sta','=','status.sta_id')->join('customer','order_bill.bill_cus','=','customer.cus_id')->orderBy('bill_id','desc')->get();
                return view('backend.bill',$data);
            });
            Route::get('detail{id}',function($id){                                 
                $data['bill'] = bill::find($id);
                $data['user'] = bill::find($id)->bill_cus;
                $data['detai'] = detail_bill::where('dtail_bill',$id)->get();
                $data['list']= DB::table('detail_order')->join('be_products','detail_order.dtail_pord','=','be_products.prod_id')->where('dtail_bill',$id)->get();
                $data['rates'] = DB::table('detail_order')->join('be_products','detail_order.dtail_pord','=','be_products.prod_id')->where('dtail_bill',$id)->join('rate','be_products.prod_id','=','rate.rate_prod')->get();
                return view('backend.detailbill',$data);
               
            });

            Route::get('delete{id}',function($id){        
                bill::destroy($id);
                return back();
            });

            Route::get('status{id}/{sta}',function($id ,$sta){        
                $order = bill::find($id);
                $order->bill_sta = $sta;
                $order->save();
                if($sta == 5){
                    foreach(detail_bill::where('dtail_bill',$id)->get() as $item){
                        $stock = new stock;
                        $arr['stock_quantity'] = stock::where('stock_prod',$item->dtail_pord)->value('stock_quantity') + $item->dtail_quantity;
                        $stock::where('stock_prod',$item->dtail_pord)->update($arr);
                    } 
                }
                return back();
            });
            
        });

        Route::group(['prefix'=>'contact'],function(){
            Route::get('/',function(){      
                $data['contact']= contact::all();
                return view('backend.contact',$data);
            });

            Route::get('delete{id}',function($id){        
                contact::destroy($id);
                return back();
            });
        });
        Route::group(['prefix'=>'siginuser'],function(){
            Route::get('/',function(){      
                $data['sigin']= sigin::all();
                return view('backend.siginuser',$data);
            });
        });

        Route::group(['prefix'=>'stock'],function(){
            Route::get('/',function(){   
                $data['stocklist']= DB::table('stock')->join('be_products','stock.stock_prod','=','be_products.prod_id')->orderBy('stock_quantity','desc')->get();
                return view('backend.stock',$data);
            });
            Route::get('edit{id}',function($id){        
                $data['stock']= stock::find($id);
                return view('backend.addstock',$data);
            });
            Route::post('edit{id}',function(Request $request,$id){ 
                $stock = new stock;
                $arr['stock_quantity'] = $request->quantity;
                $stock::where('stock_id',$id)->update($arr);
                return redirect('admin/stock');
            });
              
        });
        
        
        
    });
