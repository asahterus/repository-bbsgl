<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use App\Models\Eprint;
use App\Models\Subject;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Melakukan pencarian sederhana berdasarkan judul dokumen.
     * 
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function simpleSearch(Request $request)
    {
        // Mengambil input pencarian dari user
        $query = $request->input('query');

        // Mencari eprints yang judulnya mengandung query yang diberikan
        $results = Eprint::where('title', 'like', '%' . $query . '%')->get();

        // Menampilkan hasil pencarian di halaman simpleBrowse
        return view('pages.simpleBrowse', compact('results'));
    }

    /**
     * Menampilkan halaman pencarian lanjutan dengan data subjek dan tipe dokumen.
     * 
     * @return \Illuminate\View\View
     */
    public function advancedSearchPage()
    {
        // Mengambil semua subjek dan tipe dokumen dari database
        $subjects = Subject::all();
        $documentsType = DocumentType::all();

        // Menampilkan halaman search dengan data subjek dan tipe dokumen
        return view('pages.search', [
            'subjects' => $subjects,
            'documentsType' => $documentsType
        ]);
    }

    /**
     * Melakukan pencarian lanjutan berdasarkan berbagai filter.
     * 
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function advancedSearch(Request $request)
    {
        // Inisialisasi query dasar dengan hubungan ke dokumen
        $query = Eprint::with('documents');
        $hasFilters = false;

        // Filter berdasarkan judul
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
            $hasFilters = true;
        }

        // Filter berdasarkan abstrak
        if ($request->filled('abstract')) {
            $query->where('abstract', 'like', '%' . $request->input('abstract') . '%');
            $hasFilters = true;
        }

        // Filter berdasarkan kata kunci
        if ($request->filled('keywords')) {
            $query->where('keywords', 'like', '%' . $request->input('keywords') . '%');
            $hasFilters = true;
        }

        // Filter berdasarkan tanggal publikasi
        if ($request->filled('publication_date')) {
            $query->whereDate('publication_date', '=', $request->input('publication_date'));
            $hasFilters = true;
        }

        // Filter berdasarkan status
        if ($request->filled('status')) {
            $query->where('status', '=', $request->input('status'));
            $hasFilters = true;
        }

        // Filter berdasarkan divisi (disimpan dalam JSON)
        if ($request->has('division') && is_array($request->input('division')) && !empty($request->input('division'))) {
            $divisions = $request->input('division');
            $query->whereJsonContains('divisions', $divisions);
            $hasFilters = true;
        }

        // Filter berdasarkan tipe item (relasi documents)
        if ($request->has('item_type') && is_array($request->input('item_type')) && !empty($request->input('item_type'))) {
            $itemIds = array_map('intval', $request->input('item_type'));
            $query->whereHas('documents', function ($query) use ($itemIds) {
                $query->whereIn('documents.document_type_id', $itemIds);
            });
            $hasFilters = true;
        }

        // Filter berdasarkan subjek
        if ($request->has('subject') && is_array($request->input('subject')) && !empty($request->input('subject'))) {
            $subjectIds = array_map('intval', $request->input('subject'));
            $query->whereIn('subject_id', $subjectIds);  // Menggunakan subject_id langsung
            $hasFilters = true;
        }

        // Filter berdasarkan nama keluarga (family_name)
        if ($request->filled('family_name')) {
            $query->whereJsonContains('family_names', $request->input('family_name'));
            $hasFilters = true;
        }

        // Filter berdasarkan nama depan (given_name)
        if ($request->filled('given_name')) {
            $query->whereJsonContains('given_names', $request->input('given_name'));
            $hasFilters = true;
        }

        // Eksekusi query jika terdapat filter
        if ($hasFilters) {
            $eprints = $query->get();
        } else {
            // Jika tidak ada filter, return data kosong
            $eprints = collect();
        }

        // Tampilkan hasil pencarian di halaman advancedSearch
        return view('pages.advancedSearch', compact('eprints'));
    }
}
