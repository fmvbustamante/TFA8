<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
class RegisteredUserController extends Controller {
 public function create(): View { return view('auth.register'); }
 public function store(Request $request): RedirectResponse {
  $data=$request->validate(['full_name'=>['required','string','max:100'],'username'=>['required','string','max:50','unique:users,username'],'email'=>['required','email','max:255','unique:users,email'],'password'=>['required','confirmed','min:8']]);
  $user=User::create([...$data,'created_at'=>now()]); Auth::login($user); $request->session()->regenerate(); return redirect()->route('customers.index');
 }
}
