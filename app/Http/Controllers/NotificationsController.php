<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use Response;

class NotificationsController extends Controller
{
    
/*
    Function = index();
    Use = For lsit of all notification.
    *************    *****************
 */

    public function index(){

    	$user_id = Session::get('login_id');

		$notifications = DB::table('notifications')->where([
			                                           ['receiver_id','=',$user_id],
			                                           //['status' ,'=',0],
			                                           ])->limit(10)->orderBy('id','desc')
		                                                ->get();
		$total_noti = DB::table('notifications')->where([
			                                           ['receiver_id','=',11],
			                                           ])->count();
	    return view('client.notifications',compact('notifications','total_noti'));
	}

 /*
    Function = create();
    Use = For create new notification.
    *************    *****************
 */
	    
    public function create(){

    	$user_id = Session::get('login_id');

    	DB::table('notifications')->insert([
    		'notification_type' => 'invite',
    		'sender_id' => $user_id,
    		'receiver_id' => $user_id,
    		'message' => 'You have received an invitation to interview for the job "Building BigCommerce Website For Men\'s Fashion Accessories .',
    		]);

    return \Response::json(['status'=>'1' , 'message'=> 'notification sent']);

    }



 /*
    Function = get_notifications();
    Use = For get  notification count.
    *************    *****************
 */

 public function get_notifications(){
        
        $user_id = Session::get('login_id');

    	$notifications = DB::table('notifications')->where([
			                                           ['receiver_id','=', $user_id],
			                                           ['status' ,'=',0],
			                                           ])->count();
	    return \Response::json(['status'=>'1' , 'count'=> $notifications]);
    }

 /*
    Function = update();
    Use = For Update notification status.
    *************    *****************
 */

 public function update($id,Request $request){
    
    $user_id = Session::get('login_id');
    DB::table('notifications')->where('id',$id)->update(['status'=>1]);

    $notifications = DB::table('notifications')->where([
			                                           ['receiver_id','=',$user_id],
			                                           ['status' ,'=',0],
			                                           ])->count();
               
	return \Response::json(['status'=>'0', 'message'=>'success', 'count'=> $notifications]);

    }


  /*
    Function = get_New_notifications();
    Use = For get lates  notification detail.
    *************    *****************
 */
 public function get_New_notifications(Request $request){
 	$first_id = $request->get('first_id');
 	$user_id = Session::get('login_id');
    $html = '';
    if(!empty($first_id)){
    	$notifications = DB::table('notifications')->where([['id','>',$first_id] ,['receiver_id','=',$user_id ]])->orderBy('id','desc')->get();
    }else{
       $notifications = DB::table('notifications')->where([['status','=',0],['receiver_id','=',$user_id ]])->orderBy('id','desc')->get();
    }

	    if($notifications){

		   foreach ($notifications as $key => $notification) {
			    $status = ($notification->status)?'':'unread';
				$html.='<div class="notify_item '.$status.'">
		              <a class="hide_notify"><i class="fa fa-times cross" nitification-id="'.$notification->id.'"></i></a>
		                    <div class="notify_content">'.$notification->message.'
		                    </div>
		                    <span class="notify_date">'.date('M d',strtotime($notification->created_at)).'</span>
		                  </div>';
	        }

	    return \Response::json(['status'=>1 , 'result'=>$html]);
	    }else{
	    	return \Response::json(['status'=>0, 'message'=>'not found']);
	    }
    }


    /*
    Function = load_more();
    Use = For load more notification.
    *************    *****************
 */

    public function load_more(Request $request){
         $id =  $request->get('last_id');
         $user_id = Session::get('login_id');
         $html = '';
    	if($id !== null){
		$notifications = DB::table('notifications')->where([
			                                            ['id','<',$id],
			                                            ['receiver_id','=',$user_id ]
			                                           ])->limit(10)->orderBy('id','desc')
		                                                ->get();
		$total_noti = DB::table('notifications')->where([
			                                            ['receiver_id','=',$user_id ]
			                                           ])->count();

		foreach ($notifications as $key => $notification) {

		    $status = ($notification->status)?'':'unread';
		    $cross_class = ($notification->status)?'':'cross';
			$html.='<div class="notify_item '.$status.'">
	              <a class="hide_notify"><i class="fa fa-times '.$cross_class.'" nitification-id="'.$notification->id.'"></i></a>
	                    <div class="notify_content">'.$notification->message.'
	                    </div>
	                    <span class="notify_date">'.date('M d',strtotime($notification->created_at)).'</span>
	                  </div>';
        }

		return \Response::json(['status'=>1 , 'result'=>$html , 'total_noti'=>$total_noti]);
	    }else{
	    	return \Response::json(['status'=>0, 'message'=>'not found']);
	    }
	}



 /*
    Function = get_latest_notifications();
    Use = For get lates 5 notification detail to show in notification popup.
    *************    *****************
 */
 public function get_latest_notifications(){
 	
        $html = '';
        $user_id = Session::get('login_id');
    	$notifications=DB::table('notifications')->where([
			                                           ['receiver_id','=',$user_id ]
			                                           ])->orderBy('id','desc')->limit(5)->get();
  
	    if($notifications){

		   foreach ($notifications as $key => $notification) {
			    $status = ($notification->status)?'':'unread';
			    $cross_class = ($notification->status)?'':'cross';
				$html.='<li class="'.$status.'"><div class="notify_item">
		              <a class="hide_notify"><i class="fa fa-times '.$cross_class.'" nitification-id="'.$notification->id.'"></i></a>
		                    <div class="notify_content">'.$notification->message.'
		                    </div>
		                    <span class="notify_date">'.date('M d',strtotime($notification->created_at)).'</span>
		                  </div></li>';
	        }

	    return \Response::json(['status'=>1 , 'result'=>$html]);

	    }else{
	    	return \Response::json(['status'=>0, 'message'=>'not found']);
	    }
    }



// end Class
}
