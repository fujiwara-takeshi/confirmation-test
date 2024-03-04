<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Contact;
use App\Models\Category;

class AuthController extends Controller
{
    public function admin()
    {
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();
        $contacts->each(function ($contact) {
            $contact->genderLabel = (new Contact())->getGenderLabel($contact['gender']);
        });
        return view('admin', compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('category')
            ->GenderSearch($request->gender)
            ->CategorySearch($request->category_id)
            ->DateSearch($request->created_at)
            ->KeywordSearch($request->keyword)
            ->paginate(7);
        $categories = Category::all();
        $contacts->each(function ($contact) {
            $contact->genderLabel = (new Contact())->getGenderLabel($contact['gender']);
        });
        return view('admin', compact('contacts', 'categories'));
    }

    public function detail(Request $request)
    {
        $contact = Contact::with('category')->find($request->id);
        $categories = Category::all();
        $genderLabel = (new Contact())->getGenderLabel($contact['gender']);
        return view('detail', compact('contact', 'categories', 'genderLabel'));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }
}
