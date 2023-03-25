<?php

namespace App\Modules\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Areas\Models\Area;
use App\Modules\Users\Models\AppUser;
use App\Modules\Users\Models\UserRelation;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = User::where('user_type', 'user')
            ->get();
        return view("Users::index", compact('items'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addUser()
    {

        $areas = Area::all();
        return view("Users::add",compact('areas'));
    }

    public function storeUser(Request $request)
    {




        $user = new AppUser();
        $user->name = $request->full_name;
        $user->mobile = $request->mobile;
        $user->status = $request->status;
        $user->address_1 = $request->address_1;
        $user->address_2 = $request->address_2;
        $user->business_address = $request->business_address;
        $user->business_name = $request->business_name;
        $user->save();

for($i=0; $i< count($request->name); $i++)
{

    $r = new UserRelation();
    $r->name = $request->name[$i];
    $r->relation = $request->relation[$i];
    $r->mobile = $request->contact[$i];
    $r->user_id = $user->save();
    $r->save();

}
        return redirect()
            ->route('admin.users')
            ->with('message', 'User added successfully.');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editUser($id)
    {
        $item = User::find($id);
        return view("Users::edit", compact('item'));
    }
    /**
     * @param
     * @return
     */
    public function updateUser(Request $request, $id) {

        $validator = $request->validate(
            [
                'name' => 'required',
                'username' => ['required'],
                'email' => ['required'],
                'password' => ['nullable',
                    'min:6',
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/',
                    'confirmed'],
                'password_confirmation' => 'nullable|same:password'
            ],
            [
                'name.required' => 'Please enter username',
                'username.required' => 'Please enter username',
                'email.required' => 'Please enter email'
            ]
        );

        $user = User::find($id);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        if ($request->status == '1') {
            $user->status = '1';
            $user->email_verified = true;
        }
        $user->save();

        return redirect()
            ->route('admin.users')
            ->with('message', 'User updated successfully.');
    }
}
