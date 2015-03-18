<?php
function createPdf($content) {
	$url = "https://www.hypdf.com/htmltopdf";

	$data = array(
	  'user' => 'app29096163@heroku.com',
	  'password' => 'wSTMougxX0C8ptb',
	  'test' => 'false',
	  'bucket' => 'brightenup',
	  'public' => 'true',
	  'header_html' => 'http://brightenup.sew.la/pdf/header',
	  'header_spacing' => '12',
	  'margin_top' => '4',
	  'content' => $content
	);

	$opts = array('http' =>
	  array(
	      'method'  => 'POST',
	      'header'  => 'Content-type: application/json',
	      'content' => json_encode($data)
	  )
	);

	$context = stream_context_create($opts);
	$json = file_get_contents($url, false, $context);
	$pdf = json_decode($json);
	return $pdf;
}

class MailController extends \BaseController {
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {

		$response = [];
		try {
			$statusCode = 200;			
			$messageSubject = 'email is up';
			$messageCopy = 'nice work';
									
			$response['messageCopy'] = $messageCopy;
			Mail::send('emails.welcome', array('messageCopy' => $messageCopy), function($message) use ($messageSubject)
			{
				$message->from('nickvelloff@theexperiment.io', 'Nick Velloff');
				$message->to('nick.velloff@gmail.com', 'Nick Velloff')->subject($messageSubject);
			});
			
		} catch ( Exception $e ) {
			$statusCode = 400;
		} finally{
			return Response::json ( $response, $statusCode );
		}
	}
	
	public function post() {
		$response = [ ];
		try {
			$statusCode = 200;
			$email = Input::get ( 'email' );
			$content = Input::get ('content');
			$isDoctor = Input::get ( 'isDoctor' );
			$userName = Input::get ( 'userName' );

			// $pdfValidator = Validator::make ( 
			// 	['content' => $content],
			// 	['content' => 'required']
			// );

			// if ($pdfValidator->passes()) {

			// }
			
			$emailValidator = Validator::make ( 
				['email' => $email],
				['email' => 'required|email']
			);
			
			if (!$isDoctor) {
				// Return the pdf url
				$pdf = createPdf($content);
				$statusCode = 200;
				$response ['pdf_url'] = $pdf->url;
				//return Response::json ($response, $statusCode);
			} else {
				if ($emailValidator->fails()) {
					// Email validation failed
					Log::info ( '>> Validator failed.' );

					$statusCode = 401;
					$messages = $validator->messages ();
					$response ['errors'] = [ ];
					foreach ( $messages->all () as $message ) {
						$response ['errors'] [] = $message;
					}
				} else {
					$pdf = createPdf($content);
					$template = 'emails.user';
					if ($isDoctor == 'true') {
						$template = 'emails.doctor';
					}
					
					Log::info ( '>> Validator passed.' );
					Mail::send($template, array('userName' => $userName, 'pdf' => $pdf), function($message) use ($email)
					{
						
						$messageSubject = "Breast & Ovarian Cancer Risk Management Strategy";
						
						$message->from('assessyourrisk@brightpink.org');
						$message->to($email); //->cc("trevorobrien@theexperiment.io");
						$message->subject($messageSubject);	
					});
				}
			}

			// Send activation code to the user so he can activate the account
		} catch ( Exception $ex ) {
			Log::info ( '>> Exception' . ($ex->getMessage()) );
			$statusCode = 401;
			$response ['errors'] = [ ];
			$response ['errors'] [] = $ex->getMessage();
		} finally {
			return Response::json ( $response, $statusCode );
		}
	}
}
