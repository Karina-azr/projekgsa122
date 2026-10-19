<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);

        return view('berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'ringkasan' => ['required', 'string', 'max:500'],
            'isi_artikel' => ['required', 'string'],
            'tanggal_berita' => ['required', 'date'],
            'gambar' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);

        // Gunakan kolom isi yang sudah ada di database.
        $data['isi'] = $data['isi_artikel'];
        unset($data['isi_artikel']);

        $data['slug'] = $this->buatSlug($data['judul']);

        $data['gambar'] = $request->file('gambar')
            ->store('berita', 'public');

        Berita::create($data);

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show(Berita $berita)
    {
        return view('berita.show', compact('berita'));
    }

    public function edit(Berita $berita)
    {
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'ringkasan' => ['required', 'string', 'max:500'],
            'isi_artikel' => ['required', 'string'],
            'tanggal_berita' => ['required', 'date'],
            'gambar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
        ]);

        // Simpan isi artikel ke kolom isi.
        $data['isi'] = $data['isi_artikel'];
        unset($data['isi_artikel']);

        $data['slug'] = $this->buatSlug(
            $data['judul'],
            $berita->id
        );

        if ($request->hasFile('gambar')) {
            $gambarLama = $berita->gambar;

            $data['gambar'] = $request->file('gambar')
                ->store('berita', 'public');

            if ($gambarLama) {
                Storage::disk('public')->delete($gambarLama);
            }
        } else {
            unset($data['gambar']);
        }

        $berita->update($data);

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()
            ->route('berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    private function buatSlug(
        string $judul,
        ?int $kecualiId = null
    ): string {
        $dasar = Str::slug($judul);
        $slug = $dasar ?: 'berita';
        $nomor = 1;

        while (
            Berita::where('slug', $slug)
                ->when(
                    $kecualiId,
                    fn ($query) => $query->where(
                        'id',
                        '!=',
                        $kecualiId
                    )
                )
                ->exists()
        ) {
            $slug = ($dasar ?: 'berita') . '-' . $nomor++;
        }

        return $slug;
    }
}
