<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;


class ContactController extends Controller
{
    public function contact()
    {
        $categories = Category::all();
        return view('contact', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only([
            'last_name',
            'first_name',
            'gender',
            'email',
            'area_code',
            'exchange_code1',
            'exchange_code2',
            'address',
            'building',
            'category_id',
            'detail',
        ]);
        // $contact = new Contact($contactData);
        $categories = Category::all();
        // $contact->genderLabel = (new Contact())->getGenderLabel($contact->gender);
        $genderLabel = (new Contact())->getGenderLabel($contact['gender']); //genderLabelを変数に格納
        return view('confirm', compact('contact', 'categories', 'genderLabel'));
    }

    public function store(Request $request)
    {
        $contact = $request->only([
            'last_name',
            'first_name',
            'gender',
            'email',
            'tel',
            'address',
            'building',
            'category_id',
            'detail',
        ]);
        Contact::create($contact);
        return view('thanks');
    }
}
