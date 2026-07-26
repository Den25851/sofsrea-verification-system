<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MemberRegistrationMail;

class MemberController extends Controller
{
    /**
     * Display all members.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $members = Member::when($search, function ($query) use ($search) {
                $query->where('member_number', 'like', "%{$search}%");
            })
            ->orderBy('member_number', 'asc')
            ->paginate(10);

        return view('members.index', compact('members', 'search'));
    }

    /**
     * Show the form for creating a new member.
     */
    public function create()
    {
        $lastMember = Member::orderBy('member_number', 'desc')->first();

        if ($lastMember) {
            $nextNumber = str_pad(((int) $lastMember->member_number) + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $nextNumber = '0001';
        }

        return view('members.create', compact('nextNumber'));
    }

    /**
     * Store a newly created member.
     */
    public function store(Request $request)
    {
        // Generate the next member number automatically
        $lastMember = Member::orderBy('member_number', 'desc')->first();

        if ($lastMember) {
            $memberNumber = str_pad(((int) $lastMember->member_number) + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $memberNumber = '0001';
        }

        $validated = $request->validate([
            'full_name'     => 'required|string|max:255',
            'email'         => 'required|email|unique:members,email',
            'phone'         => 'required|string|max:20',
            'organization'  => 'nullable|string|max:255',
            'status'        => 'required|in:Active,Inactive',
        ], [
            'full_name.required' => 'Full Name is required.',
            'email.required'     => 'Email Address is required.',
            'email.email'        => 'Please enter a valid email address.',
            'email.unique'       => 'This email is already registered.',
            'phone.required'     => 'Phone Number is required.',
            'status.required'    => 'Please select a status.',
        ]);

        $validated['member_number'] = $memberNumber;
$member = Member::create($validated);

try {
    Mail::to($member->email)->send(new MemberRegistrationMail($member));
    $message = 'Member registered successfully. A confirmation email has been sent.';
} catch (\Exception $e) {
    \Log::error('Member email failed: '.$e->getMessage());

    $message = 'Member registered successfully, but the confirmation email could not be sent.';
}

return redirect()
    ->route('members.index')
    ->with('success', $message);
    }

    /**
     * Display the specified member.
     */
    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified member.
     */
    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified member.
     */
    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'full_name'     => 'required|string|max:255',
            'email'         => 'required|email|unique:members,email,' . $member->id,
            'phone'         => 'required|string|max:20',
            'organization'  => 'nullable|string|max:255',
            'status'        => 'required|in:Active,Inactive',
        ]);

        $member->update($validated);

        return redirect()
            ->route('members.index')
            ->with('success', 'Member updated successfully.');
    }

    /**
     * Remove the specified member.
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()
            ->route('members.index')
            ->with('success', 'Member deleted successfully.');
    }
}