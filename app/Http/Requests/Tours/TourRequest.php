<?php

namespace App\Http\Requests\Tours;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TourRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $tour = $this->route('tour');

        return [
            'title' => [
                'required',
                'string',
                'max:120',
                $tour ? Rule::unique('tours', 'title')->ignoreModel($tour) : Rule::unique('tours', 'title'),
            ],
            'is_featured' => ['boolean'],
            'is_published' => ['boolean'],
            'summary' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'duration_days' => ['nullable','integer'],
            'duration_nights' => ['nullable','integer'],
            'currency' => ['required','string','max:3'],
            'price' => ['nullable','numeric'],
            'price_ranges_to' => ['nullable','numeric'],
            'tour_category_id' => ['required','exists:tour_categories,id'],
            'itineraries.*.title' => 'required|string|max:255',
            'itineraries.*.description' => 'required|string',
            'itineraries.*.day_number' => 'nullable|integer',
            'images.*' => 'nullable|image|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title is required.',
            'title.unique' => 'This title is already taken. Please choose another.',
            'title.max' => 'Title must not exceed 120 characters.',
            'image.*.image' => 'The uploaded file must be an image.',
            'image.*.max' => 'Image must be under 2MB.',
        ];
    }
}
