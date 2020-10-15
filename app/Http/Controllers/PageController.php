<?php


namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail;
use App\Cart;
use App\Customer;
use App\Notification;
use App\ProductType;
use App\Slide;
use App\Product;
use App\User;
use App\View;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use mysql_xdevapi\Session;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class PageController extends BaseController
{
    public function getIndex()
    {
        $view = new View();
        $view->CheckView('Trang chủ');
        $slide = Slide::all();
        //return view('page.trangchu',['slide'=>$slide]); cach 1
        $new_product = Product::where('status', 2)->paginate(6);
        $sale_product = Product::where('promotion_price', '>', 0)->paginate(6);
//        dd($new_product);
        return view('page.trangchu', compact('slide', 'new_product', 'sale_product'));//cach 2
    }

    public function getAbout()
    {
        $view = new View();
        $view->CheckView('Giới thiệu');
        return view('page.about');
    }

    public function getCheckout()
    {
        $view = new View();
        $view->CheckView('Thanh toán');
        return view('page.checkout');
    }

    public function getContact()
    {
        $view = new View();
        $view->CheckView('Liên hệ');
        return view('page.contact');
    }

    public function postContact(Request $req)
    {
//        dd($req->all());
        $data = ['name' => $req->name, 'content' => $req->message_content, 'email' => $req->email, 'phone' => $req->phone];
//        dd($data['name']);
        Mail::send('mail.blanks', $data, function ($message) {
            $message->from('contraurung8426@gmail.com', 'Shop giày Yasuo');
            $message->to('contraurung8426@gmail.com', 'CC')->subject('Đây là Mail từ hộp thư liên hệ');
        });
        return redirect()->back()->with('success', 'Cám ơn bạn đã gửi ý kiến phản hồi đến trang web của chúng tôi');
    }

    public function getFaqs()
    {
        return view('page.faqs');
    }

    public function getProducts()
    {
        $view = new View();
        $view->CheckView('Sản phẩm');
        $product = Product::where('status', '<>', 0)->paginate(12);
//        $brand = Product::table('brand')->distinct()->get;
        $brand = Product::where('status', '>', 0)->distinct()->pluck('brand'); //lay ra tat ca trong cot 'brand' khong trung nhau
//        dd($brand);
        $typeproduct = ProductType::where('status', '>', 0)->get();
        return view('page.products', compact('product', 'brand', 'typeproduct'));
    }

    public function getTypeProduct($type)
    {
        $sp_theoloai = Product::where('id_type', $type)->where('status', '>', 0)->get();
        $ten_loai_sp = ProductType::where('id', $type)->where('status', '>', 0)->first();
//        dd($ten_loai_sp);
        return view('page.producttype', compact('sp_theoloai', 'ten_loai_sp'));
    }

    public function getShoppingcart()
    {
        $view = new View();
        $view->CheckView('Giỏ hàng');
        if (Session('cart')) {
            $oldCart = \Session::get('cart');
            $cart = new Cart($oldCart);
            return view('page.shoppingcart', ['cart' => \Session::get('cart'), 'product_cart' => $cart->items, 'totalPrice'
            => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
        }
        return view('page.shoppingcart');
    }

    public function getProductDetail(Request $req)
    {
        $product = Product::where('id', $req->id)->first();
//        dd($product->id);
        if (!isset($product)) {
            return 'Làm gì mà chỉnh trên thanh địa chỉ vậy??';
        }
        $related_product = Product::where('id', '<>', $product->id)->where('id_type', $product->id_type)->where('brand', $product->brand)->skip(0)->take(3)->get();
//        print_r($related_product);
        return view('page.productdetail', compact('product', 'related_product'));
    }

//    public function getAddtocart(Request $req, $id)
//    {
//        $product = Product::find($id);
//        $oldCart = \Session('cart') ? \Session::get('cart') : null;
//        //dd($oldCart);
//        $cart = new Cart($oldCart);
//        $cart->add($product, $product->id);
//        $req->session()->put('cart', $cart);
//        return redirect()->route('trang-chu');
//    }

    public function postAddtocart(Request $req)
    {
//        dd($req->id);
        $product = Product::find($req->id);
        $oldCart = \Session('cart') ? \Session::get('cart') : null;
        $cart = new Cart($oldCart);
//        dd($cart);
        $i = 0;
        while ($i != $req->qty) {
            $cart->add($product, $product->id);
            $i++;
        }
        $req->session()->put('cart', $cart);
        return redirect()->route('trang-chu');
    }

    public function getUpdatecart($id, Request $req)
    {
        $oldCart = \Session::has('cart') ? \Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->UpdateCart($id, $req->qty);
        if (count($cart->items) > 0) {
            \session::put('cart', $cart);
        } else {
            \Session::forget('cart');
        }
        return redirect()->back();
    }

    public function getDelItemcart($id)
    {
//        dd(\Session::get('cart')->items[4]['qty']);
        $oldCart = \Session::has('cart') ? \Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            \session::put('cart', $cart);
        } else {
            \Session::forget('cart');
        }
        return redirect()->back();
    }

    public function postCheckout(Request $req)
    {
//        dd($req->all());
        if (\Session::get('cart') != null) {
            foreach (\Session::get('cart')->items as $key => $value) {
                if ($value['item']->qty == 0) {
                    return redirect()->back()->with('error', 'Sản phẩm ' . $value['item']->name . ' 
                    đã hết hàng, mong quý khách lựa chọn sản phẩm khác hoặc đợi chúng tôi cập nhật hàng');
                }
                if ($value['item']->qty < $value['qty']) {
                    return redirect()->back()->with('error', 'Sản phẩm ' . $value['item']->name . ' 
                    chỉ còn ' . $value['item']->qty . ' đôi trong cửa hàng vui lòng thay đổi lại đơn hàng');
                }
            }
        }
        if (\Session::has('cart')) {
            $cart = \Session::get('cart');

            $customer = Customer::where('email', $req->email)->where('status', 2)->first();
//            dd($customer->name);
//            dd($req->all());
            if (empty($customer)) {
                $customer = new Customer();
                $customer->name = $req->name;
                $customer->email = $req->email;
                $customer->address = $req->address;
                $customer->phone_number = $req->phone_number;
                if (Auth::check()) {
                    $customer->status = 2;
                }
                $customer->save();
            }

            $bill = new Bill();
            $bill->id_customer = $customer->id;
            $bill->date_order = date('Y-m-d');
            $bill->total = $cart->totalPrice;
            $bill->payment = $req->payment;
            $bill->note = $req->note;
            $bill->save();

            foreach ($cart->items as $key => $value) {
                $bill_detail = new BillDetail();
                $bill_detail->id_bill = $bill->id;
                $bill_detail->id_product = $key;
                $bill_detail->quantity = $value['qty'];
                $bill_detail->unit_price = $value['price'] / $value['qty'];
                $bill_detail->save();
            }
            \Session::forget('cart');
            return redirect()->back()->with('thongbao', 'Đặt hàng thành công');
        }
        return redirect()->back()->with('error', 'Bạn chưa có sản phẩm trong giỏ hàng');
    }

    public function getSearch(Request $req)
    {
        $view = new View();
        $view->CheckView('Tìm kiếm');
//        dd($req->id_type);
        if ($req->id_type != null) {
            if ($req->sale != null) {
                $product = Product::where('id_type', $req->id_type)->where('brand', $req->brand)
                    ->where('unit_price', '>', $req->unit_price)->where('promotion_price', '>', 0)->get();
//                dd($product);
                return view('page.search', compact('product'));
            } else {
                $product = Product::where('id_type', $req->id_type)->where('brand', $req->brand)
                    ->where('unit_price', '>', $req->unit_price)->get();
                return view('page.search', compact('product'));
                dd($product);
            }
        }
        $product = Product::where('name', 'like', '%' . $req->keyword . '%')
            ->orwhere('unit_price', $req->keyword)->get();
        return view('page.search', compact('product'));
    }

    public function getSignUp()
    {
        $view = new View();
        $view->CheckView('Đăng ký');
        return view('page.signup');
    }

    public function postSignUP(Request $req)
    {
        $req->validate(
            [
                'email' => 'unique:users,email',
                'password' => 'required|min:6|max:24',
                're_password' => 'required|same:password'
            ],
            [
                'email.unique' => 'Email đã có người sử dụng',
                'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
                'password.max' => 'Mật khẩu tối đa là 24 ký tự',
                're_password.same' => 'Không trùng khớp ý với bé'
            ]);
        $user = new User();
        $user->full_name = $req->name;
        $user->email = $req->email;
        $user->phone_number = $req->phone;
        $user->password = Hash::make($req->password);
        $user->address = $req->address;
        $user->active_token = $req->_token;
        $user->save();
        //Mail kich hoat
        $data = ['name' => $req->name, 'token' => $req->_token];
        Mail::send('mail.active-account', $data, function ($message) {
            $message->from('contraurung8426@gmail.com', 'Shop giày Yasuo');
            $message->to('contraurung8426@gmail.com', 'Customer')->subject('Đây là Mail kích hoạt tài khoản Shop giày Yasuo');
        });
        return redirect()->back()->with('success', 'Tạo tài khoản thành công, để kích hoạt tài khoản vui lòng truy cập vào email vừa đăng ký để biết thêm chi tiết');
    }

    public function getSignIn()
    {
        $view = new View();
        $view->CheckView('Đăng nhập');
        return view('page.SignIn');
    }

    public function postSignIn(Request $req)
    {
        $credentials = ['email' => $req->email, 'password' => $req->password];
        if (Auth::attempt($credentials)) {
            if (Auth::user()->premission == "admin") {
                return redirect()->route('danhsach-sanpham');
            } else if (Auth::user()->status == 0) {
                Auth::logout();
                return redirect()->back()->with('error', 'Đăng nhập thất bại, tài khoản của bạn chưa được kích hoạt');
            } else if (Auth::user()->locked != 0) {
                Auth::logout();
                return redirect()->back()->with('error', 'Đăng nhập thất bại, tài khoản của bạn đã bị khóa bởi Admin do chỉ coi mà không mua');
            } else {
                return redirect()->route('trang-chu');
            }
        } else {
            return redirect()->back()->with('error', 'Đăng nhập thất bại, vui lòng kiểm tra lại tài khoản hoặc mật khẩu');
        }
    }

    public function getSignOut()
    {
        \Session::forget('cart');
        Auth::logout();
        return redirect()->route('trang-chu');
    }

    public function getForgetPassword()
    {
        return view('page.forgetpassword');
    }

    public function postForgetPassword(Request $req)
    {
//        dd($req->email);
        $user = User::where('email', $req->email)->first();
        if (empty($user)) {
            return redirect()->back()->with('error', 'Email không tồn tại');
        }
//        dd($user->id);
        $confirm = Notification::where('id_user', $user->id)->where('status', 0)->first();
        if (isset($confirm)) {
            return redirect()->back()->with('success', 'Chúng đang xử lý yêu cầu của bạn, vui lòng kiểm tra lại email');
        }
        $notice = new Notification();
        $notice->id_user = $user->id;
        $notice->description = $user->full_name . " yêu cầu cấp lại mật khẩu vì không thể nhớ nổi";
        $notice->save();
        return redirect()->back()->with('success', 'Yêu cầu của bạn đã được ghi nhận, chúng tôi sẽ xử lý trong thời gian sớm nhất');
    }

    public function getAuthAccount($token)
    {
        $user = User::where('active_token', $token)->first();
        if (empty($user)) {
            return 'Đường link đã hết hạn do bạn đã kích hoạt từ trước';
        }
        User::where('id', $user->id)->update(['active_token' => null, 'status' => 1]);
        return 'Tài khoản của bạn đã được kích hoạt thành công';
    }

    public function getInfoAccount()
    {
        return view('page.info-account');
    }

    public function postEditPassword(Request $req)
    {
//        dd(Hash::make('phong123'));
        $pass = Auth::user()->password;
        if (!Hash::check($req->old_password, $pass)) {
            return redirect()->back()->with('error', 'Mật khẩu cũ không đúng');
        }
        $req->validate(
            [
                'new_password' => 'required|min:6|max:24|different:old_password',
                're_new_password' => 'required|same:new_password'
            ],
            [
                'new_password.min' => 'Mật khẩu phải có ít nhất 6 ký tự',
                'new_password.max' => 'Mật khẩu tối đa là 24 ký tự',
                'new_password.different' => "Không được trùng mật khẩu cũ",
                're_new_password.same' => 'Không trùng khớp ý với bé'
            ]);
        User::where('id', Auth::user()->id)->update(['password' => Hash::make($req->new_password)]);
        Auth::logout();
        return redirect()->route('dang-nhap')->with('success', 'Thay đổi mật khẩu thành công xin vui lòng đăng nhập lại');
    }

    public function getEditPassWord()
    {
        return view('page.edit-password');
    }

    public function getEditAccount()
    {
        return view('page.edit-account');
    }

    public function postEditAccount(Request $req)
    {
        $req->validate(
            [
                'phone_number' => 'digits_between:10,11',
            ],
            [
                'phone_number.digits_between' => 'Số điện thoại không có thật',
            ]);
        User::where('id', Auth::user()->id)->update([
            'full_name' => $req->name,
            'phone_number' => $req->phone_number,
            'address' => $req->address
        ]);
        return redirect()->back()->with('success', 'Thay đổi thông tin tài khoản thành công');
    }
}
