<?php

namespace App\Http\Controllers;

use App\Suscriber;
use Illuminate\Http\Request;
use Log;
use Exception;

class SuscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            "email" => "required|email",
        ]);

        try {
            if (Suscriber::where('email', $request->input('email'))->first()) {
                return response()->json([
                    "rpta" => "ok"
                ]);
            }
            $suscriber = new Suscriber;
            $suscriber->email = $request->input('email');
            if ($suscriber->save()) {
                return response()->json([
                    "rpta" => "ok"
                ]);
            }
            throw new Exception("Error al guardar el suscriptor", 1);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json([
                "rpta" => "error"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suscriber  $suscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Suscriber $suscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suscriber  $suscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(Suscriber $suscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suscriber  $suscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suscriber $suscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suscriber  $suscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suscriber $suscriber)
    {
        //
    }
}
