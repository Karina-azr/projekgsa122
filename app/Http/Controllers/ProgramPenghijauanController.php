<?php

namespace App\Http\Controllers;

use App\Models\ProgramPenghijauan;
use Illuminate\Http\Request;

class ProgramPenghijauanController extends Controller
{
    public function index()
    {
        $programs = ProgramPenghijauan::latest()->get();

        return view(
            'program-penghijauan.index',
            compact('programs')
        );
    }

    public function create()
    {
        return view('program-penghijauan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_program' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'target_pohon' => 'required|integer|min:1',
            'status' => 'required|in:Akan Datang,Berlangsung,Selesai',
        ]);

        $validated['pohon_tertanam'] = 0;

        if ($validated['status'] === 'Berlangsung') {
            $validated['waktu_mulai'] = now();
        } else {
            $validated['waktu_mulai'] = null;
        }

        ProgramPenghijauan::create($validated);

        return redirect()
            ->route('program-penghijauan.index')
            ->with(
                'success',
                'Program penghijauan berhasil ditambahkan.'
            );
    }

    public function edit($id)
    {
        $programPenghijauan = ProgramPenghijauan::findOrFail($id);

        return view(
            'program-penghijauan.edit',
            compact('programPenghijauan')
        );
    }

    public function update(Request $request, $id)
    {
        $program = ProgramPenghijauan::findOrFail($id);

        $validated = $request->validate([
            'nama_program' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'target_pohon' => 'required|integer|min:1',
            'status' => 'required|in:Akan Datang,Berlangsung,Selesai',
        ]);

        if ($validated['status'] === 'Berlangsung') {
            if (is_null($program->waktu_mulai)) {
                $validated['waktu_mulai'] = now();
            }
        } elseif ($validated['status'] === 'Akan Datang') {
            $validated['waktu_mulai'] = null;
        } elseif ($validated['status'] === 'Selesai') {
            if (is_null($program->waktu_mulai)) {
                $validated['waktu_mulai'] = now();
            }

            $validated['pohon_tertanam'] =
                $validated['target_pohon'];
        }

        if (
            !isset($validated['pohon_tertanam']) &&
            $program->pohon_tertanam > $validated['target_pohon']
        ) {
            $validated['pohon_tertanam'] =
                $validated['target_pohon'];
        }

        $program->update($validated);

        return redirect()
            ->route('program-penghijauan.index')
            ->with(
                'success',
                'Program berhasil diperbarui.'
            );
    }

    public function destroy($id)
    {
        $program = ProgramPenghijauan::findOrFail($id);

        $program->delete();

        return redirect()
            ->route('program-penghijauan.index')
            ->with(
                'success',
                'Program berhasil dihapus.'
            );
    }

    public function progress($id)
    {
        $program = ProgramPenghijauan::findOrFail($id);

        if ($program->status === 'Berlangsung') {
            if (is_null($program->waktu_mulai)) {
                $program->waktu_mulai = now();
            }

            $tambahan = 10;

            $program->pohon_tertanam = min(
                $program->pohon_tertanam + $tambahan,
                $program->target_pohon
            );

            if (
                $program->pohon_tertanam >=
                $program->target_pohon
            ) {
                $program->pohon_tertanam =
                    $program->target_pohon;

                $program->status = 'Selesai';
            }

            $program->save();
        }

        $persentase = 0;

        if ($program->target_pohon > 0) {
            $persentase = round(
                (
                    $program->pohon_tertanam /
                    $program->target_pohon
                ) * 100,
                1
            );
        }

        return response()->json([
            'id' => $program->id,
            'pohon_tertanam' => $program->pohon_tertanam,
            'target_pohon' => $program->target_pohon,
            'persentase' => $persentase,
            'status' => $program->status,
            'waktu_mulai' => $program->waktu_mulai
                ? $program->waktu_mulai->format('Y-m-d H:i:s')
                : null,
        ]);
    }
}
