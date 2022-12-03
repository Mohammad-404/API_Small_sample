<?php

namespace App\Traits;

trait GeneralTraits{

    public function returnError($errNum, $msg){
        return response()->json([
            'status'    => false,
            'errNum'    => $errNum,
            'msg'       => $msg,
        ]);
    }

    public function returnSuccessMessage($errNum = "S000",$msg = ""){
        return response()->json([
            'status'    => true,
            'errNum'    => $errNum,
            'msg'       => $msg,
        ]);
    }

    public function returnData($key,$value,$msg){
        return response()->json([
            'status'    => true,
            'errNum'    => "Success_200",
            'msg'       => $msg,
            $key        => $value,
        ]); 
    }

}