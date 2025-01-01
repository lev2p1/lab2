<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Route;
use Illuminate\Http\Request;
use App\Rules\Type;
use Illuminate\Support\Facades\Validator;

class RoutesController extends Controller
{
    public function index(){
        try{
            return response(Route::all());
        }
        catch(Exception $e){
            return response($e, 400);
        }
    }

    public function store(Request $request){
        try{
            $data = Validator::make($request->all(), [
                'from' => 'required',
                'to' => 'required',
                'price' => 'required|integer',
                'seats' => 'required|integer',
                'type' => ['required', new Type],
                'date' => 'required',
                'transport_id' => 'required|integer'
            ]);

            if($data->fails()) return response($data->errors(), 400);

            $route = Route::create($request->all());

            return response("route $route has been created", 201);
        }   
        catch(Exception $e){
            return response($e);
        }
    }

    public function show($route){
        try{
            return response(Route::find($route));
        }
        catch(Exception $e){
            return response($e);
        }
    }

    public function update(Request $request, $route){
        try{
            $data = Validator::make($request->all(), [
                'from' => 'required',
                'to' => 'required',
                'price' => 'required|integer',
                'seats' => 'required|integer',
                'type' => ['required', new Type],
                'date' => 'required',
                'transport_id' => 'required|integer'
            ]);
    
            if($data->fails()) return response($data->errors(), 400);
    
            $route = Route::find($route);
            $route->update($request->all());

            return response("route $route has been updated", 201);
        }
        catch(Exception $e){
            return response($e, 400);
        }
    }

    public function destroy($route){
        try{
            Route::destroy($route);
            return response("route $route has been destroyed", 200);
        }
        catch(Exception $e){
            return response($e, 400);
        }
    }
}
