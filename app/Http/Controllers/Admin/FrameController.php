<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Frame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrameController extends Controller
{
    private function checkAdmin()
    {
        abort_unless(
            auth()->check() && auth()->user()->role === 'admin',
            403,
            'Kamu tidak memiliki akses administrator.'
        );
    }

    // Menampilkan semua frame
    public function index()
    {
        $this->checkAdmin();

        $frames = Frame::latest()->paginate(12);

        $totalFrames = Frame::count();

        $activeFrames = Frame::where('status', 'active')->count();

        $inactiveFrames = Frame::where('status', 'inactive')->count();

        return view('admin.frames.index', compact(
            'frames',
            'totalFrames',
            'activeFrames',
            'inactiveFrames'
        ));
    }

    // Menampilkan halaman tambah frame
    public function create()
    {
        $this->checkAdmin();

        return view('admin.frames.create');
    }

    // Menyimpan frame baru
    public function store(Request $request)
    {
        $this->checkAdmin();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'status' => 'required|in:active,inactive',
        ]);

        $validated['image'] = $request->file('image')
            ->store('frames', 'public');

        Frame::create($validated);

        return redirect()
            ->route('admin.frames.index')
            ->with('success', 'Frame berhasil ditambahkan!');
    }

    // Menampilkan halaman edit
    public function edit(Frame $frame)
    {
        $this->checkAdmin();

        return view('admin.frames.edit', compact('frame'));
    }

    // Memperbarui frame
    public function update(Request $request, Frame $frame)
    {
        $this->checkAdmin();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('image')) {

            // Hapus gambar lama
            if ($frame->image) {
                Storage::disk('public')->delete($frame->image);
            }

            // Simpan gambar baru
            $validated['image'] = $request->file('image')
                ->store('frames', 'public');
        }

        $frame->update($validated);

        return redirect()
            ->route('admin.frames.index')
            ->with('success', 'Frame berhasil diperbarui!');
    }

    // Menghapus frame
    public function destroy(Frame $frame)
    {
        $this->checkAdmin();

        if ($frame->image) {
            Storage::disk('public')->delete($frame->image);
        }

        $frame->delete();

        return redirect()
            ->route('admin.frames.index')
            ->with('success', 'Frame berhasil dihapus!');
    }
}
