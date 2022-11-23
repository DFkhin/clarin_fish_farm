<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\AllTransaction;
use App\Models\Stock;
use App\Models\Graph;
use Carbon\Carbon;
use DataTables;

use Hash;

use DB;

use Illuminate\Support\Facades\Auth;

class AllTransactionController extends Controller
{
    public function construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('transaction.all_transaction');
    }

    function fetch_all(Request $request)
    {
        if($request->ajax())
        {
            $data = AllTransaction::where('type', '=', 'User')->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return '<a href="/all_transaction/edit/'.$row->id.'" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>&nbsp;<button type="button" class="btn btn-danger btn-sm delete" data-toggle="tooltip" data-placement="top" title="Tooltip on top" data-id="'.$row->id.'"><i class="fa-solid fa-trash"></i></button>';
                    })
                    
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    function add()
    {
        return view('transaction.add_new_transaction');
    }

    function add_validation(Request $request)
    {
        $request->validate([
            'name'          =>  'required',
            'address'         =>  'required',
            'contact_number'      =>  'required|min:11',
            'transaction_date'      =>  'required',
            'tilapia'      =>  'required',
            'ornamental'      =>  'required',
            'carp'      =>  'required',
            'beetle_fish'      =>  'required',
            'cat_fish'      =>  'required'
        ]);

        $data = $request->all();

        $total_stock = Stock::where('id', '=', 1)->get();

        foreach($total_stock as $total_stock){

            $tilapia_total_stock = $total_stock->tilapia_stock;
            $tilapia_new_stock = $total_stock->tilapia_stock-$data['tilapia'];
            $ornamental_total_stock = $total_stock->ornamental_stock;
            $ornamental_new_stock = $total_stock->ornamental_stock-$data['ornamental'];
            $carp_total_stock = $total_stock->carp_stock;
            $carp_new_stock = $total_stock->carp_stock-$data['carp'];
            $beetle_fish_total_stock = $total_stock->beetle_fish_stock;
            $beetle_fish_new_stock = $total_stock->beetle_fish_stock-$data['beetle_fish'];
            $cat_fish_total_stock = $total_stock->cat_fish_stock;
            $cat_fish_new_stock = $total_stock->cat_fish_stock-$data['cat_fish'];

        }

        if($data['tilapia']>$tilapia_total_stock){

            return redirect('all_transaction')->with('error', 'Tilapia Stock is not Enough');

        }elseif ($data['ornamental']>$ornamental_total_stock) {
            
            return redirect('all_transaction')->with('error', 'Ornamental Stock is not Enough');
        
        }elseif ($data['carp']>$carp_total_stock) {
            
            return redirect('all_transaction')->with('error', 'Carp Stock is not Enough');

        }elseif ($data['beetle_fish']>$beetle_fish_total_stock) {
            
            return redirect('all_transaction')->with('error', 'Beetle Fish Stock is not Enough');

        }elseif ($data['cat_fish']>$cat_fish_total_stock) {
            
            return redirect('all_transaction')->with('error', 'Cat Fish Stock is not Enough');

        }else{

            // $tilapia_total_price = $tilapia_total_price*$data['tilapia'];
            // $ornamental_total_price = $ornamental_total_price*$data['ornamental'];
            // $carp_total_price = $carp_total_price*$data['carp'];
            // $beetle_fish_total_price = $beetle_fish_total_price*$data['beetle_fish'];
            // $cat_fish_total_price = $cat_fish_total_price*$data['cat_fish'];

            AllTransaction::create([

                'name'      =>  $data['name'],
                'address'     =>  $data['address'],
                'contact_number'  =>  $data['contact_number'],
                'transaction_date'  =>  $data['transaction_date'],
                'tilapia'      =>  $data['tilapia'],
                'ornamental'      =>  $data['ornamental'],
                'carp'      =>  $data['carp'],
                'beetle_fish'      =>  $data['beetle_fish'],
                'cat_fish'      =>  $data['cat_fish'],
                'type'      =>  'User'
            ]);

            Stock::whereId(1)->update([

                'tilapia_stock'      =>  $tilapia_new_stock,
                'ornamental_stock'      =>  $ornamental_new_stock,
                'carp_stock'      =>  $carp_new_stock,
                'beetle_fish_stock'      =>  $beetle_fish_new_stock,
                'cat_fish_stock'      =>  $cat_fish_new_stock
                
            ]);

            return redirect('all_transaction')->with('success', 'New Transaction Added');
        }
    }


    public function edit($id)
    {
        $data = AllTransaction::findOrFail($id);

        return view('transaction.edit_transaction', compact('data'));
    }

    function edit_validation(Request $request)
    {

        $total_stock = Stock::where('id', '=', 1)->get();

        foreach($total_stock as $total_stock){

            $tilapia_total_stock = $total_stock->tilapia;
            $ornamental_total_stock = $total_stock->ornamental;
            $carp_total_stock = $total_stock->carp;
            $beetle_fish_total_stock = $total_stock->beetle_fish;
            $cat_fish_total_stock = $total_stock->cat_fish;

        }
        $request->validate([
            'name'      =>  'required',
            'address'      =>  'required',
            'contact_number'      =>  'required',
            'transaction_date'     =>  'required'
 
        ]);

        if(!empty($data['name']))
        {
            $form_data = array(
                'name'      =>  $data['name'],
                'address'     =>  $data['address'],
                'contact_number'  =>  $data['contact_number'],
                'transaction_date'  =>  $data['transaction_date'],
                'tilapia'      =>  $data['tilapia'],
                'ornamental'      =>  $data['ornamental'],
                'carp'      =>  $data['carp'],
                'beetle_fish'      =>  $data['beetle_fish'],
                'cat_fish'      =>  $data['cat_fish'],
            );
        }
        else
        {
            $form_data = array(
                'name'      =>  $data['name'],
                'address'     =>  $data['address'],
                'contact_number'  =>  $data['contact_number'],
                'transaction_date'  =>  $data['transaction_date'],
                'tilapia'      =>  $data['tilapia'],
                'ornamental'      =>  $data['ornamental'],
                'carp'      =>  $data['carp'],
                'beetle_fish'      =>  $data['beetle_fish'],
                'cat_fish'      =>  $data['cat_fish'],
            );
        }

        AllTransaction::whereId($data['hidden_id'])->update($form_data);

        return redirect('transaction.all_transaction')->with('success', 'Transaction Updated');

    }

    function delete($id)
    {
        $data = AllTransaction::findOrFail($id);

        $data->delete();

        return redirect('transaction.all_transaction')->with('success', 'Transaction Data Removed');
    }
    
    function printpreview()
    {
        $all_transaction = AllTransaction::all();
        return view('transaction')->with('transaction', $all_transaction);
    }


}
