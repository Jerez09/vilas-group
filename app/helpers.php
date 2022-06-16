<?php

/* Function that returns the benefits of invest in each city/country */

use App\Models\Country;
use App\Models\Invest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;


/* Change locale */

if (!function_exists('changeLocale')) {
    function changeLocale($locale)
    {
        if (App::currentLocale() != $locale) {
            if ($locale == 'es')
                return str_replace('/en/', '/es/', request()->url());
            else
                return str_replace('/es/', '/en/', request()->url());
        }
    }
}
/* Change Locale */


if (!function_exists('whyInvest')) {
    function whyInvest($country)
    {
        return Invest::where('country_id', $country)->get();
    }
}

// Convert currency
// From usd to another currency
if (!function_exists('convertCurrency')) {
    function convertCurrency($currencyFrom, $currencyTo, $amount)
    {
        $currencies = ["USD" => 1, "MXN" => 20.32, "EAU" => 3.67, "PAB" => 1, "CLP" => 817.78];

        if ($currencyFrom != $currencyTo && array_key_exists($currencyTo, $currencies)) {
            $convertedAmount = $amount / $currencies[$currencyFrom];
            $convertedAmount = $convertedAmount * $currencies[$currencyTo];

            return $currencyTo . ' $' . number_format($convertedAmount);
        }

        return $currencyFrom . ' $' . number_format($amount);
    }
}

/* ADD IMAGES FUNCTIONALITY */

if (!function_exists('saveThumbnail')) {
    function saveThumbnail($path, $file)
    {
        $filename = $file->getClientOriginalName();

        $img = \Image::make($file)->resize(null,  800, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->save(\storage_path() . "/app/public/" . $path . '/' . $filename, 75);

        return  $filename;
    }
}

if (!function_exists('saveImages')) {
    function saveImages($path, $files)
    {
        $images = [];

        foreach ($files as $file) {
            $filename = $file->getClientOriginalName();

            $img = \Image::make($file);

            $img->resize(1200,  null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->save(\storage_path() . "/app/public/" . $path . '/' . $filename, 75);

            array_push($images, $filename);
        }

        return $images;
    }
}

/* ADD IMAGES FUNCTIONALITY */

/* DELETE IMAGES FUNCTIONALITY */

if (!function_exists('deleteThumbnail')) {
    function deleteThumbnail($path, $filename)
    {
        return Storage::delete('public/' . $path . '/' . $filename);
    }
}

if (!function_exists('deleteImages')) {
    function deleteImages($path, $filenames)
    {
        $images = [];

        foreach ($filenames as $filename) {
            if ($filename) {
                array_push($images, 'public/' . $path . '/' . $filename);
            }
        }

        return Storage::delete($images);
    }
}

if (!function_exists('deleteImagesDirectory')) {
    function deleteImagesDirectory($directory)
    {
        $path = \storage_path() . '/app/public/' . $directory;

        return Storage::delete($path);
    }
}

/* DELETE IMAGES FUNCTIONALITY */
