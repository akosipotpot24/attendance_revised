<?php

namespace App\Http\Controllers;
use App\Events\StudentUpdated;
use App\Events\UserEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password as PasswordRules;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
        /**
     * Run the migrations.
     */

    // note: 
    //     *user_type
    //         0 = not a user (NEW REGISTERED)
    //         1 = user
    //         2 = admin
    //         3 = superadmin
    //         4 = library user(scan)
    //     *status
    //         0 = pending
    //         1 = approved
    //         2 = declined  

            public function makeadmin($id){
                  if (auth()->user()->user_type != 2) {
                        abort(403, 'Unauthorized action.');
                    }

                $user = User::findOrFail($id);
                $user->user_type = 2;
                $user->save();
                return back()->with('success', $user->fullname . ' is now an admin.');
            }

            public function resetPassword(Request $request)
            {
                $request->validate([
                    'token'    => 'required',
                    'email'    => 'required|email',
                    'password' => 'required|min:8|confirmed',
                ]);

                $status = Password::reset(
                    $request->only('email', 'password', 'password_confirmation', 'token'),
                    function (User $user, string $password) {
                        $user->forceFill([
                            'password' => Hash::make($password),
                        ])->setRememberToken(Str::random(60));

                        $user->save();

                        
                    }
                );

                return $status === Password::PASSWORD_RESET
                    ? redirect()->route('attendance')->with('success', 'Password reset! You can now log in.')
                    : back()->with('failed', __($status));
            }


              public function showResetForm(Request $request, string $token)
                        {
                            return view('users.forgotPasswordForm', [
                                'token' => $token,
                                'email' => $request->email,
                            ]);
                        }
                public function sendResetLink(Request $request){
                        $request->validate([
                            'email' => 'required|email|exists:users,email',
                        ]);

                        $status = Password::sendResetLink(
                            $request->only('email')
                        );

                        return $status === Password::RESET_LINK_SENT
                            ? back()->with('success', 'Reset link sent! Please check your email.')
                            : back()->with('failed', __($status))->withInput();
                        }

                public function showForm(){
                    return view('users.forgot_password');
                }


                 public function password_reset(Request $req)
                {
                    $req->validate([
                        'current_password' => ['required', 'current_password'],
                        'password'         => ['required', 'confirmed', PasswordRules::min(8)],
                    ], [
                        'current_password.current_password' => 'The current password does not match our records.',
                    ]);

                    $req->user()->update([
                        'password' => Hash::make($req->password),
                    ]);

                    return back()->with('success', 'Password updated successfully!');
                }


    public function update(Request $req, $id){
        $values=$req->validate([
            'id' => 'required',
            'fullname' => 'required',
            'email' => 'email|nullable',
            'avatar' => 'image|max:8000|nullable'
        ]);

  
      if ($req->hasFile('avatar')) {

        $filename = $values['id'] . uniqid() . ".jpg";
        $oldavatar = User::where('id', $id)->value('avatar');
        $manager = new ImageManager(new Driver());
        $image = $manager->read($req->file("avatar"));
        $imgData = $image->cover(400, 400)->toJpg();
        Storage::disk('public')->put('userAvatar/' . $filename, $imgData);
        $values['avatar'] = $filename;

         if ($oldavatar && $oldavatar !== 'default.png') {
            Storage::disk('public')->delete('userAvatar/' . $oldavatar);
        }
    }
        
        // Student::where('id_number', $id)->update($values);
             $user = User::where('id', $id)->first();  
            $user->fill($values);

        $changes = [];
        foreach ($user->getDirty() as $field => $newValue) {
            $changes[$field] = [
                'old' => $user->getOriginal($field),
                'new' => $newValue
            ];
        }

        $user->save();

        event(new UserEvent(auth()->user(), $changes));

        return redirect('/users/edit/'.$id)->with('success', 'updated successfully!');
    }






        public function viewUsers(){
        $users =  User::where('status',1)->get();
        return view('users.users', compact('users'));
        }

    public function edit($id){
        $users = User::findOrFail($id);;
        return view('users.edit', compact('users'));
    }

    public function viewAprrovals(){
       $query =  User::where('status', '0');
       $approves = $query->get();

       return view('.users.approvals', compact('approves'));
    }

    public function approveUser($id){
        // note: 
            //     *user_type
            //         0 = not a user
            //         1 = user
            //         2 = admin
            //         3 = superadmin
            //         4 = library user(scan)
            //     *status
            //         0 = pending
            //         1 = approved
            //         2 = declined  

        $user = User::findOrFail($id);
        if ($user->user_type == 4){
        $user->status = 1;
        $user->save();

        return redirect()->back()->with('success', 'User approved successfully!');
        }

        $user->user_type = 1;
        $user->status = 1;
        $user->save();

        return redirect()->back()->with('success', 'User approved successfully!');
    }


    public function declineUser($id){
        $user = User::findOrFail($id);
        $user->status = 2;
        $user->save();

        return redirect()->back()->with('success', 'User declined successfully!');
    }

    
}
