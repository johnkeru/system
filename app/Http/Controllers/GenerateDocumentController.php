<?php

namespace App\Http\Controllers;

use App\Models\OrgData;
use App\Models\OrgList;
use App\Models\StudentInfo;
use App\Models\EmployeeInfo;
use Illuminate\Http\Request;
use App\Models\TrackDocument;
use App\Models\GenerateDocument;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;
use setasign\Fpdi\Fpdi;

class GenerateDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $superAdmin = DB::table('model_has_roles')->where('model_id', $user->id)->first();
        $studentData = StudentInfo::where('email', $user->email)->first();
        $employeeData = EmployeeInfo::where('email', $user->email)->first();
        if ($studentData != NULL) { //student
            $orgId = OrgData::where('student_info_id', $studentData->id)->pluck('id')->first();
        } elseif ($superAdmin->role_id == '1') {
            //none
        } else {
            $orgId = OrgData::where('employee_info_id', $employeeData->id)->pluck('id')->first();
        }

        $search = $request['search'] ?? "";
        if ($search != "") {
            $docs = GenerateDocument::where('file_name', 'LIKE', "%" . $search . "%")->paginate(15);
        } elseif ($superAdmin->role_id == '1') {
            $docs = GenerateDocument::paginate(15);
        } else {
            $docs = GenerateDocument::where('org_data_id', $orgId)->paginate(15);
        }
        return view('files.generate_docs.index', compact(['docs']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->hasFile('avatar') || !$request->file_name) {
            return response()->noContent();
        }
        $dateNow = now()->format('Ymdgis');
        $userEmail = auth()->user()->email;
        $studentInfo = StudentInfo::where('email', $userEmail)->first('id');
        $orgData = OrgData::where('student_info_id', $studentInfo->id)->first(['org_list_id', 'id']);
        $orgName = OrgList::where('id', $orgData->org_list_id)->first('name');

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $file->move('files/transactions/' . $orgName->name . '/', $filename);
        }

        $generateCN = $orgName->name . $dateNow;

        GenerateDocument::create([
            'control_number' => $generateCN,
            'org_data_id' => $orgData->id,
            'file' => $filename,
            'file_name' => $request->file_name,
            'status_id' => '1'
        ]);

        TrackDocument::create([
            'control_number' => $generateCN,
        ]);

        return redirect()->route('generate-document.index');

        //storage_path('app/assets)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = GenerateDocument::find($id);
        $dateNow = now()->format('Ymdgis');
        $userEmail = auth()->user()->email;
        $studentInfo = StudentInfo::where('email', $userEmail)->first('id');
        $orgData = OrgData::where('student_info_id', $studentInfo->id)->first('id');
        $orgName = OrgList::where('id', $orgData->id)->first('name');
        $latestFile = $data->file;

        if ($request->hasFile('avatar')) {
            File::delete('files/transactions/' . $orgName->name . '/' . $data->file);

            $file = $request->file('avatar');
            $filename = $file->getClientOriginalName();
            $file->move('files/transactions/' . $orgName->name . '/', $filename);

            $latestFile = $filename;
        }
        $data->where('id', $id)->update(array(
            'file' => $latestFile,
            'file_name' => $request->file_name
        ));

        return redirect()->route('generate-document.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mainData  = GenerateDocument::find($id);

        $userEmail = auth()->user()->email;
        $studentInfo = StudentInfo::where('email', $userEmail)->first('id');
        $orgData = OrgData::where('student_info_id', $studentInfo->id)->first('id');
        $orgName = OrgList::where('id', $orgData->id)->first('name');

        File::delete('files/transactions/' . $orgName->name . '/' . $mainData->file);
        $mainData->delete();
        return redirect()->route('generate-document.index');
    }

    public function download($id)
    {
        $data = GenerateDocument::find($id);
        $userEmail = auth()->user()->email;
        $studentInfo = StudentInfo::where('email', $userEmail)->first('id');
        $orgData = OrgData::where('student_info_id', $studentInfo->id)->first('id');
        $orgName = OrgList::where('id', $orgData->id)->first('name');
        return response()->download(public_path('files/transactions/' . $orgName->name . '/' . $data->file));
    }

    public function adviserApproved($id)
    {
        if (!request()->hasFile('signature')) {
            return response()->noContent();
        }
        $data = GenerateDocument::find($id);
        $approver = EmployeeInfo::where('email', auth()->user()->email)->first();

        $substring = Str::before($data->control_number, date('Y'));
        $path = "files/transactions/" . $substring . '/' . $data->file;
        $output_path = "files/transactions/" . $substring . '/signed_' . $data->file;

        $approver_fullName = $approver->first_name . ' ' . $approver->middle_name . ' ' . $approver->last_name . ' - ' . 'Adviser';
        $this->process($path, $output_path, $approver_fullName);

        $data->where('id', $id)->update(array(
            'status_id' => '3',
            'file' => 'signed_' . $data->file
        ));

        // delete the original pdf file
        File::delete($path);

        TrackDocument::where('control_number', $data->control_number)->update(array(
            'adv_approved_by' => auth()->user()->id,
            'adviser_approved' => '1',
            'adv_app_date' => now(),
        ));


        return redirect()->route('generate-document.index');
    }

    public function adviserDissapproved(Request $request, $id)
    {

        $data = GenerateDocument::find($id);
        $data->where('id', $id)->update(array(
            'status_id' => '2',
        ));

        TrackDocument::where('control_number', $data->control_number)->update(array(
            'adv_approved_by' => auth()->user()->id,
            'adviser_approved' => '0',
            'adv_app_date' => now(),
            'adv_notes' => $request->notes,
        ));

        return redirect()->route('generate-document.index');
    }

    public function osasApproved($id)
    {
        if (!request()->hasFile('signature')) {
            return response()->noContent();
        }
        $data = GenerateDocument::find($id);

        $approver = User::where('email', auth()->user()->email)->first();

        $year = date('Y');
        $delimiter = $year; // Use next year as delimiter
        $input = $data->control_number;
        $substring = Str::before($input, $delimiter);
        $path = "files/transactions/" . $substring . '/' . $data->file;

        $fullName = $approver->first_name . ' ' . $approver->last_name . ' - ' . 'Super Admin';
        $this->process($path, $path, $fullName);

        $data->where('id', $id)->update(array(
            'status_id' => '4',
        ));


        TrackDocument::where('control_number', $data->control_number)->update(array(
            'osas_approved_by' => auth()->user()->id,
            'osas_approved' => '1',
            'osas_app_date' => now(),
        ));


        return redirect()->route('generate-document.index');
    }

    public function osasDissapproved(Request $request, $id)
    {
        $data = GenerateDocument::find($id);
        $data->where('id', $id)->update(array(
            'status_id' => '5',
        ));

        TrackDocument::where('control_number', $data->control_number)->update(array(
            'osas_approved_by' => auth()->user()->id,
            'osas_approved' => '0',
            'osas_app_date' => now(),
            'osas_notes' => $request->notes,
        ));

        return redirect()->route('generate-document.index');
    }




    private function process($file_path, $output_path, $approver)
    {
        $path = public_path($file_path);
        $output = public_path($output_path);

        $signatureFile = request()->file('signature');
        $deleteSignature = false;
        $signaturePath = null;

        if ($signatureFile) {
            $originalFilename = $signatureFile->getClientOriginalName();
            $signaturePath = $signatureFile->storeAs('public', $originalFilename);
            $imagePath = storage_path('app/' . $signaturePath);
            $deleteSignature = true; // Set the flag to delete the signature file
        } else {
            $imagePath = public_path('signature.png'); // Replace with the path to your default image file
        }

        $this->fillPDF($path, $output, $imagePath, $approver);

        if ($deleteSignature && $signaturePath) {
            Storage::delete($signaturePath); // Delete the signature file
        }
    }


    private function fillPDF($path, $output, $imagePath, $approver)
    {
        $adviser = (strpos($approver, "Adviser") !== false) ? true : false;

        $fpdi = new Fpdi();
        $count = $fpdi->setSourceFile($path);

        // Iterate through each page
        for ($pageNo = 1; $pageNo <= $count; $pageNo++) {
            $templateId = $fpdi->importPage($pageNo);

            // Get the size of the imported page
            $size = $fpdi->getTemplateSize($templateId);

            // Add a new page with the same size as the imported page
            $fpdi->AddPage($size['orientation'], $size);

            // Set the current page content from the imported page
            $fpdi->useTemplate($templateId);

            // Add the image, approver, and adviser on the last page
            if ($pageNo === $count) {
                $imageWidth = 80; // Adjust the width of the image (smaller value)
                $imageHeight = 0; // Auto-adjust the height of the image
                $imageX = $adviser ? $size['width'] - 10 - $imageWidth + 10 : 0; // Adjust the X coordinate of the image
                $imageY = $size['height'] - 10 - $imageHeight - 30; /// Adjust the Y coordinate of the image

                $fpdi->Image($imagePath, $imageX, $imageY, $imageWidth, $imageHeight);

                $fpdi->SetFont('Helvetica', '', 12);
                $textWidth = $fpdi->GetStringWidth($approver);
                $textX = $imageX + ($imageWidth - $textWidth) / 2; // Center the text horizontally
                $textY = $imageY + $imageHeight + 9; // Adjust the Y coordinate to move the text higher
                $fpdi->SetXY($textX, $textY);
                $fpdi->Cell(0, 10, $approver, 0, 0, $adviser ? 'C' : 'L');
            }
        }

        // Output the modified PDF to a file
        $fpdi->Output($output, 'F');
    }
}