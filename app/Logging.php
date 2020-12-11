<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logging {

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function log($entity,$entity_id,$action,$message,$userId="0")
    {
        $return = "";
        
        if ( Auth::user() ) {
            $return .= Auth::user()->id."|";
        } else if ( $userId!="0" ) {
            $return .= $userId."|";
        } else {
            $return .= "0|";
        }
            
        $return .= $this->request->ip()."|";
        $return .= $this->request->headers->get('referer')."|";
        $return .= $entity."|";
        $return .= $entity_id."|";
        $return .= $action."|";
        $return .= str_replace("\r\n","",$message);

        return $return;
    }

}