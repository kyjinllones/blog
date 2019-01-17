<?php

namespace App\Http\Middleware;
use Validator;
use Closure;

class ValidatePostRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function validateRequest($request){
        //validation goes here
        $rules=[
            'title'=>'required',
            'content'=>'required|max:255|min:100',
          ];
        $validator=Validator::make(
            $request->all()
            ,$rules
        );
        
        if($validator->fails()){
            return back()
            ->withErrors($validator)->withInput();
        }
        //return request;
       
    }
    public function handle($request, Closure $next)
    {
        self::validateRequest($request);
        return $next($request);
    }
}
