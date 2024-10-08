<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index(){
        return view('listings.index', [
            "listings"=> Listing::query()->latest()->filter(request(["tag", "search"]))->paginate(4)
        ]);
    }

    public function show(Listing $listing){
        return view("listings.show", [
            "listing"=> $listing
        ]);
    }

    public function create(){
        return view("listings.create");
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile("logo")) {
            $formFields["logo"] = $request->file("logo")->store("logos", "public");
        }
        $formFields["user_id"] = auth()->id();

        Listing::query()->create($formFields);
        return redirect("/")->with("message", "Listing created successfully.");

    }

    public function edit(Listing $listing){
        if ($listing->user_id != auth()->id()) {
            abort(403, "Unauthorizes");
        }
        return view("listings.edit", ["listing"=> $listing]);
    }

    public function update(Request $request, Listing $listing){
        if ($listing->user_id != auth()->id()) {
            abort(403, "Unauthorizes");
        }
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile("logo")) {
            $formFields["logo"] = $request->file("logo")->store("logos", "public");
        }

        $listing->update($formFields);
        return back()->with("message", "Listing updated successfully.");
    }

    public function destroy(Listing $listing){
        if ($listing->user_id != auth()->id()) {
            abort(403, "Unauthorizes");
        }
        $listing->delete();
        return redirect("/")->with("message", "Listing removed successfully.");
    }

    public function manage(){
        $user = auth()->id();
        $data = Listing::query()->where("user_id", $user)->get();
        return view("listings.manage", [
            "data"=> $data
        ]);
    }
}
