<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct(
        protected AuthService $authService
    ) {}

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required'],
        ]);

        $loginField = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $credentials = [
            $loginField => $request->email,
            'password' => $request->password,
        ];

        if ($this->authService->login($credentials, $request->boolean('remember'))) {
            return redirect()->intended(route('catalog.index'));
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // 1. Manual check to prevent user enumeration (Security Patch)
        $exists = User::where('email', $request->email)
            ->orWhere('name', $request->name)
            ->exists();

        if ($exists) {
            throw ValidationException::withMessages([
                'name' => ['Tên người dùng hoặc email đã được đăng ký.'],
                'email' => ['Tên người dùng hoặc email đã được đăng ký.'],
            ]);
        }

        $messages = [
            'name.required' => 'Vui lòng nhập họ và tên.',
            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.email' => 'Địa chỉ email không hợp lệ.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự.',
        ];

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ], $messages);

        $this->authService->register($data);

        return redirect()->route('login')->with('success', 'Đăng ký thành viên thành công! Vui lòng đăng nhập.');
    }

    public function logout()
    {
        $this->authService->logout();

        return redirect('/');
    }
}
