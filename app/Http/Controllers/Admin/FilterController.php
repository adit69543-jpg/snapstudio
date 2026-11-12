<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class FilterController extends Controller
{
    private function checkAdmin(): void
    {
        abort_unless(
            auth()->check() && auth()->user()->role === 'admin',
            403,
            'Anda tidak memiliki akses ke halaman ini.'
        );
    }

    // MENAMPILKAN DAFTAR FILTER
    public function index()
    {
        $this->checkAdmin();

        $filters = Filter::latest()->paginate(12);

        $totalFilters = Filter::count();

        $activeFilters = Filter::where('status', 'active')->count();

        $inactiveFilters = Filter::where('status', 'inactive')->count();

        return view('admin.filters.index', compact(
            'filters',
            'totalFilters',
            'activeFilters',
            'inactiveFilters'
        ));
    }

    // MENAMPILKAN FORM TAMBAH FILTER
    public function create()
    {
        $this->checkAdmin();

        return view('admin.filters.create');
    }

    // MENYIMPAN FILTER BARU
    public function store(Request $request)
    {
        $this->checkAdmin();

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:1000',
            'css_filter' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $slug = Str::slug($validated['name']);

        if (empty($slug)) {
            return back()
                ->withInput()
                ->withErrors([
                    'name' => 'Nama filter harus memiliki huruf atau angka.'
                ]);
        }

        $originalSlug = $slug;
        $counter = 1;

        while (Filter::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        Filter::create([
            'name' => $validated['name'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
            'css_filter' => $validated['css_filter'],
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route('admin.filters.index')
            ->with('success', 'Filter berhasil ditambahkan.');
    }

    // MENAMPILKAN FORM EDIT FILTER
    public function edit(Filter $filter)
    {
        $this->checkAdmin();

        return view('admin.filters.edit', compact('filter'));
    }

    // MEMPERBARUI FILTER
    public function update(Request $request, Filter $filter)
    {
        $this->checkAdmin();

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:1000',
            'css_filter' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $slug = Str::slug($validated['name']);

        if (empty($slug)) {
            return back()
                ->withInput()
                ->withErrors([
                    'name' => 'Nama filter harus memiliki huruf atau angka.'
                ]);
        }

        $originalSlug = $slug;
        $counter = 1;

        while (
            Filter::where('slug', $slug)
                ->where('id', '!=', $filter->id)
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $filter->update([
            'name' => $validated['name'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
            'css_filter' => $validated['css_filter'],
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route('admin.filters.index')
            ->with('success', 'Filter berhasil diperbarui.');
    }

    // MENGAKTIFKAN / MENONAKTIFKAN FILTER
    public function toggleStatus(Filter $filter)
    {
        $this->checkAdmin();

        $filter->update([
            'status' => $filter->status === 'active'
                ? 'inactive'
                : 'active',
        ]);

        return redirect()
            ->route('admin.filters.index')
            ->with(
                'success',
                'Status filter berhasil diperbarui.'
            );
    }

    // MENGHAPUS FILTER
    public function destroy(Filter $filter)
    {
        $this->checkAdmin();

        $filter->delete();

        return redirect()
            ->route('admin.filters.index')
            ->with('success', 'Filter berhasil dihapus.');
    }
}
