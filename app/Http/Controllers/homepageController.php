<?php

namespace App\Http\Controllers;
use App\Contact;
use App\application_history;
Use App\Faq;
use Mail;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class homepageController extends Controller
{
    public function index(){

        SEOTools::setTitle('Affordable and Elegant Housing in Nigeria');
        SEOTools::setDescription('Experience real comfort and safety in our fully furnished, roomy bungalows, keeping in mind that your perimeter and general areas of your interior are under 24/7 CCTV surveillance.');

        $datas = \App\Repositories\Pick::getDatabase();

        return view('welcome')->with('datas',$datas);
    }


    public function searchProperty(){
        return view("search");
    }

    public function aboutUs(){

        SEOTools::setTitle('About Us');
        SEOTools::setDescription('We are into property development, construction and asset management. We provide real estate solutions that guarantee a sustainable lifestyle. Your safety and convenience sit at the top of our priority list.');

        return view("about-us");
    }

    public function property(){

        SEOTools::setTitle('Properties');
        SEOTools::setDescription('Our mission is to provide stylish homes you won’t have to break the bank to own. With top-notch furnishing and finishing, each unit is superbly designed to accommodate your style.');

        $datas = \App\Repositories\Pick::getDatabase();
        return view("properties")->with('datas' , $datas);
    }

    public function propertyDetail(){

        SEOTools::setTitle('Property Details');
        SEOTools::setDescription('Each of our bungalows cover a total dimension of 300 square metres. With luxurious en-suite bedrooms, 24/7 CCTV surveillance, treated water and an airy living room.');

        return view("property-detail");
    }

    public function faq(){

        SEOTools::setTitle('Frequently Asked Questions');
        SEOTools::setDescription('Get related answers to all your questions about our services, payment plans, apartment type, housing location and environmental benefits, documentation and policies here from our most frequently asked questions.');
        // SEOTools::opengraph()->addProperty('type', 'articles');
        // SEOTools::twitter()->setSite('@LuizVinicius73');
        // SEOTools::jsonLd()->addImage('https://codecasts.com.br/img/logo.jpg');

        $datas = Faq::all();
        return view("faq")->with('datas' , $datas);
    }

    public function contactUs(){

        SEOTools::setTitle('Contact Us');
        SEOTools::setDescription('Get in touch with us today through our contact center via mail or through a phone call, our customer service representatives will get back and respond to you as soon as possible respectively.');

        return view("contact-us");
    }

    public function application(){

        SEOTools::setTitle('Application Form');
        SEOTools::setDescription('Become a property owner! Choose from our well structured modern apartments which comes with a flexible payment plan, fill and submit your data and we will get in touch with you as soon as possible.');

        return view("application");
    }

    public function contactusConfirm(){
        /* validate the input */
        $this->validate( request() , array(
          'fullname' => 'required',
          'email' => 'required|email',
          'phone' => 'required',
          'message' => 'required',
          'location' => 'required',
          'g-recaptcha-response' => 'required|captcha',
        ));

        /* store data into the database */
        $db_data = new Contact();
        $db_data->fullname = request()->fullname;
        $db_data->email = request()->email;
        $db_data->phone = request()->phone;
        $db_data->message = request()->message;
        $db_data->location = request()->location;
        $db_data->save();

        /* save the input to data */
        $data = array(
         'fullname' => request()->fullname,
         'email' => request()->email,
         'phone' => request()->phone,
         'description' => request()->message,
         'location' => request()->location,
         'admin_email' => 'info@primenest.ng',
         'created_at' => $db_data->created_at,
        );

        /* send mail to the admin */

        Mail::send('emails.contact_notification',$data, function($m) use($data){
         $m->to($data['admin_email'])->subject('Contact Us Notification');
        });

        /* return back */
        session()->flash('success_report', 'Contact form submitted successfully');
        return back();
    }

    public function applicationConfirm(){
        // return request()->all();
        /*  validate the input */
           $this->validate( request() , array(
             'surname' => 'required',
             'other_name' => 'required',
             'phone' => 'required',
             'property_type' => 'required',
             'payment_option' => 'required',
             'location' => 'required',
             'g-recaptcha-response' => 'required|captcha',
           ));

        //    return request();

        /* save the input into the database */
            $db_data = new application_history();
            $db_data->surname = request()->surname;
            $db_data->other_name = request()->other_name;
            $db_data->phone = request()->phone;
            $db_data->property_type = request()->property_type;
            $db_data->location = request()->location;
            $db_data->payment_option = request()->payment_option;

            $db_data->save();


        /* store the input in data */
          $data = array(
           'surname' => request()->surname,
            'other_name' => request()->other_name,
            'phone' => request()->phone,
            'property_type' => request()->property_type,
            'payment_option' => request()->payment_option,
            'location' => request()->location,
            'admin_email' => 'info@primenest.ng',
            'created_at' => $db_data->created_at,
          );

        /* send notification email to the admin */
          Mail::send('emails.application_notification' , $data , function($m) use($data){
           $m->to($data['admin_email'])->subject('Application Form Notification');
          });

        /* return back */
        session()->flash('success_report' , 'Application submitted successfully');
        return back();
    }
}
