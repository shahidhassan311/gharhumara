<?php
/**
 * Created by PhpStorm.
 * User: Hassan Shahid
 * Date: 12/1/2017
 * Time: 1:40 AM
 */

namespace App\Http\Controllers;
use App\Our_services_message;
use Illuminate\Support\Facades\Hash;
use Validator , Input,Session, Redirect;
use App\User;
use App\Property_message;
use App\Home_listing;
use App\Admin_sales;
use App\Purchase;
use App\Rent;
use App\Sales;
use App\Admin_rent;
use App\Admin_purchase;
use App\Sale_images;
use App\Home_listing_images;
use App\Rent_images;
use App\Purchase_images;
use App\User_data;
use App\Notifications;
use App\Employee;
use App\Our_services;
use Illuminate\Http\Request;
use App\Http\Requests;
use Response;
use Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;


class Adminpanel extends Controller
{
    public function index(){
        return view("auth.login");
    }
    public function website(){
        $services = DB::table('our_services')
            ->select('*')
            ->where('status' ,'=', 'active')
            ->get();

        $latest = DB::table('home_listing as p')
            ->leftJoin('home_listing_images as i','i.home_listing_id','=','p.id')
            ->select('i.images','p.*')
            ->where('p.type','=','latest')
            ->groupBy('i.id')
            ->limit(4)
            ->get();

        $bahria = DB::table('home_listing as p')
            ->leftJoin('home_listing_images as i','i.home_listing_id','=','p.id')
            ->select('i.images','p.*')
            ->where('p.type','=','bahria')
            ->groupBy('i.id')
            ->limit(10)
            ->get();

        $popular = DB::table('home_listing as p')
            ->leftJoin('home_listing_images as i','i.home_listing_id','=','p.id')
            ->select('i.images','p.*')
            ->where('p.type','=','popular')
            ->groupBy('i.id')
            ->limit(3)
            ->get();

        $all_services = Our_services::all();

        return view("website.index" , compact('services','all_services','latest','bahria','popular'));
    }
    public function website_form(Request $request){
        if($request->input('_token')){
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'type' => 'required',
                'message' => 'required',
            ]);

            //get input and store into variables
            $name = $request->input('name');
            $email = $request->input('email');
            $type = $request->input('type');
            $message = $request->input('message');
            $contact = $request->input('contact');

            //create new object
            $services = new Our_services_message;
            $services->username = $name;
            $services->email = $email;
            $services->contact = $contact;
            $services->service_type = $type;
            $services->message = $message;

            $services->save();


            $notification = new Notifications;
            $notification->name = "Website services Message";
            $notification->notification_url = "/services_message";
            $notification->status = "1";
            $notification->save();



            $request->session()->flash('alert-success', 'thanks for contacting!');
            return redirect("/");
        }else{
            return redirect("/");
        }
    }

    public function website_rent_property_message(Request $request){
        if($request->input('_token')){
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'type' => 'required',
                'message' => 'required',
            ]);

            //get input and store into variables
            $pro_id = $request->input('pro_id');
            $type = $request->input('type');
            $property_id = $request->input('property_id');
            $name = $request->input('name');
            $email = $request->input('email');
            $message = $request->input('message');
            $contact = $request->input('contact');

            //create new object
            $services = new Property_message;
            $services->property_id = $property_id;
            $services->name = $name;
            $services->email = $email;
            $services->contact = $contact;
            $services->message = $message;
            $services->type = $type;

            $services->save();

            $notification = new Notifications;
            $notification->name = "Website Rent Message";
            $notification->notification_url = "/rent_property_message_info";
            $notification->status = "1";
            $notification->save();

            $request->session()->flash('alert-success', 'Thanks for contacting!');
            return redirect("/rent_info/$pro_id");
        }else{
            $request->session()->flash('alert-warning', 'Something Went Wrong Please Try Again!');
            return redirect("/rent");
        }
    }
    public function website_sales_property_message(Request $request){
        if($request->input('_token')){
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'type' => 'required',
                'message' => 'required',
            ]);

            //get input and store into variables
            $pro_id = $request->input('pro_id');
            $type = $request->input('type');
            $property_id = $request->input('property_id');
            $name = $request->input('name');
            $email = $request->input('email');
            $message = $request->input('message');
            $contact = $request->input('contact');

            //create new object
            $services = new Property_message;
            $services->property_id = $property_id;
            $services->name = $name;
            $services->email = $email;
            $services->contact = $contact;
            $services->message = $message;
            $services->type = $type;

            $services->save();

            $notification = new Notifications;
            $notification->name = "Website Sales Message";
            $notification->notification_url = "/sales_property_message_info";
            $notification->status = "1";
            $notification->save();

            $request->session()->flash('alert-success', 'Thanks for contacting!');
            return redirect("/sale_info/$pro_id");
        }else{
            $request->session()->flash('alert-warning', 'Something Went Wrong Please Try Again!');
            return redirect("/sale");
        }
    }
    public function website_purchase_property_message(Request $request){
        if($request->input('_token')){
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'type' => 'required',
                'message' => 'required',
            ]);

            //get input and store into variables
            $pro_id = $request->input('pro_id');
            $type = $request->input('type');
            $property_id = $request->input('property_id');
            $name = $request->input('name');
            $email = $request->input('email');
            $message = $request->input('message');
            $contact = $request->input('contact');

            //create new object
            $services = new Property_message;
            $services->property_id = $property_id;
            $services->name = $name;
            $services->email = $email;
            $services->contact = $contact;
            $services->message = $message;
            $services->type = $type;

            $services->save();

            $notification = new Notifications;
            $notification->name = "Website Purchase Message";
            $notification->notification_url = "/purchase_property_message_info";
            $notification->status = "1";
            $notification->save();

            $request->session()->flash('alert-success', 'Thanks for contacting!');
            return redirect("/purchase_info/$pro_id");
        }else{
            $request->session()->flash('alert-warning', 'Something Went Wrong Please Try Again!');
            return redirect("/purchase");
        }
    }
    public function website_purchase_info_message(Request $request){
        if($request->input('_token')){
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'type' => 'required',
                'message' => 'required',
            ]);

            //get input and store into variables
            $pro_id = $request->input('pro_id');
            $type = $request->input('type');
            $property_id = $request->input('property_id');
            $name = $request->input('name');
            $email = $request->input('email');
            $message = $request->input('message');
            $contact = $request->input('contact');

            //create new object
            $services = new Property_message;
            $services->property_id = $property_id;
            $services->name = $name;
            $services->email = $email;
            $services->contact = $contact;
            $services->message = $message;
            $services->type = $type;

            $services->save();

