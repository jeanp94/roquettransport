<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Facades\Log;
use \Exception;
use Illuminate\Support\Facades\Storage;
class ImageController extends Controller
{
    public function search()
    {
        $medias = Image::orderBy('created_at', 'desc')->get();
        return $medias;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medias = Image::orderBy('updated_at', 'desc')->get();
        //     dd($medias);
        $data = [
            "medias" => $medias,
        ];

        return view('back.media.index', $data);
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
            'image' => 'required|file|image|max:5120',  #max 5 mb
        ]);
        //dd($request);
        $alt = explode(".", strtolower($request->file('image')->getClientOriginalName()))[0];

        try {
            $path = $request->file('image')->store(
                'multimedia',
                'public'
            );
            $compressed = false;
            Log::info("Se subio la imagen en {$path}");

            try {
                //TinyPNG Compress Image
                Log::info("Comprimiendo la imagen...");
                $filepath = storage_path('app/public/' . $path);

                \Tinify\setKey(config('app.tiny_developer_key'));
                $source = \Tinify\fromFile($filepath);
                $source->toFile($filepath);
                $compressed = true;
            } catch (\Tinify\AccountException $e) {
                // Verify your API key and account limit.
                Log::error($e->getMessage());
            } catch (\Tinify\ClientException $e) {
                // Check your source image and request options.
                Log::error($e->getMessage());
            } catch (\Tinify\ServerException $e) {
                // Temporary issue with the Tinify API.
                Log::error($e->getMessage());
            } catch (\Tinify\ConnectionException $e) {
                // A network connection error occurred.
                Log::error($e->getMessage());
            } catch (Exception $e) {
                // Something else went wrong, unrelated to the Tinify API.
                Log::error($e->getMessage());
            }

            if ($path) {
                $media = new Image;
                $media->route = $path;
                $media->alt   = $alt;
                if ($media->save()) {
                    return response()->json([
                        "rpta" => "ok",
                        "image_route" => asset($media->get_route()),
                        "image_alt" => $media->alt,
                        "image_deleteaction" => route('images.destroy', $media->id),
                        "msg" => "Archivo subido" . ($compressed ? " y comprimido " : '') . " con éxito"
                    ]);
                }
            }
            throw new Exception("Error al subir la imagen", 1);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                "rpta" => "error",
                "msg" => $e->getMessage()
            ]);
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
    public function destroy(Image $image)
    {
        try {
            Storage::disk('public')->delete($image->route);
            $image->delete();
            return response()->json([
                "rpta" => "ok"
            ]);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json([
                "rpta" => "error",
                "msg" => $th->getMessage()
            ]);
        }
    }
}
