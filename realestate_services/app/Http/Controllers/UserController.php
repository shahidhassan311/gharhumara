<?php namespace App\Http\Controllers;
use App\User;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use JWTAuth;
use Response;
use App\Repository\Transformers\UserTransformer;
use \Illuminate\Http\Response as Res;
use Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Session;

class UserController extends ApiController
{
    /**
     * @var \App\Repository\Transformers\UserTransformer
     * */
    protected $userTransformer;

    public function __construct(userTransformer $userTransformer)
    {
        $this->userTransformer = $userTransformer;
    }

    /**
     * @description: Api user authenticate method
     * @param: email, password,token
     * @return: Json String response
     */
    public function authenticate(Request $request)
    {
        $rules = array (
            'email' => 'required|email',
            'password' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator-> fails()){
            return $this->respondValidationError('Fields Validation Failed.', $validator->errors());
        }
        else{
            $user = User::where('email', $request['email'])->first();
            if($user){
                $api_token = $user->api_token;
                if ($api_token == NULL){
                    return $this->_login($request['email'], $request['password']);
                }
                try{
                    $user = JWTAuth::toUser($api_token);
                    return $this->respond([
                        'status' => 'success',
                        'status_code' => $this->getStatusCode(),
                        'message' => 'Already logged in',
                        'user' => $this->userTransformer->transform($user)
                    ]);
                }catch(JWTException $e){
                    $user->api_token = NULL;
                    $user->save();
//                    return $this->respondInternalError("Login Unsuccessful. An error occurred while performing an action!");
                }
            }
            else{
                return $this->respondWithError("Invalid Email or Password");
            }
        }
    }

    private function _login($email, $password)
    {
        $credentials = ['email' => $email, 'password' => $password];

        if ( ! $token = JWTAuth::attempt($credentials)) {
            return $this->respondWithError("User does not exist!");
        }
        $user = JWTAuth::toUser($token);
        $user->api_token = $token;
        Session::put('api_token',$token);
        $user->save();
        return $this->respond([
            'status' => 'success',
            'status_code' => $this->getStatusCode(),
            'message' => 'Login successful!',
            'data' => $this->userTransformer->transform($user),
        ]);
    }

    /**
     * @description: Api user register method
     * @param: name,contact, email, password , referral_id(optional)
     * @return: Json String response
     */
    public function register(Request $request)
    {
        $rules = array (
            'name' => 'required|max:255',
            'contact' => 'required|max:255',
            'limt_user' => 'required',
            'role' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:3'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator-> fails()){
            return $this->respondValidationError('Fields Validation Failed.', $validator->errors());
        }
        else{
            $user = User::create([
                'name' => $request['name'],
                'contact' => $request['contact'],
                'referral_id' => $request['referral_id'],
                'email' => $request['email'],
                'password' => \Hash::make($request['password']),
                'limt_user' => $request['limt_user'],
                'role' => $request['role'],
            ]);

            return $this->_login($request['email'], $request['password']);
        }
    }

    /**
     * @description: Api file upload method (testing work)
     * @param: image
     * @return: Json String response
     */
    public function upload_files(Request $request){
        $token  = $request->input('token');
        $destination_path = public_path('uploads');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $files = Input::file('image');
                foreach($files as $file){
                    $temp_name = rand(1,1000000);
                    $destinationPath = public_path('uploads');
                    $file->move($destinationPath,$temp_name.".".$file->getClientOriginalExtension());
                    DB::table('upload_files_tbl')->insert([
                        'upld_file_name' => $temp_name.".".$file->getClientOriginalExtension(),
                        'user_id' => $userDetails->id
                    ]);
                }
                return $this->respond([
                    'success' => 'Images uploaded successfully'
                ]);
            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }

