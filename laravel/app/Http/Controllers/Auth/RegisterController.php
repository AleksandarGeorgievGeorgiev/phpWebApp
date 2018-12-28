<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $mail = new PHPMailer(true);                              
        try {
            $mail->isSMTP();                                      
            $mail->Host = 'smtp.gmail.com';  
            $mail->SMTPAuth = true;                               
            $mail->Username = 'blogsters.info@gmail.com';                 
            $mail->Password = '181863blogsters';                           
            $mail->SMTPSecure = 'tls';                           
            $mail->Port = 587;                                    

            $mail->setFrom('blogsters.info@gmail.com', 'Blogsters');
            $mail->addAddress($data['email'], $data['name']);     

            $mail->isHTML(true);                                 
            $mail->Subject = 'Account creation in Blogsters!';
            $mail->Body = "Hello <strong>{$data['name']}</strong>, <br />
            <p>
            Thank you for registrating in our blog. We hope you find it <strong>useful</strong> and <strong>enjoyable!</strong>
            </p>
            
            <p>
            If you have any problems or questions, please feel free to call us: <strong>+31 897211033</strong> or
            send us email at <strong>blogsters.info@gmail.com</strong> 
            </p>

            Kind Regards, <br /> 
            Blogsters Team";

            $mail->send();
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
