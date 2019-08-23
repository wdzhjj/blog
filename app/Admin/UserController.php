<?php
namespace App\Admin;

use App\Userinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index()
    {
        $users = Userinfo::paginate(15);
        return view('admin/user/index',compact(['users']));
    }

    public function lock(Request $request)
    {
        $id = $request->id;
        if($id == 1){
            return redirect()->back();
        }
        if(is_numeric($id)){
            $user = Userinfo::find($id);
            if( $user->lock == 0 ){
                $user->lock = 1;
            }else {
                $user->lock = 0;
            }
            $user->save();
        }
        return redirect()->back();
    }
}
