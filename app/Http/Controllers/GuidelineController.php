<?php

namespace App\Http\Controllers;

use App\Models\Guideline;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\GuidelineRequest;

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

    public function update(GuidelineRequest $request)
    {
        foreach ($request->guidelines as $updatedGuideline) {
            $guideline = Guideline::find($updatedGuideline['id']);
            $guideline->update($updatedGuideline);
        }
        return redirect()->route('dashboard')->with('successMessage', 'Les prix ont été mis à jour !');
    }

    public function choice()
    {
        return Inertia::render('Guideline/Choice');
    }
}
