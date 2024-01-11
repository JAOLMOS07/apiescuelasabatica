<?php

namespace App\Http\Controllers;

use App\DTO\MemberDTO;
use App\DTO\RegisterTypeDTO;
use App\Models\Member;
use App\Models\Register;
use App\Models\ResponseApi;
use App\Models\RegisterType;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    protected $user;

    public function __construct(Request $request)
    {
        $this->middleware('auth:api', ['except' => []]);
        $token = $request->header('Authorization');
        if ($token != '')
            $this->user = auth()->user();
    }


    public function store(Request $request)
    {
        $data = $request->all();

        foreach ($data as $item) {
            $member_id = $item['memberId'];
            $date = $item['date'];
            $registertypes = $item['registerTypes'];

            foreach ($registertypes as $register) {
                if ($register['registerId'] === null) {

                    $newId = $member_id . str_replace('-', '', $date) . $register['id'];
                    Register::create([
                        "id" => $newId,
                        "date" => $date,
                        "member_id" => $member_id,
                        "register_type_id" => $register['id'],
                        "value" => $register['value'],
                    ]);
                } else {
                    $registerToUpdate = Register::FindOrFail($register['registerId']);
                    $registerToUpdate->Update([
                        "value" => $register['value'],
                    ]);
                }
            }
        }

        /*  return response()->json([
             "Datos guardados correctamente" => $request
         ]); */

        return $this->getRegistersByDate($data[0]['date']);
    }

    public function getRegistersByDate($date)
    {
        $class = $this->user->SchoolClass;

        $members = Member::with([
            'registers' => function ($query) use ($date) {
                $query->where('date', $date);
            },
            'registers.registerType'
        ])
            ->where('class_id', $class->id)
            ->get();

        $responseMembers = $members->map(function ($member) {
            $registersTypes = $member->registers->map(function ($register) {
                return new RegisterTypeDTO(
                    $register->registerType->name,
                    $register->registerType->id,
                    $register->id,
                    $register->value
                );
            });

            if ($registersTypes->isEmpty()) {
                $allRegistersTypes = RegisterType::all();

                $registersTypes = $allRegistersTypes->map(function ($registerType) {
                    return new RegisterTypeDTO(
                        $registerType->name,
                        $registerType->id,
                        null,
                        0
                    );
                });
            }

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
        });

        $response = new ResponseApi("members registers", $responseMembers);
        return response()->json($response, 200);
    }
    public function getRegistersByDate2($date)
    {
        $class = $this->user->SchoolClass;

        $members = Member::with([
            'registers' => function ($query) use ($date) {
                $query->where('date', $date);
            },
            'registers.registerType'
        ])
            ->where('class_id', $class->id)
            ->get();

        $responseMembers = $members->map(function ($member) {
            $registersTypes = $member->registers->map(function ($register) {
                return [
                    'name' => $register->registerType->name,
                    'id' => $register->registerType->id,
                    'registerId' => $register->id,
                    'value' => $register->value,
                ];
            })->toArray();

            if (empty($registersTypes)) {
                $allRegistersTypes = RegisterType::all();

                $registersTypes = $allRegistersTypes->map(function ($registerType) {
                    return [
                        'name' => $registerType->name,
                        'id' => $registerType->id,
                        'registerId' => null,
                        'value' => 0,
                    ];
                })->toArray();
            }

            return [
                'id' => $member->id,
                'name' => $member->name,
                'lastName' => $member->lastName,
                'status' => $member->status,
                'registerTypes' => $registersTypes,
            ];
        });

        $response = new ResponseApi("members registers", $responseMembers);
        return response()->json($response, 200);
    }



}
