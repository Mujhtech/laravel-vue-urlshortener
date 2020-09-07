<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Links;
use App\Statistics;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $links = Links::where('user_id', $request->user()->id)->orderBy('created_at', 'desc')->paginate(10);
        $clicks = Links::where('user_id', $request->user()->id)->sum('click');
        return response()->json(['links' => $links, 'clicks' => $clicks], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'link' => 'required'
        ]);
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";

        for($i=0;$i<8;$i++){
            $token .= $codeAlphabet[mt_rand(0,strlen($codeAlphabet)-1)];
        }

        $link = Links::firstOrCreate(["orig_link" => $request->link]);
        $link->orig_link = $request->link;
        if($request->user()){
            $link->user_id = $request->user()->id; 
        }
        $link->short_code = $token;
        $link->short_link = url('/')."/u/".$token;

        if ($link->save()) {
            return response()->json( $link, 200);
        } else {
            return response()->json( $link, 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Links $link)
    {
        //
        if($link->delete()){
            return response()->json([
                'message' => 'Link deleted successfully',
                'status_code' => 200
            ], 200);
        } else {
            return response()->json([
                'message' => 'Some error occured, try again later',
                'status_code' => 500
            ], 500);
        }
    }

    public function deactivate(Links $link)
    {
        //
        $link->status = 1;

        if($link->save()){
            return response()->json([
                'message' => 'Link deactivated successfully',
                'status_code' => 200
            ], 200);
        } else {
            return response()->json([
                'message' => 'Some error occured, try again later',
                'status_code' => 500
            ], 500);
        }
    }

    public function activate(Links $link)
    {
        //
        $link->status = 0;

        if($link->save()){
            return response()->json([
                'message' => 'Link activate successfully',
                'status_code' => 200
            ], 200);
        } else {
            return response()->json([
                'message' => 'Some error occured, try again later',
                'status_code' => 500
            ], 500);
        }
    }

    public function redirectUrl(Request $request, $link){
        $short_link = url('/')."/u/".$link;
        
        $link = Links::where("short_link", $short_link)->first();

        if($link->status == 1){
            abort(404);
        }

        $link->click += 1;
        $link->save(); 
        $visitor = ip_info("41.190.12.67", "location");
        $statistic = new Statistics();
        $statistic->link_id = $link->id;
        $statistic->click = 1;

        $statistic->country = $visitor["country"];
        $statistic->city = $visitor["city"];
        $statistic->state = $visitor["state"];
        $statistic->lat = $visitor["latitude"];
        $statistic->log = $visitor["longitude"];
        $statistic->continent = $visitor["continent"];
        $statistic->ipaddress = $visitor["ip"];
        $statistic->device = get_device();
        $statistic->browser = get_browsers();
        $statistic->os = get_os();

        $statistic->save();

        return Redirect::to($link->orig_link);
    }

    public function stat($link){

        $stats = Statistics::where('link_id', $link)->orderBy('created_at', 'desc')->paginate(10);
        $todayRecord = Statistics::whereDate('created_at', Carbon::today())->sum('click');
        $monthRecord = Statistics::whereMonth('created_at', '=', date('m'))->sum('click');
        return response()->json(['stats' => $stats, 'todayRecord' => $todayRecord, 'monthRecord' => $monthRecord], 200);

    }
}
