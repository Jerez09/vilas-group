<?php

namespace App\Http\Controllers\Property;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Share;

use function Ramsey\Uuid\v1;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'delete']);
    }

    public function index()
    {
        $properties = Property::query();

        if (request()->get('country')) {
            $properties->where('country_id', '=', request('country'));
        }

        if (request('operation')) {
            $properties->where('operation', '=', request('operation'));
        }

        if (request('type')) {
            $properties->where('property_type_id', '=', request('type'));
        }

        if (request('price_min')) {
            $properties->where('price', '>=', request('price_min'))->orderBy('price', 'asc');
        }

        if (request('price_max')) {
            $properties->where('price', '<=', request('price_max'))->orderBy('price', 'asc');
        }

        if (request('bedrooms')) {
            $properties->where('bedrooms', '>=', request('bedrooms'))->orderBy('bedrooms', 'asc');
        }

        if (request('bathrooms')) {
            $properties->where('bathrooms', '>=', request('bathrooms'))->orderBy('bathrooms', 'asc');
        }

        return view('pages.index', [
            'products' => $properties->paginate(10)
        ]);
    }

    public function show($locale,  $slug)
    {
        $property = Property::where('slug', $slug)->first();

        // Social links functions
        $social_share = Share::page(
            url('') . '/properties/' . $property->slug,
            $property->title
        )
            ->facebook()
            ->twitter()
            ->whatsapp()
            ->telegram()
            ->getRawLinks();

        return view('pages.show', [
            'product' => $property,
            'social_share' => $social_share
        ]);
    }

    public function store($locale, StorePropertyRequest $request)
    {
        
        
        $validated = $request->validated();

        // Generating a slug
        $slug = Str::slug($validated['title'], '-');
        $storagePath = storage_path() . "/app/public/";
        $path = "properties/" . $slug;

        //dd($storagePath . $path);
        
        $request->request->add(['slug' => $slug]);

        if (!file_exists($storagePath . $path)) {
            File::makeDirectory($storagePath . $path);
        }

        // Saving the data in the database
        $property = Property::create($request->all());

        // Handle thumbnail Upload
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');

            $thumbnail = saveThumbnail($path, $file);

            $property->update(['thumbnail' => $thumbnail]);
        }

        // Handle images Upload
        if ($request->hasFile('images')) {
            $files = $request->file('images');

            $images = saveImages($path, $files);

            $property->update(['images' => $images]);
        }

        if (!$property) {
            return redirect()->route(
                'properties',
                ['locale' => App::currentLocale()]
            )->with([
                'message' => __('Hubo un error al tratar crear la propiedad'),
                'status' => 'fail'
            ]);
        }

        return redirect()->route(
            'properties.show',
            ['locale' => App::currentLocale(), 'slug' => $property->slug]
        )->with([
            'message' => __('Propiedad creada correctamente.'),
            'status' => 'success'
        ]);
    }

    public function update($locale, Request $request, $id)
    {
        $property = Property::find($id);

        // Generating a slug
        $slug =  $property->slug;

        $path = 'properties/' . $slug;

        $request->request->add(['slug' => $slug]);

        // Saving the data in the database
        $property->update($request->all());

        // Handle thumbnail Upload
        if ($request->hasFile('thumbnail')) {

            deleteThumbnail($path, $property->thumbnail);

            $file = $request->file('thumbnail');

            $thumbnail = saveThumbnail($path, $file);

            $property->update(['thumbnail' => $thumbnail]);
        }

        if ($request->hasFile('images')) {

            deleteImages($path, $property->images);

            $files = $request->file('images');

            $images = saveImages($path, $files);

            $property->update(['images' => $images]);
        }

        if (!$property) {
            return redirect()->route(
                'properties',
                ['locale' => App::currentLocale()]
            )->with([
                'message' => __('Hubo un error al tratar actualizar la propiedad'),
                'status' => 'fail'
            ]);
        }

        return redirect()->route(
            'properties.show',
            ['locale' => App::currentLocale(), 'slug' => $property->slug]
        )->with([
            'message' => __('Propiedad actualizada correctamente.'),
            'status' => 'success'
        ]);
    }

    public function destroy($locale, $id)
    {
        $property = Property::find($id);

        $path = 'properties/' . $property->slug;
        $absolute_path = \storage_path() . '/app/public/' . $path;

        if (file_exists($absolute_path)) {
            $response = Storage::disk('public')->deleteDirectory($path);

            if (!$response) {
                return back()->with([
                    'message' => __('Hubo un error al tratar de eliminar la propiedad.'),
                    'status' => 'fail'
                ]);
            }
        }

        $property->delete();

        return back()->with([
            'message' => __('Propiedad eliminada correctamente.'),
            'status' => 'success'
        ]);
    }
}
