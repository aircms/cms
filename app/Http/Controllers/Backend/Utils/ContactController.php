<?php

namespace App\Http\Controllers\Backend\Utils;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function replied()
    {
        return view("backend.utils.contact.replied", [
            'contacts' => Contact::orderDesc()->replied()->simplePaginate(),
        ]);
    }

    public function waiting()
    {
        return view("backend.utils.contact.waiting", [
            'contacts' => Contact::waitingForReply()->simplePaginate(),
        ]);
    }


    public function create()
    {
        return view("backend.utils.contact.create");
    }

    public function store(Contact $contact, Request $request)
    {
        $fields = ['phone_number', 'email', 'name', 'sex', 'message', 'reply', 'reply_channel', 'title', 'address'];
        $params = $request->only($fields);
        if (Auth::user()) {
            $contact->user_id = Auth::user()->id;
        }

        if ($contact->fill($params)->save()) {
            // todo: send messages to administrators;

            return redirect()->route('admin.utils.contact.index');
        }
    }

    public function reply(Contact $contact)
    {
        return view("backend.utils.contact.reply", [
            'contact' => $contact,
        ]);
    }

    public function send(Contact $contact, Request $request)
    {
        $params = $request->only('reply', 'reply_channel');

        if ($contact->fill($params)->save()) {
            // todo: reply messages to user;

            return redirect()->route('admin.utils.contact.index');
        }
    }
}
