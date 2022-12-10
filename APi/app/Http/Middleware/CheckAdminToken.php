<?php

namespace App\Http\Middleware;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Traits\GeneralTraits;

use Closure;

class CheckAdminToken
{
    use GeneralTraits;
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = null;

        try {
            $user = JWTAuth::parseToken()->authantication();            
        } catch (\Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return $this->returnSuccessMessage('ERROR303','INVALID_TOKEN');                
            } else if($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException ){
                // return response()->json(['success' => false, 'msg' => 'EXPIRED_TOKEN']);
                return $this->returnError('ERROR303','EXPIRED_TOKEN');                
            }else{
                // return response()->json(['success' => false, 'msg' => 'TOKEN_NOTFOUND']);
                return $this->returnError('ERROR303','TOKEN_NOTFOUND');                
            }
        } catch(\Throwable $e){
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return $this->returnSuccessMessage('ERROR3001','INVALID_TOKEN'); 
            } else if($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException ){
                // return response()->json(['success' => false, 'msg' => 'EXPIRED_TOKEN']);
                return $this->returnError('ERROR303','EXPIRED_TOKEN');                
            }else{
                // return response()->json(['success' => false, 'msg' => 'TOKEN_NOTFOUND']);
                return $this->returnError('ERROR303','TOKEN_NOTFOUND');                
            }   
        }

        if (!$user)
            // return response()->json(['success' => false, trans('Unathanticated')], 200);
            $this->returnError(trans('Unathanticated'));
            return $next($request);
            
    }
}
