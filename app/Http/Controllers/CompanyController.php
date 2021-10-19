<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('companies.index', [
            'companies' => Company::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        $company = new Company();
        return view('companies.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CompanyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CompanyRequest $request): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();
        if ($request->hasFile('logo')) {
            $filename = $request->file('logo')->store('public');
            $validated['logo'] = str_replace('public/', '', $filename);
        }
        Company::create($validated);

        return redirect()
            ->route('companies.index')
            ->with('status', 'Company created.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Company $company): \Illuminate\Contracts\View\View
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Company $company): \Illuminate\Contracts\View\View
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\CompanyRequest $request
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CompanyRequest $request, Company $company): \Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();
        if ($request->hasFile('logo')) {
            $filename = $request->file('logo')->store('public');
            $validated['logo'] = str_replace('public/', '', $filename);
        }
        $company->update($validated);

        return redirect()
            ->route('companies.index')
            ->with('status', 'Company updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Company $company): \Illuminate\Http\RedirectResponse
    {
        $company->delete();

        return redirect()
            ->route('companies.index')
            ->with('status', 'Company deleted.');
    }
}
