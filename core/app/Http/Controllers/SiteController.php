<?php

namespace App\Http\Controllers;
use App\Models\Advertisement;
use App\Models\City;
use App\Models\Frontend;
use App\Models\Language;
use App\Models\Page;
use App\Models\Property;
use App\Models\PropertyInfo;
use App\Models\PropertyType;
use App\Models\Subscriber;
use App\Models\SupportAttachment;
use App\Models\SupportMessage;
use App\Models\SupportTicket;
use App\Rules\FileTypeValidate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;


class SiteController extends Controller
{
    public function __construct(){
        $this->activeTemplate = activeTemplate();
    }

    public function index(){
        $count = Page::where('tempname',$this->activeTemplate)->where('slug','home')->count();
        if($count == 0){
            $page = new Page();
            $page->tempname = $this->activeTemplate;
            $page->name = 'HOME';
            $page->slug = 'home';
            $page->save();
        }
        $pageTitle = 'Home';
        $sections = Page::where('tempname',$this->activeTemplate)->where('slug','home')->first();
        $property = Property::where('status', 1)->where('top_property', 1)->first();
        $cities = City::where('status', 1)->select('id', 'name')->with('location')->get();
        return view($this->activeTemplate . 'home', compact('pageTitle','sections', 'property', 'cities'));
    }

    public function pages($slug)
    {
        $page = Page::where('tempname',$this->activeTemplate)->where('slug',$slug)->firstOrFail();
        $pageTitle = $page->name;
        $sections = $page->secs;
        return view($this->activeTemplate . 'pages', compact('pageTitle','sections'));
    }


    public function addProperty()
    {
        $pageTitle = "Add Property";
        $cities = City::where('status', 1)->select('id', 'name')->with('location')->get();
        $propertyTypes = PropertyType::where('status', 1)->select('name', 'id')->get();
        return view($this->activeTemplate . 'add_property', compact('pageTitle', 'cities', 'propertyTypes'));
    }

    public function addPropertyStore(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'property_type' => 'required|exists:property_types,id',
            'city' => 'required|exists:cities,id',
            'location' => 'required|exists:locations,id',
            'type' => 'required|in:1,2',
            'video_link' => 'required|url',
            'unit' => 'required|integer',
            'room' => 'required|integer',
            'bathroom' => 'required|integer',
            'kitchen' => 'required|integer',
            'car_parking' => 'required|integer',
            'price' => 'required|numeric|gt:0',
            'square_feet' => 'required|numeric|gt:0',
            'available_time' => 'required|date',
            'name' => 'required|max:80',
            'email' => 'required|email|max:60|unique:properties,email',
            'phone' => 'required|max:40|unique:properties,phone',
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

        $propertyInfo = new PropertyInfo();
        $propertyInfo->property_id = $property->id;
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
        $notify[] = ['success', 'Property requested submitted'];
        return back()->withNotify($notify);
    }

