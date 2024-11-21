<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Eprint;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrowseController extends Controller
{
    /**
     * Menampilkan halaman browse.
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.browse');
    }

    /**
     * Mengambil eprints berdasarkan tahun.
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByYear(Request $request)
    {
        $year = $request->query('year');

        // Validasi input tahun
        if (!is_numeric($year) || strlen($year) != 4) {
            return response()->json(['error' => 'Invalid year'], 400);
        }

        // Ambil data berdasarkan tahun
        $eprints = Eprint::where('year', $year)->get();

        $data = $eprints->map(function ($eprint) {
            return [
                'id' => $eprint->id,
                'title' => $eprint->title,
                'file' => $eprint->file
            ];
        });

        return response()->json($data);
    }

    public function openFile(string $filename)
    {

        $filePath = 'public/';
        if (Storage::exists($filePath)) {

            $filePath = Storage::path("public/" . $filename);


            return response()->file($filePath);
        } else {
            return response('File not found.', 404);
        }
    }

    /**
     * Mengambil semua subjek.
     * 
     * @return \Illuminate\View\View
     */
    public function getSubjects()
    {
        $subjects = Subject::all();
        return view('pages.browseBySubject', compact('subjects'));
    }

    /**
     * Mengambil eprints berdasarkan subjek.
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBySubject(Request $request)
    {
        $subjectId = $request->input('subject_id');

        // Mencari eprints berdasarkan ID subjek
        $eprints = Eprint::where('subject_id', $subjectId)->get();

        return response()->json($eprints, 200);
    }

    /**
     * Mengambil semua tipe dokumen.
     * 
     * @return \Illuminate\View\View
     */
    public function getDocumentTypes()
    {
        $documentTypes = DocumentType::all();
        return view('pages.browseByDocumentType', compact('documentTypes'));
    }

    /**
     * Mengambil eprints berdasarkan tipe dokumen.
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByDocumentType(Request $request)
    {
        $documentTypeId = $request->input('document_type_id');

        // Mencari eprints berdasarkan ID tipe dokumen
        $eprints = Eprint::whereHas('documents', function ($query) use ($documentTypeId) {
            $query->where('document_type_id', $documentTypeId);
        })->get();

        return response()->json($eprints);
    }

    /**
     * Mengambil eprints berdasarkan nama penulis.
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByAuthorName(Request $request)
    {
        $familyName = $request->query('family_name');
        $givenName = $request->query('given_name');

        $eprints = Eprint::query();

        // Filter berdasarkan nama keluarga
        if ($familyName) {
            $eprints->where('family_names', 'like', '%' . $familyName . '%');
        }

        // Filter berdasarkan nama depan
        if ($givenName) {
            $eprints->where('given_names', 'like', '%' . $givenName . '%');
        }

        return response()->json($eprints->get());
    }

    /**
     * Mengambil eprints berdasarkan divisi.
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByDivisons(Request $request)
    {
        $department = $request->query('division');

        // Mencari eprints berdasarkan divisi yang disimpan
        $eprints = Eprint::whereJsonContains('divisions', $department)->get();

        return response()->json($eprints);
    }
}
