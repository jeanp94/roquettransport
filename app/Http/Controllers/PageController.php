<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Exception;
use Log;
use App\Post;
use App\Lead;
use App\Mail\NewContact;

class PageController extends Controller
{
    public function home()
    {
        $posts = Post::where('status', 1)->orderBy('published_at', 'desc')->take(3)->get();

        $data = [
            "active" => "home",
            "posts"  => $posts,
        ];
        return view('front.home', $data);
    }

    public function aboutus()
    {
        $data = [
            "active" => "aboutus",
        ];
        return view('front.aboutus', $data);
    }

    public function contact()
    {
        $data = [
            "active" => "contact",
        ];
        return view('front.contact', $data);
    }

    public function blog()
    {
        $posts = Post::where('status', 1)->get();
        $data = [
            "active" => "blog",
            "posts" => $posts,
        ];
        return view('front.blog.index', $data);
    }

    public function store_contact(Request $request)
    {
        $request->validate([
            'name'        => 'bail|nullable|string|max:100',
            'lastname'    => 'bail|nullable|string|max:100',
            'phone'       => 'bail|nullable|string|max:15',
            'email'       => 'bail|required|string|max:100',
            'topic'       => 'bail|nullable|string',
            'message'     => 'bail|nullable|string|max:10000',
            'origin'      => 'bail|nullable|string|max:255',
            'destination' => 'bail|nullable|string|max:255',
            'weight'      => 'bail|nullable|string|max:255',
            'page'        => 'bail|required|string|max:255',
        ]);
        //        dd($request);
        try {
            $lead = new Lead;
            $lead->name         = $request->input('name');
            $lead->lastname     = $request->input('lastname');
            $lead->phone        = $request->input('phone');
            $lead->email        = $request->input('email');
            $lead->topic        = $request->input('topic');
            $lead->message      = $request->input('message');
            $lead->origin       = $request->input('origin');
            $lead->destination  = $request->input('destination');
            $lead->weight       = $request->input('weight');
            $lead->page         = $request->input('page');
            if ($lead->save()) {
                #email al admin
                $email = (new NewContact($lead))->onQueue('emails');
                Mail::to("ventas@roquetransport.com.pe")
                    ->queue($email); //a la cola de emails

                return response()->json(array(
                    "rpta" => "ok",
                    "msg"  => $lead->id
                ));
            }
            throw new Exception("No se pudo guardar el lead de contacto en BD.");
            return response()->json(array(
                "rpta" => "error",
                "msg"  => __('app.erroraction')
            ));
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(array(
                "rpta" => "error",
                "msg"  => __('app.erroraction')
            ));
        }
    }
}
