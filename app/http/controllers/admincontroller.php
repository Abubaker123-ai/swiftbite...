<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class AdminController extends Controller
{
    private string $password = 'swiftbite123';

    public function loginForm()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.messages');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        if ($request->password === $this->password) {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.messages');
        }

        return back()->withErrors(['password' => 'Incorrect password.']);
    }

    public function messages()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $messages = Message::latest()->paginate(10);
        return view('admin.messages', compact('messages'));
    }

    public function destroy(Request $request, Message $message)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        $message->delete();
        return back()->with('deleted', 'Message deleted successfully.');
    }

    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login');
    }
}
