<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCreateUserRequest;
use App\Http\Requests\AdminUpdateUserRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\RegistrationRequet;
use App\Http\Requests\ResendVerificationToken;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\VerificationRequest;
use App\Models\EmailToken;
use App\Models\SiteSettings;
use App\Models\User;
use App\Models\UserDoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller {
    
    public function index(RegistrationRequet $request) {
        $validated = $request->validated();

        $has_referral = !empty($request->query('ref'));
        $referrer = User::where('name', $request->query('ref'))->first();

        $data = [
            'email' => $validated['email'],
            'name' => $validated['username'],
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'middlename' => $request->middlename,
            'password' => Hash::make($validated['password']),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            // 'email_verified_at' => date('Y-m-d H:i:s')
        ];

        if($has_referral && $referrer) {
            $data['referrer'] = $request->query('ref');
            // send email
            $site_settings = SiteSettings::first();
            $details = [
                'username' => $request->query('ref'),
                'registered_user' => $validated['username'],
                'subject' => 'Registration Of New Referred User',
                'date' => date("Y-m-d H:i:s"),
                'view' => 'emails.user.referralnotice',
                'site_name' => $site_settings->site_name,
                'settings' => $site_settings,
                'email' => $referrer->email,
                'site_address' => $site_settings['site_address']
            ];

            $mailer = new \App\Mail\MailSender($details);
            Mail::to($referrer->email)->send($mailer);
        }
        
        $create_user_account = User::insert($data);

        
        

        if($create_user_account) {
    
            $token = time();
            // $token = $request->file('image')->getClientOriginalName();
            // $token =  rand(100000, 999999);

            EmailToken::insert([
                'token' => $token,
                'email' => $validated['email'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            $details = [
                'username' => $validated['username'],
                'email' => $validated['email'],
                'token' => $token,
                'subject' => 'Registration Completed, Welcome',
                'date' => date("Y-m-d H:i:s"),
                'site_address' => 'ojokwu kwuru si mugu is migu',
                'view' => 'emails.user.verification'
            ];

            $mailer = new \App\Mail\MailSender($details);
            Mail::to($validated['email'])->send($mailer);
            
             return response()->json(
                [
                    'success'=> ['message' => ['Account created successfully, please check your email inbox or spam folder to verify your account and continue.']]
                ], 201
            );
            
        } else {
            return response()->json(
                [
                    'errors'=> ['message' => ['Error creating account']]
                ], 403
            );
        }
    }

    public function resendVerificationEmail(ResendVerificationToken $request) {
        $token =  rand(100000, 999999);

        $user = User::where('email', $request->email)->first();

        if(!$user) {
            return response()->json(
                [
                    'errors'=> ['message' => ['The email seems to be unrecognized by our system. Please register an account instead.']]
                ], 402
            );
        }

        if($user->email_verified_at) {
            return response()->json(
                [
                    'errors'=> ['message' => ['Email already verified, please proceed to login']]
                ], 401
            );
        }
        $token_exist = EmailToken::where('email', $request->email)->first();
        if($token_exist) {
            return response()->json(
                [
                    'errors'=> ['message' => ['Please check your email inbox or spam folder for the previously sent verification link.']]
                ], 401
            );
        }

        EmailToken::insert([
            'token' => $token,
            'email' => $request->email,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        $details = [
            'username' => $user->name,
            'token' => $token,
            'email' => $request->email,
            'subject' => '[Fortressminers] Verification link received',
            'date' => date("Y-m-d H:i:s"),
            'view' => 'emails.user.verification'
        ];

        $mailer = new \App\Mail\MailSender($details);
        Mail::to($request->email)->send($mailer);

        return response()->json(
            [
                'success'=> ['message' => ['Please check the mail sent to the provided email address for verification. note that link expires in one hour time.']]
            ], 201
        );
    }

    public function verifyAccount(VerificationRequest $request) {
        $email = $request->email;
        $token = $request->token;

        $email_tokens = EmailToken::where([
            'email' => $email,
            'token' => $token
        ])->first();

        if($email_tokens) {
            $is_verified = User::where('email', $email)->where('email_verified_at', '!=', null)->first();
            if($is_verified) {
                return response()->json(
                    [
                        'errors'=> ['message' => ['Email already verified, please proceed to login']]
                    ], 401
                );
            }
            $verify_account = User::where('email', $email)->update([
                'email_verified_at' => date("Y-m-d H:i:s")
            ]);

            if($verify_account) {

                $user = User::where('email', $email)->first();
                $details = [
                    'username' => $user->name,
                    'subject' => 'Account Creation Completed, Welcome To The Family',
                    'date' => date("Y-m-d H:i:s"),
                    'view' => 'emails.user.welcome'
                ];
        
                $mailer = new \App\Mail\MailSender($details);
                Mail::to($email)->send($mailer);

                $admins = User::where(['is_admin' => 1, 'permission' => '1'])->get();
                $details['view'] = 'emails.admin.newuser';
                $details['subject'] = 'New User Has Successfully Registered An Account!';

                foreach($admins as $admin) {
                    $mailer = new \App\Mail\MailSender($details);
                    Mail::to($admin->email)->send($mailer);
                }

                return response()->json(
                    [
                        'success'=> ['message' => ['Your account has been verified successfully, please login to proceed to dashboard']]
                    ], 201
                );
            } else {
                return response()->json(
                    [
                        'errors'=> ['message' => ['Account verification has failed unexpectedly, please contact support if this issue persists']]
                    ], 403
                );
            }
        } else {
            $is_registered_user = User::where('email', $email)->first();
            $trashed_token = EmailToken::onlyTrashed()->where([
                'email' => $email,
                'token' => $token
            ])->first();

            if(!$is_registered_user) {
                return response()->json(
                    [
                        'errors'=> ['message' => ['The provided email is not recognised']]
                    ], 403
                );
            }

            if($trashed_token) {
                return response()->json(
                    [
                        'errors'=> ['message' => ["Token has expired, please &nbsp; <a href='/account/verify'>Reverify your account</a>"]]
                    ], 403
                );
            }
            return response()->json(
                [
                    'errors'=> ['message' => ['Verification token is invalid']]
                ], 403
            );
        }
    }

    public function sendChangePasswordToken(ForgotPasswordRequest $request) {
        $token =  rand(100000, 999999);

        $user = User::where('email', $request->email)->first();
        if(!$user) {
            return response()->json(
                [
                'errors'=> ['message' => ["$request->email is not a registered email"]]
                ], 403
            );
        }
        // send email
        $details = [
            'token' => $token,
            'username' => $user->name,
            'subject' => 'Verify Email To Proceed To Password Reset',
            'date' => date("Y-m-d H:i:s"),
            'view' => 'emails.user.passwordreset'
        ];
        $mailer = new \App\Mail\MailSender($details);
        Mail::to($request->email)->send($mailer);

        session(['verification_token' => $token]);
        session(['email' => $request->email]);

        return response()->json(
            [
                'success'=> ['message' => ["Verification code successfully sent"]]
            ], 201
        );
    }

    public function verifyToken(Request $request){
        $token = session('verification_token');
        $email = session('email');

        if($request->token != $token) {
            return response()->json(
                [
                    'errors'=> ['message' => ["invalid code or expired code"]]
                ], 403
            );
        } elseif($request->email != $email){
            return response()->json(
                [
                    'errors'=> ['message' => ["invalid email address"]]
                ], 403
            );
        } else {
            return response()->json(
                [
                    'success'=> ['message' => ["Token Verified"]]
                ], 200
            );
        }
    }

    public function resetPassword(ResetPasswordRequest $request) {

        $user = User::where('email', $request->email)->first();

        if(!$user) {
            return response()->json(
                [
                    'errors'=> ['message' => ["$request->email is not a registered email"]]
                ], 403
            );
        }

        $update_password = User::where('email', $request->email)->update(
            [
                'password' => Hash::make($request->password)
            ]
        );

        if($update_password) {
            return response()->json(
                [
                    'success'=> ['message' => ["password has been reset successfully"]]
                ], 200
            );
        }

    }

    public function updateByAdmin(AdminUpdateUserRequest $request) {

        $update_user = User::where('id', $request->id)->update([
            'name' => $request->username,
            'email' => $request->email,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->firstname,
            'total_withdrawn' => $request->total_withdrawn,
        ]);

        if($update_user) {
            return response()->json(
                [
                    'success' => ['message' => ["Account updated successfully"]]
                ], 201
            );
        }

        return response()->json(
            [
                'errors' => ['message' => ["Error updating the given account"]]
            ], 401
        );
    }

    public function createByAdmin(AdminCreateUserRequest $request) {

        $data = [
            'password' => Hash::make($request->password),
            'name' => $request->username,
            'email' => $request->email,
            'email_verified_at' => date('Y-m-d H:i:s'),
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'is_admin' => $request->is_admin
        ];

        $create_user = User::insert($data);

        if($create_user) {
            $user = User::orderby('id', 'desc')->first();
            return response()->json(
                [
                    'success'=> ['message' => ["Account created successfully"], 'user' => $user]
                ], 201
            );
        }

        return response()->json(
            [
                'errors'=> ['message' => ["Error creating an account"]]
            ], 401
        );
    }

    public function verifyUserAccount(Request $request) {
        $page_title = env('SITE_NAME') . ' | Account Verification';
        $already_verified = '';
        $email = $request->input('email');
        $token = $request->input('token');

        $user = User::where('email', $email)->first();

        if($user->email_verified_at) {
            return view('verification-error', ['page_title' => env('SITE_NAME') . ' | Account Verification', 'message' =>'Your account has already been verified, please login'] );
        }
        if(!$user) {
            return view('verification-error', ['page_title' => env('SITE_NAME') . ' | Account Verification', 'message' =>'Unknown User']);
        }

        $email_tokens = EmailToken::where('token', $token)->first();

        if(!$email_tokens) {
            return view('verification-error', ['page_title' => env('SITE_NAME') . ' | Account Verification', 'message' =>'Verification email has expired, please reverify your account', 'expired' => 'expired']);
        }

        User::where('email', $email)->update(['email_verified_at' => date('Y-m-d H:i:s')]);

        return view('verification-success', ['page_title' => env('SITE_NAME') . ' | Account Verification', 'message' =>'Congrats! Your account was verified successfully']);
    }
}
