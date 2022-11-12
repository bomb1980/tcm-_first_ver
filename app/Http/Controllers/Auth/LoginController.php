<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OoapTblEmployee;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Encryption\Encrypter;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function gettoken(Request $request)
    {

        // echo 'dfsddsdss';exit;
        $em_citizen_id = trim($request->em_citizen_id);

        $password = trim($request->password);

        if (empty($em_citizen_id) || empty($password)) {

            $this->response['massage'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';

            $this->response['success'] = 0;

            return response()->json($this->response, 400);
        }

        $user = OoapTblEmployee::where('emp_citizen_id', $em_citizen_id)->where('status', '=', 1)->where('in_active', false)->first();

        if ($user) {

            // if (!password_verify($password, $user->emp_password)) {

            //     $this->response['massage'] = 'รหัสผ่านไม่ถูกต้อง';
            //     $this->response['data'] = [];
            //     $this->response['success'] = 0;

            //     return response()->json($this->response, 400);
            // }

            // $user->tokens()->delete();

            $token = $user->createToken('mobileToken');

            $ex = explode('|', $token->plainTextToken);

            $this->response['massage'] = 'ล็อกอินสำเร็จ';
            $this->response['token'] = $ex[1];
            $this->response['success'] = 1;
            $this->response['role'] = $user->role_id;

            $goto['route'] = 'member.list.mobile';
            $goto['param'] = [];

            $goto['code'] = $user->em_citizen_id;

            $json_encode = json_encode($goto);

            $code = getEncrypter($json_encode);

            //$this->response['link_to_member_list'] = route('loginWithBearer', ['code' => $code]);

            return response()->json($this->response, 200);
        }

        $this->response['massage'] = 'ไม่มีผู้ใช้งานนี้ในระบบ';
        $this->response['data'] = [];
        $this->response['success'] = 0;

        return response()->json($this->response, 400);
    }

    public function login(Request $request)
    {

        $name = trim($request->name);

        $user = OoapTblEmployee::where('emp_citizen_id', '=', $name)->where('status', '=', 1)->where('in_active', false)->first();

        if ($user) {

            $token = $user->createToken('myooapsys')->plainTextToken;
            $myooapsys = explode('|', $token);

            OoapTblEmployee::where('emp_id', '=', $user->emp_id)->update([
                'myooapsys' => $myooapsys[1]
            ]);
            Auth::loginUsingId($user->emp_id);

            return redirect()->intended('/');
        } else {
            return back()->withErrors(['errorLogin' => 'Access Denied']);
        }
    }

    public function loginbyname(Request $request)
    {

        $encrypter = new Encrypter('1234567812345678', 'AES-128-CBC');
        $name = $encrypter->decrypt($request->name);


        $user = OoapTblEmployee::where('emp_citizen_id', '=', $name)->where('status', '=', 1)->where('in_active', false)->first();

        if ($user) {

            $token = $user->createToken('myooapsys')->plainTextToken;
            $myooapsys = explode('|', $token);

            OoapTblEmployee::where('emp_id', '=', $user->emp_id)->update([
                'myooapsys' => $myooapsys[1]
            ]);
            Auth::loginUsingId($user->emp_id);

            return redirect()->intended('/');
        } else {
            return view('alert_view');
            // return back()->withErrors(['errorLogin' => 'Access Denied']);
        }
    }

    public function logout(Request $request)
    {

        Auth::logout();
        return redirect('/');
    }
}
