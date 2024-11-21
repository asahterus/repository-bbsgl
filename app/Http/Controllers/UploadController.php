<?php

namespace App\Http\Controllers;

use App\Models\Eprint;
use App\Models\Subject;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    // Menampilkan halaman untuk memilih jenis publikasi
    public function index()
    {
        $types = [
            'Article',
            'Book Section',
            'Monograph',
            'Conference or Workshop Item',
            'Book',
            'Thesis',
            'Patent',
            'Artefact',
            'Show/Exhibition',
            'Composition',
            'Performance',
            'Image',
            'Video',
            'Audio',
            'Dataset',
            'Experiment',
            'Teaching Resource',
            'Other'
        ];
        return view('pages.type', ['types' => $types]);
    }

    // Menyimpan jenis item yang dipilih ke session
    public function storeType(Request $request)
    {
        $request->validate(['typeRadio' => 'required']); // Validasi input
        session(['item_type' => $request->input('typeRadio')]); // Simpan item type ke session
        return redirect()->route('upload.upload');
    }

    // Menampilkan halaman upload setelah jenis item dipilih
    public function upload()
    {
        $itemType = session('item_type'); // Ambil item type dari session
        return view('pages.upload', compact('itemType'));
    }

    // Menyimpan file atau URL yang diupload
    public function storeUpload(Request $request)
    {
        // Validasi input (file atau URL wajib diisi salah satu)
        $request->validate(['file' => 'required_without:url', 'url' => 'required_without:file']);

        $itemType = session('item_type'); // Ambil item type dari session

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('');
        }

        // Simpan data upload ke session
        $uploadData = [
            'item_type' => $itemType,
            'file' => $filePath ?? null,
            'url' => $request->input('url')
        ];
        session(['upload_data' => $uploadData]);

        return redirect()->route('upload.details');
    }

    // Menampilkan halaman detail upload
    public function details()
    {
        return view('pages.details');
    }

    // Menyimpan data detail upload ke session
    public function storeDetails(Request $request)
    {
        // Simpan data detail dari form ke session
        session(['details_data' => $request->input()]);

        return redirect()->route('upload.subjects');
    }

    // Menampilkan halaman untuk memilih subject
    public function subjects()
    {
        $subjects = Subject::all(); // Ambil semua subjects dari database
        return view('pages.subjects', compact('subjects'));
    }

    // Menyimpan subject yang dipilih ke session
    public function storeSubject(Request $request)
    {
        $request->validate(['subjects' => 'required']); // Validasi input
        session(['subject' => $request->input('subjects')]); // Simpan subject ke session

        return redirect()->route('upload.deposit');
    }

    // Menyimpan data eprint ke database
    public function storeEprint(Request $request)
    {
        // Ambil semua data dari session
        $uploadData = session('upload_data');
        $detailsData = session('details_data');
        $subject = session('subject');

        // Buat atau simpan Eprint baru
        $eprint = Eprint::create([
            'title' => $detailsData['title'],
            'abstract' => $detailsData['abstract'],
            'keywords' => $detailsData['keywords'] ?? null, // Jika tidak ada, simpan sebagai null
            'journal_title' => $detailsData['journal_title'] ?? null,
            'issn' => $detailsData['issn'] ?? null,
            'publisher' => $detailsData['publisher'] ?? null,
            'official_url' => $detailsData['official_url'] ?? null,
            'volume' => $detailsData['volume'] ?? null,
            'number' => $detailsData['number'] ?? null,
            'page_from' => $detailsData['page_from'] ?? null,
            'page_to' => $detailsData['page_to'] ?? null,
            'year' => $detailsData['year'] ?? null,
            'month' => $detailsData['month'] ?? null,
            'day' => $detailsData['day'] ?? null,
            'identification_number' => $detailsData['identification_number'] ?? null,
            'references' => $detailsData['references'] ?? null,
            'additional_information' => $detailsData['additional_information'] ?? null,
            'comments' => $detailsData['comments'] ?? null,
            'item_type' => $uploadData['item_type'], // Dari session upload_data
            'file' => $uploadData['file'] ?? null, // Dari session upload_data
            'url' => $uploadData['url'] ?? null, // Dari session upload_data
            'user_id' => auth()->id(), // Simpan ID pengguna yang sedang login
            'status' => $detailsData['status'] ?? null, // Dari session details_data
            'family_names' => json_encode($detailsData['family_name'] ?? []), // Data keluarga disimpan sebagai JSON
            'given_names' => json_encode($detailsData['given_name'] ?? []),
            'nims' => json_encode($detailsData['nim'] ?? []),
            'emails' => json_encode($detailsData['email'] ?? []),
            'corporate_creators' => json_encode($detailsData['corporate-creators'] ?? []),
            'contribution' => json_encode($detailsData['contribution'] ?? []),
            'divisions' => json_encode($detailsData['divisions'] ?? []),
            'refereed' => $detailsData['refereed'] ?? null,
            'related_urls' => json_encode($detailsData['related_urls'] ?? []),
            'url_type' => json_encode($detailsData['url_type'] ?? []),
            'funders' => json_encode($detailsData['funders'] ?? []),
            'projects' => json_encode($detailsData['projects'] ?? []),
            'contact_email' => $detailsData['contact-email'] ?? null,
            'subject_id' => $subject // Simpan subject_id ke kolom subject_id
        ]);

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('message', 'Upload succeed');
    }

    // Menampilkan halaman deposit
    public function deposit()
    {
        return view('pages.deposit');
    }

    public function openFile(Request $request)
    {
        $year = $request->input('year');

        // Fetch the data based on the selected year
        $eprints = Eprint::whereYear('created_at', $year)->get();

        // Format the file URL to be accessible via the public disk
        foreach ($eprints as $eprint) {
            $eprint->file = Storage::url('uploads/' . $eprint->file);
        }

        return response()->json($eprints);
    }
}