//            $notification = new Notifications;
//            $notification->name = "Website Purchase Message";
//            $notification->notification_url = "/purchase_property_message_info";
//            $notification->status = "1";
//            $notification->save();

            $request->session()->flash('alert-success', 'Thanks for contacting!');
            return redirect("/purchase_info/$pro_id");
        }else{
            $request->session()->flash('alert-warning', 'Something Went Wrong Please Try Again!');
            return redirect("/purchase");
        }
    }

    public function website_sale(Request $request){
        $sales = DB::table('admin_sales as p')
            ->leftJoin('sales_images as i','i.sales_id','=','p.sale_id')
            ->select('i.images','i.sales_id','p.*')
            ->where('p.status' ,'=', "active")
            ->groupBy('i.sales_id')
            ->orderBy('p.sale_tag', 'is', 'null')
            ->orderBy('p.sale_tag', 'asc')
            ->paginate(9);

        return view("website.sale" , compact('sales'));
    }
    public function website_sale_details($id){
        $sales = DB::table('admin_sales')
            ->select('*')
            ->where('sale_id' ,'=', $id)
            ->get();
        $sales_img = DB::table('sales_images')
            ->select('id','images','sales_id')
            ->where('sales_id' ,'=', $id)
            ->get();

        foreach ($sales as $saless){
            $user = DB::table('users')->select('*')->where('id' ,'=', $saless->user_id)->get();
        }
        return view("website.sales_details" , compact('sales','sales_img','user'));
    }

    public function website_rent(Request $request){
        $rent = DB::table('admin_rent as p')
            ->leftJoin('rent_images as i','i.rent_id','=','p.rent_id')
            ->select('i.images','i.rent_id','p.*')
            ->where('p.status' ,'=', "active")
            ->groupBy('i.rent_id')
            ->orderBy('p.rent_tag', 'is', 'null')
            ->orderBy('p.rent_tag', 'asc')
            ->paginate(9);
        return view("website.rent" , compact('rent'));
    }
    public function website_rent_details($id){
        $rent = DB::table('admin_rent')
            ->select('*')
            ->where('rent_id' ,'=', $id)
            ->get();
        $rent_img = DB::table('rent_images')
            ->select('id','images','rent_id')
            ->where('rent_id' ,'=', $id)
            ->get();


        foreach ($rent as $rents){
            $user = DB::table('users')->select('*')->where('id' ,'=', $rents->user_id)->get();
        }

        return view("website.rent_details" , compact('rent','rent_img','user'));
    }

    public function website_purchase(Request $request){
        $purchase = DB::table('admin_purchase as p')
            ->leftJoin('purchase_images as i','i.purchase_id','=','p.purchase_id')
            ->select('i.images','i.purchase_id','p.*')
            ->where('p.status' ,'=', "active")
            ->groupBy('i.purchase_id')
            ->orderBy('p.purchase_tag', 'is', 'null')
            ->orderBy('p.purchase_tag', 'asc')
            ->paginate(9);
        return view("website.purchase" , compact('purchase'));
//        return view("website.purchase" , compact('purchase'))->with('i', ($request->input('page', 1) - 1));
    }
    public function website_purchase_details($id){
        $purchase = DB::table('admin_purchase')
            ->select('*')
            ->where('purchase_id' ,'=', $id)
            ->get();
        $purchase_img = DB::table('purchase_images')
            ->select('id','images','purchase_id')
            ->where('purchase_id' ,'=', $id)
            ->get();
        foreach ($purchase as $purchases){
            $user = DB::table('users')->select('*')->where('id' ,'=', $purchases->user_id)->get();
        }
        return view("website.purchase_details" , compact('purchase','purchase_img','user'));
    }

    public function website_single(){
        return view("website.single");
    }
    public function website_contact(){
        return view("website.contact");
    }

    public function website_sale_message_info(){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $sales = DB::table('property_message')
                ->select('*')
                ->where('type' ,'=', 'sale')
                ->orderBy('id','desc')
                ->get();

            return view("Adminpanel.website_sale_message_info" , compact('sales'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function website_sale_message_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            Property_message::where('id',$id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete Message!');
            return redirect('/sales_property_message_info');
        }else{
            return redirect('/realestate_login');
        }

    }

    public function website_rent_message_info(){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $rent = DB::table('property_message')
                ->select('*')
                ->where('type' ,'=', 'rent')
                ->orderBy('id','desc')
                ->get();

            return view("Adminpanel.website_rent_message_info" , compact('rent'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function website_rent_message_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            Property_message::where('id',$id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete Message!');
            return redirect('/rent_property_message_info');
        }else{
            return redirect('/realestate_login');
        }

    }

    public function website_purchase_message_info(){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $purchase = DB::table('property_message')
                ->select('*')
                ->where('type' ,'=', 'purchase')
                ->orderBy('id','desc')
                ->get();

            return view("Adminpanel.website_purchase_message_info" , compact('purchase'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function website_purchase_message_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            Property_message::where('id',$id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete Message!');
            return redirect('/purchase_property_message_info');
        }else{
            return redirect('/realestate_login');
        }

    }

    public function website_latest(){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $popular = DB::table('home_listing')
                ->select('*')
                ->where('type' ,'=', 'latest')
                ->limit(4)
                ->get();

            return view("Adminpanel.website_latest_details" , compact('popular'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function website_add_latest(){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            return view("Adminpanel.website_add_latest");
        }else{
            return redirect('/realestate_login');
        }
    }
    public function website_latest_delete(Request $request ,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            Home_listing::where('id',$id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect('/latest_property');
        }else{
            return redirect('/realestate_login');
        }
    }

    public function website_popular(){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $popular = DB::table('home_listing')
                ->select('*')
                ->where('type' ,'=', 'popular')
                ->limit(3)
                ->get();

            return view("Adminpanel.website_popular_details" , compact('popular'));
        }else{
            return redirect('/realestate_login');
        }

    }
    public function website_add_popular(){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            return view("Adminpanel.website_add_popular");
        }else{
            return redirect('/realestate_login');
        }
    }
    public function website_popular_delete(Request $request ,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            Home_listing::where('id',$id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect('/popular_property');
        }else{
            return redirect('/realestate_login');
        }
    }

    public function website_bahria(){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $popular = DB::table('home_listing')
                ->select('*')
                ->where('type' ,'=', 'bahria')
                ->limit(10)
                ->get();

            return view("Adminpanel.website_bahria_details" , compact('popular'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function website_property_info($id){
        $bahria = DB::table('home_listing')
            ->select('*')
            ->where('id','=', $id)
            ->get();
        $bahria1 = DB::table('home_listing_images')
            ->select('*')
            ->where('home_listing_id','=', $id)
            ->get();
        foreach ($bahria as $saless){
            $user = DB::table('users')->select('*')->where('id' ,'=', $saless->user_id)->get();
        }
        return view("website.property_info" , compact('bahria','bahria1','user'));
    }
    public function website_add_bahria(){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            return view("Adminpanel.website_add_bahria");
        }else{
            return redirect('/realestate_login');
        }
    }
    public function website_add_bahria_store(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'tag' => 'required',
                    'property_name' => 'required',
                    'address' => 'required',
                    'details' => 'required',
                    'amount' => 'required',
                    'location' => 'required',
                    'contact' => 'required|numeric',
                ]);

                //get input and store into variables
                $tag = $request->input('tag');
                $property_name = $request->input('property_name');
                $property_area = $request->input('property_area');
                $property_floor = $request->input('property_floor');
                $no_of_bedrooms = $request->input('no_of_bedrooms');
                $no_of_bathrooms = $request->input('no_of_bathrooms');
                $address = $request->input('address');
                $details = $request->input('details');
                $amount = $request->input('amount');
                $location = $request->input('location');
                $contact = $request->input('contact');
                $type = $request->input('type');

                //create new object
                $latest = new Home_listing;

                //set all input to insert to db
                $pro_id = rand(1,1000000);
                $latest->user_id = Auth::user()->id;
                $latest->property_id = $pro_id;
                $latest->tag = $tag;
                $latest->property_name = $property_name;
                $latest->property_area = $property_area;
                $latest->property_floor = $property_floor;
                $latest->no_of_bedrooms = $no_of_bedrooms;
                $latest->no_of_bathrooms = $no_of_bathrooms;
                $latest->address = $address;
                $latest->details = $details;
                $latest->amount = $amount;
                $latest->location = $location;
                $latest->contact = $contact;
                $latest->type = $type;
                $latest->save();

                if($files = $request->file('images')){
                    foreach($files as $file){
                        $temp_name = rand(1,1000000);
                        $destinationPath = public_path('uploads');
                        $file->move($destinationPath,$temp_name.".".$file->getClientOriginalExtension());

                        $sales = new Home_listing_images();
                        $sales->images = $temp_name.".".$file->getClientOriginalExtension();
                        $sales->home_listing_id = $latest->id;
                        $sales->save();
                    }
                }
                $request->session()->flash('alert-success', 'Successfully Submit Bahria Property!');
                return redirect("/add_bahria");
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                Session::flash('message', "Token Missing!");
                return redirect("/add_bahria");
            }
        }else{
            return redirect('/realestate_login');
        }
    }
    public function website_bahria_update($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $bahria = DB::table('home_listing')
                ->select('*')
                ->where('id' ,'=', $id)
                ->get();
            $bahria_images = DB::table('home_listing_images')
                ->select('*')
                ->where('home_listing_id' ,'=', $id)
                ->get();

            return view("Adminpanel.website_bahria_update" , compact('bahria','bahria_images'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function website_bahria_null(Request $request,$id ,$str){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $services = DB::table('home_listing')->where('id', $id);
            $services->update(array(
                'images'=>$str,));
            return redirect("/bahria_update/$id");
        }else{
            return redirect('/realestate_login');
        }
    }
    public function website_bahria_update_store( Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'tag' => 'required',
                    'property_name' => 'required',
                    'property_area' => 'required',
                    'no_of_bedrooms' => 'required|numeric',
                    'no_of_bathrooms' => 'required|numeric',
                    'address' => 'required',
                    'details' => 'required',
                    'amount' => 'required',
                    'location' => 'required',
                    'contact' => 'required|numeric',
                ]);


                $type_url = $request->input('type');
                $tag = $request->input('tag');
                $property_name = $request->input('property_name');
                $property_area = $request->input('property_area');
                $property_floor = $request->input('property_floor');
                $no_of_bedrooms = $request->input('no_of_bedrooms');
                $no_of_bathrooms = $request->input('no_of_bathrooms');
                $address = $request->input('address');
                $details = $request->input('details');
                $amount = $request->input('amount');
                $location = $request->input('location');
                $contact = $request->input('contact');

                //create new object
                $sales = DB::table('home_listing')->where('id', $id);

                $sales->update(array(
                    'tag'=>$tag,
                    'property_name'=>$property_name,
                    'property_area'=>$property_area,
                    'property_floor'=>$property_floor,
                    'no_of_bedrooms'=>$no_of_bedrooms,
                    'no_of_bathrooms'=>$no_of_bathrooms,
                    'address'=>$address,
                    'details'=>$details,
                    'amount'=>$amount,
                    'location'=>$location,
                    'contact'=>$contact,
                ));

                $in_id = $request->input('in_id');
                if ($files = $request->file('images')){

                    foreach($files as $file){
                        $temp_name = rand(1,1000000);
                        $destinationPath = public_path('uploads');
                        $file->move($destinationPath,$temp_name.".".$file->getClientOriginalExtension());

                        $home_listinf_img = new Home_listing_images();
                        $home_listinf_img->home_listing_id = $in_id;
                        $home_listinf_img->images = $temp_name.".".$file->getClientOriginalExtension();
                        $home_listinf_img->save();
                    }
                }
                $request->session()->flash('alert-success', 'Successfully Update Property Ads!');
                return redirect("/bahria_property");

            }else{
                $request->session()->flash('alert-warning', 'Something Went Wrong Please Try Again!');
                return redirect("/bahria_property");
            }
        }else{
            return redirect('/realestate_login');
        }
    }
    public function website_bahria_property_show($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $bahria = DB::table('home_listing')
                ->select('*')
                ->where('id' ,'=', $id)
                ->get();

            return view("Adminpanel.website_bahria_property_show" , compact('bahria'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function website_bahria_delete(Request $request ,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            Home_listing::where('id',$id)->delete();
            Home_listing_images::where('home_listing_id',$id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect('/bahria_property');
        }else{
            return redirect('/realestate_login');
        }
    }
    public function website_bahria_images_delete(Request $request ,$id,$rid){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('home_listing_images')->where('id', $id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect("/bahria_update/".$rid);
        }else{
            return redirect('/realestate_login');
        }

    }



    public function dashboard(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $users =DB::table('users')->where('role' ,'=', "users")->count();
            $employee = DB::table('employee')->count();
            $services = DB::table('our_services')->count();
            $sales = DB::table('sales')->count();
            $purchase = DB::table('purchase')->count();
            $rent = DB::table('rent')->count();
            $sale_active = DB::table('sales')->where('status' ,'=', "active")->count();
            $sale_pending = DB::table('sales')->where('status' ,'=', "deactive")->count();
            $rent_pending = DB::table('rent')->where('status' ,'=', "deactive")->count();
            $rent_active = DB::table('rent')->where('status' ,'=', "active")->count();
            $purchase_active = DB::table('purchase')->where('status' ,'=', "active")->count();
            $purchase_pending = DB::table('purchase')->where('status' ,'=', "deactive")->count();
            $agent = DB::table('users')->where('role' ,'=', "subadmin")->count();
            $admin_sale_active = DB::table('admin_sales')->where('status' ,'=', "active")->count();
            $admin_rent_active = DB::table('admin_rent')->where('status' ,'=', "active")->count();
            $admin_purchase_active = DB::table('admin_purchase')->where('status' ,'=', "active")->count();

            $view = view('Adminpanel.dashboard');
            return $view->with(compact('employee', 'users','services','sales','purchase',
                'rent','sale_active','sale_pending','rent_pending','rent_active','purchase_active',
                'purchase_pending','agent','admin_sale_active','admin_rent_active','admin_purchase_active'));

        }elseif ($type_check == "subadmin"){
            $sales = DB::table('sales')
                ->where('user_id' ,'=', Auth::user()->id)
                ->count();
            $rent = DB::table('rent')
                ->where('user_id' ,'=', Auth::user()->id)
                ->count();
            $purchase = DB::table('purchase')
                ->where('user_id' ,'=', Auth::user()->id)
                ->count();
            $view = view('Adminpanel.dashboard');
            return $view->with(compact('employee', 'sales','rent','purchase'));
        }else{
            return redirect('/realestate_login');
        }
    }

    public function notification_ajax(){
        $notification = DB::table('notification')->where('status' ,'=', "1")->orderBy('id','desc')->get();
        return $notification;

    }




//    agent start
    public function agent_details(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $agents =  DB::table('users')
                ->select('*')
                ->where('role' ,'=', 'subadmin')
                ->get();
            return view("Adminpanel.agents",compact('agents'));
        }else{
            return redirect('/realestate_login');
        }

    }
    public function agent_add(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            return view("Adminpanel.agents_add",compact('agents'));
        }else{
            return redirect('/realestate_login');
        }


    }
    public function agent_add_store(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'referral_id' => 'required',
                    'name' => 'required',
                    'contact' => 'required',
                    'limt_user' => 'required',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|min:6',
                ]);

                //get input and store into variables
                $role = $request->input('role');
                $referral_id = $request->input('referral_id');
                $name = $request->input('name');
                $contact = $request->input('contact');
                $limt_user = $request->input('limt_user');
                $email = $request->input('email');
                $password = $request->input('password');


//                create new object
                $agent = new User();
                $agent->role = $role;
                $agent->referral_id = $referral_id;
                $agent->name = $name;
                $agent->contact = $contact;
                $agent->limt_user = $limt_user;
                $agent->email = $email;
                $agent->password = \Hash::make($password);
                $agent->save();

                $request->session()->flash('alert-success', 'Agent Successfully Create!');
                return redirect("/agent_add");
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/agent_add");
            }
        }else{
            return redirect('/realestate_login');
        }


    }
    public function agent_edit(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $agent=DB::table('users')
                ->select('*')
                ->where('id' ,'=', $id)
                ->get();
            return view("Adminpanel.agents_edit",compact('agent'));
        }else{
            return redirect('/realestate_login');
        }

    }
    public function agent_edit_store(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {

            $this->validate($request, [
                'name' => 'required',
                'contact' => 'required',
                'limt_user' => 'required',
//                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|min:6',
            ]);

            $role = $request->input('role');
            $referral_id = $request->input('referral_id');
            $name = $request->input('name');
            $contact = $request->input('contact');
            $limt_user = $request->input('limt_user');
            $email = $request->input('email');
            $password = $request->input('password');

            //create new object
            $agent = DB::table('users')->where('id', $id);

            $agent->update(array(
                'role' => $role,
                'referral_id' => $referral_id,
                'name' => $name,
                'contact' => $contact,
                'limt_user' => $limt_user,
                'email' => $email,
                'password' => \Hash::make($password),
            ));

            $request->session()->flash('alert-success', 'Agent Successfully Update!');
            return redirect('/agent_details');
        }else{
            return redirect('/realestate_login');
        }
    }
    public function agent_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('users')->where('id', $id)->delete();
            $request->session()->flash('alert-success', 'Agent Successfully Delete!');
            return Redirect::to('agent_details');
        }else{
            return redirect('/realestate_login');
        }
    }
    //download excel file
    public function agent_downloadExcel(Request $request, $type)
    {
        $data = User::select('referral_id','name','email','contact')->where('role','subadmin')->get()->toArray();
        return Excel::create('GharHumara Agents', function($excel) use ($data) {
            $excel->sheet('Agents', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }


//    agent end

//    users start
    public function users_details(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $users =  DB::table('users')
                ->select('*')
                ->where('role' ,'=', 'users')
                ->get();
            return view("Adminpanel.users",compact('users'));
        }else{
            return redirect('/realestate_login');
        }

    }
    public function user_profile_detail($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $users_detail = DB::table('users')
                ->select('*')
                ->where('id' ,'=', $id)
                ->get();
            $users = DB::table('sales')
                ->select('*')
                ->where('user_id' ,'=', $id)
                ->get();
            $users_rent = DB::table('rent')
                ->select('*')
                ->where('user_id' ,'=', $id)
                ->get();
            $users_purchase= DB::table('purchase')
                ->select('*')
                ->where('user_id' ,'=', $id)
                ->get();
            return view("Adminpanel.user_profile_details",compact('users','users_detail','users_rent','users_purchase'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function user_profile_sale_full_details($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $users = DB::table('sales')
                ->select('sale_id','sale_tag', 'address','details', 'amount','location','contact','status')
                ->where('sale_id' ,'=', $id)
                ->get();
            $users1 = DB::table('sales_images')
                ->select('images')
                ->where('sales_id' ,'=', $id)
                ->get();
            return view("Adminpanel.user_profile_sale_full_details",compact('users','users1'));
        }else{
            return redirect('/realestate_login');
        }

    }
    public function user_profile_rent_full_details($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $users = DB::table('rent')
                ->select('rent_id','rent_tag', 'address','details', 'amount','location','contact','status')
                ->where('rent_id' ,'=', $id)
                ->get();
            $users1 = DB::table('rent_images')
                ->select('images')
                ->where('rent_id' ,'=', $id)
                ->get();
            return view("Adminpanel.user_profile_rent_full_details",compact('users','users1'));
        }else{
            return redirect('/realestate_login');
        }

    }
    public function user_profile_purchase_full_details($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $users = DB::table('purchase')
                ->select('purchase_id','purchase_tag', 'address','details', 'amount','location','contact','status')
                ->where('purchase_id' ,'=', $id)
                ->get();
            $users1 = DB::table('purchase_images')
                ->select('images')
                ->where('purchase_id' ,'=', $id)
                ->get();
            return view("Adminpanel.user_profile_purchase_full_details",compact('users','users1'));
        }else{
            return redirect('/realestate_login');
        }

    }
    public function user_edit(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $agent=DB::table('users')
                ->select('*')
                ->where('id' ,'=', $id)
                ->get();
            return view("Adminpanel.users_edit",compact('agent'));
        }else{
            return redirect('/realestate_login');
        }

    }
    public function user_edit_store(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {

            $this->validate($request, [
                'name' => 'required',
                'contact' => 'required',
                'limt_user' => 'required',
//                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|min:6',
            ]);

            $role = $request->input('role');
            $referral_id = $request->input('referral_id');
            $name = $request->input('name');
            $contact = $request->input('contact');
            $limt_user = $request->input('limt_user');
            $email = $request->input('email');
            $password = $request->input('password');

            //create new object
            $agent = DB::table('users')->where('id', $id);

            $agent->update(array(
                'role' => $role,
                'referral_id' => $referral_id,
                'name' => $name,
                'contact' => $contact,
                'limt_user' => $limt_user,
                'email' => $email,
                'password' => \Hash::make($password),
            ));

            $request->session()->flash('alert-success', 'User Successfully Update!');
            return redirect('/users_details');
        }else{
            return redirect('/realestate_login');
        }
    }
    public function user_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if ($type_check == "admin") {
            DB::table('users')->where('id', $id)->delete();
            $request->session()->flash('alert-success', 'User Successfully Delete!');
            return Redirect::to('users_details');
        } else {
            return redirect('/realestate_login');
        }
    }

    //download excel file
    public function users_downloadExcel(Request $request, $type)
    {
        $data = User::select('referral_id','name','email','contact')->where('role','users')->get()->toArray();
        return Excel::create('GharHumara Users', function($excel) use ($data) {
            $excel->sheet('Users', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
//    users end




//    employess start
    public function employee_details(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $employee = Employee::all();
            return view("Adminpanel.employee",compact('employee'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function employee_add_get(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            return view("Adminpanel.employee_add");
        }else{
            return redirect('/realestate_login');
        }
    }
    public function employee_store(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'refferal_id' => 'required',
                    'name' => 'required',
                    'contact' => 'required',
                    'address' => 'required',
                    'email' => 'required',
                ]);

                //get input and store into variables
                $refferal_id = $request->input('refferal_id');
                $name = $request->input('name');
                $contact = $request->input('contact');
                $address = $request->input('address');
                $email = $request->input('email');

                //create new object
                $employee = new Employee;
                $employee->refferal_id = $refferal_id;
                $employee->name = $name;
                $employee->contact = $contact;
                $employee->address = $address;
                $employee->email = $email;
                $employee->save();

                return redirect("/employee_details");
            }else{
                return redirect("/employee_details");
            }
        }else{
            return redirect('/realestate_login');
        }


    }
    public function employee_edit(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $employee =DB::table('employee')
                ->select('*')
                ->where('id' ,'=', $id)
                ->get();
            return view("Adminpanel.employee_edit",compact('employee'));
        }else{
            return redirect('/realestate_login');
        }

    }
    public function employee_edit_store(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            Employee::where('id', $id)->update($request->except(['_token']));
            return redirect('/employee_details');
        }else{
            return redirect('/realestate_login');
        }
    }
    public function employee_delete($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('employee')->where('id', $id)->delete();
            return Redirect::to('employee_details')->with('message', 'deleted successfully');
        }else{
            return redirect('/realestate_login');
        }
    }
