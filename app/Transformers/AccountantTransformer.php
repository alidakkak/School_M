<?php

namespace App\Transformers;

use App\Models\Gender;
use App\Models\Specialization;
use League\Fractal\TransformerAbstract;

class AccountantTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($acount)
    {


        return [
            "Account_Id"=>$acount->id,
            "Account_Type"=>$acount->type,
            "Account_Debit"=>$acount->Debit,
            "Account_Credit"=>$acount->credit,
            "Account_Statement"=>$acount->description,
            "Account_Created"=>$acount->created_at,

        ];
    }
}
