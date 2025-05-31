<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index()
    {
        return response()->json(OrderDetail::all());
    }

    public function store(Request $request)
    {
        $orderDetail = OrderDetail::create($request->all());
        return response()->json($orderDetail, 201);
    }

    public function show($id)
    {
        $orderDetail = OrderDetail::findOrFail($id);
        return response()->json($orderDetail);
    }

    public function update(Request $request, $id)
    {
        $orderDetail = OrderDetail::findOrFail($id);
        $orderDetail->update($request->all());
        return response()->json($orderDetail);
    }

    public function destroy($id)
    {
        OrderDetail::destroy($id);
        return response()->json(null, 204);
    }
}
