<?php

namespace App\Http\Controllers\Luxury;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLuxuryRequest;
use App\Models\Country;
use App\Models\Luxury;
use App\Models\LuxuryTypes;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Share;

class LuxuryController extends Controller
{
    public function index()
    {
        $luxuries = Luxury::query();

        if (request()->get('country')) {
            $luxuries->where('country_id', '=', request('country'));
        }

        if (request('type')) {
            $luxuries->where('luxury_type_id', '=', request('type'));
        }

        if (request('price_min')) {
            $luxuries->where('price', '>=', request('price_min'))->orderBy('price', 'asc');
        }

        if (request('price_max')) {
            $luxuries->where('price', '<=', request('price_max'))->orderBy('price', 'asc');
        }

        return view('pages.index', [
            'products' => $luxuries->paginate(2)
        ]);
    }

    public function show($locale, $slug)
    {
        $luxury = Luxury::where('slug', $slug)->first();

        // Social links functions
        $social_share = Share::page(
            'https://thehousting.com/luxuries/' . $luxury->slug,
            $luxury->title
        )
            ->facebook()
            ->twitter()
            ->whatsapp()
            ->telegram()
            ->getRawLinks();

        return view('pages.show', [
            'product' => $luxury,
            'social_share' => $social_share
        ]);
    }

    public function store($locale, StoreLuxuryRequest $request)
    {
        $validated = $request->validated();

        // Generating a slug
        $slug = Str::slug($validated['title'], '-');
        $storagePath = \storage_path() . "/app/public/";
        $path = "luxuries/" . $slug;

        $request->request->add(['slug' => $slug]);

        if (!file_exists($storagePath . $path)) {
            File::makeDirectory($storagePath . $path);
        }

        // Saving the data in the database
        $luxury = Luxury::create($request->all());

        // Handle thumbnail Upload
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');

            $thumbnail = saveThumbnail($path, $file);

            $luxury->update(['thumbnail' => $thumbnail]);
        }

        // Handle images Upload
        if ($request->hasFile('images')) {
            $files = $request->file('images');

            $images = saveImages($path, $files);

            $luxury->update(['images' => $images]);
        }

        if (!$luxury) {
            return redirect()->route(
                'luxuries',
                ['locale' => App::currentLocale(), 'slug' => $luxury->slug]
            )->with([
                'message' => __('Hubo un error al tratar de crear este producto.'),
                'status' => 'success'
            ]);
        }

        return redirect()->route(
            'luxuries.show',
            ['locale' => App::currentLocale(), 'slug' => $luxury->slug]
        )->with([
            'message' => __('Propiedad creada correctamente.'),
            'status' => 'success'
        ]);
    }

    public function update($locale, Request $request, $id)
    {
        $luxury = Luxury::find($id);

        // Generating a slug
        $slug =  $luxury->slug;

        $path = 'luxuries/' . $slug;

        $request->request->add(['slug' => $slug]);

        // Saving the data in the database
        $luxury->update($request->all());

        // Handle thumbnail Upload
        if ($request->hasFile('thumbnail')) {

            deleteThumbnail($path, $luxury->thumbnail);

            $file = $request->file('thumbnail');

            $thumbnail = saveThumbnail($path, $file);

            $luxury->update(['thumbnail' => $thumbnail]);
        }

        if ($request->hasFile('images')) {

            deleteImages($path, $luxury->images);

            $files = $request->file('images');

            $images = saveImages($path, $files);

            $luxury->update(['images' => $images]);
        }

        if (!$luxury) {
            return redirect()->route(
                'luxuries',
                ['locale' => App::currentLocale(), 'slug' => $luxury->slug]
            )->with([
                'message' => __('Hubo un error al tratar de actualizar este producto.'),
                'status' => 'success'
            ]);
        }

        return redirect()->route(
            'luxuries.show',
            ['locale' => App::currentLocale(), 'slug' => $luxury->slug]
        )->with([
            'message' => __('Producto actualizada correctamente.'),
            'status' => 'success'
        ]);
    }

    public function destroy($locale, $id)
    {
        $luxury = Luxury::find($id);

        $path = '/luxuries/' . $luxury->slug;
        $absolute_path = \storage_path() . '/app/public/' . $path;

        if (file_exists($absolute_path)) {
            $response = Storage::disk('public')->deleteDirectory($path);

            if (!$response) {
                return back()->with([
                    'message' => __('Hubo un error al tratar de eliminar el producto.'),
                    'status' => 'fail'
                ]);
            }
        }

        $luxury->delete();

        return back()->with([
            'message' => __('Propiedad eliminada correctamente.'),
            'status' => 'success'
        ]);
    }

    public function create()
    {
        $countries = Country::all();
        $types = LuxuryTypes::all();

        return view('pages.luxuries.create', [
            'title' => 'Crear',
            'countries' => $countries,
            'types' => $types
        ]);
    }

    public function edit($locale, $id)
    {
        $luxury = Luxury::find($id);
        $countries = Country::all();
        $types = LuxuryTypes::all();

        return view('pages.luxuries.edit', [
            'title' => 'Editar',
            'luxury' => $luxury,
            'countries' => $countries,
            'types' => $types
        ]);
    }
}
