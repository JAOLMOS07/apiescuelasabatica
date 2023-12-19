<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use JWTAuth;

class MemberController extends Controller
{
    protected $user;
    public function __construct(Request $request)
    {
        $token = $request->header('Authorization');
        if ($token != '')
            $this->user = JWTAuth::parseToken()->authenticate();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $class = $this->user->SchoolClass;
        $members = Member::where('class_id', $class->id)->get();
        return response($members);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $class = $this->user->SchoolClass;
        $member = Member::create([
            'name' => $request->name,
            'lastname' => $request->lastName,
            'email' => "email@gmail.com",
            'phone' => $request->phone,
            'birthDay' => $request->birthDay,
            'birthMonth' => $request->birthMonth,
            'class_id' => $class->id
        ]);
        return response($member);
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
