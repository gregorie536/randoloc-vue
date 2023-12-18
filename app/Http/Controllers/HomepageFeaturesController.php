<?php

namespace App\Http\Controllers;

use App\Models\HomepageFeature;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;



class HomepageFeaturesController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'homepageFeatures' => HomepageFeature::all()
        ]);
    }


    public function edit()
    {
        $homepageFeatures = HomepageFeature::all();
        return Inertia::render('HomepageFeature/Edit', ['homepageFeatures' => $homepageFeatures]);
    }

    // public function update(Request $request)
    // {
    //     foreach ($request->homepageFeatures as $updatedHomepageFeature) {
    //         $homepageFeature = HomepageFeature::find($updatedHomepageFeature['id']);
    //         $homepageFeature->update($updatedHomepageFeature);
    //     }
    //     return redirect()->route('dashboard')->with('successMessage', 'Mise à jour réussie !');
    // }
    public function update(Request $request)
{
    foreach ($request->homepageFeatures as $index => $updatedHomepageFeature) {
        $homepageFeature = HomepageFeature::find($updatedHomepageFeature['id']);
        if ($request->hasFile("homepageFeatures.{$index}.image")) {
            if ($homepageFeature->image) {
                Storage::delete($homepageFeature->image);
            }

            $path = $request->file("homepageFeatures.{$index}.image")->store('homepage_features', 'public');

            $updatedHomepageFeature['image'] = $path;
        }

        $data = array_filter($updatedHomepageFeature, function ($value, $key) {
            return $key !== 'image' || !empty($value);
        }, ARRAY_FILTER_USE_BOTH);

        $homepageFeature->update($data);
    }

    return redirect()->route('dashboard')->with('successMessage', 'Mise à jour réussie !');
}



    public function choice()
    {
        return Inertia::render('HomepageFeature/Choice');
    }
}
