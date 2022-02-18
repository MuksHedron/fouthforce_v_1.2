<?php
namespace App\Traits;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use Mail;
use Exception;

trait EmailTrait
{
	
	public function sendmail($data) {
		
try 
{
	Mail::send('mail', $data, function($message) use ($data) {
	$message->from($data['from'],$data['from_name']);
	$message->to($data['to']);
	if(!empty($data['cc'])){
	$message->cc($data['cc']);}
	$message->subject($data['subject']);
	if(!empty($data['attachments'])){
	foreach($data['attachments'] as $attachment){
	$message->attach($attachment);
	}}
	});
	return true;
}
catch (Exception $ex) 
{
return false;;
}
      
   }
}
?>