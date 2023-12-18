<?php

namespace App\Http\Controllers;

use App\Models\Guideline;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GuidelineController extends Controller
{
    public function index()
    {
        $licensePrice = Guideline::where('type', 'licence_federale')->first();
        $associationPrice = Guideline::where('type', 'inscription_association')->first();
        $season_year = Guideline::latest('season_year')->first();
        $totalPriceValue = $licensePrice->price + $associationPrice->price;

        return Inertia::render('Guideline', [
            'licensePrice' => $licensePrice,
            'associationPrice' => $associationPrice,
            'totalPrice' => $totalPriceValue,
            'seasonYear' => $season_year,
        ]);
    }

    public function edit()
    {
        $guidelines = Guideline::all();
        return Inertia::render('Guideline/Edit', ['guidelines' => $guidelines, 'seasonYear' => $guidelines->last()->season_year]);
    }

    public function update(Request $request)
    {
        foreach ($request->guidelines as $updatedGuideline) {
            $guideline = Guideline::find($updatedGuideline['id']);
            $guideline->update($updatedGuideline);
        }
        return redirect()->route('dashboard')->with('successMessage', 'Mise à jour réussie !');
    }

    public function choice()
    {
        return Inertia::render('Guideline/Choice');
    }
}
