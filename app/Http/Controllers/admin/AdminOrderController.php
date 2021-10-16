<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
//goi trail
use App\Traits\DeleteModelTrait;

class AdminOrderController extends Controller
{
    // su dung trait
    use DeleteModelTrait;
    private $order;
    public function __construct(Order $order)
    {
         //dung middleware de phan quyen truy cap
        $this->middleware('admin:index-list_order|show-view_order|edit-edit_order|destroy-delete_order', ['except' => ['store', 'update']]);
        $this -> order = $order;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = $this -> filterAndResponse($request);
        return view('admin.pages.order.index', compact('orders'));

    }

    /**
     * @param Request $request
     */
    protected function filterAndResponse(Request $request)
    {
        $query = $this -> order -> whereRaw("1=1");

        if($request->has('all')) {
            return $query->get();
        }

        if ($request->filter_by_title) {
            $query -> where('setting_value', 'like', "%" . $request->filter_by_title . "%")
                   -> orwhere('setting_key', 'like', "%" . $request->filter_by_title . "%");
        }

        $orders = $query->paginate(10);

        return $orders;
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
         $order = $this -> order::with('orders') -> where('id',$id) -> orderBy('id','DESC')-> first();
         
         return view('admin.pages.order.edit',compact('order'));
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
        $this -> order -> find($id) -> update([
            'status_message' => $request -> status_message,
            'status' => $request -> status
        ]);
        return redirect('khalaadmin/orders')->with('flash_message', 'Cập nhật đơn hàng  thành công !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = $this -> order -> findOrFail($id);
        $order->delete();
        return redirect('khalaadmin/orders')->with('flash_message', 'Xóa order thành công !');
    }
     //xoa ajax
    public function delete($id)
    {
        return $this -> deleteModelTrait($id,$this -> order);
    }
}
