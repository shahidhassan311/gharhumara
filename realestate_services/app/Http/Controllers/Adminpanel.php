<?php
/**
 * Created by PhpStorm.
 * User: Hassan Shahid
 * Date: 12/1/2017
 * Time: 1:40 AM
 */

namespace App\Http\Controllers;
use App\Sales;
use Validator , Input,Session, Redirect;
use App\User;
use App\Admin;
use App\Admin_sales;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Response;
use App\Repository\Transformers\UserTransformer;

class Adminpanel extends Controller
{
    protected $userTransformer;

    public function __construct(userTransformer $userTransformer)
    {
        $this->userTransformer = $userTransformer;
    }

    public function index(){
        return view("auth.login");
    }
    public function dashboard(Request $request){
        return view("adminpanel.dashboard");
    }
    public function add_user_sales_request(){
        return view("adminpanel.add_user_sales_request");
    }
    public function user_sales_req_store(Request $request){
        $token = $request->input('_token');
        var_dump($token);
//        echo "asdsa";
//        exit();
        $this->validate($request, [
            'sale_tag' => 'required',
            'address' => 'required',
            'details' => 'required',
            'amount' => 'required',
            'location' => 'required',
            'contact' => 'required|numeric',
            'status' => 'required|numeric',
            'images' => 'mimes:jpeg,jpg|required|max:3000',
        ]);


        //get input and store into variables
        $sale_tag = $request->input('sale_tag');
        $address = $request->input('address');
        $details = $request->input('details');
        $amount = $request->input('amount');
        $contact = $request->input('contact');
        $status = $request->input('status');
        var_dump($sale_tag);
        var_dump($address);
        var_dump($details);
        var_dump($amount);
        var_dump($contact);
        var_dump($status);
        exit();

        $sales = DB::table('admin_sales')->insertGetId(
            [
                'sale_tag' => $sale_tag,
                'address' => $address,
                'details' => $details,
                'amount' => $amount,
                'contact' => $contact,
                'status' => $status
            ]
        );
        Session::flash('message', "Insert success!");
//            return redirect("/user_sales_req");
    }

    public function berg_facilites_store(Request $request)
    {
//        echo "sadsa";
//        exit;
        // validate
        $this->validate($request, [
            'sale_tag' => 'required',
            'address' => 'required',
            'details' => 'required',
            'amount' => 'required',
            'location' => 'required',
            'contact' => 'required|numeric',
            'status' => 'required',
            'images' => 'mimes:jpeg,jpg|required|max:3000',
        ]);


        //get input and store into variables
        $sale_tag = $request->input('sale_tag');
        $address = $request->input('address');
        $details = $request->input('details');
        $amount = $request->input('amount');
        $contact = $request->input('contact');
        $status = $request->input('status');

        //create new object
        $instock = new Admin_sales ;

        //set all input to insert to db
        $instock->sale_tag = $sale_tag;
        $instock->address = $address;
        $instock->details = $details;
        $instock->amount = $amount;
        $instock->contact = $contact;
        $instock->status = $status;
        $instock->save();

        $files = $request->file('image');
        foreach($files as $file){
            $temp_name = rand(1,1000000);
            $destinationPath = public_path('uploads');
            $file->move($destinationPath,$temp_name.".".$file->getClientOriginalExtension());
            DB::table('sales_images')->insert([
                'sales_id' => $instock->id,
                'images' => $temp_name.".".$file->getClientOriginalExtension(),
            ]);
        }

//        $path = $facilites_images->move(public_path('/images'), $instock->facilites_name.'.jpg');

//        Session::flash('message', "Insert Facilites success!");
//        return redirect("/user_sales_req");
        var_dump($instock);
        exit();
    }

}