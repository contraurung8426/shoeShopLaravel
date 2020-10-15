<?php


namespace App\Http\Controllers;


use App\Bill;
use App\BillDetail;
use App\Comment;
use App\Customer;
use App\Notification;
use App\Product;
use App\ProductType;
use App\User;
use App\View;
use Carbon\Carbon;
use DemeterChain\B;
use DemeterChain\C;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController
{
    public function getListProduct(Request $req)
    {
        $status = [
            "1" => "Bình thường",
            "2" => "Mới",
            "3" => "Bán chạy"
        ];
//        dd($req->keyword);
//        dd($req->qty);
        $typeproduct = ProductType::where('status', '>', 0)->get();
        if ($req->keyword != null) {
            $product = Product::where('name', 'like', '%' . $req->keyword . '%')->orwhere('id', $req->keyword)->get();
            return view('admin.pageAdmin.list-product', compact('product', 'typeproduct', 'status'));
        } else if ($req->qty != null) {
            $product = Product::where('qty', '>=', $req->qty)->where('id_type', $req->id_type)->where('unit_price', '>', $req->unit_price)->get();
            return view('admin.pageAdmin.list-product', compact('product', 'typeproduct', 'status'));
        }

        $paginate = true;
        $product = Product::where('status', '>', 0)->paginate(5);
        return view('admin.pageAdmin.list-product', compact('product', 'typeproduct', 'paginate', 'status'));
    }

    public function getAddProduct()
    {
        $producttype = ProductType::where('status', '>', 0)->get();
//        dd($producttype);
        return view('admin.pageAdmin.add-product', compact('producttype'));
    }

    public function postAddProduct(Request $req)
    {
        $file = $req->image;
//        dd($file->getMimeType());
        $image_name = 'not_image.jpg';
        if ($file != null) {
            if ($file->getMimeType() != "image/jpeg") {
                return redirect()->back()->with('error', 'Hãy chọn đúng loại ảnh (JPEG)');
            }
            $file->move('C:\xampp\htdocs\shop\public\source\images\product', $file->getClientOriginalName());
            $image_name = $file->getClientOriginalName();
        }
//        dd($req->id_type);
        $product = new Product();
        $product->id_type = $req->id_type;
        $product->name = $req->name;
        $product->unit_price = $req->unit_price;
        $product->promotion_price = $req->promotion_price;
        $product->qty = $req->qty;
        $product->image = $image_name;
        $product->brand = $req->brand;
        $product->description = $req->description;
        $product->status = $req->status;
        $product->save();
        return redirect()->back()->with('success', 'Thêm mới sản phẩm thành công');
    }

    public function getEditProduct($id)
    {
        $status = [
            "1" => "Bình thường",
            "2" => "Mới",
            "3" => "Bán chạy"
        ];
//        foreach ($status as $key => $value){
//            dd($value);
//        }
        $product = Product::find($id);
        $producttype = ProductType::where('status', '>', 0)->get();
//        dd($producttype);
        return view('admin.pageAdmin.edit-product', compact('product', 'producttype', 'status'));
    }

    public function postEditProduct(Request $req)
    {
        $file = $req->image;
        $product = Product::find($req->id);
        if ($file != null) {
            if ($file->getMimeType() != "image/jpeg") {
                return redirect()->back()->with('error', 'Hãy chọn đúng loại ảnh (JPEG)');
            }
            $file->move('C:\xampp\htdocs\shop\public\source\images\product', $file->getClientOriginalName());
            $product->image = $file->getClientOriginalName();
        }
        $product->name = $req->name;
        $product->id_type = $req->id_type;
        $product->qty = $req->qty;
        $product->brand = $req->brand;
        $product->unit_price = $req->unit_price;
        $product->promotion_price = $req->promotion_price;
        $product->description = $req->description;
        $product->status = $req->status;
        $product->save();
        return redirect()->back()->with('success', 'Cập nhật thông tin sản phẩm thành công');
    }

    public function getDelProduct($id)
    {
        Product::where('id', $id)->update(['status' => 0]);
        return redirect()->back()->with('success', 'Xóa sản phẩm thành công');
    }

    public function getListTypeProduct()
    {
        $typeproduct = ProductType::where('status', '>', 0)->get();
//        dd($typeproduct);
        return view('admin.pageAdmin.list-type-product', compact('typeproduct'));
    }

    public function getAddTypeProduct()
    {
        return view('admin.pageAdmin.add-type-product');
    }

    public function postAddTypeProduct(Request $req)
    {
        $verifyname = ProductType::where('name', $req->name)->first();
        if ($verifyname == null) {
            $typeproduct = new ProductType();
            $typeproduct->name = $req->name;
            $typeproduct->note = $req->note;
            $typeproduct->save();
            return redirect()->back()->with('success', 'Thêm mới loại sản phẩm thành công');
        } else {
            return redirect()->back()->with('error', 'Loại sản phẩm này đã tồn tại');
        }

    }

    public function getEditTypeProduct($id)
    {
        $typeproduct = ProductType::find($id);
//        dd($typeproduct);
        return view('admin.pageAdmin.edit-type-product', compact('typeproduct'));
    }

    public function postEditTypeProduct(Request $req)
    {
        ProductType::where('id', $req->id)->update(['name' => $req->name, 'note' => $req->note]);
        return $this->getListTypeProduct();
    }

    public function getDelTypeProduct($id)
    {
        ProductType::where('id', $id)->update(['status' => 0]);
        return redirect()->back()->with('success', 'Xóa loại sản phẩm thành công');
    }

    public function getListBill(Request $req)
    {
        if ($req->edit_status != null) {
            Bill::where('id', $req->id_bill)->update(['status' => $req->edit_status]);
            return redirect()->back()->with('success', 'Cập nhật trạng thái thành công');
        }
        $status = [
            [0, "Đã hủy"],
            [1, "Đã đặt hàng"],
            [2, "Đã thanh toán nhưng chưa nhận hàng"],
            [3, "Đã thanh toán và nhận hàng"],
        ];

        $customer = Customer::all();
        if ($req->date != null) {
            $bill = Bill::whereDate('date_order', $req->date)->get();
            return view('admin.pageAdmin.list-bill', compact('bill', 'customer', 'status'));
        }
        if ($req->status != null) {
            $bill = Bill::where('status', $req->status)->get();
            return view('admin.pageAdmin.list-bill', compact('bill', 'customer', 'status'));
        }
        $bill = Bill::all();
        return view('admin.pageAdmin.list-bill', compact('bill', 'customer', 'status'));
    }

    public function getBillDetail($id)
    {
        $billdetail = BillDetail::where('id_bill', $id)->get();
//        dd($billdetail[0]->id_product);
        return view('admin.pageAdmin.bill-detail', compact('billdetail'));
    }

    public function getStatisticalMonth(Request $req)
    {
        if ($req->month != null) {
            $date = (explode('-', $req->month));
            $test = DB::table('bill_detail')->select('id_product', DB::raw('sum(quantity) as totalQty'))
                ->whereMonth('created_at', $date[1])->whereYear('created_at', $date[0])
                ->groupBy('id_product')->orderBy('totalQty', 'desc')->limit(3)->get();
            if (empty($test[0])) {
                return redirect()->back()->with('error', 'Không có sản phẩm nào được bán 
                trong thời gian yêu cầu');
            }
            $id_product = [];
            foreach ($test as $value) {
                $id_product[] = $value->id_product;
            }
//            dd($id_product);
            $product = Product::whereIn('id', $id_product)->get();
            $dem = 0;
            return view('admin.pageAdmin.statistical-month', compact('product', 'test', 'dem'));
        }
        return view('admin.pageAdmin.statistical-month');
    }

    public function getStatisticalQuarter(Request $req)
    {
        if ($req->quarter != null) {
//            dd($req->quarter+2,$req->quarter);
            $test = DB::table('bill_detail')->select('id_product', DB::raw('sum(quantity) as totalQty'))
                ->whereMonth('created_at', '>=', $req->quarter)
                ->whereMonth('created_at', '<=', $req->quarter + 2)->whereYear('created_at', $req->year)
                ->groupBy('id_product')->orderBy('totalQty', 'desc')->limit(3)->get();
//            dd($test);
            if (empty($test[0])) {
                return redirect()->back()->with('error', 'Không có sản phẩm nào được bán 
                trong thời gian yêu cầu');
            }
            $id_product = [];
            foreach ($test as $value) {
                $id_product[] = $value->id_product;
            }
//            dd($id_product);
            $product = Product::whereIn('id', $id_product)->get();
            $dem = 0;
            return view('admin.pageAdmin.statistical-quarter', compact('product', 'test', 'dem'));
        }
        return view('admin.pageAdmin.statistical-quarter');
    }

    public function getStatisticalYear(Request $req)
    {
        if ($req->year != null) {
//            dd($req->quarter+2,$req->quarter);
            $test = DB::table('bill_detail')->select('id_product', DB::raw('sum(quantity) as totalQty'))
                ->whereYear('created_at', $req->year)
                ->groupBy('id_product')->orderBy('totalQty', 'desc')->limit(3)->get();
//            dd($test);
            if (empty($test[0])) {
                return redirect()->back()->with('error', 'Không có sản phẩm nào được bán 
                trong thời gian yêu cầu');
            }
            $id_product = [];
            foreach ($test as $value) {
                $id_product[] = $value->id_product;
            }
//            dd($id_product);
            $product = Product::whereIn('id', $id_product)->get();
            $dem = 0;
            return view('admin.pageAdmin.statistical-year', compact('product', 'test', 'dem'));
        }
        return view('admin.pageAdmin.statistical-year');
    }

    public function getStatisticalView()
    {
        $view = View::all();
        $name = [];
        $qty = "";
        $numberview = count($view);
        $i = 0;
        foreach ($view as $value) {
            if (++$i === $numberview) {
                $name[$i] = $value->page;
                $qty = $qty . $value->qty;
            } else {
                $name[$i] = $value->page;
                $qty = $qty . $value->qty . ", ";
            }
        }
//        dd($name,$qty);
        return view('admin.pageAdmin.statistical-view', compact('name', 'qty'));
    }

    public function getNewPassword($id)
    {
        $user = User::where('id', $id)->first();
        $newpassword = str_shuffle("levantan1999cdth17c");
        $data = ['name' => $user->full_name, 'password' => $newpassword];
        Mail::send('mail.newpassword', $data, function ($message) {
            $message->from('contraurung8426@gmail.com', 'Shop giày Yasuo');
            $message->to('contraurung8426@gmail.com', 'Customer')->subject('Đây là Mail cung cấp mật khẩu mới của Shop giày Yasuo');
        });
        User::where('id', $id)->update(['password' => Hash::make($newpassword)]);
        Notification::where('id_user', $id)->update(['status' => 1]);
        return redirect()->back()->with('success', 'Cấp lại mật khẩu cho ' . $user->full_name . ' thành công');
    }

    public function getListAccount()
    {
        $user = User::all();
        return view('admin.pageAdmin.list-account', compact('user'));
    }

    public function getLockAccount($id)
    {
        $user = User::find($id);
        if (isset($user)) {
            if ($user->locked == 0) {
                User::where('id', $id)->update(['locked' => 1]);
                return redirect()->back()->with('success', 'Tài khoản của ' . $user->full_name . ' đã bị khóa');
            } else {
                User::where('id', $id)->update(['locked' => 0]);
                return redirect()->back()->with('success', 'Tài khoản của ' . $user->full_name . ' đã được mở khóa');
            }
        }
        return 'Bạn đừng có chỉnh số trên thanh địa chỉ';
    }

    public function getAddAccount()
    {
        return view('admin.pageAdmin.add-account');
    }

    public function postAddAccount(Request $req)
    {
//        dd($req->all());
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
        $user->full_name = $req->full_name;
        $user->email = $req->email;
        $user->phone_number = $req->phone;
        $user->password = Hash::make($req->password);
        $user->premission = $req->premission;
        $user->address = $req->address;
        $user->status = 1;
        $user->save();
        return redirect()->back()->with('success', 'Thêm mới tài khoản thành công');
    }

    public function getListCustomer(Request $req)
    {
        if (isset($req->address)) {
            Customer::where('id', $req->id_customer)->update(['address' => $req->address]);
            return redirect()->back()->with('success', 'Cập nhật địa chỉ khách hàng thành công');
        }
        $customer = Customer::where('status', '>', 0)->get();
        return view('admin.pageAdmin.list-customer', compact('customer'));
    }

    public function getDelCustomer($id)
    {
        Customer::where('id', $id)->update(['status' => 0]);
        return redirect()->back()->with('success', 'Xóa khách hàng thành công');
    }

    public function getTestAjax()
    {
        $comment = Comment::all();
//        dd($comment);
        return view('admin.pageAdmin.test-ajax', compact('comment'));
    }

    public function getTestAjax2(Request $req)
    {
        $comment = new Comment();
        $comment->content = $req->comment_content;
        $comment->date = Carbon::now();
        $comment->save();
        $comment = Comment::all();
        return view('admin.pageAdmin.test-ajax-2', compact('comment'));
    }

}