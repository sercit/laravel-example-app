<?php

namespace App\Http\Controllers;

use App\Features\CanadianForm;
use App\Models\User;
use App\Services\FormService;
use Illuminate\Http\Request;
use Laravel\Pennant\Feature;

class FormController extends Controller
{
    public function __construct(private readonly FormService $formService)
    {
    }

    public function show(Request $request) {
        $fields = Feature::active(CanadianForm::class)
            ? $this->formService->getCanadianFields()
            : $this->formService->getWorldwideFields();

        $design = Feature::value('design');

        return view('form', compact('design', 'fields'));

    }

    public function getUsersFeatures() {
        $users = User::all();
        Feature::for($users)->load(['design']);
        $rowColor = [];

        foreach ($users as $user) {
            $rowColor[$user->id] = 'color-' . (Feature::for($user)->value('design') ?? 'gray');
        }

        return view('users.features', compact('users', 'rowColor'));
    }
}
