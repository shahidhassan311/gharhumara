<?php
/**
 * Created by PhpStorm.
 * User: Hassan Shahid
 * Date: 12/1/2017
 * Time: 1:40 AM
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Validator , Input,Session, Redirect;
use App\Marketing;
use App\Property_message;
use Illuminate\Http\Request;
use App\Http\Requests;
use Response;
use Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;


class MarketingController extends Controller
{
    public function marketing_p(){
        return view('marketing.index');
    }

    public function marketing_store(Request $request){

        if($request->input('_token')){
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'contact' => 'required',
                'dfb' => 'required',
            ]);

            //get input and store into variables
            $name = $request->input('name');
            $email = $request->input('email');
            $contact = $request->input('contact');
            $dfb = $request->input('dfb');

            //create new object
            $marketing = new Marketing;
            $marketing->name = $name;
            $marketing->email = $email;
            $marketing->contact = $contact;
            $marketing->dfb = $dfb;
            $marketing->save();

            if ($marketing->save() == true){
                $request->session()->flash('alert-success', 'Successfully Submit!');
                return redirect("/WIN-PSL-FINAL-TICKET");
            }else{
                $request->session()->flash('alert-warning', 'Something Went Wrong Please Try Again!');
                return redirect("/WIN-PSL-FINAL-TICKET");
            }
        }else {
            $request->session()->flash('alert-danger', 'Something Went Wrong!');
            Session::flash('message', "Token Missing!");
            return redirect("/WIN-PSL-FINAL-TICKET");
        }

    }
}