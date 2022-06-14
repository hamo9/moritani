<?php

namespace App\Http\Controllers\Admin;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class suppliersController extends Controller
{
    public function index()
    {
        // return "ads";
        $suppliers = Supplier::all();
        // return $suppliers;
        return view('admin.supplier.index',compact('suppliers'));
    }

    public function create()
    {
        return view('admin.supplier.add-supplier');
    }

    public function store(Request $request)
    {
       dd($request->file);

        try {
                $supplier               = new Supplier();
                // return $supplier;

                $supplier->name         = $request->name;
                $supplier->company_name = $request->company_name;
                $supplier->email        = $request->email;
                $supplier->email2       = $request->email2;
                $supplier->phone1       = $request->phone1;
                $supplier->phone2       = $request->phone2;
                $supplier->adress       = $request->adress;
                $supplier->region_id    = $request->region_id;
                $supplier->postal_code  = $request->postal_code;
                $supplier->status       = $request->status;
                $supplier->tax_number   = $request->tax_number;
                $supplier->url          = $request->url;
                $supplier->photo          = $request->file;
                $supplier->created_by   = auth()->user()->id;
                $supplier->save();

                session()->flash('Add','تم التعديل بنجاح');
                return redirect()->route('suppliers.index');
            }
            catch (\Exception $e)
            {
                return response()->json(['status'=>'exception', 'msg'=>$e->getMessage()]);
            }
            return response()->json(['status'=>"success", 'user_id'=>$supplier_id]);
    }


    // We are submitting are image along with userid and with the help of user id we are updateing our record
	public function storeimgae(Request $request)
	{
        return  $request;
		if($request->file('file'))
        {

            $img                    = $request->file('file');

            //here we are geeting userid alogn with an image
            $userid                 = $request->userid;

            $imageName              = strtotime(now()).rand(11111,99999).'.'.$img->getClientOriginalExtension();
            $user_image             = new Supplier();
            $original_name          = $img->getClientOriginalName();
            $user_image->image      = $imageName;

            if(!is_dir(public_path() . '/uploads/images/'))
            {
                mkdir(public_path() . '/uploads/images/', 0777, true);
            }

            $request->file('file')->move(public_path() . '/uploads/images/', $imageName);

            // we are updating our image column with the help of user id
            $user_image->where('id', $userid)->update(['image'=>$imageName]);

            return response()->json(['status'=>"success",'imgdata'=>$original_name,'userid'=>$userid]);
        }
	}
}
