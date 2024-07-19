<?php

namespace App\Http\Controllers;

use App\DataTables\FileDataTable;
use App\DataTables\FilesentDataTable;
use App\DataTables\GreennotesdataTable;
use App\DataTables\YellownotesdataTable;
use App\DataTables\FileinboxDataTable;
use App\Models\Category;
use App\Models\Correspondence;
use App\Models\Department;
use App\Models\File as ModelsFile;
use App\Models\Fileshare;
use App\Models\Notes;
use App\Models\Receipt;
use App\Models\Section;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\Yellownotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function index(FileDataTable $table)
    {
        return $table->render('file.index');
    }

    public function create()
    {
        $categories = Category::all();
        $department = Department::all();
        $file = ModelsFile::all();
        return view('file.create', compact('file', 'categories', 'department'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'file_name' => 'required|max:40',
            'fileno' => 'required',
            'description' => 'required',
            'metatags' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'department_id' => 'required',
        ]);
        $userId = Auth::id();
        $document = new ModelsFile();
        $document->createdBy = $userId;
        $document->file_name = $request->input('file_name');
        $document->fileno = $request->input('fileno');
        $document->description = $request->input('description');
        $document->category_id = $request->input('category_id');
        $document->subcategory_id = $request->input('subcategory_id');
        $document->department_id = $request->input('department_id');
        $document->section_id = $request->input('section_id');
        $document->metatags = $request->input('metatags');
        $publicPath = public_path('documents/' . $request->input('file_name'));

        if (!file_exists($publicPath)) {

            if (mkdir($publicPath, 0755, true)) {
                $document->save();
                return redirect()->route('file.index')->with('success', 'File saved successfully.');
            } else {
                return redirect()->route('file.index')->with('error', 'Failed to create folder.');
            }
        } else {
            return redirect()->route('file.index')->with('error', 'Folder already exists.');
        }
    }

    public function edit(ModelsFile $file)
    {
        $categories = Category::all();
        $subcategory = Subcategory::all();
        $department = Department::all();
        $section = Section::all();
        return view('file.edit', compact('file', 'categories', 'subcategory', 'department', 'section'));
    }
    public function update(Request $request, ModelsFile $File)
    {
        $file = ModelsFile::findOrFail($File['id']);

        $request->validate([
            'file_name' => 'required|max:40',
            'fileno' => 'required',
            'description' => 'required',
            'metatags' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'department_id' => 'required',
        ]);
        $input = $request->all();
        $file->modifiedBy = Auth::user()->id;
        $file->fill($input)->save();

        return redirect()->route('file.index')->with(
            'success',
            'file ' . $file->name . ' updated!'
        );
    }
    public function destroy($id)
    {
        $file = ModelsFile::find($id);
        $file->status = 0;
        $file->deletedBy = Auth::user()->id;
        $file->deleted_at = date('Y-m-d H:i:s');
        $file->save();

        return redirect()->route('file.index')->with('success', __('Document deleted successfully.'));
    }
    public function subcategory(Request $request)
    {
        $subcategory = Subcategory::where('category_id', $request->category_id)->get();
        if (count($subcategory) > 0) {
            return response()->json($subcategory);
        }
    }
    public function getsection(Request $request)
    {
        $section = Section::where('department_id', $request->department_id)->get();
        if (count($section) > 0) {
            return response()->json($section);
        }
    }

    public function file_notes($id)
    {
        $receipt = Receipt::all();
        $file = ModelsFile::findOrFail($id);
        $gnotes = Notes::where('file_id', $id)->orderBy('id', 'DESC')->first();
        $ynotes = Yellownotes::where('file_id', $id)->first();
        $greennote = Notes::where('file_id', $id)->get();
        $correspondence = Correspondence::where('file_id', $id)->get();

        return view('file.notes', compact('id', 'file', 'receipt', 'gnotes', 'ynotes', 'greennote', 'correspondence'));
    }

    public function store_notes(Request $request)
    {
        // dd($request->all());
        $userId = Auth::id();
        if ($request->gdescription != null) {
            $notes = new Notes();
            $notes->createdBy = $userId;
            $notes->file_id = $request->file_id;
            $notes->description = $request->gdescription;
            $notes->save();
        } elseif ($request->ydescription != null) {
            $notes = new Yellownotes();
            $notes->file_id = $request->file_id;
            $notes->createdBy = $userId;
            $notes->description = $request->ydescription;
            $notes->save();

        }
        return redirect()->back()->with('status', 'Note saved successfully');
    }
    public function discardnote($id)
    {
        $gnote = Notes::find($id);
        $ynote = Yellownotes::find($id);

        if ($gnote) {
            $gnote->delete();
            return redirect()->back()->with('status', 'Note discarded successfully');
        } else {
            $ynote->delete();
            return redirect()->back()->with('status', 'Note discarded successfully');
        }
    }
    public function store_correspondance(Request $request)
    {
        $request->validate([
            'receipt_id' => 'required|',
        ]);

        $userId = Auth::id();
        $count = count($request->receipt_id);
        for ($i = 0; $i < $count; $i++) {
            $correspondence = new Correspondence();
            $correspondence->createdBy = $userId;
            $correspondence->receipt_id = $request->receipt_id[$i];
            $correspondence->file_id = $request->file_id;
            $correspondence->save();
        }

        return redirect()->back()->with('status', 'Correspondence save successfully');
    }

    public function fileshare($id)
    {
        $notes = Notes::FindorFail($id);
        $file = ModelsFile::where('id', $notes->file_id)->first();
        $department = Department::all();
        $fileview = Fileshare::where('gnotes_id', $id)->get();

        return view('file.fileshare', compact('department', 'file', 'notes', 'fileview'));
    }

    public function store_file_share(Request $request)
    {
        $request->validate([
            'department_id' => 'required|max:40',
            'notify' => 'required',
            'remarks' => 'required',
            'duedate' => 'required',
            'action' => 'required',
            'priority' => 'required',
        ]);

        $userId = Auth::id();
        $fileshare = new Fileshare();
        $fileshare->createdBy = $userId;
        $fileshare->file_id = $request->input('file_id');
        $fileshare->gnotes_id = $request->input('notes_id');
        $fileshare->department_id = $request->input('department_id');
        $fileshare->section_id = $request->input('section_id');
        $fileshare->sender_id = $userId;
        $fileshare->notifyby = $request->input('notify');
        $fileshare->share_file_status = $request->input('status');
        $fileshare->remarks = $request->input('remarks');
        $fileshare->duedate = $request->input('duedate');
        $fileshare->actiontype = $request->input('action');
        $fileshare->priority = $request->input('priority');
        $fileshare->recever_id = $request->input('user');

        $fileshare->save();

        return redirect()->route('file.index')->with('success', __('Fileshare  successfully.'));
    }

    public function getuser(Request $request)
    {
        $users = User::where('department_id', $request->department_id)
            ->where('section_id', $request->section_id)
            ->get();

        return response()->json($users);
    }

    public function viewfile($id)
    {
        $viewfile = Fileshare::find($id);
        $notes = Notes::where('id', $viewfile->gnotes_id)->first();
        $correspondence = Correspondence::where('file_id',$viewfile->file_id)->get();
        // dd($correspondence,$viewfile->file_id);
        return view('file.shareviewfile', compact('viewfile','gnotes','notes','correspondence'));
    }

    public function filesent(FilesentDataTable $table)
    {
        return $table->render('file.sentfile');
    }
    public function greennotes(GreennotesdataTable $table)
    {
        return $table->render('file.greennotes');
    }
    public function yellownotes(YellownotesdataTable $table)
    {
        return $table->render('file.yellownotes');
    }
    public function fileinbox(FileinboxDataTable $table)
    {
        return $table->render('file.inbox');
    }
}
