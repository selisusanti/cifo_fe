<?php

namespace App\Http\Controllers;

use App\Services\LoginService;
use App\Services\UserService;
use App\Constants\Constant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;

class UserController extends Controller
{

    private $userService;

    public function __construct(){
        $this->loginService = new LoginService();
        $this->userService = new UserService();
    }

    /**
     * view profile
    */
    public function index(){
        return view('user');
    }



    /**
     * view profile
    */
    public function indexApi(){
        return view('user-api');
    }

    /**
     * view profile
    */
    public function dataApi(Request $request){
        $limit          = '6';
        $start          = $request->input('start');
    
        $page           = Ceil($start/$limit)+1;
        $search         = $_GET['search'];
        $coba           = "";

        $dataOutput     = $this->userService->getUserList($page);
        $totalData      = $dataOutput->total;
        $totalFiltered  = $totalData;
        $data           = array();
        if($totalData > 0)
        {
            $nomor = $start+1;
            foreach ($dataOutput->data as $key => $value)
            {
                $action_text                 = '';
                $nestedData['First Name']    = $value->first_name ?? '-';
                $nestedData['Last Name']     = $value->last_name ?? '-';
                $nestedData['Avatar']        = $value->avatar ?? '-';
                $nestedData['Email']         = $value->email ?? '-';
                $data[] = $nestedData;
                $nomor++;
            }
        }
    
        $json_data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
            );
    
        echo json_encode($json_data); 
    }


    /**
     * view profile
    */
    public function data(Request $request){
        $start  = $request->input('start');
        $limit  = $request->input('length');
    
        $page           = Ceil($start/$limit)+1;
        $search         = $_GET['search'];
        $coba           = "";

        $dataOutput     = $this->loginService->getUser($page,$limit);
        $totalData      = $dataOutput->data->total;
        $totalFiltered  = $totalData;
        $data = array();
        if($totalData > 0)
        {
            $nomor = $start+1;
            foreach ($dataOutput->data->data as $key => $value)
            {
                $action_text                 = '';
                $nestedData['Nama']          = !empty($value->name) ? ucwords($value->name) : '-';
                $nestedData['Phone']         = $value->phone ?? '-';
                $nestedData['Email']         = $value->email ?? '-';
                $data[] = $nestedData;
                $nomor++;
            }
        }
    
        $json_data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
            );
    
        echo json_encode($json_data); 
    }

}