    public function contactWithPropertyOwner(Request $request)
    {
        $request->validate([
            'property_id' => 'required|exists:properties,id',
            'name' => 'required|max:80',
            'email' => 'required|max:80',
            'message' => 'required|max:500'
        ]);
        $property = Property::findOrFail($request->property_id);
        notify($property, 'PROPERTY_CONTACT',[
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);
        $notify[] = ['success', 'Request has been submitted'];
        return back()->withNotify($notify);
    }

    public function property()
    {
        $pageTitle = "All Property";
        $emptyMessage = "No data found";
        $propertyTypes = PropertyType::where('status', 1)->get();
        $cities = City::where('status', 1)->with('location')->get();
        $propertys = Property::where('status', 1)->with('location', 'city', 'propertyInfo')->paginate(getPaginate(12));
        return view($this->activeTemplate . 'property', compact('pageTitle', 'emptyMessage', 'propertys', 'cities', 'propertyTypes'));
    }


    public function cityProperty($id)
    {
        $city = City::findOrFail($id);
        $pageTitle = $city->name ." Property";
        $emptyMessage = "No data found";
        $propertyTypes = PropertyType::where('status', 1)->get();
        $cities = City::where('status', 1)->with('location')->get();
        $propertys = Property::where('status', 1)->where('city_id', $city->id)->with('location', 'city', 'propertyInfo')->paginate(getPaginate(12));
        return view($this->activeTemplate . 'property', compact('pageTitle', 'emptyMessage', 'propertys', 'cities', 'propertyTypes'));

    }

    public function propertySearch(Request $request)
    {
        $request->validate([
            'location' => 'nullable|exists:locations,id',
            'city' => 'nullable|exists:cities,id',
            'property_purpose' => 'nullable|in:1,2',
            'min_price' => 'nullable|numeric|gt:0',
            'max_price' => 'nullable|numeric|gt:0',
            'property_type.*' => 'nullable|exists:property_types,id'
        ]);
        $pageTitle = "Property Search";
        $emptyMessage = "No data found";
        $propertyTypes = PropertyType::where('status', 1)->get();
        $cities = City::where('status', 1)->with('location')->get();
        $cityId = $request->city;
        $locationId = $request->location;
        $propertyTypeData = collect($request->property_type);
        $propertyPurpose = $request->property_purpose;
        $minSearch = $request->min_price;
        $maxSearch = $request->max_price;
        $search = $request->search;
        $propertys = Property::where('status', 1);
        if($request->city){
            $propertys = $propertys->where('city_id', $request->city);
        }
        if($request->location){
            $propertys = $propertys->where('location_id', $request->location);
        }
        if($request->property_purpose){
            $propertys = $propertys->where('type', $request->property_purpose);
        }
        if($request->property_type){
            $propertys = $propertys->whereIn('property_type', $request->property_type);
        }
        if($request->min_price){
            $propertys = $propertys->whereHas('propertyInfo', function($q) use ($minSearch){
                $q->where('price', '<=', $minSearch);
            });
        }
        if($request->max_price){
            $propertys = $propertys->whereHas('propertyInfo', function($q) use ($maxSearch){
                $q->where('price', '>=', $maxSearch);
            });
        }
        if($request->search){
            $propertys = $propertys->where('title', 'like', "%$search%");
        }
        $propertys = $propertys->with('location', 'city', 'propertyInfo')->paginate(getPaginate());
        return view($this->activeTemplate . 'property', compact('pageTitle', 'emptyMessage', 'propertys', 'cities', 'propertyTypes', 'cityId', 'locationId', 'propertyTypeData', 'propertyPurpose', 'minSearch', 'search'));
    }

    public function propertyDetails($slug, $id)
    {
        $pageTitle = "Property Details";
        $emptyMessage = "No data found";
        $property = Property::where('id', $id)->where('status', 1)->firstOrFail();
        return view($this->activeTemplate . 'property_details', compact('pageTitle', 'emptyMessage', 'property'));
    }
    
    public function contact()
    {
        $pageTitle = "Contact Us";
        return view($this->activeTemplate . 'contact',compact('pageTitle'));
    }

    public function contactSubmit(Request $request)
    {
        $attachments = $request->file('attachments');
        $allowedExts = array('jpg', 'png', 'jpeg', 'pdf');
        $this->validate($request, [
            'name' => 'required|max:191',
            'email' => 'required|max:191',
            'subject' => 'required|max:100',
            'message' => 'required',
        ]);
        $random = getNumber();
        $ticket = new SupportTicket();
        $ticket->name = $request->name;
        $ticket->email = $request->email;
        $ticket->priority = 2;

        $ticket->ticket = $random;
        $ticket->subject = $request->subject;
        $ticket->last_reply = Carbon::now();
        $ticket->status = 0;
        $ticket->save();

        $message = new SupportMessage();
        $message->supportticket_id = $ticket->id;
        $message->message = $request->message;
        $message->save();
        $notify[] = ['success', 'ticket created successfully!'];
        return redirect()->route('ticket.view', [$ticket->ticket])->withNotify($notify);
    }

    public function changeLanguage($lang = null)
    {
        $language = Language::where('code', $lang)->first();
        if (!$language) $lang = 'en';
        session()->put('lang', $lang);
        return redirect()->back();
    }

    public function blog(){
        $pageTitle = "Blog";
        $blogs = Frontend::where('data_keys','blog.element')->paginate(9);
        $sections = Page::where('tempname',$this->activeTemplate)->where('slug','blog')->first();
        return view($this->activeTemplate.'blog',compact('blogs','pageTitle', 'sections'));
    }

    public function blogDetails($id,$slug){
        $recentBlogs = Frontend::where('data_keys','blog.element')->orderBy('id', 'DESC')->limit(8)->get();
        $blog = Frontend::where('id',$id)->where('data_keys','blog.element')->firstOrFail();
        $pageTitle = "Blog Details";
        return view($this->activeTemplate.'blog_details',compact('blog','pageTitle', 'recentBlogs'));
    }

    public function footerMenu($slug, $id)
    {
        $data = Frontend::where('id', $id)->where('data_keys', 'policy_pages.element')->firstOrFail();
        $pageTitle =  $data->data_values->title;
        return view($this->activeTemplate . 'menu', compact('data', 'pageTitle'));
    }


    public function cookieAccept(){
        session()->put('cookie_accepted',true);
        return response()->json('Cookie accepted successfully');
    }

    public function placeholderImage($size = null){
        $imgWidth = explode('x',$size)[0];
        $imgHeight = explode('x',$size)[1];
        $text = $imgWidth . '×' . $imgHeight;
        $fontFile = realpath('assets/font') . DIRECTORY_SEPARATOR . 'RobotoMono-Regular.ttf';
        $fontSize = round(($imgWidth - 50) / 8);
        if ($fontSize <= 9) {
            $fontSize = 9;
        }
        if($imgHeight < 100 && $fontSize > 30){
            $fontSize = 30;
        }

        $image     = imagecreatetruecolor($imgWidth, $imgHeight);
        $colorFill = imagecolorallocate($image, 100, 100, 100);
        $bgFill    = imagecolorallocate($image, 175, 175, 175);
        imagefill($image, 0, 0, $bgFill);
        $textBox = imagettfbbox($fontSize, 0, $fontFile, $text);
        $textWidth  = abs($textBox[4] - $textBox[0]);
        $textHeight = abs($textBox[5] - $textBox[1]);
        $textX      = ($imgWidth - $textWidth) / 2;
        $textY      = ($imgHeight + $textHeight) / 2;
        header('Content-Type: image/jpeg');
        imagettftext($image, $fontSize, 0, $textX, $textY, $colorFill, $fontFile, $text);
        imagejpeg($image);
        imagedestroy($image);
    }

    public function adclicked($id)
    {
        $ads = Advertisement::where('id', decrypt($id))->firstOrFail();
        $ads->click +=1;
        $ads->save();
        return redirect($ads->redirect_url);
    }


    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors());
        }
        $if_exist = Subscriber::where('email', $request->email)->first();
        if (!$if_exist) {
            Subscriber::create([
                'email' => $request->email
            ]);
            return response()->json(['success' => 'Subscribed Successfully']);
        }else {
            return response()->json(['error' => 'Already Subscribed']);
        }
    }

}
