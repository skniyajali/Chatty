<?php

namespace App\Http\Controllers\Chat;

use Pusher\Pusher;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function index(){
        //$user = User::where('id','!=',Auth::id())->where('status','=','Active')->latest()->get();

        $latest = User::where('id','!=',Auth::id())->where('status','=','Active')->limit(8)->latest()->get();
        
        $user = DB::select("SELECT users.id, users.name, users.image, users.username, users.email, users.created_at, count(is_read) as unread FROM users LEFT JOIN messages ON users.id = messages.from AND is_read = 0 AND messages.to = ".Auth::id()." WHERE users.id != ".Auth::id()." GROUP BY users.id, users.name, users.image, users.email, users.username, users.created_at");

        return view('chats.index',[
            'user' => $user,
            'latest' => $latest
        ]);

    }

    public function getMessage($user_id){
        $sid = Auth::id();
        $ud = User::where('id','=',$user_id)->get();
        
        Message::where(['from' => $user_id, 'to' => $sid])->update(['is_read' => 1]);

        $message = Message::where(function($query) use ($user_id, $sid){
            $query->where('from',$sid)->where('to',$user_id);
        })->orWhere(function($query) use ($user_id, $sid){
            $query->where('from',$user_id)->where('to',$sid);
        })->get();

        return view('chats.chatbox',['user' => $ud,'message' => $message]);

    }

    public function getUser($user_id){
        $uds = User::where('id','=',$user_id)->get();  

        return view('chats.userDetails',['userd' => $uds]);
    }

    public function sendMessage(Request $request){
        $msg = new Message();
        
        $msg->from = Auth::id();
        $msg->to = $request->rid;
        $msg->message = $request->message;
        $msg->is_read = 0;
        $msg->save();

        

        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => Auth::id(), 'to' => $request->rid];
        $pusher->trigger('my-channel','my-event', $data);

    }
}
