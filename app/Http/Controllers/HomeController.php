<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Trade;
use App\User;
use Auth;
use Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user = Auth::user();
       if ($user->role == 'admin' || $user->role == 'admin2')
       {
         $clients = Client::all();
         return view('admin')
                 ->with('clients', $clients);
       }
       else
       {
         return view('user.index');
       }


    }

    public function addClient(Request $request)
    {
      $client = new Client();
      $client->fullname = $request->fullname;
      $client->email = $request->em;
      $client->email2 = $request->em2;
      $client->phone = $request->phone;
      $client->phone2 = $request->phone2;
      $client->country = $request->country;
      $client->occupation = $request->oc;
      $client->leadsource = $request->ls;
      $client->traded = $request->td;


      $random_string = str_random(8);


      try
      {
        $user = User::create([
            'client_id' => $client->id,
            'name' => $client->fullname,
            'email' => $client->email,
            'password' => Hash::make($random_string),
            'role' => 'client',
        ]);

        $client->save();

        $data = array('name'=>$client->fullname, 'random_string'=>$random_string, 'recipient' => $client->email);

        Mail::send('mail', $data, function($message) use ($data)
              {
                  $message->from('grantgubatan@gmail.com', "Dunn & Burchill");
                  $message->subject("Your Generated Password:");
                  $message->to($data["recipient"]);
              });
        $client2 = Client::findOrFail($client->id);
        $client2->user_id = $user->id;
        $client2->save();




        $notification = array(
          "message" => "Client Account Created",
          "alert-type" => "success"
        );

        return back()->with($notification);
      }
      catch (\Illuminate\Database\QueryException $e)
      {
        $errorCode = $e->errorInfo[1];

        if($errorCode == 1062)
        {

                  $notification = array(
                    "message" => "Email Already Exists",
                    "alert-type" => "error"
                  );

                  return back()->with($notification);
        }
        else {
          return $e;
        }

      }
    }

    public function viewClient(Request $request, $id)
    {
      $client = Client::findOrFail($id);
      return view('client')
              ->with('client', $client);
    }

    public function editClient(Request $request)
    {
      $client = Client::findOrFail($request->id);
      $client->fullname = $request->fullname;
      $client->email = $request->email;
      $client->email2 = $request->email2;
      $client->phone = $request->phone;
      $client->phone2 = $request->phone2;
      $client->country = $request->country;
      $client->occupation = $request->occupation;
      $client->leadsource = $request->leadsource;
      $client->traded = $request->traded;
      $client->save();

      $user = User::findOrFail($client->user->id);
      $user->name = $client->fullname;
      $user->email = $client->email;
      $user->save();

      $notification = array(
        "message" => "Success!",
        "alert-type" => "success"
      );

      return back()->with($notification);
    }

    public function createTrade(Request $request)
    {
      try
      {
        $trade = new Trade();
        $trade->client_id = $request->client_id;
        $trade->company = $request->company;
        $trade->ticker = $request->ticker;
        $trade->volume = $request->qty;
        $trade->initial_stock_price = $request->stock_price;
        $trade->initial_investment_value = $request->stock_value;
        $trade->save();
        return "ok";
      }
      catch (\Illuminate\Database\QueryException $e)
      {
        return $e;
      }
      catch (\Exception $e)
      {
        return $e;
      }
    }

    public function viewTrade(Request $request, $id)
    {
      $trade = Trade::findOrFail($id);
      return view('tradeDetails')
              ->with('trade', $trade);
    }


    public function userProfile()
    {
      return view('user.profile');
    }

    public function changePassword(Request $request)
    {
      $user = User::find(Auth::user()->id);
      if (Hash::check($request->old_password, $user->password))
      {
        $new_password = $request->new_password;
        $password = bcrypt($new_password);
        $user->password = $password;
        $user->save();
        return "1";
      }
      else
      {
        return "0";
      }
    }


    public function userCreateTrade(Request $request)
    {
      return view('user.createTrade');
    }
    public function adminCreateTrade(Request $request, $id)
    {
      $client = Client::findOrFail($id);
      return view('adminCreateTrade')
             ->with('client', $client);
    }

    public function latestNews()
    {
      return view('latestNews');
    }


    public function tradeManager()
    {
      return view('user.trades');
    }

    public function addClientView()
    {
      return view('createClient');
    }

    public function settings()
    {
      return view('settings');
    }

    public function adminEditProfile(Request $request)
    {
      if (User::where('email', '=', Input::get('email'))->exists())
      {
          $notification = array(
            "message" => "Email Already Registered!",
            "alert-type" => "error"
          );

          return back()->with($notification);
      }
      else
      {
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->save();

        $notification = array(
          "message" => "Profile Updated!",
          "alert-type" => "success"
        );

        return back()->with($notification);
      }
    }

    public function adminCreate(Request $request)
    {
      $random_string = str_random(8);
      try
      {
        $user = User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($random_string),
            'role' => "admin",
            'email_verified_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);


        $data = array('name'=>$request->fullname, 'random_string'=>$random_string, 'recipient' => $request->email);

        Mail::send('mail', $data, function($message) use ($data)
              {
                  $message->from('grantgubatan@gmail.com', "Dunn & Burchill");
                  $message->subject("Your Generated Password:");
                  $message->to($data["recipient"]);
              });

        $notification = array(
          "message" => "Admin Account Created",
          "alert-type" => "success"
        );

        return back()->with($notification);
     }
     catch (\Illuminate\Database\QueryException $e)
     {
       $errorCode = $e->errorInfo[1];

       if($errorCode == 1062)
       {

                 $notification = array(
                   "message" => "Email Already Exists",
                   "alert-type" => "error"
                 );

                 return back()->with($notification);
       }
       else {
         return $e;
       }

     }

    }
}
