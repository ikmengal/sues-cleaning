<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Profile;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Helpers\CustomLog;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        $title = 'Profile';
        $data = [];
        $data['model'] = $request->user();

        return view('admin.profile.my-profile',
            compact('title', 'data')
        );
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['string', 'max:255'],
        ]);

        DB::beginTransaction();

        try{
            $user = $request->user();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->save();

            if($user){
                $profile = Profile::where('user_id', $user->id)->first();

                $profile_image = '';
                if ($request->hasFile('profile')) {
                    $image = $request->file('profile');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('admin/assets/img/avatars'), $imageName);

                    $profile_image = $imageName;
                }

                if(!empty($profile)){
                    $profile->phone_number = $request->phone_number;
                    $profile->date_of_birth = $request->date_of_birth;
                    $profile->city = $request->city;

                    if(!empty($profile_image)) {
                        $profile->profile = $profile_image;
                    }

                    $profile->save();
                }else{
                    $profile = new Profile();
                    $profile->user_id = $request->user()->id;
                    $profile->phone_number = $request->phone_number;
                    $profile->date_of_birth = $request->date_of_birth;
                    $profile->profile = $profile_image;
                    $profile->city = $request->city;
                    $profile->save();
                }
            }

            DB::commit();


            $message = 'Profile Updated';
            $facility_id = "";
            $room_id =  "";
            $status = $request->status??1;
            $user_id =  $user->id;
            CustomLog::addToCustomLog($message, $facility_id, $room_id, $status, $user_id);


            \LogActivity::addToLog('Profile Updated');

            return redirect()->back()->with('message', 'Profile Updated Successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['error' => false, 'message' => 'The provided old password is incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json(['success' => true, 'message' => 'You have changed password successfully!.']);
    }
}
