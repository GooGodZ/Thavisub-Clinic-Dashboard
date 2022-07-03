<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'ປ້ອນຊື່ຜູ້ໃຊ້ກ່ອນ!',
            'password.required' => 'ປ້ອນລະຫັດຜ່ານກ່ອນ!',
        ]);

        $user = Users::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $id = $user->id;
                $name = $user->name;
                $password = $user->password;
                $status = $user->status;
                session()->put('id', $id);
                session()->put('name', $name);
                session()->put('password', $password);
                session()->put('status', $status);

                return redirect()->route('index')->with('success', 'ເຂົ້າສູ່ລະບົບສຳເລັດ');
            } else {
                return redirect()->back()->with('failed', 'ອີເມວ ແລະ ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ');
            }
        } else {
            return redirect()->back()->with('failed', 'ອີເມວ ແລະ ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ');
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required'
        ], [
            'name.required' => 'ປ້ອນຊື່ຜູ້ໃຊ້',
            'email.required' => 'ປ້ອນຊື່ອິເມວ',
            'password.required' => 'ປ້ອນລະຫັດຜ່ານ',
            'status.required' => 'ເລືອກສະຖານະ',
        ]);

        $register = new Users();
        $register->name = $request->name;
        $register->email = $request->email;
        $register->password = Hash::make($request->password);
        $register->status = $request->status;
        $register->save();

        return redirect()->route('index')->with('success', 'ລົງທະບຽນສຳເລັດ');
    }

    public function changepassword(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
        ], [
            'oldpassword.required' => 'ປ້ອນລະຫັດຜ່ານໃໝ່',
            'newpassword.required' => 'ປ້ອນລະຫັດຜ່ານໃໝ່',
        ]);

        $changepassword = Users::where('id', $request->user_id)->first();

        if (Hash::check($request->oldpassword, $changepassword->password)) {
            $changepassword->password = Hash::make($request->newpassword);
            $changepassword->save();
            return redirect()->route('index')->with('success', 'ປ່ຽນລະຫັດຜ່ານສຳເລັດ');
        } else {
            return redirect()->route('index')->with('failed', 'ລະຫັດຜ່ານບໍ່ຖືກຕ້ອງ');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('login')->with('success', 'ທ່ານອອກຈາກລະບົບສຳເລັດ');
    }
}