    /**
     * @description: sale api
     * @param Request $request
     * @param $id
     * @return  : Json String response
     * @internal param $ : sale_tag,address,details,amount,location,contact,status,token
     **/
    public function add_sales(Request $request, $id){
        $token  = $request->input('token');
        $destination_path = public_path('uploads');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $users = DB::table('users')
                    ->select('*')
                    ->where('id' ,'=', $id)
                    ->get();

                foreach ($users as $user) {

                }
                $sale = DB::table('sales')->where('user_id' , $id)->get();
                $check_count = count($sale);
//                var_dump($check_count);
//                var_dump($user->limt_user);
//                exit;
                if($check_count < $user->limt_user){
                    $sale_tag = Input::get('sale_tag');
                    $property_name = Input::get('property_name');
                    $property_area = Input::get('property_area');
                    $property_floor = Input::get('property_floor');
                    $no_of_bedrooms = Input::get('no_of_bedrooms');
                    $no_of_bathrooms = Input::get('no_of_bathrooms');
                    $address = Input::get('address');
                    $details = Input::get('details');
                    $amount = Input::get('amount');
                    $location = Input::get('location');
                    $contact = Input::get('contact');
                    $status = Input::get('status');

                    $pro_id = rand(1,1000000);
                    $id = DB::table('sales')->insertGetId(
                        [
                            'user_id' => $userDetails->id,
                            'property_id' => $pro_id,
                            'sale_tag' => $sale_tag,
                            'property_name' => $property_name,
                            'property_area' => $property_area,
                            'property_floor' => $property_floor,
                            'no_of_bedrooms' => $no_of_bedrooms,
                            'no_of_bathrooms' => $no_of_bathrooms,
                            'address' => $address,
                            'details' => $details,
                            'amount' => $amount,
                            'location' => $location,
                            'contact' => $contact,
                            'status' => $status
                        ]
                    );

                    return $this->respond([
                        'result' => 'success',
                        '$lastInsertedID' => $id,
                    ]);
                }else{
                    return $this->respond([
                        'result' => 'please buy',
                    ]);
                }
            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }
    public function add_sales_image(Request $request, $id){
        $token  = $request->input('token');
        $destination_path = public_path('uploads');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $last_id = Input::get('last_id');

                $convertImg = $_REQUEST['images'];

                $destinationPath = $_SERVER["DOCUMENT_ROOT"]."/public/uploads/";
                $img = $this->convertImg($convertImg, $destinationPath);
                DB::table('sales_images')->insert([
                    'user_id' => $userDetails->id,
                    'sales_id' => $last_id,
                    'images' =>  $img,
                ]);
                return $this->respond([
                    'success' => 'success',
//                    '$lastInsertedID' => $id,
                ]);

            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }

    function convertImg($img,$path){
        // $img = $_POST['img'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $imgName = rand(1,1000000).'.png';
        $file = $path.'/'.$imgName;
        $success = file_put_contents($file, $data);
        return $success ? $imgName : false;
    }


    /**
     * @description: purchase api
     * @param Request $request
     * @param $id
     * @return  : Json String response
     * @internal param $ : purchase_tag,address,details,amount,location,contact,status,token
     */
    public function add_purchase(Request $request , $id){
        $token  = $request->input('token');
        $destination_path = public_path('uploads');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $users = DB::table('users')
                    ->select('*')
                    ->where('id' ,'=', $id)
                    ->get();

                foreach ($users as $user) {

                }
                $purchase_c = DB::table('purchase')->where('user_id' , $id)->get();
                $check_count = count($purchase_c);

                if($check_count < $user->limt_user){
                    $purchase_tag = Input::get('purchase_tag');
                    $property_name = Input::get('property_name');
                    $property_area = Input::get('property_area');
                    $property_floor = Input::get('property_floor');
                    $no_of_bedrooms = Input::get('no_of_bedrooms');
                    $no_of_bathrooms = Input::get('no_of_bathrooms');
                    $address = Input::get('address');
                    $details = Input::get('details');
                    $amount = Input::get('amount');
                    $location = Input::get('location');
                    $contact = Input::get('contact');
                    $status = Input::get('status');


                    $pro_id = rand(1,1000000);
                    $data = new \DateTime();
                    $id = DB::table('purchase')->insertGetId(
                        [
                            'user_id' => $userDetails->id,
                            'property_id' => $pro_id,
                            'purchase_tag' => $purchase_tag,
                            'property_name'=>$property_name,
                            'property_area'=>$property_area,
                            'property_floor'=>$property_floor,
                            'no_of_bedrooms'=>$no_of_bedrooms,
                            'no_of_bathrooms'=>$no_of_bathrooms,
                            'address' => $address,
                            'details' => $details,
                            'amount' => $amount,
                            'location' => $location,
                            'contact' => $contact,
                            'status' => $status,
                            'created_at' => $data
                        ]
                    );

//                    if ($convertImg = $_REQUEST['image']){
//                        foreach($convertImg as $file){
//                            $destinationPath = public_path('uploads');
//                            $img = $this->convertImg($file, $destinationPath);
//                            DB::table('purchase_images')->insert([
//                                'user_id' => $userDetails->id,
//                                'purchase_id' => $id,
//                                'images' =>  $img,
//                            ]);
//                        }
//
//                    }

                    return $this->respond([
                        'result' => 'success',
                        '$lastInsertedID' => $id,

                    ]);
                }else{
                    return $this->respond([
                        'result' => 'please buy',
                    ]);
                }
            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }

