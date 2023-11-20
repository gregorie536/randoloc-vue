<?php

namespace App\Http\Controllers;

use App\Models\HomepageFeature;
use Illuminate\Http\Request;
use Inertia\Inertia;



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

    public function update(Request $request)
    {
        foreach ($request->homepageFeatures as $updatedHomepageFeature) {
            $homepageFeature = HomepageFeature::find($updatedHomepageFeature['id']);
            $homepageFeature->update($updatedHomepageFeature);
        }
        return redirect()->route('dashboard')->with('successMessage', 'Mise à jour réussie !');
    }
}