//    employess start



//    services start
    public function services_details(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $services = Our_services::orderBy('id', 'DESC')->get();
            return view("Adminpanel.services",compact('services'));
        }else{
            return redirect('/realestate_login');
        }

    }
    public function services_add_get(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $services = Our_services::all();
            return view("Adminpanel.services_add",compact('services'));
        }else{
            return redirect('/realestate_login');
        }

    }
    public function services_store(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'name' => 'required',
                    'details' => 'required',
                    'image' => 'required',
                    'status' => 'required',
                ]);

                //get input and store into variables
                $name = $request->input('name');
                $details = $request->input('details');
                $status = $request->input('status');
                $files = $request->file('image');

                //create new object
                $services = new Our_services;

                //set all input to insert to db
                $services->name = $name;
                $services->details = $details;
                $services->status = $status;
                $temp_name = rand(1,1000000);
                $destinationPath = public_path('uploads');
                $files->move($destinationPath,$temp_name.".".$files->getClientOriginalExtension());
                $services->image = $temp_name.".".$files->getClientOriginalExtension();
                $services->save();

                return redirect("/services_details");
            }else{
                return redirect("/services_details");
            }
        }else{
            return redirect('/realestate_login');
        }

    }
    public function services_edit(Request $request, $id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $services = DB::table('our_services')
                ->select('name', 'details','image', 'status','id')
                ->where('id' ,'=', $id)
                ->get();
            return view("Adminpanel.services_edit",compact('services'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function services_edit_store(Request $request, $id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'name' => 'required',
                    'details' => 'required',
                    'status' => 'required',
                ]);

                $name= $request->input('name');
                $details = $request->input('details');
                $status= $request->input('status');

                //create new object
                $services = DB::table('our_services')->where('id', $id);

                $services->update(array(
                    'name'=>$name,
                    'details'=>$details,
                    'status'=>$status,));

                if($files = $request->file('image')){
                    $temp_name = rand(1,1000000);
                    $destinationPath = public_path('uploads');
                    $files->move($destinationPath,$temp_name.".".$files->getClientOriginalExtension());
                    $service = DB::table('our_services')->where('id', $id);
                    $service->update(array(
                        'image'=> $temp_name.".".$files->getClientOriginalExtension(),
                    ));
                }
                return redirect("/services_details");
            }else{
                return redirect("/services_details");
            }
        }else{
            return redirect('/realestate_login');
        }

    }
    public function services_delete(Request $request ,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            Our_services::where('id',$id)->delete();
            return redirect('/services_details');
        }else{
            return redirect('/realestate_login');
        }
    }
    public function services_delete_null(Request $request,$id ,$str){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $services = DB::table('our_services')->where('id', $id);
            $services->update(array(
                'image'=>$str,));
            return redirect("/services_details");
        }else{
            return redirect('/realestate_login');
        }
    }
    public function services_status($id,$CurrentStatus){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $services = DB::table('our_services')->where('id', $id);

            if($CurrentStatus == 'active'){
                $services->update(['status' => 'deactive']);
            }else{
                $services->update(['status' => 'active']);
            }
            return redirect("/services_details");
        }else{
            return redirect('/realestate_login');
        }
    }
    public function services_message(){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $services = DB::table('our_services_message')
                ->select('*')
                ->orderBy('id','desc')
                ->get();

            return view("Adminpanel.services_message",compact('services'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function services_message_delete($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            Our_services_message::where('id',$id)->delete();
            return redirect('/services_message');
        }else{
            return redirect('/realestate_login');
        }

    }
//    services end



//    admin sales start
    public function user_sales_details(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $sales = Admin_sales::all();
            return view("Adminpanel.sales_request",compact('sales'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function add_user_sales_request(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            return view("Adminpanel.add_user_sales_request");
        }else{
            return redirect('/realestate_login');
        }

    }
    public function user_sales_req_store(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'property_name' => 'required',
                    'property_area' => 'required',
                    'no_of_bedrooms' => 'required',
                    'no_of_bathrooms' => 'required',
                    'address' => 'required',
                    'details' => 'required',
                    'amount' => 'required',
                    'location' => 'required',
//                    'contact' => 'required|numeric',
                    'status' => 'required',
                ]);

                //get input and store into variables
                $sale_tag = $request->input('sale_tag');
                $property_name = $request->input('property_name');
                $property_area = $request->input('property_area');
                $property_floor = $request->input('property_floor');
                $no_of_bedrooms = $request->input('no_of_bedrooms');
                $no_of_bathrooms = $request->input('no_of_bathrooms');
                $address = $request->input('address');
                $details = $request->input('details');
                $amount = $request->input('amount');
                $location = $request->input('location');
                $contact = $request->input('contact');
                $status = $request->input('status');
                if(count($contact) > 0){
                    $new_contact = "";
                    foreach ($contact as $val){
                        if(!empty($val)) {
                            $new_contact .= $val . ",";
                        }
                    }
//                    dd($new_contact);
                }

                //create new object
                $instock = new Admin_sales;

                //set all input to insert to db
                $pro_id = rand(1,1000000);
                $instock->property_id = $pro_id;
                $instock->user_id = Auth::user()->id;
                $instock->sale_tag = $sale_tag;
                $instock->property_name = $property_name;
                $instock->property_area = $property_area;
                $instock->property_floor = $property_floor;
                $instock->no_of_bedrooms = $no_of_bedrooms;
                $instock->no_of_bathrooms = $no_of_bathrooms;
                $instock->address = $address;
                $instock->details = $details;
                $instock->amount = $amount;
                $instock->location = $location;
                $instock->contact = $new_contact;
                $instock->status = $status;
                $instock->save();

                if($instock->save()){
                    $files = $request->file('image');
                    foreach($files as $file){
                        $temp_name = rand(1,1000000);
                        $destinationPath = public_path('uploads');
                        $file->move($destinationPath,$temp_name.".".$file->getClientOriginalExtension());

                        $sales = new Sale_images();
                        $sales->images = $temp_name.".".$file->getClientOriginalExtension();
                        $sales->sales_id = $instock->id;
                        $sales->save();
                    }
                }
//            exit();
                $request->session()->flash('alert-success', 'Successfully Submit Sales Property!');
                return redirect("/user_sales_req")->withInput();
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                Session::flash('message', "Token Missing!");
                return redirect("/user_sales_req");
            }
        }else{
            return redirect('/realestate_login');
        }
    }
    public function admin_sale_edit_get($id)
    {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $sales = DB::table('admin_sales')
                ->select('*')
                ->where('sale_id' ,'=', $id)
                ->get();
            $users1 = DB::table('sales_images')
                ->select('id','images','sales_id')
                ->where('sales_id' ,'=', $id)
                ->get();
//        var_dump($sales,$users1);
//        exit;
            return view('Adminpanel.admin_sales_update',compact('sales','users1'));
        }else{
            return redirect('/realestate_login');
        }

    }
    public function admin_sale_edit_ajax()
    {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $id =$_GET['q'];
            Sale_images::find($id)->delete();
            return redirect("/user_sale_request");
        }else{
            return redirect('/realestate_login');
        }
    }
    public function admin_sale_display_images_ajax()
    {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $sales_id = $_GET['sales_id'];
            $users1 = DB::table('sales_images')
                ->select('id','images','sales_id')
                ->where('sales_id' ,'=', $sales_id)
                ->get();
            $data = '';
            foreach ($users1 as $items ){
                $data .= '<img src="'.URL::to("/").'/uploads/'.$items->images.'" height="200" width="200" alt="">';
                $data .= '<a  onclick="loadDoc('.$items->id.')"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>';
            }
        }else{
            return redirect('/realestate_login');
        }

    }
    public function admin_sale_store(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'property_name' => 'required',
                    'property_area' => 'required',
                    'no_of_bedrooms' => 'required',
                    'no_of_bathrooms' => 'required',
                    'address' => 'required',
                    'details' => 'required',
                    'amount' => 'required',
                    'location' => 'required',
                    'contact' => 'required|numeric',
                    'status' => 'required',
                ]);


                $sale_tag = $request->input('sale_tag');
                $property_name = $request->input('property_name');
                $property_area = $request->input('property_area');
                $property_floor = $request->input('property_floor');
                $no_of_bedrooms = $request->input('no_of_bedrooms');
                $no_of_bathrooms = $request->input('no_of_bathrooms');
                $address = $request->input('address');
                $details = $request->input('details');
                $amount = $request->input('amount');
                $location = $request->input('location');
                $contact = $request->input('contact');
                $status = $request->input('status');

                //create new object
                $sales = DB::table('admin_sales')->where('sale_id', $id);

                $sales->update(array(
                    'sale_tag'=>$sale_tag,
                    'property_name'=>$property_name,
                    'property_area'=>$property_area,
                    'property_floor'=>$property_floor,
                    'no_of_bedrooms'=>$no_of_bedrooms,
                    'no_of_bathrooms'=>$no_of_bathrooms,
                    'address'=>$address,
                    'details'=>$details,
                    'amount'=>$amount,
                    'location'=>$location,
                    'contact'=>$contact,
                    'status'=>$status,));

                if($files = $request->file('image')){
                    foreach($files as $file){
                        $temp_name = rand(1,1000000);
                        $destinationPath = public_path('uploads');
                        $file->move($destinationPath,$temp_name.".".$file->getClientOriginalExtension());
                        $sale = new Sale_images();
                        $sale->images = $temp_name.".".$file->getClientOriginalExtension();
                        $sale->sales_id = $id;
                        $sale->save();
                    }
                }
