<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Register;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use JWTAuth;

class RegisterController extends Controller
{
    protected $user;
    public function __construct(Request $request)
    {
        $token = $request->header('Authorization');
        if ($token != '')
            $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        foreach ($data as $item) {
            $member_id = $item['member_id'];
            $date = $item['date'];
            $registertypes = $item['registertypes'];

            foreach ($registertypes as $register) {
                Register::create([
                    "date" => $date,
                    "member_id" => $member_id,
                    "register_type_id" => $register['registerTypeId'],
                    "value" => $register['value'],
                ]);
            }
        }

        return response("OK");
    }
    /**
     * Display the specified resource.
     */
    public function show(Register $register)
    {
        return response($register);
    }

    public function getRegistersByDate(Request $request)
    {
        $class = $this->user->SchoolClass;

        $members = Member::where('class_id', $class->id)->get();
        $responseMembers = [];

        foreach ($members as $member) {
            $registers = Register::where('member_id', $member->id)
                ->where('date', $request->date)
                ->get();

            $registersTypes = [];

            foreach ($registers as $register) {
                $registersTypes[] = [
                    'name' => $register->registerType->name,
                    'value' => $register->value,
                ];
            }

            $responseMembers[] = [
                'id' => $member->id,
                'name' => $member->name,
                'lastName' => $member->lastname,
                'registerTypes' => $registersTypes,
            ];
        }

        return response()->json(['members' => $responseMembers]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Register $register)
    {

    }

}
