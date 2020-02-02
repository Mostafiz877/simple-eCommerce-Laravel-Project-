<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contact;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $all_users=User::all();
         return view('home',compact('all_users'));
    }

        public function Contactmessageview()
    {
        $contactmessages=Contact::all();
        return view('contact/view',compact('contactmessages'));
    }

    public function changemenustatus($category_id)
    {

        // if(Category::find($category_id)->menu_status==0)
        // {
        //     Category::find($category_id)->update([

        //       'menu_status'=>true
        //     ]);

        // }
        // else
        // {
        //     Category::find($category_id)->update([

        //       'menu_status'=> false
        //     ]);

        // }
       
       $category_info=Category::find($category_id);

       if($category_info->menu_status==0)
       {
           $category_info->menu_status=true;
       }
       else
       {
        $category_info->menu_status=flase;
       }

       $category_info->save();


        return back();

    }

    public function messageread($message_id)
    {
       $message_info=Contact::find($message_id);

       if($message_info->read_status==1)
       {
           $message_info->read_status=2;
       }
       
       $message_info->save();
       return back();
    }


}