    public function add_purchase_image(Request $request, $id){
        $token  = $request->input('token');
        $destination_path = public_path('uploads');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {

                $last_id = Input::get('last_id');

                $convertImg = $_REQUEST['images'];

                $destinationPath = $_SERVER["DOCUMENT_ROOT"]."/public/uploads/";
                $img = $this->convertImg($convertImg, $destinationPath);
                DB::table('purchase_images')->insert([
                    'user_id' => $userDetails->id,
                    'purchase_id' => $last_id,
                    'images' =>  $img,
                ]);
                return $this->respond([
                    'success' => 'success',
//                    '$lastInsertedID' => $id,
                ]);
            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }

    /**
     * @description: rent api
     * @param Request $request
     * @param $id
     * @return  : Json String response
     * @internal param $ : rent_tag,address,details,amount,location,contact,status,token
     */
    public function add_rent(Request $request , $id){
        $token  = $request->input('token');
        $destination_path = public_path('uploads');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $users = DB::table('users')
                    ->select('*')
                    ->where('id' ,'=', $id)
                    ->get();

                foreach ($users as $user) {

                }
                $rent_c = DB::table('rent')->where('user_id' , $id)->get();
                $check_count = count($rent_c);
                if($check_count < $user->limt_user){
                    $rent_tag = Input::get('rent_tag');
                    $property_name = Input::get('property_name');
                    $property_area = Input::get('property_area');
                    $property_floor = Input::get('property_floor');
                    $no_of_bedrooms = Input::get('no_of_bedrooms');
                    $no_of_bathrooms = Input::get('no_of_bathrooms');
                    $address = Input::get('address');
                    $details = Input::get('details');
                    $rent_amount = Input::get('rent_amount');
                    $advanced_amount = Input::get('advanced_amount');
                    $location = Input::get('location');
                    $contact = Input::get('contact');
                    $status = Input::get('status');

                    $pro_id = rand(1,1000000);
                    $id = DB::table('rent')->insertGetId(
                        [
                            'user_id' => $userDetails->id,
                            'property_id' => $pro_id,
                            'rent_tag' => $rent_tag,
                            'property_name'=>$property_name,
                            'property_area'=>$property_area,
                            'property_floor'=>$property_floor,
                            'no_of_bedrooms'=>$no_of_bedrooms,
                            'no_of_bathrooms'=>$no_of_bathrooms,
                            'address' => $address,
                            'details' => $details,
                            'rent_amount' => $rent_amount,
                            'advanced_amount' => $advanced_amount,
                            'location' => $location,
                            'contact' => $contact,
                            'status' => $status
                        ]
                    );

//                    if ($convertImg = $_REQUEST['image']){
//                        foreach($convertImg as $file){
//                            $destinationPath = public_path('uploads');
//                            $img = $this->convertImg($file, $destinationPath);
//                            DB::table('rent_images')->insert([
//                                'user_id' => $userDetails->id,
//                                'rent_id' => $id,
//                                'images' =>  $img,
//                            ]);
//                        }
//
//                    }
                    return $this->respond([
                        'result' => 'success',
                        '$lastInsertedID' => $id,

                    ]);
                }else{
                    return $this->respond([
                        'result' => 'please bye',

                    ]);
                }
            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }

    public function add_rent_image(Request $request, $id){
        $token  = $request->input('token');
        $destination_path = public_path('uploads');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $last_id = Input::get('last_id');

                $convertImg = $_REQUEST['images'];

                $destinationPath = $_SERVER["DOCUMENT_ROOT"]."/public/uploads/";
                $img = $this->convertImg($convertImg, $destinationPath);
                DB::table('rent_images')->insert([
                    'user_id' => $userDetails->id,
                    'rent_id' => $last_id,
                    'images' =>  $img,
                ]);
                return $this->respond([
                    'success' => 'success',
//                    '$lastInsertedID' => $id,
                ]);
            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }
    /**
     * @description: purchase data
     * @param: url?token= token
     * @return: Json String response
     */
    public function user_purchase_data(Request $request){
        $token  = $request->input('token');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $users = DB::table('users as u')
                    ->leftJoin('purchase as p','p.user_id','=','u.id')
                    ->leftJoin('purchase_images as i','i.purchase_id','=','p.purchase_id')
                    ->select('i.images','p.*')
                    ->where('p.status', '=' ,"active")
                    ->get();

                return $this->respond([
                    'success' => 'Data successfully',
                    'data' => $users,

                ]);
            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }
    //guest
    public function user_purchase_data_guest(Request $request){

        $users = DB::table('admin_purchase as p')
            ->leftJoin('purchase_images as i','i.purchase_id','=','p.purchase_id')
            ->select('i.images','i.purchase_id','p.*')
            ->where('p.status','=','active')
            ->groupBy('i.purchase_id')
            ->orderBy('p.purchase_tag', 'is', 'null')
            ->orderBy('p.purchase_tag', 'asc')
            ->get();


        return $this->respond([
            'success' => 'Data successfully',
            'data' => $users,

        ]);

    }
    /**
     * @description: rent data
     * @param: url?token= token
     * @return: Json String response
     */
    public function user_rent_data(Request $request){
        $token  = $request->input('token');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $users = DB::table('users as u')
                    ->leftJoin('rent as p','p.user_id','=','u.id')
                    ->leftJoin('rent_images as i','i.rent_id','=','p.rent_id')
                    ->select('i.images','p.*')
                    ->where('p.status' ,'=', "active")
                    ->get();

                return $this->respond([
                    'success' => 'Data successfully',
                    'data' => $users,

                ]);
            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }
    //guest
    public function user_rent_data_guest(Request $request){
        $users = DB::table('admin_rent as p')
            ->leftJoin('rent_images as i','i.rent_id','=','p.rent_id')
            ->select('i.images','i.rent_id','p.*')
            ->where('p.status','=','active')
            ->groupBy('i.rent_id')
            ->orderBy('p.rent_tag', 'is', 'null')
            ->orderBy('p.rent_tag', 'asc')
            ->get();

        return $this->respond([
            'success' => 'Data successfully',
            'data' => $users,

        ]);

    }
    /**
     * @description: sales data
     * @param: url?token= token
     * @return: Json String response
     */
    public function user_sale_data(Request $request){
        $token  = $request->input('token');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $users = DB::table('users as u')
                    ->leftJoin('sales as p','p.user_id','=','u.id')
                    ->leftJoin('sales_images as i','i.sales_id','=','p.sale_id')
                    ->select('i.images','p.*')
                    ->where('p.status' ,'=', "active")
                    ->get();

                return $this->respond([
                    'success' => 'Data successfully',
                    'data' => $users,

                ]);
            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }
    //guest
    public function user_sale_data_guest(Request $request){
    
        $users = DB::table('admin_sales as p')
                ->leftJoin('sales_images as i','i.sales_id','=','p.sale_id')
                ->select('i.images','i.sales_id','p.*')
                ->where('p.status','=','active')
                ->groupBy('i.sales_id')
                ->orderBy('p.sale_tag', 'is', 'null')
                ->orderBy('p.sale_tag', 'asc')
                ->get();

        return $this->respond([
            'success' => 'Data successfully',
            'data' => $users,
        ]);

    }
    /**
     * @description: sale product_detail
     * @param:  URL/ID?TOKEN= TOKEN
     * @return: Json String response
     */
    public function rent_detail(Request $request , $id){
        $token  = $request->input('token');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $users = DB::table('rent')
                    ->select('*')
                    ->where('rent_id' ,'=', $id)
                    ->get();
                $users1 = DB::table('rent_images')
                    ->select('images')
                    ->where('rent_id' ,'=', $id)
                    ->get();

                return $this->respond([
                    'success' => 'Data successfully',
                    'data' => $users,$users1,

                ]);
            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }
    //guest
    public function rent_detail_guest(Request $request , $id){

        $users = DB::table('admin_rent')
            ->select('*')
            ->where('rent_id' ,'=', $id)
            ->get();
        $users1 = DB::table('rent_images')
            ->select('images')
            ->where('rent_id' ,'=', $id)
            ->get();
        $users_info = '';
        foreach ($users as $users_in){
            $users_info = DB::table('users')->select('*')->where('id' ,'=', $users_in->user_id)->get();
        }
        return $this->respond([
            'success' => 'Data successfully',
            'data' => $users,$users1,$users_info

        ]);

    }
    /**
     * @description: sale product_detail
     * @param:  URL/ID?TOKEN= TOKEN
     * @return: Json String response
     */
    public function sale_detail(Request $request , $id){
        $token  = $request->input('token');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $users = DB::table('sales')
                    ->select('*')
                    ->where('sale_id' ,'=', $id)
                    ->get();
                $users1 = DB::table('sales_images')
                    ->select('images')
                    ->where('sales_id' ,'=', $id)
                    ->get();

                return $this->respond([
                    'success' => 'Data successfully',
                    'data' => $users,$users1,

                ]);
            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }
    //guest
    public function sale_detail_guest(Request $request , $id){

        $users = DB::table('admin_sales')
            ->select('*')
            ->where('sale_id' ,'=', $id)
            ->get();
        $users1 = DB::table('sales_images')
            ->select('images')
            ->where('sales_id' ,'=', $id)
            ->get();
        $users_info = '';
        foreach ($users as $users_in){
            $users_info = DB::table('users')->select('*')->where('id' ,'=', $users_in->user_id)->get();
        }

        return $this->respond([
            'success' => 'Data successfully',
            'data' => $users,$users1,$users_info

        ]);

    }
    /**
     * @description: sale product_detail
     * @param:  URL/ID?TOKEN= TOKEN
     * @return: Json String response
     */
    public function purchase_detail(Request $request , $id){
        $token  = $request->input('token');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $users = DB::table('purchase')
                    ->select('*')
                    ->where('purchase_id' ,'=', $id)
                    ->get();
                $users1 = DB::table('purchase_images')
                    ->select('images')
                    ->where('purchase_id' ,'=', $id)
                    ->get();

                return $this->respond([
                    'success' => 'Data successfully',
                    'data' => $users,$users1,

                ]);
            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }
    //guest
    public function purchase_detail_guest(Request $request , $id){

        $users = DB::table('admin_purchase')
            ->select('*')
            ->where('purchase_id' ,'=', $id)
            ->get();
        $users1 = DB::table('purchase_images')
            ->select('images')
            ->where('purchase_id' ,'=', $id)
            ->get();
        $users_info = '';
        foreach ($users as $users_in){
            $users_info = DB::table('users')->select('*')->where('id' ,'=', $users_in->user_id)->get();
        }

        return $this->respond([
            'success' => 'Data successfully',
            'data' => $users,$users1,$users_info

        ]);

    }

    /**
     * @description: sales_my_property
     * @param Request $request
     * @param $id
     * @return  : Json String response
     * @internal param $ : url?token= token
     */
    public function sale_my_property(Request $request , $id){
        $token  = $request->input('token');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {

                $users = DB::table('users as u')
                    ->leftJoin('sales as p','p.user_id','=','u.id')
                    ->leftJoin('sales_images as i','i.sales_id','=','p.sale_id')
                    ->select('i.images','i.sales_id','p.*')
                    ->where('p.user_id' ,'=', $id)
                    ->groupBy('i.sales_id')
                    ->get();

                return $this->respond([
                    'success' => 'Data successfully',
                    'data' => $users

                ]);
            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }
    /**
     * @description: rent_my_property
     * @param Request $request
     * @param $id
     * @return  : Json String response
     * @internal param $ : url?token= token
     */
    public function rent_my_property(Request $request , $id){
        $token  = $request->input('token');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $users = DB::table('users as u')
                    ->leftJoin('rent as p','p.user_id','=','u.id')
                    ->leftJoin('rent_images as i','i.rent_id','=','p.rent_id')
                    ->select('i.images','i.rent_id','p.*')
                    ->where('p.user_id' ,'=', $id)
                    ->groupBy('i.rent_id')
                    ->get();

                return $this->respond([
                    'success' => 'Data successfully',
                    'data' => $users,

                ]);
            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }
    /**
     * @description: rent_my_property
     * @param Request $request
     * @param $id
     * @return  : Json String response
     * @internal param $ : url?token= token
     */
    public function purchase_my_property(Request $request , $id){
        $token  = $request->input('token');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $users = DB::table('users as u')
                    ->leftJoin('purchase as p','p.user_id','=','u.id')
                    ->leftJoin('purchase_images as i','i.purchase_id','=','p.purchase_id')
                    ->select('i.images','i.purchase_id','p.*')
                    ->where('p.user_id' ,'=', $id)
                    ->groupBy('i.purchase_id')
                    ->get();


                return $this->respond([
                    'success' => 'Data successfully',
                    'data' => $users,

                ]);
            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }
    /**
     * @description: sales all data
     * @param: url?token= token
     * @return: Json String response
     */
    public function sale_all_data(Request $request){
        $token  = $request->input('token');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
//                $users = DB::table('sales as u')
//                    ->leftJoin('sales_images as i','i.sales_id','=','u.sale_id')
//                    ->select('u.sale_id','i.images','u.sale_tag','u.address','u.details','u.amount','u.location','u.contact')
//                    ->get();
                $users = DB::table('sales')
                    ->select('*')
                    ->get();
                $users1 = DB::table('sales_images')
                    ->select('sales_id','images')
                    ->get();

                return $this->respond([
                    'success' => 'Data successfully',
                    'data' => $users,$users1

                ]);
            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }
    /**
     * @description: rent all data
     * @param: url?token= token
     * @return: Json String response
     */
    public function rent_all_data(Request $request){
        $token  = $request->input('token');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $users = DB::table('rent')
                    ->select('r*')
                    ->get();
                $users1 = DB::table('rent_images')
                    ->select('rent_id','images')
                    ->get();

                return $this->respond([
                    'success' => 'Data successfully',
                    'data' => $users,$users1

                ]);
            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }
    /**
     * @description: purchase all data
     * @param: url?token= token
     * @return: Json String response
     */
    public function purchase_all_data(Request $request){
        $token  = $request->input('token');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $users = DB::table('purchase')
                    ->select('*')
                    ->get();
                $users1 = DB::table('purchase_images')
                    ->select('purchase_id','images')
                    ->get();

                return $this->respond([
                    'success' => 'Data successfully',
                    'data' => $users,$users1

                ]);
            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }
    /**
     * @description: user_profile_update
     * @param:  name,contact,token
     * @return: Json String response
     */
    /**
     * @description: sales_my_property
     * @param Request $request
     * @param $id
     * @return  : Json String response
     * @internal param $ : url?token= token
     */
    public function user_profile(Request $request , $id){
        $token  = $request->input('token');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $users = DB::table('users')
                    ->select('*')
                    ->where('id' ,'=', $id)
                    ->get();


                return $this->respond([
                    'success' => 'Data successfully',
                    'data' => $users

                ]);
            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }
    public function user_profile_update(Request $request , $id){
        $token  = $request->input('token');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $book = User::find($id);
                $book->name = $request->input('name');
                $book->contact = $request->input('contact');
                $book->referral_id = $request->input('referral_id');
                $book->email= $request->input('email');

                if ($book->save()) {
                    return $this->respond([
                        'success' => 'Data Update successfully',
                        'data' => $book,
                    ]);
                }

            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }
    /**
     * @description: Api user logout method
     * @param: null
     * @return: Json String response
     */
    public function logout($api_token)
    {
        try{
            $user = JWTAuth::toUser($api_token);
            $user->api_token = NULL;
            $user->save();
            JWTAuth::setToken($api_token)->invalidate();
            $this->setStatusCode(Res::HTTP_OK);
            Session::flush();
            return $this->respond([
                'status' => 'success',
                'status_code' => $this->getStatusCode(),
                'message' => 'Logout successful!',
            ]);

        }catch(JWTException $e){
            return $this->respondInternalError("An error occurred while performing an action!");
        }
    }

    /*
     * @description: Api filter for search
     * */
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
        return $this->respond([
            'result' => $result,
            'location' => $location
        ]);
    }
    public function services_guest(Request $request){
        $users = DB::table('our_services')
            ->select('*')
            ->get();

        return $this->respond([
            'success' => 'Data successfully',
            'data' => $users,

        ]);

    }
    public function services_message(Request $request, $id){
        $token  = $request->input('token');
        $destination_path = public_path('uploads');
        if(isset($token)) {
            $user = JWTAuth::toUser($token);
            $userDetails = User::where('api_token',$token)->first();
            if (empty($user)) {
                return $this->respondWithError(['User is not logged in!']);
            } else {
                $username= Input::get('username');
                $email = Input::get('email');
                $contact = Input::get('contact');
                $service_type = Input::get('service_type');
                $message = Input::get('message');

                $id = DB::table('our_services_message')->insertGetId(
                    [
                        'user_id' => $userDetails->id,
                        'username' => $username,
                        'email' => $email,
                        'contact' => $contact,
                        'service_type' => $service_type,
                        'message' => $message,
                    ]
                );

                return $this->respond([
                    'success' => 'Data insert successfully',
                    '$lastInsertedID' => $id,
                ]);

            }
        }else{
            return $this->respondWithError(['Parameter token is missing!']);
        }
    }
}