<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Property;
use App\Models\PropertyAmenities;
use App\Models\PropertyInfo;
use App\Models\PropertyOptionalImage;
use App\Models\PropertyType;
use App\Rules\FileTypeValidate;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    
    public function create()
    {
        $pageTitle = "Property Create";
        $cities = City::where('status', 1)->select('id', 'name')->with('location')->get();
        $propertyTypes = PropertyType::where('status', 1)->select('name', 'id')->get();
        return view('admin.property.create', compact('pageTitle', 'cities', 'propertyTypes'));
    }

    public function index()
    {
        $pageTitle = "All Property";
        $emptyMessage = "No data found";
        $properties = Property::latest()->with('location', 'city', 'propertyInfo')->paginate(getPaginate());
        return view('admin.property.index', compact('pageTitle', 'emptyMessage', 'properties'));
    }

    public function approved()
    {
        $pageTitle = "All Property";
        $emptyMessage = "No data found";
        $properties = Property::where('status', 1)->latest()->with('location', 'city', 'propertyInfo')->paginate(getPaginate());
        return view('admin.property.index', compact('pageTitle', 'emptyMessage', 'properties'));
    }

    public function pending()
    {
        $pageTitle = "All Property";
        $emptyMessage = "No data found";
        $properties = Property::where('status', 0)->latest()->with('location', 'city', 'propertyInfo')->paginate(getPaginate());
        return view('admin.property.index', compact('pageTitle', 'emptyMessage', 'properties'));
    }

    public function cancel()
    {
        $pageTitle = "All Property";
        $emptyMessage = "No data found";
        $properties = Property::where('status', 2)->latest()->with('location', 'city', 'propertyInfo')->paginate(getPaginate());
        return view('admin.property.index', compact('pageTitle', 'emptyMessage', 'properties'));
    }

    public function search(Request $request)
    {
        $pageTitle = "Property Search";
        $emptyMessage = "No data found";
        $search = $request->search;
        $properties = Property::where('title', 'like', "%$search%")->latest()->with('location', 'city', 'propertyInfo')->paginate(getPaginate());
        return view('admin.property.index', compact('pageTitle', 'emptyMessage', 'properties', 'search'));
    }

    public function topPropertySelect(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id'
        ]);
        $propertyCount = Property::where('top_property', 1)->first();
        $property = Property::where('id', $request->property_id)->firstOrFail();
        if($propertyCount){
            $propertyCount->top_property = 0;
            $propertyCount->save();

            $property->top_property = 1;
            $property->save();
            $notify[] = ['success', 'Top property has been selected'];
            return back()->withNotify($notify);
        }
        else{
            $notify[] = ['error', 'Something is worng'];
            return back()->withNotify($notify);
        }
    }

    public function approvedStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:properties,id'
        ]);
        $property = Property::findOrFail($request->id);
        if($property->propertyInfo){
            $property->status = 1;
            $property->save();
            $notify[] = ['success', 'Property has been approved'];
            return back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'First add property information then status updated'];
            return back()->withNotify($notify);
        }
    }

    public function bannedStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:properties,id'
        ]);
        $property = Property::findOrFail($request->id);
        if($property->propertyInfo){
            $property->status = 2;
            $property->save();
            $notify[] = ['success', 'Property has been banned'];
            return back()->withNotify($notify);
        }else{
            $notify[] = ['error', 'First add property information then status updated'];
            return back()->withNotify($notify);
        }
    }

    public function featuredInclude(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:properties,id'
        ]);
        $property = Property::findOrFail($request->id);
        $property->featured = 1;
        $property->save();
        $notify[] = ['success', 'Include this property featured list'];
        return back()->withNotify($notify);
    }

    public function featuredNotInclude(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:properties,id'
        ]);
        $property = Property::findOrFail($request->id);
        $property->featured = 0;
        $property->save();
        $notify[] = ['success', 'Remove this property featured list'];
        return back()->withNotify($notify);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'property_type' => 'required|exists:property_types,id',
            'city' => 'required|exists:cities,id',
            'location' => 'required|exists:locations,id',
            'name' => 'required|max:80',
            'email' => 'required|email|max:60|unique:properties,email',
            'phone' => 'required|max:40|unique:properties,phone',
            'type' => 'required|in:1,2',
            'video_link' => 'required|url',
            'image' => ['required', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);
        $property = new Property();
        $property->title = $request->title;
        $property->property_type = $request->property_type;
        $property->city_id = $request->city;
        $property->location_id = $request->location;
        $property->video_link = $request->video_link;
        $property->name = $request->name;
        $property->email = $request->email;
        $property->phone = $request->phone;
        $socialMedia = [
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedinIn' => $request->linkedinIn,
            'instagram' => $request->instagram
        ];
        $property->social_media = $socialMedia;
        $path = imagePath()['property']['path'];
        $size = imagePath()['property']['size'];
        if ($request->hasFile('image')) {
            try {
                $filename = uploadImage($request->image, $path, $size);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
            $property->image = $filename;
        }
        $property->type = $request->type;
        $property->save();
        $notify[] = ['success', 'Property has been created'];
        return back()->withNotify($notify);
    }


    public function edit($id)
    {
        $pageTitle = "Property Updated";
        $cities = City::where('status', 1)->select('id', 'name')->with('location')->get();
        $propertyTypes = PropertyType::where('status', 1)->select('name', 'id')->get();
        $property = Property::findOrFail($id);
        return view('admin.property.edit', compact('pageTitle', 'cities', 'pageTitle', 'cities', 'property', 'propertyTypes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'property_type' => 'required|exists:property_types,id',
            'city' => 'required|exists:cities,id',
            'location' => 'required|exists:locations,id',
            'name' => 'required|max:80',
            'email' => 'required|email|max:60|unique:properties,email,'.$id,
            'phone' => 'required|max:40|unique:properties,phone,'.$id,
            'type' => 'required|in:1,2',
            'video_link' => 'required|url',
            'image' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);
        $property = Property::findOrFail($id);
        $property->title = $request->title;
        $property->property_type = $request->property_type;
        $property->city_id = $request->city;
        $property->location_id = $request->location;
        $property->video_link = $request->video_link;
        $property->name = $request->name;
        $property->email = $request->email;
        $property->phone = $request->phone;
        $socialMedia = [
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedinIn' => $request->linkedinIn,
            'instagram' => $request->instagram
        ];
        $property->social_media = $socialMedia;
        $path = imagePath()['property']['path'];
        $size = imagePath()['property']['size'];
        if ($request->hasFile('image')) {
            try {
                $filename = uploadImage($request->image, $path, $size);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
            $property->image = $filename;
        }
        $property->type = $request->type;
        $property->save();
        $notify[] = ['success', 'Property has been updated'];
        return back()->withNotify($notify);
    }

    public function propertyInfo($id)
    {
        $property = Property::findOrFail($id);
        $pageTitle = $property->title . ' Property Information';
        $propertyInfo =  PropertyInfo::where('property_id', $id)->first();
        return view('admin.property.property_info', compact('pageTitle', 'property', 'propertyInfo'));
    }

    public function propertyInfoUpdate(Request $request, $id)
    {
        $request->validate([
            'left' => 'required|integer',
            'floor' => 'required|integer',
            'unit' => 'required|integer',
            'room' => 'required|integer',
            'bathroom' => 'required|integer',
            'kitchen' => 'required|integer',
            'car_parking' => 'required|integer',
            'price' => 'required|numeric|gt:0',
            'square_feet' => 'required|numeric|gt:0',
            'available_time' => 'required|date',
            'description' => 'required',
            'optional_image.*' => ['nullable', 'image', new FileTypeValidate(['jpg', 'jpeg', 'png'])],
        ]);
        $propertyInfo = PropertyInfo::where('property_id', $id)->firstOrNew();
        $propertyInfo->property_id = $id;
        $propertyInfo->lefts = $request->left;
        $propertyInfo->floor = $request->floor;
        $propertyInfo->unit = $request->unit;
        $propertyInfo->room = $request->room;
        $propertyInfo->bathroom = $request->bathroom;
        $propertyInfo->kitchen = $request->kitchen;
        $propertyInfo->car_parking = $request->car_parking;
        $propertyInfo->price = $request->price;
        $propertyInfo->square_feet = $request->square_feet;
        $propertyInfo->available_time = $request->available_time;
        $propertyInfo->description = $request->description;
        $propertyInfo->save();

        if($request->optional_image){
            $optionalImage = array_filter($request->optional_image);
            foreach($optionalImage as $optional){
                $imageStore = new PropertyOptionalImage();
                $imageStore->property_info_id = $propertyInfo->id;
                $path = imagePath()['property']['path'];
                $size = imagePath()['property']['size'];
                if ($request->hasFile('optional_image')) {
                    $file = $optional;
                    try {
                        $filename = uploadImage($file, $path, $size);
                    } catch (\Exception $exp) {
                        $notify[] = ['error', 'Image could not be uploaded.'];
                        return back()->withNotify($notify);
                    }
                    $imageStore->image = $filename;
                }
                $imageStore->save();
            }
        }
        if($request->features){
            $propertyFeatures = PropertyAmenities::where('property_info_id', $propertyInfo->id)->delete();
            $featuresCount = $request->features;
            for($i=0; $i<count($featuresCount); $i++){
                $features = new PropertyAmenities();
                $features->property_info_id = $propertyInfo->id;
                $features->name = $featuresCount[$i];
                $features->save();
            }
        }
        $notify[] = ['success', 'Property Information has been created or updated'];
        return back()->withNotify($notify);
    }


    public function optionalImageRemove(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:property_optional_images,id'
        ]);
        $image =  PropertyOptionalImage::findOrFail($request->id);
        $path = imagePath()['property']['path'];
        $fileRemove = $path . '/' . $image->image;
        removeFile($fileRemove);
        $image->delete();
        $notify[] = ['success','Optional Image has been deleted'];
        return back()->withNotify($notify);
    }
}
