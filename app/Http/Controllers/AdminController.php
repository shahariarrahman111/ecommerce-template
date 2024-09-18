<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Product;
use PDF;


class AdminController extends Controller
{
    public function AdminDashboard()
    {
        return view('admin.index');
    } 

    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }  // end method

    public function AdminLogin()
    {
        return view('admin.admin_login');
    }  // end method


    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }  // end method

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->photo = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alter-type' => 'success'
        );


        return redirect()->back()->with($notification);
    } // end method



    public function AdminChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    } //  end method

    public function adminCustomerList()
    {
        return view('admin.customer.admin_customer_list');
    }

    public function adminCategoryList()
    {
        return view('admin.category.admin_category_list');
    }


    public function adminProductList()
    {
        return view('admin.product.admin_product_list');
    }

    public function addCategory()
    {
        return view('admin.category.admin_add_category');
    }

    public function storeCatagory(Request $request)
    {
        $categories = Category::create([
            'photo' => $request->input('photo'),
            'category_name' => $request->input('category_name'),
        ]);
        return redirect()->route('admin.add.category');
    }

    public function addProduct()
    {
        return view('admin.product.admin_add_product');
    }

    public function storeProduct(Request $request)
    {
        $Products = Product::create([
            'photo' => $request->input('photo'),
            'product_name' => $request->input('product_name'),
        ]);
        return redirect()->route('admin.add.product');
    }

}