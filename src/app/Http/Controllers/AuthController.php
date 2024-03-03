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
            ->get();
        $categories = Category::all();
        $contacts->each(function ($contact) {
            $contact->genderLabel = (new Contact())->getGenderLabel($contact['gender']);
        });
        return view('admin', compact('contacts', 'categories'));
    }

    // public function detail($id)
    // {
    //     $contact = Contact::with('category')->find($id);
    //     $contact->genderLabel = (new Contact())->getGenderLabel($contact['gender']);
    //     $categories = Category::all();
    //     return view('admin', compact('contact', 'categories'));
    // }
}
