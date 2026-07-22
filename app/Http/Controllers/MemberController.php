<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

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
    ->latest()
    ->paginate(10)
    ->withQueryString();

 return view('members.index', compact('members', 'search'));
}

    /**
     * Show the form for creating a member.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created member.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_number' => 'required|string|max:50|unique:members,member_number',
            'full_name'     => 'required|string|max:255',
            'email'         => 'required|email|unique:members,email',
            'phone'         => 'required|string|max:20',
            'organization'  => 'nullable|string|max:255',
            'status'        => 'required|in:Active,Inactive',
        ], [
            'member_number.required' => 'Member Number is required.',
            'member_number.unique'   => 'This Member Number already exists.',
            'full_name.required'     => 'Full Name is required.',
            'email.required'         => 'Email Address is required.',
            'email.email'            => 'Please enter a valid email address.',
            'email.unique'           => 'This email is already registered.',
            'phone.required'         => 'Phone Number is required.',
            'status.required'        => 'Please select a status.',
        ]);

        Member::create($validated);

        return redirect()
            ->route('members.index')
            ->with('success', 'Member registered successfully.');
    }

    /**
     * Display the specified member.
     */
    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the member.
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
            'member_number' => 'required|string|max:50|unique:members,member_number,' . $member->id,
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