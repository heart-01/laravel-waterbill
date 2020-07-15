<?php

namespace App\Http\Controllers\site\address;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Address;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Address::AddressAll();
        $count = $data->count();
        $data = $data->paginate(10);
        
        $offset = $data->count();
        $first = ($count==0) ? 0 : 1;
        $end = ($count<10) ? $count : 10;
        return view('site/address/index', compact(['data','count','first','end']))->render();
    }

    function fetch_data(Request $request){
        if($request->ajax()){
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $data = DB::table('address AS a')
                    ->join('province AS p', 'a.PROVINCE_ID', '=', 'p.PROVINCE_ID')
                    ->join('amphur AS am', 'a.AMPHUR_ID', '=', 'am.AMPHUR_ID')
                    ->join('district AS d', 'a.DISTRICT_ID', '=', 'd.DISTRICT_ID')
                    ->where('serial', 'like', '%'.$query.'%')
                    ->orWhere('name', 'like', '%'.$query.'%')
                    ->orderBy($sort_by, $sort_type);
            $data = $data->paginate(10);
            return view('site/address/data-row', compact(['data']))->render();
        }
    }

    function pagination_link(Request $request){
        if($request->ajax()){
            $page = $request->get('page');
            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $data = DB::table('address AS a')
                    ->join('province AS p', 'a.PROVINCE_ID', '=', 'p.PROVINCE_ID')
                    ->join('amphur AS am', 'a.AMPHUR_ID', '=', 'am.AMPHUR_ID')
                    ->join('district AS d', 'a.DISTRICT_ID', '=', 'd.DISTRICT_ID')
                    ->where('serial', 'like', '%'.$query.'%')
                    ->orWhere('name', 'like', '%'.$query.'%')
                    ->orderBy($sort_by, $sort_type);
            $count = $data->count();
            $data = $data->paginate(10);
            
            $offset = $data->count();
            $first = ($page-1 == 0) ? 1 : $page-1 . 1;
            $end = ($offset!=10) ? ($page-1 == 0) ? $offset : $page-1 . $offset : $page . 0;
            
            return view('site/address/pagination-link', compact(['data','count','first','end']))->render();
        }
    }

    public function store(Request $request){
        $name = $request->get('name');
        $tel = $request->get('tel');
        $PROVINCE_ID = $request->get('province');
        $AMPHUR_ID = $request->get('amphur');
        $DISTRICT_ID = $request->get('district');
        $postcode = $request->get('postcode');
        $address = $request->get('address');
        $serial = $request->get('serial');
        $unit = $request->get('unit');
        $date_time = date('Y-m-d H:i:s');

        $data = array('name'=>$name, "tel"=>$tel, "PROVINCE_ID"=>$PROVINCE_ID, "AMPHUR_ID"=>$AMPHUR_ID, "DISTRICT_ID"=>$DISTRICT_ID, "postcode"=>$postcode,
         "address"=>$address, "serial"=>$serial, "unit"=>$unit, "created_at"=>$date_time, "updated_at"=>$date_time,);

        $query = DB::table('address')->where('name', '=', $name);
        $count = $query->count();
        if($count>='1'){
            return back()->with('Warning', 'ไม่สามารถเพิ่มข้อมูลได้เนื่องจากมีข้อมูลของ \''.$name.'\' นี้อยู่แล้ว');
        }else{
            $insert = DB::table('address')->insert($data);
            
            return ($insert) ? back()->with('Success', 'เพิ่มข้อมูลเรียบร้อย') : back()->with('Warning', 'ไม่สามารถเพิ่มข้อมูลได้ติดต่อผู้ดูแลระบบ');
        }
    }

    public function update(Request $request){
        $address_id = $request->get('address-id-edit');

        $Address = Address::find($address_id);

        $Address->name = $request->get('name-edit');
        $Address->tel = $request->get('tel-edit');
        $Address->PROVINCE_ID = $request->get('province-edit');
        $Address->AMPHUR_ID = $request->get('amphur-edit');
        $Address->DISTRICT_ID = $request->get('district-edit');
        $Address->postcode = $request->get('postcode-edit');
        $Address->address = $request->get('address-edit');
        $Address->serial = $request->get('serial-edit');
        $Address->unit = $request->get('unit-edit');

        $Address->save();

        return back()->with('Success', 'แก้ไขข้อมูลเรียบร้อย');
    }

    public function status(Request $request){
        if($request->ajax()){
            $address_id = $request->get('address_id');
            $Address = Address::find($address_id);

            $status = $Address->status;
            $Address->status = ($status==1) ? 0 : 1 ;
            $Address->save();

            return 'change';
        }
    }

    public function getAmphur(Request $request){
        $PROVINCE_ID = $request->get('PROVINCE_ID');
        
        return view('site/address/amphur', [
            'PROVINCE_ID' => $PROVINCE_ID
        ]);
    }

    public function getAmphurEdit(Request $request){
        $PROVINCE_ID = $request->get('PROVINCE_ID');
        
        return view('site/address/amphur-edit', [
            'PROVINCE_ID' => $PROVINCE_ID
        ]);
    }

    public function getProvinceEdit1(Request $request){
        $address_id = $request->get('address_id');

        $Address = Address::find($address_id);
        $PROVINCE_ID = $Address->PROVINCE_ID;
        
        return view('site/address/province-edit1', [
            'PROVINCE_ID' => $PROVINCE_ID
        ]);
    }

    public function getProvinceEdit(Request $request){
        $PROVINCE_ID = $request->get('PROVINCE_ID');
        
        return view('site/address/province-edit', [
            'PROVINCE_ID' => $PROVINCE_ID
        ]);
    }

    public function getDistrict(Request $request){
        $PROVINCE_ID = $request->get('PROVINCE_ID');
        $AMPHUR_ID = $request->get('AMPHUR_ID');
        
        return view('site/address/district', [
            'PROVINCE_ID' => $PROVINCE_ID,
            'AMPHUR_ID' => $AMPHUR_ID
        ]);
    }
    public function getDistrictEdit(Request $request){
        $PROVINCE_ID = $request->get('PROVINCE_ID');
        $AMPHUR_ID = $request->get('AMPHUR_ID');
        
        return view('site/address/district-edit', [
            'PROVINCE_ID' => $PROVINCE_ID,
            'AMPHUR_ID' => $AMPHUR_ID
        ]);
    }
}
