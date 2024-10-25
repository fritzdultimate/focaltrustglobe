<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWithdrawalRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_wallet_id' => 'required',
            'amount' => 'required',
            // 'pin' => 'required|numeric|digits:4'
        ];
    }

    public function messages() {
        return [
            'amount.required' => 'Invalid amount',
            'user_wallet_id.required' => 'Please select wallet for this transaction',
            // 'pin.required' => 'Please enter your 4 digits pin'
        ];
    }
}
