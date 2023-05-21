<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Resources\MemberResource;
use App\Models\Member;
use Illuminate\Validation\ValidationException;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        return MemberResource::collection($members);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateMemberData($request);

        $member = Member::create($validatedData);

        // return new MemberResource($member);
        return response()->json([
            'success' => true,
            'message' => 'Member created successfully.',
            'data' => $member,
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        return new MemberResource($member);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $validatedData = $this->validateMemberData($request);

        $member->update($validatedData);

        // return new MemberResource($member);
        return response()->json([
            'success' => true,
            'message' => 'Member updated successfully.',
            'data' => $member,
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();

        // return response()->noContent();

        // Return a success response with a message
        return response()->json([
        'success' => true,
        'message' => 'Member deleted successfully.',
            ], Response::HTTP_OK);
    }

    protected function validateMemberData(Request $request)
    {
        return $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:members,email',
            'birthdate' => 'required|date',
        ]);
    }
}
