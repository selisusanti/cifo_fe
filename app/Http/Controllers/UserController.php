<?php

namespace App\Http\Controllers;

use App\Services\LoginService;
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

    private $loginService;

    public function __construct(){
        $this->loginService = new LoginService();
    }

    /**
     * view profile
    */
    public function index(){
        $data           = $this->loginService->getUser();
        return view('user');
    }

    /**
     * view profile
    */
    public function data(Request $request){
        $limit  = $request->input('length');
        $start  = $request->input('start');
    
        $page           = Ceil($start/$limit)+1;
        $search         = $_GET['search'];
        $coba           = "";

        $dataOutput     = $this->loginService->getUser();
        $totalData      = count($dataOutput->data);
        $totalFiltered  = $totalData;
        $data = array();
        if($totalData > 0)
        {
            $nomor = $start+1;
            foreach ($dataOutput->data as $key => $value)
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
