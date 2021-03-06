<?php

declare(strict_types=1);

namespace App\Http\Requests\Fund;

use Urameshibr\Requests\FormRequest;

class SendFundRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'amount' => 'required|integer',
            'recipient_wallet' => 'required|integer|exists:user_wallets,wallet',
        ];
    }
}
