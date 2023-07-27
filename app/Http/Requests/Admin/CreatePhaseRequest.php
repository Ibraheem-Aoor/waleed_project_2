<?php

namespace App\Http\Requests\Admin;

use App\Enums\BasePaymentStatusEnum;
use App\Enums\Phase\PhaseProgressStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreatePhaseRequest extends FormRequest
{
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'title' => 'required',
            'budget' => 'required_without:budget_rate',
            'budget_rate' => 'required_without:budget',
            'progress_status' => 'required|'.Rule::in(PhaseProgressStatusEnum::keys()),
            'payment_status' => 'required|'.Rule::in(BasePaymentStatusEnum::keys()),
        ];
        if($this->budget != null)
        {
            $rules['budget'] = $rules['budget'] . '|numeric|lt:' . $this->project_budget;
        }elseif($this->budget_rate != null)
        {
            $rules['budget_rate'] = $rules['budget_rate'].'|numeric';
        }
        return $rules;
    }
}
