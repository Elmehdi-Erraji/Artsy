<?php

namespace App\Http\Requests;

use App\Models\Project;
use App\Models\ProjectUser;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
            'request_status' =>Rule::in(array_keys(ProjectUser::STATUS_RADIO)),
            'approval_status' =>Rule::in(array_keys(ProjectUser::STATUS_RADIO)),
        ];
    }
}