//            exit();
                $request->session()->flash('alert-success', 'Successfully Update Sales Ads!');
                return redirect("/user_sales_details");
            }else{
                $request->session()->flash('alert-warning', 'Something Went Wrong Please Try Again!');
                return redirect("/user_sales_details");
            }
        }else{
            return redirect('/realestate_login');
        }
    }
    public function admin_sale_status($id,$CurrentStatus){

        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $sales_get = DB::table('admin_sales')->select('property_id')->where('sale_id', $id)->get();
            foreach ($sales_get as $pro_id){

            }
            $sales = DB::table('admin_sales')->select('property_id')->where('sale_id', $id);
            $sales1 = DB::table('sales')->select('property_id')->where('property_id', $pro_id->property_id);
            if($CurrentStatus == 'active'){
                $sales->update(['status' => 'deactive']);
                $sales1->update(['status' => 'deactive']);
            }else{
                $sales->update(['status' => 'active']);
                $sales1->update(['status' => 'active']);
            }
            return redirect("/user_sales_details");
        }else{
            return redirect('/realestate_login');
        }

    }
    public function admin_sale_delete($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('admin_sales')->where('sale_id', $id)->delete();
            DB::table('sales_images')->where('sales_id', $id)->delete();
            return Redirect::to('user_sales_details')->with('message', 'deleted successfully');
        }else{
            return redirect('/realestate_login');
        }
    }
    public function admin_sales_details_show ($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $sales = DB::table('admin_sales')
                ->select('*')
                ->where('sale_id' ,'=', $id)
                ->get();
            $users1 = DB::table('sales_images')
                ->select('images','sales_id')
                ->where('sales_id' ,'=', $id)
                ->get();
            return view('Adminpanel.admin_sales_details_show',compact('sales','users1'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function admin_sale_find_users_profile(Request $request ,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $user_find = DB::table('admin_sales as a')
                ->leftJoin('sales as s','a.property_id','=','s.property_id')
                ->select('s.user_id')
                ->where('a.property_id', '=' ,$id)
                ->get();
            foreach ($user_find as $user){
                if ($user->user_id == ""){
                    $request->session()->flash('alert-info', 'This User is Not Exist...!');
                    return redirect('/user_sales_details');
                }else{
                    return redirect('/user_profile_detail/'.$user->user_id);
                }
            }
        }else{
            return redirect('/realestate_login');
        }
    }
    public function admin_sale_images_delete(Request $request ,$id,$rid){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('sales_images')->where('id', $id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect("/admin_sale_edit_get/".$rid);
        }else{
            return redirect('/realestate_login');
        }

    }
//    admin sales end



//    admin rent start
    public function user_rent_details(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $rent = Admin_rent::all();;
            return view("Adminpanel.rent_request",compact('rent'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function add_user_rent_request(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            return view("Adminpanel.add_user_rent_request");
        }else{
            return redirect('/realestate_login');
        }
    }
    public function user_rent_req_store(Request $request)
    {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'property_name' => 'required',
                    'property_area' => 'required',
                    'no_of_bedrooms' => 'required',
                    'no_of_bathrooms' => 'required',
                    'address' => 'required',
                    'details' => 'required',
                    'location' => 'required',
//                    'contact' => 'required|numeric',
                    'status' => 'required',
//            'images' => 'mimes:jpeg,jpg,png|required|max:3000',
                ]);
                //get input and store into variables
                $rent_tag = $request->input('rent_tag');
                $property_name = $request->input('property_name');
                $property_area = $request->input('property_area');
                $property_floor = $request->input('property_floor');
                $no_of_bedrooms = $request->input('no_of_bedrooms');
                $no_of_bathrooms = $request->input('no_of_bathrooms');
                $address = $request->input('address');
                $details = $request->input('details');
                $rent_amount = $request->input('rent_amount');
                $advanced_amount = $request->input('advanced_amount');
                $location = $request->input('location');
                $contact = $request->input('contact');
                $status = $request->input('status');
                if(count($contact) > 0){
                    $new_contact = "";
                    foreach ($contact as $val){
                        if(!empty($val)) {
                            $new_contact .= $val . ",";
                        }
                    }
//                    dd($new_contact);
                }

                //create new object
                $rent = new Admin_rent;

                //set all input to insert to db
                $pro_id = rand(1,1000000);
                $rent->property_id = $pro_id;
                $rent->user_id = Auth::user()->id;
                $rent->rent_tag = $rent_tag;
                $rent->property_name = $property_name;
                $rent->property_area = $property_area;
                $rent->property_floor = $property_floor;
                $rent->no_of_bedrooms = $no_of_bedrooms;
                $rent->no_of_bathrooms = $no_of_bathrooms;
                $rent->address = $address;
                $rent->details = $details;
                $rent->rent_amount = $rent_amount;
                $rent->advanced_amount = $advanced_amount;
                $rent->location = $location;
                $rent->contact = $new_contact;
                $rent->status = $status;
                $rent->save();

                if($files = $request->file('image')){
                    foreach($files as $file){
//                    echo $file;
//                    var_dump($file);
//                    exit();
                        $temp_name = rand(1,1000000);
                        $destinationPath = public_path('uploads');
                        $file->move($destinationPath,$temp_name.".".$file->getClientOriginalExtension());

                        $rent_img = new Rent_images();
                        $rent_img->rent_id = $rent->id;
                        $rent_img->images = $temp_name.".".$file->getClientOriginalExtension();
                        $rent_img->save();
                    }
                }
//            exit();
                $request->session()->flash('alert-success', 'Successfully Submit Rent Property!');
                return redirect("/user_rent_req");
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/user_rent_req");
            }
        }else{
            return redirect('/realestate_login');
        }

    }
    public function admin_rent_edit_get($id)
    {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $rent = DB::table('admin_rent')
                ->select('*')
                ->where('rent_id' ,'=', $id)
                ->get();
            $rent1 = DB::table('rent_images')
                ->select('id','images','rent_id')
                ->where('rent_id' ,'=', $id)
                ->get();
            return view('Adminpanel.admin_rent_update',compact('rent','rent1'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function admin_rent_edit_ajax()
    {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $id =$_GET['q'];
            Rent_images::find($id)->delete();
            return redirect("/user_rent_request");
        }else{
            return redirect('/realestate_login');
        }

    }
    public function admin_rent_display_images_ajax()
    {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $rent_id = $_GET['rent_id'];
            $rent1 = DB::table('rent_images')
                ->select('id','images','rent_id')
                ->where('rent_id' ,'=', $rent_id)
                ->get();
            $data = '';
            foreach ($rent1 as $items ){
                $data .= '<img src="'.URL::to("/").'/uploads/'.$items->images.'" height="200" width="200" alt="">';
                $data .= '<a  onclick="loadDoc('.$items->id.')"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>';
            }
        }else{
            return redirect('/realestate_login');
        }
    }
    public function admin_rent_store(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'property_name' => 'required',
                    'property_area' => 'required',
                    'no_of_bedrooms' => 'required',
                    'no_of_bathrooms' => 'required',
                    'address' => 'required',
                    'details' => 'required',
                    'location' => 'required',
                    'contact' => 'required|numeric',
                    'status' => 'required',
                ]);

                $rent_tag = $request->input('rent_tag');
                $property_name = $request->input('property_name');
                $property_area = $request->input('property_area');
                $property_floor = $request->input('property_floor');
                $no_of_bedrooms = $request->input('no_of_bedrooms');
                $no_of_bathrooms = $request->input('no_of_bathrooms');
                $address = $request->input('address');
                $details = $request->input('details');
                $rent_amount = $request->input('rent_amount');
                $advanced_amount = $request->input('advanced_amount');
                $location = $request->input('location');
                $contact = $request->input('contact');
                $status = $request->input('status');

                //create new object
                $rent = DB::table('admin_rent')->where('rent_id', $id);

                $rent->update(array(
                    'rent_tag'=>$rent_tag,
                    'property_name'=>$property_name,
                    'property_area'=>$property_area,
                    'property_floor'=>$property_floor,
                    'no_of_bedrooms'=>$no_of_bedrooms,
                    'no_of_bathrooms'=>$no_of_bathrooms,
                    'address'=>$address,
                    'details'=>$details,
                    'rent_amount'=>$rent_amount,
                    'advanced_amount'=>$advanced_amount,
                    'location'=>$location,
                    'contact'=>$contact,
                    'status'=>$status,));

                if($files = $request->file('image')){
                    foreach($files as $file){
                        $temp_name = rand(1,1000000);
                        $destinationPath = public_path('uploads');
                        $file->move($destinationPath,$temp_name.".".$file->getClientOriginalExtension());
                        $rents = new Rent_images();
                        $rents->images = $temp_name.".".$file->getClientOriginalExtension();
                        $rents->rent_id = $id;
                        $rents->save();
                    }
                }
