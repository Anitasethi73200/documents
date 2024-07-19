<?php
namespace App\Http\Controllers;

use App\DataTables\DocumentDataTable;
use App\DataTables\DocumentinboxdataTable;
use App\DataTables\DocumentsharedataTable;
use App\DataTables\ShareDataTable;
use App\Models\Department;
use App\Models\Document as ModelsDocument;
use App\Models\File as ModelsFile;
use App\Models\Role;
use App\Models\Section;
use App\Models\Share;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function index(DocumentDataTable $table)
    {
        return $table->render('document.index');
    }

    public function create()
    {
        $file = ModelsFile::where('status', '1')->get();
        return view('document.create', compact('file'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'file_id' => 'required|max:40',
            'dtype' => 'required',
        ]);

        $userId = Auth::id();
        $file = ModelsFile::findOrFail($request->file_id);
        $document = new ModelsDocument();
        $document->createdBy = $userId;
        $document->file_id = $request->input('file_id');
        $document->dtype = $request->input('dtype');
        if ($request->input('dtype') === 'create') {
            $document->file_name = $request->input('title');
            $document->description = $request->input('description');
            $document->meta_title = $request->input('metatitle');
            $pdf = FacadePdf::loadView('documents.pdf', [
                'description' => $document->description,
            ]);
            $pdfPath = 'documents/' . $file->file_name . '/' . $request->input('title') . '.pdf';
            $directory = public_path('documents/' . $file->file_name);
            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            $pdf->save(public_path($pdfPath));
            $document->documentpath = $pdfPath;
        } elseif ($request->input('dtype') === 'upload' && $request->hasFile('documentpath')) {
            $documentName = $request->file('documentpath')->getClientOriginalName();
            $request->file('documentpath')->move(public_path('documents/' . $file->file_name), $documentName);
            $pdfPath = 'documents/' . $file->file_name . '/' . $documentName;
            $document->file_name = $documentName;
            $document->documentpath = $pdfPath;
        }

        $document->save();
        return redirect()->route('document.index')->with('success', 'Document saved successfully.');
    }

    public function edit(ModelsDocument $document)
    {
        $file_detail = ModelsFile::where('id', $document->file_id)->first();

        $file = ModelsFile::all();

        return view('document.edit', compact('document', 'file', 'file_detail'));
    }

    public function view($id)
    {
        $file_detail = Share::find($id);
        $document = ModelsDocument::where('id', $file_detail->doc_id)->first();
        $view = ModelsFile::where('id', $file_detail->file_id)->first();
        $file = ModelsFile::all();

        return view('document.view', compact('document', 'file', 'file_detail', 'view'));
    }

    public function commentstore(Request $request)
    {
        $request->validate([

            'comment' => 'required',
        ]);

        $store = Share::where('id', $request->share_Id)->first();
        $comment = new Share();
        $comment->sharetype = $store->sharetype;
        $comment->role_id = $store->role_id;
        $comment->doc_id = $store->doc_id;
        $comment->file_id = $store->file_id;
        $comment->receverid = $store->senderId;
        $comment->status = $store->status;
        $comment->department_id = $store->department_id;
        $comment->section_id = $store->section_id;
        $comment->comments = $request->comment;
        $comment->revert_status = $store->revert_status;
        $comment->senderId = Auth::user()->id;
        $comment->save();
        return response()->json(['success' => 'Comment added successfully']);

    }

    public function update(Request $request, ModelsDocument $document)
    {

        $document = new ModelsDocument();
        // $document = ModelsDocument::findOrFail($document['id']);
        $this->validate(
            $request,
            [
                'file_id' => 'required|max:40',
                'dtype' => 'required',
            ]
        );
        $input = $request->all();
        $document->file_name = $request->input('title');
        $document->file_name = $request->input('documentpath');
        $document->comments = $request->input('comments');
        $document->modifyBy = Auth::user()->id;
        $document->fill($input)->save();

        return redirect()->route('document.index')->with(
            'success',
            'document ' . $document->name . ' updated!'
        );
    }
    public function destroy($id)
    {
        $document = ModelsDocument::find($id);
        $document->status = 0;
        $document->deletedBy = Auth::user()->id;
        $document->deleted_at = date('Y-m-d H:i:s');

        $document->save();

        return redirect()->route('document.index')->with('success', __('Document deleted successfully.'));
    }

    public function share($id)
    {
        $share = ModelsDocument::find($id);
        $department = Department::all();
        $section = Section::all();
        $userId = User::all();
        $roll = Role::all();

        $file = ModelsFile::where('id', $share->file_id)->first();

        return view('document.share', compact('id', 'share', 'department', 'section', 'userId', 'roll', 'file'));
    }

    public function store_share(Request $request)
    {
        $request->validate([
            'sharetype' => 'required',
        ]);

        $userId = Auth::id();
        $document = new Share();
        $document->senderId = $userId;
        $document->status = $request->input('status');
        $document->doc_id = $request->input('doc_id');
        $document->file_id = $request->input('file_id');
        $document->sharetype = $request->input('sharetype');
        if ($request->input('sharetype') === 'role') {
            $document->role_id = $request->input('role');
        } elseif ($request->input('sharetype') === 'user') {
            $document->department_id = $request->input('department_id');
            $document->section_id = $request->input('section_id');
            $document->receverid = $request->input('user');
        }

        $document->save();
        return redirect()->route('document.index')->with('success', 'Document saved successfully.');
    }

    public function getuser(Request $request)
    {
        $users = User::where('department_id', $request->department_id)
            ->where('section_id', $request->section_id)
            ->get();

        return response()->json($users);
    }
    public function documentsent(DocumentsharedataTable $table)
    {
        return $table->render('document.sentdocument');
    }
    public function documentinbox(ShareDataTable $table)
    {
        return $table->render('document.inbox');
    }
}
