<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminManagementController extends Controller
{
    // Memastikan hanya admin yang bisa mengakses
    private function checkAdmin(): void
    {
        abort_unless(auth()->check() && auth()->user()->role === 'admin', 403);
    }

    // Daftar admin
    public function index(Request $request)
    {
        $this->checkAdmin();

        $query = User::where('role', 'admin');

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $admins = $query->latest()->paginate(10)->withQueryString();

        $totalAdmins = User::where('role', 'admin')->count();

        $todayAdmins = User::where('role', 'admin')
            ->whereDate('created_at', today())
            ->count();

        return view('admin.admins.index', compact(
            'admins',
            'totalAdmins',
            'todayAdmins'
        ));
    }

    // Form tambah admin
    public function create()
    {
        $this->checkAdmin();

        return view('admin.admins.create');
    }

    // Simpan admin baru
    public function store(Request $request)
    {
        $this->checkAdmin();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'admin',
        ]);

        return redirect()
            ->route('admin.admins.index')
            ->with('success', 'Admin baru berhasil ditambahkan.');
    }

    // Form edit admin
    public function edit(User $admin)
    {
        $this->checkAdmin();

        abort_unless($admin->role === 'admin', 404);

        return view('admin.admins.edit', compact('admin'));
    }

    // Update admin
    public function update(Request $request, User $admin)
    {
        $this->checkAdmin();

        abort_unless($admin->role === 'admin', 404);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($admin->id),
            ],
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        $admin->name = $validated['name'];
        $admin->email = $validated['email'];

        if (!empty($validated['password'])) {
            $admin->password = Hash::make($validated['password']);
        }

        // Role tetap admin
        $admin->role = 'admin';

        $admin->save();

        return redirect()
            ->route('admin.admins.index')
            ->with('success', 'Data admin berhasil diperbarui.');
    }

    // Hapus admin
    public function destroy(User $admin)
    {
        $this->checkAdmin();

        abort_unless($admin->role === 'admin', 404);

        // Admin tidak boleh menghapus akunnya sendiri
        if ($admin->id === auth()->id()) {
            return back()->with('error', 'Kamu tidak bisa menghapus akun sendiri.');
        }

        // Lindungi admin terakhir
        if (User::where('role', 'admin')->count() <= 1) {
            return back()->with('error', 'Minimal harus ada satu akun admin.');
        }

        $admin->delete();

        return redirect()
            ->route('admin.admins.index')
            ->with('success', 'Admin berhasil dihapus.');
    }
}