//            exit();
                $request->session()->flash('alert-success', 'Successfully Update Rent Ads!');
                return redirect("/user_rent_details");
            }else{
                $request->session()->flash('alert-warning', 'Something Went Wrong Please Try Again!');
                return redirect("/user_rent_details");
            }
        }else{
            return redirect('/realestate_login');
        }

    }
    public function admin_rent_status($id,$CurrentStatus){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $sales_get = DB::table('admin_rent')->select('property_id')->where('rent_id', $id)->get();
            foreach ($sales_get as $pro_id){

            }
            $sales = DB::table('admin_rent')->select('property_id')->where('rent_id', $id);
            $sales1 = DB::table('rent')->select('property_id')->where('property_id', $pro_id->property_id);
            if($CurrentStatus == 'active'){
                $sales->update(['status' => 'deactive']);
                $sales1->update(['status' => 'deactive']);
            }else{
                $sales->update(['status' => 'active']);
                $sales1->update(['status' => 'active']);
            }
            return redirect("/user_rent_details");
        }else{
            return redirect('/realestate_login');
        }

    }
    public function admin_rent_delete($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('admin_rent')->where('rent_id', $id)->delete();
            DB::table('rent_images')->where('rent_id', $id)->delete();
            return Redirect::to('user_rent_details')->with('message', 'deleted successfully');
        }else{
            return redirect('/realestate_login');
        }

    }
    public function admin_rent_details_show ($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $rent = DB::table('admin_rent')
                ->select('*')
                ->where('rent_id' ,'=', $id)
                ->get();
            $rent1 = DB::table('rent_images')
                ->select('images','rent_id')
                ->where('rent_id' ,'=', $id)
                ->get();
            return view('Adminpanel.admin_rent_details_show',compact('rent','rent1'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function admin_rent_find_users_profile(Request $request ,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $user_find = DB::table('admin_rent as a')
                ->leftJoin('rent as s','a.property_id','=','s.property_id')
                ->select('s.user_id')
                ->where('a.property_id', '=' ,$id)
                ->get();
            foreach ($user_find as $user){
                if ($user->user_id == ""){
                    $request->session()->flash('alert-info', 'This User is Not Exist...!');
                    return redirect('/user_rent_details');
                }else{
                    return redirect('/user_profile_detail/'.$user->user_id);
                }
            }
        }else{
            return redirect('/realestate_login');
        }
    }
    public function admin_rent_images_delete(Request $request ,$id,$rid){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('rent_images')->where('id', $id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect("/admin_rent_edit_get/".$rid);
        }else{
            return redirect('/realestate_login');
        }

    }

//    admin rent end



//    admin purchase start
    public function user_purchase_details(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $purchase = Admin_purchase::all();;
            return view("Adminpanel.purchase_request",compact('purchase'));
        }else{
            return redirect('/realestate_login');
        }

    }
    public function add_user_purchase_request(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            return view("Adminpanel.add_user_purchase_request");
        }else{
            return redirect('/realestate_login');
        }

    }
    public function user_purchase_req_store(Request $request)
    {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'property_name' => 'required',
                    'property_area' => 'required',
                    'no_of_bedrooms' => 'required',
                    'no_of_bathrooms' => 'required',
                    'address' => 'required',
                    'details' => 'required',
                    'amount' => 'required',
                    'location' => 'required',
//                    'contact' => 'required|numeric',
                    'status' => 'required',
//            'images' => 'mimes:jpeg,jpg,png|required|max:3000',
                ]);

                //get input and store into variables
                $purchase_tag = $request->input('purchase_tag');
                $property_name = $request->input('property_name');
                $property_area = $request->input('property_area');
                $property_floor = $request->input('property_floor');
                $no_of_bedrooms = $request->input('no_of_bedrooms');
                $no_of_bathrooms = $request->input('no_of_bathrooms');
                $address = $request->input('address');
                $details = $request->input('details');
                $amount = $request->input('amount');
                $location = $request->input('location');
                $contact = $request->input('contact');
                $status = $request->input('status');
                if(count($contact) > 0){
                    $new_contact = "";
                    foreach ($contact as $val){
                        if(!empty($val)) {
                            $new_contact .= $val . ",";
                        }
                    }
//                    dd($new_contact);
                }


                //create new object
                $purchase = new Admin_purchase();

                //set all input to insert to db
                $pro_id = rand(1,1000000);
                $purchase->property_id = $pro_id;
                $purchase->user_id = Auth::user()->id;
                $purchase->purchase_tag = $purchase_tag;
                $purchase->property_name = $property_name;
                $purchase->property_area = $property_area;
                $purchase->property_floor = $property_floor;
                $purchase->no_of_bedrooms = $no_of_bedrooms;
                $purchase->no_of_bathrooms = $no_of_bathrooms;
                $purchase->address = $address;
                $purchase->details = $details;
                $purchase->amount = $amount;
                $purchase->location = $location;
                $purchase->contact = $new_contact;
                $purchase->status = $status;
                $purchase->save();

                if($files = $request->file('image')){
                    foreach($files as $file){
//                    echo $file;
//                    var_dump($file);
//                    exit();
                        $temp_name = rand(1,1000000);
                        $destinationPath = public_path('uploads');
                        $file->move($destinationPath,$temp_name.".".$file->getClientOriginalExtension());

                        $rent_img = new Purchase_images();
                        $rent_img->purchase_id = $purchase->id;
                        $rent_img->images = $temp_name.".".$file->getClientOriginalExtension();
                        $rent_img->save();
                    }
                }
//            exit();
                $request->session()->flash('alert-success', 'Successfully Submit Purchase Property!');
                return redirect("/user_purchase_req");
            }else{
                $request->session()->flash('alert-danger', 'Something Went Wrong!');
                return redirect("/user_purchase_req");
            }
        }else{
            return redirect('/realestate_login');
        }
    }
    public function admin_purchase_edit_get($id)
    {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $purchase = DB::table('admin_purchase')
                ->select('*')
                ->where('purchase_id' ,'=', $id)
                ->get();
            $purchase1 = DB::table('purchase_images')
                ->select('id','images','purchase_id')
                ->where('purchase_id' ,'=', $id)
                ->get();

            return view('Adminpanel.admin_purchase_update',compact('purchase','purchase1'));
        }else{
            return redirect('/realestate_login');
        }

    }
    public function admin_purchase_edit_ajax()
    {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $id =$_GET['q'];
            Purchase_images::find($id)->delete();
            return redirect("/user_purchase_request");
        }else{
            return redirect('/realestate_login');
        }

    }
    public function admin_purchase_display_images_ajax()
    {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $purchase_id = $_GET['purchase_id'];

            $purchase1 = DB::table('purchase_images')
                ->select('id','images','purchase_id')
                ->where('purchase_id' ,'=', $purchase_id)
                ->get();
            $data = '';
            foreach ($purchase1 as $items ){
                $data .= '<img src="'.URL::to("/").'/uploads/'.$items->images.'" height="200" width="200" alt="">';
                $data .= '<a  onclick="loadDoc('.$items->id.')"><i class="fa fa-times fa-2x" aria-hidden="true"></i></a>';
            }

        }else{
            return redirect('/realestate_login');
        }
    }
    public function admin_purchase_store(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'property_name' => 'required',
                    'property_area' => 'required',
                    'no_of_bedrooms' => 'required',
                    'no_of_bathrooms' => 'required',
                    'address' => 'required',
                    'details' => 'required',
                    'amount' => 'required',
                    'location' => 'required',
                    'contact' => 'required|numeric',
                    'status' => 'required',
                ]);

                $purchase_tag = $request->input('purchase_tag');
                $property_name = $request->input('property_name');
                $property_area = $request->input('property_area');
                $property_floor = $request->input('property_floor');
                $no_of_bedrooms = $request->input('no_of_bedrooms');
                $no_of_bathrooms = $request->input('no_of_bathrooms');
                $address = $request->input('address');
                $details = $request->input('details');
                $amount = $request->input('amount');
                $location = $request->input('location');
                $contact = $request->input('contact');
                $status = $request->input('status');

                //create new object
                $purchase = DB::table('admin_purchase')->where('purchase_id', $id);

                $purchase->update(array(
                    'purchase_tag'=>$purchase_tag,
                    'property_name'=>$property_name,
                    'property_area'=>$property_area,
                    'property_floor'=>$property_floor,
                    'no_of_bedrooms'=>$no_of_bedrooms,
                    'no_of_bathrooms'=>$no_of_bathrooms,
                    'address'=>$address,
                    'details'=>$details,
                    'amount'=>$amount,
                    'location'=>$location,
                    'contact'=>$contact,
                    'status'=>$status,));

                if($files = $request->file('image')){
                    foreach($files as $file){
                        $temp_name = rand(1,1000000);
                        $destinationPath = public_path('uploads');
                        $file->move($destinationPath,$temp_name.".".$file->getClientOriginalExtension());
                        $purchases = new Purchase_images();
                        $purchases->images = $temp_name.".".$file->getClientOriginalExtension();
                        $purchases->purchase_id = $id;
                        $purchases->save();
                    }
                }
