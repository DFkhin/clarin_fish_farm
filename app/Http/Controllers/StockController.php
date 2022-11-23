<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use Carbon\Carbon;
use DataTables;

use Hash;

use DB; 

use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('stock.stock');
    }

    function fetch_all(Request $request)
    {
        if($request->ajax())
        {
            $data = Stock::all();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        return '<a href="/stock/edit/'.$row->id.'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>&nbsp;<button type="button" class="btn btn-danger btn-sm delete" data-id="'.$row->id.'"><i class="fas fa-trash"></i></button>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }


    function add()
    {
        return view('stock.add_stock');
    }

    function add_stock_fish(Request $request)
    {
        $request->validate([
            'tilapia_stock'      =>  'required',
            'ornamental_stock'      =>  'required',
            'carp_stock'      =>  'required',
            'beetle_fish_stock'     =>  'required',
            'cat_fish_stock'     =>  'required',
            'date_added'      =>  'required',
 
        ]);

        $data = $request->all();
        
        Stock::create([

                'tilapia_stock'     =>  $data['tilapia_stock'],
                'ornamental_stock'     =>  $data['ornamental_stock'],
                'carp_stock'     =>  $data['carp_stock'],
                'beetle_fish_stock'     =>  $data['beetle_fish_stock'],
                'cat_fish_stock'     =>  $data['cat_fish_stock'],
                'date_added'  =>  $data['date_added'],
        ]);

        return redirect('stock')->with('success', 'Successfully Added');
        }


    public function edit2($id)
    {
        $data = Stock::findOrFail($id);

        return view('stock.edit_stock', compact('data'));
    }

    function edit_validation(Request $request)
    {
        $request->validate([
            'tilapia_stock'      =>  'required',
            'ornamental_stock'      =>  'required',
            'carp_stock'      =>  'required',
            'beetle_fish_stock'     =>  'required',
            'cat_fish_stock'     =>  'required',
            'date_added'     =>  'required'
 
        ]);

        $data = $request->all();

        if(!empty($data['tilapia']))
        {
            $form_data = array(
                'tilapia_stock'     =>  $data['tilapia_stock'],
                'ornamental_stock'     =>  $data['ornamental_stock'],
                'carp_stock'     =>  $data['carp_stock'],
                'beetle_fish_stock'     =>  $data['beetle_fish_stock'],
                'cat_fish_stock'     =>  $data['cat_fish_stock'],
                'date_added'  =>  $data['date_added'],
            );
        }
        else
        {
            $form_data = array(
                'tilapia_stock'     =>  $data['tilapia_stock'],
                'ornamental_stock'     =>  $data['ornamental_stock'],
                'carp_stock'     =>  $data['carp_stock'],
                'beetle_fish_stock'     =>  $data['beetle_fish_stock'],
                'cat_fish_stock'     =>  $data['cat_fish_stock'],
                'date_added'  =>  $data['date_added'],
            );
        }

        Stock::whereId($data['hidden_id'])->update($form_data);

        return redirect('stock')->with('success', 'stock Updated');

    }

    function delete($id)
    {
        $data =Stock::findOrFail($id);

        $data->delete();

        return redirect('stock')->with('success', 'Old Stock Delete');
    }
}
