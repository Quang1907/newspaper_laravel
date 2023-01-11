<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use App\Imports\CategoryImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class AdminDashboardController extends Controller
{
    public function home() {
        return view( 'admin.dashboard' );
    }

    public function vertifyEmail() {
        $user = User::where( 'email', session()->get( 'email' ) )->first();
        
        if ( request()->token != $user->token ) {
            return redirect()->back()->withErrors( [ 'message' => 'Mã xác minh không chính xác' ] );
        }

        $user->update( [ 'email_verified_at' => now() ] );
        return redirect('');
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function importCategory( Request $request ) 
    {
        $file = $request->file( "importCategory" )->store( "import" );
        $import = new CategoryImport;
        $import->queue( $file );
        toast( 'Uploaded file Successfully!!!', 'success' );
        return redirect()->back();
    }
}
