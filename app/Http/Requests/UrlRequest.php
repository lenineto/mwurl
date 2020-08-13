<?php

namespace App\Http\Requests;

use App\Url;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;


/**
 * @property string urltoken
 * @property string original_url
 * @property bool enabled
 * @property Url url
 */
class UrlRequest extends FormRequest
{
    protected $url;

    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        $this->url = ($this->route('url'));

        return $this->url
            ? $this->url->isOwner()
            : Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        $uniqueUrl = $this->url ? ','. $this->url->id : '';
        return [
            'original_url' => 'required|active_url',
            'enabled' => 'sometimes|boolean',
            'urltoken' => "unique:urls,token$uniqueUrl"
        ];
    }

    public function messages()
    {
        return [
            'original_url.required' => 'You must provide the URL to redirect to',
            'original_url.active_url' => 'The URL provided is not valid. Please make sure the URL is active.',
            'urltoken.unique' => "Token already in use. Another URL on our system is already using $this->urltoken.",
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'urltoken' => $this->makeToken(),
            'enabled' => $this->enabled ? true : false
        ]);
    }

    /**
     * Pass the sanitized token back or generate a random one
     * @return Stringable
     */
    protected function makeToken()
    {
        if ($this->urltoken) {
            $token = Str::of($this->urltoken)
                ->replaceMatches('/(http|https):/', '')
                ->slug('');
        } else {
            $token = Str::slug(Str::random(9), '');
        }
        return $token;
    }
}
