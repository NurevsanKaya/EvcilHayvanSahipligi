<?php

namespace App\Http\Controllers;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ContactController
{
    public function index()
    {
        return view('Contact'); // `Contact.blade.php` dosyasını döner
    }
    public function submit(Request $request)
    {
        $request->validate([
            //blade.php deki name
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'icerik' => 'required|string',
        ]);


        try {
            $message = new Message();
            //burdaki model//burdaki request içinde yazan
            $message->name = $request->name;
            $message->email = $request->email;
            $message->subject = $request->subject;
            $message->content = $request->icerik;
            $message->save();

            return redirect()->back()->with('success', 'Mesajınız Gönderildi!');

        } catch (Exception $e) {
            return redirect()->back()->with('error','Bir hata oluştu');
        }

    }
}
