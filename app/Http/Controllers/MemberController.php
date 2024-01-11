<?php

namespace App\Http\Controllers;

use App\DTO\MemberDTO;
use App\DTO\RegisterTypeDTO;
use App\Models\Member;
use App\Models\RegisterType;
use App\Models\ResponseApi;
use Illuminate\Http\Request;
use JWTAuth;

class MemberController extends Controller
{
    protected $user;
    public function __construct(Request $request)
    {
        $this->middleware('auth:api', ['except' => []]);
        $token = $request->header('Authorization');
        if ($token != '')
            $this->user = auth()->user();
    }

    public function index()
    {
        $class = $this->user->SchoolClass;
        $members = Member::where('class_id', $class->id)->get();
        return response($members);
    }


    public function store(Request $request)
    {
        $class = $this->user->SchoolClass;

        $member = Member::create([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'phone' => $request->phone,
            'birthDay' => $request->birthDay,
            'birthMonth' => $request->birthMonth,
            'status' => 1,
            'class_id' => $class->id
        ]);

        $allRegistersTypes = RegisterType::all();

        $registersTypes = $allRegistersTypes->map(function ($registerType) {
            return new RegisterTypeDTO(
                $registerType->name,
                $registerType->id,
                null,
                0
            );
        });

        $memberDTO = new MemberDTO(
            $member->id,
            $member->name,
            $member->lastName,
            $member->email,
            $member->phone,
            $member->birthMonth,
            $member->birthDay,
            $member->status,
            $member->class_id,
            $member->address,
            $registersTypes->toArray()
        );
        $response = new ResponseApi("member successfully registered", $memberDTO);
        return response()->json($response, 200);
    }


    public function show(Member $member)
    {
        $memberDTO = new MemberDTO(
            $member->id,
            $member->name,
            $member->lastName,
            $member->email,
            $member->phone,
            $member->birthMonth,
            $member->birthDay,
            $member->status,
            $member->class_id,
            $member->address
        );
        $response = new ResponseApi("member", $memberDTO);
        return response()->json($response, 200);
    }


    public function update(Request $request, Member $member)
    {
        $member->update($request->all());
        $allRegistersTypes = RegisterType::all();

        $registersTypes = $allRegistersTypes->map(function ($registerType) {
            return new RegisterTypeDTO(
                $registerType->name,
                $registerType->id,
                null,
                0
            );
        });
        $memberDTO = new MemberDTO(
            $member->id,
            $member->name,
            $member->lastName,
            $member->email,
            $member->phone,
            $member->birthMonth,
            $member->birthDay,
            $member->status,
            $member->class_id,
            $member->address,
            $registersTypes->toArray()
        );
        $response = new ResponseApi("member updated successfully", $memberDTO);
        return response()->json($response, 200);
    }

    public function destroy(Member $member)
    {
        //
    }
}
