<?php

namespace App\Http\Controllers;

use App\Imports\BidangImport;
use App\Imports\EkskulImport;
use App\Imports\GuruImport;
use Illuminate\Http\Request;
use App\Imports\JabatanImport;
use App\Imports\LifeskillImport;
use App\Imports\MapelImport;
use App\Imports\PrestasiImport;
use App\Imports\SaranaImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class ImportExcelController extends Controller
{

    public function ekskul(Request $request)
    {
        HeadingRowFormatter::default('none');
        $import = new EkskulImport;
        try {
            Excel::import($import, $request->file('import'));
            $successCount = $import->getSuccessCount();
            if ($successCount > 0) {
                return redirect()->route('admin.bidang')->with('success', $successCount . ' Ekstra Kulikuler berhasil diimport');
            } else {
                return redirect()->route('admin.bidang')->with('error', 'Tidak ada data yang berhasil diimport.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error importing data. Please check the file format.');
        }
    }

    public function guru(Request $request)
    {
        HeadingRowFormatter::default('none');
        $import = new GuruImport;

        try {
            Excel::import($import, $request->file('import'));
            $successCount = $import->getSuccessCount();
            if ($successCount > 0) {
                return redirect()->route('guru.index')->with('success', $successCount . ' Guru berhasil diimport');
            } else {
                return redirect()->route('guru.index')->with('error', 'Tidak ada data yang berhasil diimport.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error importing data. Please check the file format.');
        }
    }

    public function sarana(Request $request)
    {
        HeadingRowFormatter::default('none');
        $import = new SaranaImport;

        try {
            Excel::import($import, $request->file('import'));
            $successCount = $import->getSuccessCount();
            if ($successCount > 0) {
                return redirect()->route('guru.index')->with('success', $successCount . ' Sarana Prasarana berhasil diimport');
            } else {
                return redirect()->route('guru.index')->with('error', 'Tidak ada data yang berhasil diimport.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error importing data. Please check the file format.');
        }
    }

    public function prestasi(Request $request)
    {
        HeadingRowFormatter::default('none');
        $import = new PrestasiImport;

        try {
            Excel::import($import, $request->file('import'));
            $successCount = $import->getSuccessCount();
            if ($successCount > 0) {
                return redirect()->route('guru.index')->with('success', $successCount . ' Prestasi berhasil diimport');
            } else {
                return redirect()->route('guru.index')->with('error', 'Tidak ada data yang berhasil diimport.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error importing data. Please check the file format.');
        }
    }
}
