<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use View;
class LoginController extends Controller {

    /**
     * Store a new blog post.
     *
     * @param  Request  $request
     * @return Response
     */
   
    public function index() {        
        return view('login/login');
    }

    public function ajax_check(Request $request) {
        $validator = Validator::make($request->all(), [
                    'email' => 'required|email',
                    'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                        'status' => 0,
                        'msg' => $validator->getMessageBag()->toArray()
                            ], 200);
        } else {
            $userRecord = DB::table('user_mst')->where('emailid', $request->input('email'))->where('secret_pass', md5($request->input('password')))->get();
            if (count($userRecord) > 0) {
               Session::put(array('email'=>$userRecord[0]->emailid,'name'=>$userRecord[0]->fname,'logged_in' => TRUE));
               return response()->json([
                            'status' => 1                           
                                ], 200);
            } else {
                return response()->json([
                            'status' => 0,
                            'msg' => array("Invalid Credential")
                                ], 200);
            }
        }
    }

}
