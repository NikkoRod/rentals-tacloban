<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Show pending landlord accounts
    public function showPendingAccounts()
    {
        $pendingLandlords = User::where('role', 'landlord')  // Only landlords
            ->where('is_approved', 0)  // Pending approval
            ->get();

        return view('admin.pending-accounts', compact('pendingLandlords'));
    }

    // Approve a landlord account
    public function approveLandlord($id)
    {
        $landlord = User::findOrFail($id);
        $landlord->is_approved = 1;  // Approve the landlord
        $landlord->save();

        return redirect()->route('admin.pending-accounts')->with('status', 'Landlord approved successfully.');
    }

    // Reject a landlord account
    public function rejectLandlord($id)
    {
        $landlord = User::findOrFail($id);
        $landlord->is_approved = 2;  // Reject the landlord
        $landlord->save();

        return redirect()->route('admin.pending-accounts')->with('status', 'Landlord rejected.');
    }
}
