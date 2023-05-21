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
    public function index(Request $request)
    {
        $members = Member::all();

        if ($request->has("with_tags") || $request->input("tags") == "true") {
            $members->load('memberTags');
        }

        return MemberResource::collection($members);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        if ($request->has('with_tags') || $request->input("tags") == "true") {
            $member->load('memberTags');
        }

        return new MemberResource($member);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $this->validateMemberData($request);

            $member = Member::create($validatedData);

            // return new MemberResource($member);
            return response()->json([
                'success' => true,
                'message' => 'Member created successfully.',
                'data' => $member,
            ], Response::HTTP_CREATED);
        } catch (ValidationException $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        try {
            $validatedData = $this->validateMemberData($request);

            $member->update($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Member updated successfully.',
                'data' => $member,
            ], Response::HTTP_OK);
        } catch (ValidationException $ex) {
            return response()->json([
                'success' => false,
                'message' => $ex->errors(),
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();

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
