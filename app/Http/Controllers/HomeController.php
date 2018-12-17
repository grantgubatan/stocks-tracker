<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Trade;
use App\TradeHistory;
use App\User;
use Auth;
use Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use AlphaVantage\Api;
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

    public function adminDashboard()
    {
      return view('adminDashboard');
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
      // $client->leadsource = $request->ls;
      $client->traded = $request->td;

      if(empty($request->account_balance))
      {
        $client->account_balance = 0;
      }
      else
      {
        $client->account_balance = $request->account_balance;
      }

      $client->account_number = $request->account_number;
      $client->account_type = $request->account_type;
      $client->salutation = $request->salutation;
      $client->address = $request->address;
      $client->mobile_number = $request->mobile_number;
      $client->home_number = $request->home_number;
      $client->business_number = $request->business_number;
      $client->dob = $request->dob;
      $client->pob = $request->pob;
      $client->mstatus = $request->mstatus;
      $client->empstatus = $request->empstatus;
      $client->company_name = $request->company_name;
      $client->company_address = $request->company_address;


      $client->secondary_salutation = $request->secondary_salutation;
      $client->secondary_fullname = $request->secondary_fullname;
      $client->secondary_address = $request->secondary_address;
      $client->secondary_primary_number = $request->secondary_primary_number;
      $client->secondary_mobile_number = $request->secondary_mobile_number;
      $client->secondary_home_number = $request->secondary_home_number;
      $client->secondary_business_number = $request->secondary_business_number;
      $client->secondary_dob = $request->secondary_dob;
      $client->secondary_pob = $request->secondary_pob;
      $client->secondary_country = $request->secondary_country;
      $client->secondary_mstatus = $request->secondary_mstatus;

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
        $client2 = Client::findOrFail($client->id);
        $client2->user_id = $user->id;
        $client2->save();

        $data = array('name'=>$client->fullname, 'random_string'=>$random_string, 'recipient' => $client->email);

        Mail::send('mail', $data, function($message) use ($data)
              {
                  $message->from('dunnandburchillportal@gmail.com', "Dunn & Burchill");
                  $message->subject("Your Generated Password:");
                  $message->to($data["recipient"]);
              });

        $notification = array(
          "message" => "Client Account Created",
          "alert-type" => "success"
        );

        // return back()->with($notification);
        return redirect('home')->with('notification', $notification);
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
      $trade_histories = TradeHistory::where('client_id',$client);
      return view('client')
              ->with('client', $client)
              ->with('trade_histories', $trade_histories);
    }

    public function editClient(Request $request)
    {
      $client = Client::findOrFail($request->id);
      $client->fullname = $request->fullname;
      $client->email2 = $request->email2;
      $client->phone = $request->phone;
      $client->phone2 = $request->phone2;
      $client->country = $request->country;
      $client->occupation = $request->occupation;
      $client->leadsource = $request->leadsource;
      $client->traded = $request->traded;



      $client->account_number = $request->account_number;
      $client->account_type = $request->account_type;
      $client->salutation = $request->salutation;
      $client->address = $request->address;
      $client->mobile_number = $request->mobile_number;
      $client->home_number = $request->home_number;
      $client->business_number = $request->business_number;
      $client->dob = $request->dob;
      $client->pob = $request->pob;
      $client->mstatus = $request->mstatus;
      $client->empstatus = $request->empstatus;
      $client->company_name = $request->company_name;
      $client->company_address = $request->company_address;

      $client->save();

      $user = User::findOrFail($client->user->id);
      $user->name = $client->fullname;
      $user->save();

      $notification = array(
        "message" => "Success!",
        "alert-type" => "success"
      );

      return back()->with($notification);
    }

    public function ClientEditSecondary(Request $request)
    {
      $client = Client::findOrFail($request->id);

      $client->secondary_salutation = $request->secondary_salutation;
      $client->secondary_fullname = $request->secondary_fullname;
      $client->secondary_address = $request->secondary_address;
      $client->secondary_primary_number = $request->secondary_primary_number;
      $client->secondary_mobile_number = $request->secondary_mobile_number;
      $client->secondary_home_number = $request->secondary_home_number;
      $client->secondary_business_number = $request->secondary_business_number;
      $client->secondary_dob = $request->secondary_dob;
      $client->secondary_pob = $request->secondary_pob;
      $client->secondary_country = $request->secondary_country;
      $client->secondary_mstatus = $request->secondary_mstatus;

      $client->save();

      $notification = array(
        "message" => "Success!",
        "alert-type" => "success"
      );

      return back()->with($notification);
    }

    public function ClientEditEmail(Request $request)
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
        $client = Client::findOrFail($request->id);
        $client->email = $request->email;
        $client->save();


        $user = User::findOrFail($client->user->id);
        $user->email = $client->email;
        $user->save();

        $notification = array(
          "message" => "Success!",
          "alert-type" => "success"
        );

        return back()->with($notification);
      }
    }



    public function editBalance(Request $request)
    {
      $client = Client::findOrFail($request->id);


      if(empty($request->account_balance) || $request->account_balance == 0.0 || $request->account_balance == 0)
      {
        $client->account_balance = 0;
      }
      else {
        $client->account_balance = $request->account_balance;
      }
      $client->save();
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
        $trade->status = $request->stock_status;
        $trade->buy_date = $request->buy_date;
        $trade->due_date = $request->due_date;
        $trade->type = "NASDAQ";
        $trade->save();


        // $trade_history = new TradeHistory();
        // $trade_history->client_id = $trade->client_id;
        // $trade_history->trade_id = $trade->id;
        // $trade_history->action = "Bought";
        // $trade_history->save();
        return "ok";
      }
      catch (\Illuminate\Database\QueryException $e)
      {
        return "HAHAHA: "+$e;
      }
      catch (\Exception $e)
      {
        return $e;
      }
    }

    public function createTradeNonNasdaq(Request $request)
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
        $trade->status = $request->stock_status;
        $trade->buy_date = $request->buy_date;
        $trade->due_date = $request->due_date;
        $trade->type = "Non-NASDAQ";
        $trade->save();


        // $trade_history = new TradeHistory();
        // $trade_history->client_id = $trade->client_id;
        // $trade_history->trade_id = $trade->id;
        // $trade_history->action = "Bought";
        // $trade_history->save();

        $notification = array(
          "message" => "Success!",
          "alert-type" => "success"
        );

        return back()->with($notification);
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

    public function adminCreateTradeNonNasdaq(Request $request, $id)
    {
      $client = Client::findOrFail($id);
      return view('adminCreateTradeNonNasdaq')
             ->with('client', $client);
    }


    public function latestNews()
    {
      return view('latestNews');
    }


    public function tradeManager()
    {
      //$trades = Trade::where('client_id', Auth::user()->client->id)->limit(3)->get();
      $client = Client::findOrFail(Auth::user()->client->id);
      $trade_histories = TradeHistory::where('client_id',$client);

      $trades = Trade::where('client_id', Auth::user()->client->id)->get();
      // foreach ($trades as $trade)
      // {
      //   if($trade->type != "Non-NASDAQ")
      //   {
      //     $api_data = Api::stock()->daily($trade->ticker);
      //     $trade_data = reset($api_data["Time Series (Daily)"]); //changes
      //     $trade->stock_price = round($trade_data["4. close"], 2);
      //     $trade->current_value = $trade->stock_price * $trade->volume;
      //     $trade->current_value = (float) $trade->current_value;
      //     $trade->initial_investment_value = (float) $trade->initial_investment_value;
      //     $trade->profit = bcsub($trade->current_value, $trade->initial_investment_value);
      //     $trade->gain_percentage = round(($trade->profit / $trade->initial_investment_value) * 100, 2);
      //   }
      //   else
      //   {
      //     $trade->stock_price = $trade->initial_stock_price;
      //     $trade->stock_price = $trade->initial_stock_price;
      //     $trade->profit = "--";
      //     $trade->gain_percentage ="--";
      //     $trade->current_value = $trade->initial_investment_value;
      //
      //   }
      //
      //
      // }

      return view('user.trades')
      ->with('trades', $trades)
      ->with('trade_histories', $trade_histories);
      // $api_data = Api::stock()->daily('MSFT');
      // return dd($api_data);
    }

    public function addClientView()
    {
      return view('createClient');
    }

    public function settings()
    {
      $admins = User::where('role', '=', 'admin')
                    ->where('id', '!=', 1)
                    ->get();

      return view('settings')
            ->with('admins', $admins);
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
                  $message->from('dunnandburchillportal@gmail.com', "Dunn & Burchill");
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

    public function adminDelete(Request $request)
    {
      $user = User::find($request->id);

      $user->delete();

      $notification = array(
        "message" => "Admin Account Deleted",
        "alert-type" => "error"
      );

      return back()->with($notification);

    }

    public function clientDelete(Request $request)
    {
      $client = Client::find($request->id);
      $user_id = User::find($client->user_id);
      $user_id->delete();
      $client->delete();

      $notification = array(
        "message" => "Account Deleted",
        "alert-type" => "error"
      );

      return back()->with($notification);

    }

    public function tradeDelete(Request $request)
    {
      $trade = Trade::findOrFail($request->id);
      $trade->delete();

      $notification = array(
        "message" => "Trade Deleted",
        "alert-type" => "error"
      );

      return back()->with($notification);

    }

    public function tradeEdit(Request $request)
    {
      $trade = Trade::findOrFail($request->id);
      $trade->company = $request->company;
      $trade->ticker = $request->ticker;
      $trade->initial_stock_price = $request->stock_price;
      $trade->buy_date = $request->buy_date;
      $trade->due_date = $request->due_date;
      $trade->volume = $request->qty;
      $trade->initial_investment_value = $request->stock_value;
      $trade->status = $request->stock_status;
      $trade->save();

      $notification = array(
        "message" => "Trade Edit Saved",
        "alert-type" => "success"
      );

      return back()->with($notification);

    }




    public function tradeSell(Request $request)
    {
      $trade = Trade::find($request->id);
      $trade->status = "Sell Order";
      $trade->sell_date = Carbon::now()->toDateTimeString();
      $trade->sold_value = $request->sold_value;
      $trade->profit = $request->profit;
      $trade->gain_percentage = $request->gain_percentage;
      $trade->save();

      // $trade_history = new TradeHistory();
      // $trade_history->trade_id = $trade->id;
      // $trade_history->client_id = $trade->client_id;
      // $trade_history->action = "Sold";
      // $trade_history->save();

      $notification = array(
        "message" => "Trade Sold",
        "alert-type" => "success"
      );

      return back()->with($notification);

    }

    public function userStocks(Request $request)
    {
      $trades = Trade::where('client_id', Auth::user()->client->id)->get(['company','ticker']);
      return json_encode($trades);
    }


    public function emailSupport()
    {
      return view('emailsupport');
    }

    public function emailSupportSend(Request $request)
    {
      $data = array('fullname'=>$request->fullname, 'email'=>$request->email, 'subject'=>$request->subject, 'message_body'=>$request->message);

      Mail::send('support', $data, function($message) use ($data)
            {
                $message->from($data["email"], $data["fullname"]);
                $message->subject($data["subject"]);
                $message->to('grantgubatan@gmail.com');
            });

      $notification = array(
        "message" => "Email Sent",
        "alert-type" => "success"
      );

      return back()->with($notification);
    }

    public function addTradeHistory(Request $request)
    {

      $trade = new TradeHistory();
      $trade->client_id = $request->client_id;
      $trade->stock = $request->stock;
      $trade->stock_status = $request->stock_status;
      $trade->profit = $request->profit;
      $trade->buy_date = $request->buy_date;
      $trade->sell_date = $request->sell_date;
      $trade->save();
      $notification = array(
        "message" => "Trade History Added!",
        "alert-type" => "success"
      );

      return back()->with($notification);
    }

}
