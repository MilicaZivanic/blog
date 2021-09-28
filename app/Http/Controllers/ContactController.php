<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ContactController extends Controller
{
    public function contact(){
        return view('pages.main.contact');
    }

    public function send(ContactRequest $request){
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        require '../vendor/autoload.php';
        $mail = new PHPMailer(true);
        try {
            $mail->SMTPDebug = 4;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '';
            $mail->Password = '';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom($email, $name);
            $mail->addAddress('');
            $mail->addReplyTo($email, $name);

            $mail->isHTML(true);

            $mail->Subject = $subject;
            $mail->Body    = $message;

            if( !$mail->send() ) {
                return redirect()->route('contact-us')->with('errorMessage', 'An error occurred!'. $mail->ErrorInfo);
            } else {
                return redirect()->route('contact-us')->with('success', 'Message sent successfully!');
            }

        } catch (Exception $e) {
            return redirect()->route('contact-us')->with('errorMessage', 'An error occurred!'. $mail->ErrorInfo);
        }

    }
}