//            exit();
                $request->session()->flash('alert-success', 'Successfully Update Purchase Ads!');
                return redirect("/user_purchase_details");
            }else{
                $request->session()->flash('alert-warning', 'Something Went Wrong Please Try Again!');
                return redirect("/user_purchase_details");
            }
        }else{
            return redirect('/realestate_login');
        }

    }
    public function admin_purchase_status($id,$CurrentStatus){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $sales_get = DB::table('admin_purchase')->select('property_id')->where('purchase_id', $id)->get();
            foreach ($sales_get as $pro_id){

            }
            $sales = DB::table('admin_purchase')->select('property_id')->where('purchase_id', $id);
            $sales1 = DB::table('purchase')->select('property_id')->where('property_id', $pro_id->property_id);
            if($CurrentStatus == 'active'){
                $sales->update(['status' => 'deactive']);
                $sales1->update(['status' => 'deactive']);
            }else{
                $sales->update(['status' => 'active']);
                $sales1->update(['status' => 'active']);
            }
            return redirect("/user_purchase_details");
        }else{
            return redirect('/realestate_login');
        }
    }
    public function admin_purchase_delete($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('admin_purchase')->where('purchase_id', $id)->delete();
            DB::table('purchase_images')->where('purchase_id', $id)->delete();
            return Redirect::to('user_purchase_details')->with('message', 'deleted successfully');
        }else{
            return redirect('/realestate_login');
        }

    }
    public function admin_purchase_details_show ($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $purchase = DB::table('admin_purchase')
                ->select('*')
                ->where('purchase_id' ,'=', $id)
                ->get();
            $purchase1 = DB::table('purchase_images')
                ->select('images','purchase_id')
                ->where('purchase_id' ,'=', $id)
                ->get();
            return view('Adminpanel.admin_purchase_details_show',compact('purchase','purchase1'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function admin_purchase_find_users_profile(Request $request ,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $user_find = DB::table('admin_purchase as a')
                ->leftJoin('purchase as s','a.property_id','=','s.property_id')
                ->select('s.user_id')
                ->where('a.property_id', '=' ,$id)
                ->get();
            foreach ($user_find as $user){
                if ($user->user_id == ""){
                    $request->session()->flash('alert-info', 'This User is Not Exist...!');
                    return redirect('/user_purchase_details');
                }else{
                    return redirect('/user_profile_detail/'.$user->user_id);
                }
            }
        }else{
            return redirect('/realestate_login');
        }
    }
    public function admin_purchase_images_delete(Request $request ,$id,$rid){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('purchase_images')->where('id', $id)->delete();
            $request->session()->flash('alert-success', 'Successfully Delete!');
            return redirect("/admin_purchase_edit_get/".$rid);
        }else{
            return redirect('/realestate_login');
        }

    }
//    admin purchase end




//    users sales start
    public function user_sale_request(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $sales = Sales::all();
            return view("Adminpanel.user_sales_request",compact('sales'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function user_sale_request_edit($id)
    {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $sales = DB::table('sales')
                ->select('*')
                ->where('sale_id' ,'=', $id)
                ->get();
            $users1 = DB::table('sales_images')
                ->select('images','sales_id')
                ->where('sales_id' ,'=', $id)
                ->get();
            return view('Adminpanel.user_sales_edit',compact('sales','users1'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function user_sale_request_store( Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){

                $this->validate($request, [
                    'property_name' => 'required',
                    'property_area' => 'required',
                    'no_of_bedrooms' => 'required',
                    'no_of_bathrooms' => 'required',
                    'address' => 'required',
                    'details' => 'required',
                    'amount' => 'required',
                    'location' => 'required',
                    'contact' => 'required|numeric',
                    'status' => 'required',
                ]);

                $property_id = $request->input('property_id');
                $user_id = $request->input('user_id');
                $sale_tag = $request->input('sale_tag');
                $property_name = $request->input('property_name');
                $property_area = $request->input('property_area');
                $property_floor = $request->input('property_floor');
                $no_of_bedrooms = $request->input('no_of_bedrooms');
                $no_of_bathrooms = $request->input('no_of_bathrooms');
                $address = $request->input('address');
                $details = $request->input('details');
                $amount = $request->input('amount');
                $location = $request->input('location');
                $contact = $request->input('contact');
                $status = $request->input('status');
                $sale_id = $request->input('sale_id');

                $get_property = DB::table('admin_sales')
                    ->select('*')
                    ->where('property_id' ,'=', $property_id)
                    ->get();
                $get_id = '';
                foreach ($get_property as $get_property_id) {
                    $get_id = $get_property_id->property_id;
                }
                if ($get_id == ''){
                    $sales = new Admin_sales;
                    $sales->property_id = $property_id;
                    $sales->user_id = $user_id;
                    $sales->sale_tag = $sale_tag;
                    $sales->property_name = $property_name;
                    $sales->property_area = $property_area;
                    $sales->property_floor = $property_floor;
                    $sales->no_of_bedrooms = $no_of_bedrooms;
                    $sales->no_of_bathrooms = $no_of_bathrooms;
                    $sales->address = $address;
                    $sales->details = $details;
                    $sales->amount = $amount;
                    $sales->location = $location;
                    $sales->contact = $contact;
                    $sales->status = $status;
                    $sales->save();

                    $status1 = "active";
                    $status2 = "deactive";
                    if ($status == 'active'){
                        DB::table('sales')
                            ->where('sale_id', $sale_id)
                            ->update(['status' => $status1]);
                    }else{
                        DB::table('sales')
                            ->where('sale_id', $sale_id)
                            ->update(['status' => $status2]);
                    }
                    if($files1 = $request->input('image1')) {
                        foreach ($files1 as $val) {
                            $sale = new Sale_images();
                            $sale->images = $val;
                            $sale->sales_id = $sales->id;
                            $sale->save();
                        }
                    }
                    if ($files = $request->file('image')){
                        foreach($files as $file){
                            $temp_name = rand(1,1000000);
                            $destinationPath = public_path('uploads');
                            $file->move($destinationPath,$temp_name.".".$file->getClientOriginalExtension());

                            $sale = new Sale_images();
                            $sale->images = $temp_name.".".$file->getClientOriginalExtension();
                            $sale->sales_id = $sales->id;
                            $sale->save();
                        }
                    }
                    $request->session()->flash('alert-success', 'Successfully Submit Duplicate Data In Admin Upload!');
                    return redirect("/user_sale_request");
                }else{
                    $request->session()->flash('alert-warning', 'Property Entry Already Exist In Admin Upload!');
                    return redirect("/user_sale_request");
                }
            }else{
                return redirect("/user_sale_request");
            }
        }else{
            return redirect('/realestate_login');
        }
    }
    public function user_sales_show ($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $sales = DB::table('sales')
                ->select('*')
                ->where('sale_id' ,'=', $id)
                ->get();
            $users1 = DB::table('sales_images')
                ->select('images','sales_id')
                ->where('sales_id' ,'=', $id)
                ->get();
            return view('Adminpanel.user_sales_show',compact('sales','users1'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function user_sale_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('sales')->where('sale_id', $id)->delete();
            DB::table('sales_images')->where('sales_id', $id)->delete();
            $request->session()->flash('alert-success', 'Deleted successfully');
            return Redirect::to('user_sale_request');
        }else{
            return redirect('/realestate_login');
        }
    }
//    users sales end




//    users rent start
    public function user_rent_request(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $rent = Rent::all();;
            return view("Adminpanel.user_rent_request",compact('rent'));
        }else{
            return redirect('/realestate_login');
        }

    }
    public function user_rent_request_edit($id)
    {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $rent = DB::table('rent')
                ->select('*')
                ->where('rent_id' ,'=', $id)
                ->get();
            $rent1 = DB::table('rent_images')
                ->select('images','rent_id')
                ->where('rent_id' ,'=', $id)
                ->get();
            return view('Adminpanel.user_rent_edit',compact('rent','rent1'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function user_rent_request_store( Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'property_name' => 'required',
                    'property_area' => 'required',
                    'no_of_bedrooms' => 'required',
                    'no_of_bathrooms' => 'required',
                    'address' => 'required',
                    'details' => 'required',
                    'location' => 'required',
                    'contact' => 'required|numeric',
                    'status' => 'required',
                ]);

                //get input and store into variables
                $property_id = $request->input('property_id');
                $user_id = $request->input('user_id');
                $rent_tag = $request->input('rent_tag');
                $property_name = $request->input('property_name');
                $property_area = $request->input('property_area');
                $property_floor = $request->input('property_floor');
                $no_of_bedrooms = $request->input('no_of_bedrooms');
                $no_of_bathrooms = $request->input('no_of_bathrooms');
                $address = $request->input('address');
                $details = $request->input('details');
                $rent_amount = $request->input('rent_amount');
                $advanced_amount = $request->input('advanced_amount');
                $location = $request->input('location');
                $contact = $request->input('contact');
                $status = $request->input('status');
                $rent_id = $request->input('rent_id');

                $get_property = DB::table('admin_rent')
                    ->select('*')
                    ->where('property_id' ,'=', $property_id)
                    ->get();
                $get_id = '';
                foreach ($get_property as $get_property_id) {
                    $get_id = $get_property_id->property_id;
                }
                if ($get_id == ''){
                    //create new object
                    $rent = new Admin_rent;

                    //set all input to insert to db
                    $rent->property_id = $property_id;
                    $rent->user_id = $user_id;
                    $rent->rent_tag = $rent_tag;
                    $rent->property_name = $property_name;
                    $rent->property_area = $property_area;
                    $rent->property_floor = $property_floor;
                    $rent->no_of_bedrooms = $no_of_bedrooms;
                    $rent->no_of_bathrooms = $no_of_bathrooms;
                    $rent->address = $address;
                    $rent->details = $details;
                    $rent->rent_amount = $rent_amount;
                    $rent->advanced_amount = $advanced_amount;
                    $rent->location = $location;
                    $rent->contact = $contact;
                    $rent->status = $status;
                    $rent->save();
                }else{
                    $request->session()->flash('alert-warning', 'Property Entry Already Exist In Admin Upload!');
                    return redirect("/user_rent_request");
                }

                $status1 = "active";
                $status2 = "deactive";
                if ($status == 'active'){
                    DB::table('rent')
                        ->where('rent_id', $rent_id)
                        ->update(['status' => $status1]);
                }else{
                    DB::table('rent')
                        ->where('rent_id', $rent_id)
                        ->update(['status' => $status2]);
                }

                if($files1 = $request->input('image1')){
                    foreach ($files1 as $val){
                        $rents = new Rent_images();
                        $rents->images = $val;
                        $rents->rent_id = $rent->id;
                        $rents->save();
                    }
                }
                if ($files = $request->file('image')){
                    foreach($files as $file){
                        $temp_name = rand(1,1000000);
                        $destinationPath = public_path('uploads');
                        $file->move($destinationPath,$temp_name.".".$file->getClientOriginalExtension());

                        $rents = new Rent_images();
                        $rents->images = $temp_name.".".$file->getClientOriginalExtension();
                        $rents->rent_id = $rent->id;
                        $rents->save();
                    }
                }

                $request->session()->flash('alert-success', 'Successfully Submit Duplicate Data In Admin Upload!');
                return redirect("/user_rent_request");
            }else{
                return redirect("/user_rent_request");
            }
        }else{
            return redirect('/realestate_login');
        }
    }
    public function user_rent_show ($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $rent = DB::table('rent')
                ->select('*')
                ->where('rent_id' ,'=', $id)
                ->get();
            $rent1 = DB::table('rent_images')
                ->select('images','rent_id')
                ->where('rent_id' ,'=', $id)
                ->get();
            return view('Adminpanel.user_rent_show',compact('rent','rent1'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function user_rent_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('rent')->where('rent_id', $id)->delete();
            DB::table('rent_images')->where('rent_id', $id)->delete();
            $request->session()->flash('alert-success', 'Deleted successfully');
            return Redirect::to('user_rent_request');
        }else{
            return redirect('/realestate_login');
        }
    }
//    users rent end



//    user purchase start
    public function user_purchase_request(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $purchase = Purchase::all();;
            return view("Adminpanel.user_purchase_request",compact('purchase'));
        }else{
            return redirect('/realestate_login');
        }

    }
    public function user_purchase_request_edit($id)
    {
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $purchase = DB::table('purchase')
                ->select('*')
                ->where('purchase_id' ,'=', $id)
                ->get();
            $purchase1 = DB::table('purchase_images')
                ->select('images','purchase_id')
                ->where('purchase_id' ,'=', $id)
                ->get();
            return view('Adminpanel.user_purchase_edit',compact('purchase','purchase1'));
        }else{
            return redirect('/realestate_login');
        }

    }
    public function user_purchase_request_store( Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            if($request->input('_token')){
                $this->validate($request, [
                    'property_name' => 'required',
                    'property_area' => 'required',
                    'no_of_bedrooms' => 'required',
                    'no_of_bathrooms' => 'required',
                    'address' => 'required',
                    'details' => 'required',
                    'amount' => 'required',
                    'location' => 'required',
                    'contact' => 'required|numeric',
                    'status' => 'required',
                ]);

                //get input and store into variables
                $property_id = $request->input('property_id');
                $user_id = $request->input('user_id');
                $purchase_tag = $request->input('purchase_tag');
                $property_name = $request->input('property_name');
                $property_area = $request->input('property_area');
                $property_floor = $request->input('property_floor');
                $no_of_bedrooms = $request->input('no_of_bedrooms');
                $no_of_bathrooms = $request->input('no_of_bathrooms');
                $address = $request->input('address');
                $details = $request->input('details');
                $amount = $request->input('amount');
                $location = $request->input('location');
                $contact = $request->input('contact');
                $status = $request->input('status');
                $purchase_id = $request->input('purchase_id');

                $get_property = DB::table('admin_purchase')
                    ->select('*')
                    ->where('property_id' ,'=', $property_id)
                    ->get();
                $get_id = '';
                foreach ($get_property as $get_property_id) {
                    $get_id = $get_property_id->property_id;
                }
                if ($get_id == ''){
                    //create new object
                    $purchase = new Admin_purchase;

                    //set all input to insert to db
                    $purchase->property_id = $property_id;
                    $purchase->user_id = $user_id;
                    $purchase->purchase_tag = $purchase_tag;
                    $purchase->property_name = $property_name;
                    $purchase->property_area = $property_area;
                    $purchase->property_floor = $property_floor;
                    $purchase->no_of_bedrooms = $no_of_bedrooms;
                    $purchase->no_of_bathrooms = $no_of_bathrooms;
                    $purchase->address = $address;
                    $purchase->details = $details;
                    $purchase->amount = $amount;
                    $purchase->location = $location;
                    $purchase->contact = $contact;
                    $purchase->status = $status;
                    $purchase->save();
                }else{
                    $request->session()->flash('alert-warning', 'Property Entry Already Exist In Admin Upload!');
                    return redirect("/user_purchase_request");
                }

                $status1 = "active";
                $status2 = "deactive";
                if ($status == 'active'){
                    DB::table('purchase')
                        ->where('purchase_id', $purchase_id)
                        ->update(['status' => $status1]);
                }else{
                    DB::table('purchase')
                        ->where('purchase_id', $purchase_id)
                        ->update(['status' => $status2]);
                }

                if($files1 = $request->input('image1')){
                    foreach ($files1 as $val){
                        $purchases = new Purchase_images();
                        $purchases->images = $val;
                        $purchases->purchase_id = $purchase->id;
                        $purchases->save();
                    }

                }
                if ($files = $request->file('image')){
                    foreach($files as $file){
                        $temp_name = rand(1,1000000);
                        $destinationPath = public_path('uploads');
                        $file->move($destinationPath,$temp_name.".".$file->getClientOriginalExtension());

                        $purchases = new Purchase_images();
                        $purchases->images = $temp_name.".".$file->getClientOriginalExtension();
                        $purchases->purchase_id = $purchase->id;
                        $purchases->save();
                    }
                }
                $request->session()->flash('alert-success', 'Successfully Submit Duplicate Data In Admin Upload!');
                return redirect("/user_purchase_request");
            }else{
                return redirect("/user_purchase_request");
            }
        }else{
            return redirect('/realestate_login');
        }
    }
    public function user_purchase_show ($id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            $purchase = DB::table('purchase')
                ->select('*')
                ->where('purchase_id' ,'=', $id)
                ->get();
            $purchase1 = DB::table('purchase_images')
                ->select('images','purchase_id')
                ->where('purchase_id' ,'=', $id)
                ->get();
            return view('Adminpanel.user_purchase_show',compact('purchase','purchase1'));
        }else{
            return redirect('/realestate_login');
        }

    }
    public function user_purchase_delete(Request $request,$id){
        $type_check = Auth::user()->role;
        if($type_check == "admin") {
            DB::table('purchase')->where('purchase_id', $id)->delete();
            DB::table('purchase_images')->where('purchase_id', $id)->delete();
            $request->session()->flash('alert-success', 'Deleted successfully');
            return Redirect::to('user_purchase_request');
        }else{
            return redirect('/realestate_login');
        }
    }
//    user purchase end


//    *********************************subadmin***************************************

    public function subadmin_sales_data(){
        $type_check = Auth::user()->role;
        if($type_check == "subadmin") {
            $sales = DB::table('sales')
                ->select('*')
                ->where('user_id' ,'=', Auth::user()->id)
                ->get();
            return view("Subadmin.sales_request",compact('sales'));
        }else{
            return redirect('/realestate_login');
        }

    }
    public function subadmin_add_sales(){
        $type_check = Auth::user()->role;
        if($type_check == "subadmin") {
            return view("Subadmin.add_sales");
        }else{
            return redirect('/realestate_login');
        }
    }
    public function subadmin_add_sales_store(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "subadmin") {
            $users = DB::table('users')
                ->select('*')
                ->where('id' ,'=', Auth::user()->id)
                ->get();

            foreach ($users as $user) {
            }
            $sale = DB::table('sales')->where('user_id' ,'=',  Auth::user()->id)->get();
            $check_count = count($sale);

            if($check_count < $user->limt_user){
                if($request->input('_token')){
                    $this->validate($request, [
                        'property_name' => 'required',
                        'property_area' => 'required',
                        'no_of_bedrooms' => 'required',
                        'no_of_bathrooms' => 'required',
                        'address' => 'required',
                        'details' => 'required',
                        'amount' => 'required',
                        'location' => 'required',
                        'contact' => 'required|numeric',
                        'status' => 'required',
                    ]);

                    $sale_tag = $request->input('sale_tag');
                    $property_name = $request->input('property_name');
                    $property_area = $request->input('property_area');
                    $property_floor = $request->input('property_floor');
                    $no_of_bedrooms = $request->input('no_of_bedrooms');
                    $no_of_bathrooms = $request->input('no_of_bathrooms');
                    $address = $request->input('address');
                    $details = $request->input('details');
                    $amount = $request->input('amount');
                    $location = $request->input('location');
                    $contact = $request->input('contact');
                    $status = $request->input('status');

                    $sales = new Sales;
                    $pro_id = rand(1,1000000);
                    $sales->user_id=  Auth::user()->id;
                    $sales->property_id = $pro_id;
                    $sales->sale_tag = $sale_tag;
                    $sales->property_name = $property_name;
                    $sales->property_area = $property_area;
                    $sales->property_floor = $property_floor;
                    $sales->no_of_bedrooms = $no_of_bedrooms;
                    $sales->no_of_bathrooms = $no_of_bathrooms;
                    $sales->address = $address;
                    $sales->details = $details;
                    $sales->amount = $amount;
                    $sales->location = $location;
                    $sales->contact = $contact;
                    $sales->status = $status;
                    $sales->save();

                    if($files = $request->file('image')) {
                        foreach($files as $file){
                            var_dump($file);
                            $temp_name = rand(1,1000000);
                            $destinationPath = public_path('uploads');
                            $file->move($destinationPath,$temp_name.".".$file->getClientOriginalExtension());

                            $sale = new Sale_images();
                            $sale->images = $temp_name.".".$file->getClientOriginalExtension();
                            $sale->sales_id = $sales->id;
                            $sale->user_id = Auth::user()->id;
                            $sale->save();
                        }
                    }

                    $notification = new Notifications;
                    $notification->name = "Agent Sales Property Request";
                    $notification->notification_url = "/user_sales_show/".$sales->id;
                    $notification->status = "1";
                    $notification->save();

                    $request->session()->flash('alert-success', 'Successfully Submit Sales Ads!');
                    return redirect("/add_sales_sa");
                }else{
                    $request->session()->flash('alert-danger', 'Please Try Again Something Went Wrong!');
                    return redirect("/add_sales_sa");
                }
            }else{
                $request->session()->flash('alert-warning', 'Your Sales Ads Out Of Limit Please Contact To Customer Care Thanku!');
                return redirect("/add_sales_sa");
            }
        }else{
            return redirect('/realestate_login');
        }
    }
    public function subadmin_sale_all_data($id){
        $type_check = Auth::user()->role;
        if($type_check == "subadmin") {
            $sales = DB::table('sales')
                ->select('*')
                ->where('sale_id' ,'=', $id)
                ->get();
            $sales_image = DB::table('sales_images')
                ->select('*')
                ->where('sales_id' ,'=', $id)
                ->get();
            return view("Subadmin.sales_data",compact('sales','sales_image'));
        }else{
            return redirect('/realestate_login');
        }
    }

    public function subadmin_purchase_data(){
        $type_check = Auth::user()->role;
        if($type_check == "subadmin") {
            $purchase = DB::table('purchase')
                ->select('*')
                ->where('user_id' ,'=', Auth::user()->id)
                ->get();
            return view("Subadmin.purchase_request",compact('purchase'));
        }else{
            return redirect('/realestate_login');
        }

    }
    public function subadmin_add_purchase(){
        $type_check = Auth::user()->role;
        if($type_check == "subadmin") {

            return view("Subadmin.add_purchase");
        }else{
            return redirect('/realestate_login');
        }

    }
    public function subadmin_add_purchase_store(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "subadmin") {
            $users = DB::table('users')
                ->select('*')
                ->where('id' ,'=', Auth::user()->id)
                ->get();

            foreach ($users as $user) {

            }
            $purchase_c = DB::table('purchase')->where('user_id' ,'=',  Auth::user()->id)->get();
            $check_count = count($purchase_c);

            if($check_count < $user->limt_user){
                if($request->input('_token')){
                    $this->validate($request, [
                        'property_name' => 'required',
                        'property_area' => 'required',
                        'no_of_bedrooms' => 'required',
                        'no_of_bathrooms' => 'required',
                        'address' => 'required',
                        'details' => 'required',
                        'amount' => 'required',
                        'location' => 'required',
                        'contact' => 'required|numeric',
                        'status' => 'required',
                    ]);

                    //get input and store into variables
                    $purchase_tag = $request->input('purchase_tag');
                    $property_name = $request->input('property_name');
                    $property_area = $request->input('property_area');
                    $property_floor = $request->input('property_floor');
                    $no_of_bedrooms = $request->input('no_of_bedrooms');
                    $no_of_bathrooms = $request->input('no_of_bathrooms');
                    $address = $request->input('address');
                    $details = $request->input('details');
                    $amount = $request->input('amount');
                    $location = $request->input('location');
                    $contact = $request->input('contact');
                    $status = $request->input('status');

                    //create new object
                    $purchase = new Purchase();

                    //set all input to insert to db
                    $pro_id = rand(1,1000000);
                    $purchase->user_id = Auth::user()->id;
                    $purchase->property_id = $pro_id;
                    $purchase->purchase_tag = $purchase_tag;
                    $purchase->property_name = $property_name;
                    $purchase->property_area = $property_area;
                    $purchase->property_floor = $property_floor;
                    $purchase->no_of_bedrooms = $no_of_bedrooms;
                    $purchase->no_of_bathrooms = $no_of_bathrooms;
                    $purchase->address = $address;
                    $purchase->details = $details;
                    $purchase->amount = $amount;
                    $purchase->location = $location;
                    $purchase->contact = $contact;
                    $purchase->status = $status;
                    $purchase->save();

                    if($files = $request->file('image')){
                        foreach($files as $file){
                            $temp_name = rand(1,1000000);
                            $destinationPath = public_path('uploads');
                            $file->move($destinationPath,$temp_name.".".$file->getClientOriginalExtension());

                            $rent_img = new Purchase_images();
                            $rent_img->purchase_id = $purchase->id;
                            $rent_img->images = $temp_name.".".$file->getClientOriginalExtension();
                            $rent_img->user_id = Auth::user()->id;
                            $rent_img->save();
                        }
                    }

                    $notification = new Notifications;
                    $notification->name = "Agent Purchase Property Request";
                    $notification->notification_url = "/user_purchase_show/".$purchase->id;
                    $notification->status = "1";
                    $notification->save();

                    $request->session()->flash('alert-success', 'Successfully Submit Purchase Ads!');
                    return redirect("/add_purchase_sa");
                }else{
                    $request->session()->flash('alert-danger', 'Please Try Again Something Went Wrong!');
                    return redirect("/add_purchase_sa");
                }
            }else{
                $request->session()->flash('alert-warning', 'Your Sales Ads Out Of Limit Please Contact To Customer Care Thanku!');
                return redirect("/add_purchase_sa");
            }
        }else{
            return redirect('/realestate_login');
        }

    }
    public function subadmin_purchase_all_data($id){
        $type_check = Auth::user()->role;
        if($type_check == "subadmin") {
            $purchase = DB::table('purchase')
                ->select('*')
                ->where('purchase_id' ,'=', $id)
                ->get();
            $purchase_images = DB::table('purchase_images')
                ->select('*')
                ->where('purchase_id' ,'=', $id)
                ->get();
            return view("Subadmin.purchase_data",compact('purchase','purchase_images'));
        }else{
            return redirect('/realestate_login');
        }
    }

    public function subadmin_rent_data(){
        $type_check = Auth::user()->role;
        if($type_check == "subadmin") {
            $rent = DB::table('rent')
                ->select('*')
                ->where('user_id' ,'=', Auth::user()->id)
                ->get();
            return view("Subadmin.rent_request",compact('rent'));
        }else{
            return redirect('/realestate_login');
        }
    }
    public function subadmin_add_rent(){
        $type_check = Auth::user()->role;
        if($type_check == "subadmin") {

            return view("Subadmin.add_rent");
        }else{
            return redirect('/realestate_login');
        }

    }
    public function subadmin_add_rent_store(Request $request){
        $type_check = Auth::user()->role;
        if($type_check == "subadmin") {
            $users = DB::table('users')
                ->select('*')
                ->where('id' ,'=', Auth::user()->id)
                ->get();

            foreach ($users as $user) {

            }
            $rent_c = DB::table('rent')->where('user_id' ,'=',  Auth::user()->id)->get();
            $check_count = count($rent_c);

            if($check_count < $user->limt_user){
                if($request->input('_token')){
                    $this->validate($request, [
                        'property_name' => 'required',
                        'property_area' => 'required',
                        'no_of_bedrooms' => 'required',
                        'no_of_bathrooms' => 'required',
                        'address' => 'required',
                        'details' => 'required',
                        'amount' => 'required',
                        'location' => 'required',
                        'contact' => 'required|numeric',
                        'status' => 'required',
                    ]);

                    //get input and store into variables
                    $rent_tag = $request->input('rent_tag');
                    $property_name = $request->input('property_name');
                    $property_area = $request->input('property_area');
                    $property_floor = $request->input('property_floor');
                    $no_of_bedrooms = $request->input('no_of_bedrooms');
                    $no_of_bathrooms = $request->input('no_of_bathrooms');
                    $address = $request->input('address');
                    $details = $request->input('details');
                    $amount = $request->input('amount');
                    $location = $request->input('location');
                    $contact = $request->input('contact');
                    $status = $request->input('status');

                    //create new object
                    $rent = new Rent();

                    //set all input to insert to db
                    $pro_id = rand(1,1000000);
                    $rent->user_id = Auth::user()->id;
                    $rent->property_id = $pro_id;
                    $rent->rent_tag = $rent_tag;
                    $rent->property_name = $property_name;
                    $rent->property_area = $property_area;
                    $rent->property_floor = $property_floor;
                    $rent->no_of_bedrooms = $no_of_bedrooms;
                    $rent->no_of_bathrooms = $no_of_bathrooms;
                    $rent->address = $address;
                    $rent->details = $details;
                    $rent->amount = $amount;
                    $rent->location = $location;
                    $rent->contact = $contact;
                    $rent->status = $status;
                    $rent->save();

                    if($files = $request->file('image')){
                        foreach($files as $file){
                            $temp_name = rand(1,1000000);
                            $destinationPath = public_path('uploads');
                            $file->move($destinationPath,$temp_name.".".$file->getClientOriginalExtension());

                            $rent_img = new Rent_images();
                            $rent_img->rent_id = $rent->id;
                            $rent_img->images = $temp_name.".".$file->getClientOriginalExtension();
                            $rent_img->user_id = Auth::user()->id;
                            $rent_img->save();
                        }
                    }

                    $notification = new Notifications;
                    $notification->name = "Agent Rent Property Request";
                    $notification->notification_url = "/user_rent_show/".$rent->id;
                    $notification->status = "1";
                    $notification->save();

                    $request->session()->flash('alert-success', 'Successfully Submit Rent Ads!');
                    return redirect("/add_rent_sa");
                }else{
                    $request->session()->flash('alert-danger', 'Please Try Again Something Went Wrong!');
                    return redirect("/add_rent_sa");
                }
            }else{
                $request->session()->flash('alert-warning', 'Your Sales Ads Out Of Limit Please Contact To Customer Care Thanku!');
                return redirect("/add_rent_sa");
            }
        }else{
            return redirect('/realestate_login');
        }

    }
    public function subadmin_rent_all_data($id){
        $type_check = Auth::user()->role;
        if($type_check == "subadmin") {
            $rent = DB::table('rent')
                ->select('*')
                ->where('rent_id' ,'=', $id)
                ->get();
            $rent_images = DB::table('rent_images')
                ->select('*')
                ->where('rent_id' ,'=', $id)
                ->get();
            return view("Subadmin.rent_data",compact('rent','rent_images'));
        }else{
            return redirect('/realestate_login');
        }
    }



    //search filter
    public function search_filter(Request $request){
        $type = '';
        $query = '';
        $location = $request->input('location');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        $property_floor = $request->input('property_floor');
        $no_of_bedrooms = $request->input('no_of_bedrooms');
        $no_of_bathrooms = $request->input('no_of_bathrooms');
        if($request->input('type') == "all"){
            $type = '';
        }else{
            switch($request->input('type')){
                case 'rent':
                    $query = "SELECT admin_rent.* ,rent_images.images FROM admin_rent LEFT JOIN rent_images ON admin_rent.rent_id = rent_images.rent_id";
                    break;
                case 'sales':
                    $query = "SELECT admin_sales.* ,sales_images.images FROM admin_sales LEFT JOIN sales_images ON admin_sales.sale_id = sales_images.sales_id";
                    break;
                case 'purchase':
                    $query = "SELECT admin_purchase.* ,purchase_images.images FROM admin_purchase LEFT JOIN purchase_images ON admin_purchase.purchase_id = purchase_images.purchase_id";
                    break;
                default:
                    $type = 'none selected';
                    break;
            }
        }
        if(!empty($property_floor)){
            $query .= " WHERE property_floor = $property_floor";
        }
        if(!empty($no_of_bedrooms)){
            $query .= " AND no_of_bedrooms = $no_of_bedrooms";
        }
        if(!empty($no_of_bathrooms)){
            $query .= " AND no_of_bathrooms = $no_of_bathrooms";
        }
        if(!empty($location) && !empty($min_price) && !empty($max_price)){
            $query .= " AND location LIKE '%".$location."%' AND amount BETWEEN ".$min_price." AND ".$max_price."";
        }elseif(empty($location) && !empty($min_price) && !empty($max_price)){
            $query .= " AND amount BETWEEN ".$min_price." AND ".$max_price."";
        }elseif(!empty($location) && empty($min_price) && empty($max_price)){
            $query .= " AND location LIKE '%".$location."%'";
        }else{
            $query .= "";
        }

        if ($request->input('type') == 'rent'){
            $query .= " GROUP BY rent_images.rent_id";
        }elseif ($request->input('type') == 'sales'){
            $query .= " GROUP BY sales_images.sales_id";
        }elseif ($request->input('type') == 'purchase'){
            $query .= " GROUP BY purchase_images.purchase_id";
        }


        if(!empty($query)) {
            $result = DB::select(DB::raw($query));
        }else{
            $result = "Please select any property type!";
        }
//        var_dump($result);
//        exit;

        return view("website.search_filter",compact('result'));
//        return $this->respond([
//            'result' => $result,
//            'location' => $location
//        ]);
    }

}