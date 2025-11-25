<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'subjek' => 'required|string',
            'Pesan' => 'required|string',
        ]);

        $details = [
            'nama' => $request->nama,
            'email' => $request->email,
            'subjek' => $request->subjek,
            'pesan' => $request->Pesan,
        ];

        Mail::send('emails.contact', $details, function($message) use ($details) {
            $message->to('hagamendhenanusantara@gmail.com')
                    ->subject($details['subjek'])
                    ->from($details['email'], $details['nama']);
        });

        if (Mail::failures()) {
            return response()->json(['message' => 'Pesan gagal dikirim, silakan coba lagi nanti.'], 500);
        }

        return response()->json(['message' => 'Pesan Anda telah dikirim. Terima kasih!'], 200);
    }
}

