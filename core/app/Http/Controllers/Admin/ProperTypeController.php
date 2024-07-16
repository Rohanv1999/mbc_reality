<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class ProperTypeController extends Controller
{
    
     public function index()
    {
        $pageTitle = "Manage Property Type";
        $emptyMessage = "No data found";
        $propertyTypes = PropertyType::latest()->paginate(getPaginate());
        return view('admin.property_type.index', compact('pageTitle', 'emptyMessage', 'propertyTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:80',
        ]);
        $propertyType = new PropertyType();
        $propertyType->name = $request->name;
        $propertyType->status = $request->status ? 1: 0;
        $propertyType->save();
        $notify[] = ['success', 'Property Type has been created'];
        return back()->withNotify($notify);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:80',
        ]);
        $propertyType = PropertyType::findOrFail($request->id);
        $propertyType->name = $request->name;
        $propertyType->status = $request->status ? 1: 0;
        $propertyType->save();
        $notify[] = ['success', 'Property Type has been updated'];
        return back()->withNotify($notify);
    }
}
