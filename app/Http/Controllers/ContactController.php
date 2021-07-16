<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use Requests;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        return view('contact.index');
    }

    public function confirm(ContactRequest $request)
    {

        $data = array(
            'request' => $request->all()
        );

        return view('contact.confirm')->with($data);
    }

    public function thanks(Request $request)
    {
        $input = $request->except('action');

        if ($request->action === 'back') {
            return redirect('contact')->withInput($input);
        }

        Contact::create($request->all());

        return view('contact.thanks');
    }

    public function system(Request $request)
    {
        $items = Contact::paginate(10);
        return view('system', ['items' => $items]);
    }

    public function search(Request $request)
    {
        $fullname = $request->input("fullname");
        $email = $request->input("email");
        $gender = $request->input("gender");
        $created_at_from = $request->input("created_at_from");
        $created_at_to = $request->input("created_at_to");

        $query = Contact::query();

        if ($fullname) {
            $query->where("fullname", "LIKE", "%$fullname%");
        }

        if ($email) {
            $query->where("email", "LIKE", "%$email%");
        }

        if ($gender) {
            $query->where("gender", "LIKE", "%$gender%");
        }

        if ($created_at_from) {
            $query->whereDate("created_at", ">=", Carbon::parse($created_at_from));
        }

        if ($created_at_to) {
            $query->whereDate("created_at", "<=", Carbon::parse($created_at_to));
        }

        $items = $query->paginate(10);

        return view('system')->with(compact("items", "fullname", "email", "gender", "created_at_from", "created_at_to"));
    }

    public function delete(Request $request)
    {
        $contact = Contact::find($request->id);
        return view('delete', ['form' => $contact]);
    }
    public function remove(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/');
    }
}
