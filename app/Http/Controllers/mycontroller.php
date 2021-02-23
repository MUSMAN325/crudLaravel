<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\product;

class mycontroller extends Controller
{
    //

    function index(){

        $data = product::all();

        return view('random', ['data' => $data]);
    }





    function getdata(Request $req){
   // $Name = $_POST['Name'];
        $Name = $req->post('Name');
        return $Name;
    }

    function insert(Request $req){

        $ImageName = $req->file('image')->getClientOriginalName();
        // move_uploaded_file()
        $req->image->move(public_path('images'), $ImageName);

        $PName = $req->get('PName');
        $PPrice = $req->get('PPrice');

        $prod = new product();

        $prod->PName =  $PName;
        $prod->PPrice =  $PPrice;
        $prod->image =  $ImageName;
        $prod->save();

        return redirect('/index');
    }

    function updateordelete(Request $req){

        $ID = $req->get('ID');
        $PName = $req->get('PName');
        $PPrice = $req->get('PPrice');

        if($req->get('update') == "update"){

            return view('updateview', ['PName' => $PName, 'PPrice' => $PPrice, 'PID' => $ID ]);
            echo $req->get('update');
        }else{
            $prod = product::find($ID);
            $prod->delete();
            echo $req->get('delete');
        }
        return redirect('/index');
    }
    function update(Request $req){
        $ID = $req->get('PID');
        $PName = $req->get('PName');
        $PPrice = $req->get('PPrice');

        $prod = product::find($ID);
        $prod->PName =  $PName;
        $prod->PPrice =  $PPrice;
        $prod->save();

        return redirect('/index');

    }



}
