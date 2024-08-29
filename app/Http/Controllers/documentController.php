<?php

namespace App\Http\Controllers;

use App\Exports\exportDocuments;
use Carbon\Carbon;
use App\Models\Document;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class documentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $document = Document::latest()->get();;
        return view('document.index', [
            'title' => 'Patroli Cwf',
            'active' => 'document',
            'page' => 'Document / Create',
            'documents' => $document,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('document.create', [
            'title' => 'Patroli Cwf',
            'active' => 'document',
            'page' => 'Document / Create',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'security' => 'sometimes',
            'company' => 'required|max:150',
            'address' => 'required',
            'document_type' => 'required',
            'sender' => 'required|min:5',
            'receiver' => 'required|min:5',
            'status' => 'sometimes'
        ]);

        Document::create($validateData);
        return redirect('/dokumen')->with('success', 'berhasil menambahkan data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $detail = Document::find($id);
        return response()->json([
            'details' => $detail,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }

    public function DocumentExport()
    {
        return Excel::download(new exportDocuments, 'document.xlsx');
    }
}
