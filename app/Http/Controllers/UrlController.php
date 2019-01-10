<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Url;
use Validator;
use Illuminate\Validation\Rule;

class UrlController extends Controller
{
    public function index(Request $request)
    {
        $urls = Url::orderBy('created_at', 'desc')->paginate(5);
        return view('url.index', ['urls' => $urls]);
    }
    
    protected function getToken($length = 10)
    {
        $token = '';
        $codeAlphabet = 'abcdefghijklmnopqrstuvwxyz';
        //$codeAlphabet .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codeAlphabet .= '0123456789';
        $max = strlen($codeAlphabet);

        for ($i = 0; $i < $length; $i++) {
            $token .= $codeAlphabet[mt_rand(0, $max-1)];
        }

        return $token;
    }
    
    protected function getUniqueToken($length = 10)
    {
        $token = $this->getToken($length);
        
        $data = ['url_token' => $token];
        
        $validator = Validator::make($data, [
            'url_token' => 'unique:urls',
        ]);
        
        while ($validator->fails()) {
            $token = $this->getToken($length);

            $data = ['url_token' => $token];

            $validator = Validator::make($data, [
                'url_token' => 'unique:urls',
            ]);
        }
        
        return $token;
    }

    public function getAdd()
    {
        return view('url.add');
    }
    
    public function postAdd(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3|max:100',
            'url' => 'required|url|min:3|max:255|unique:urls,url',
        ]);
        
        $validatedData['url_token'] = $this->getUniqueToken();
    
        $url = Url::create($validatedData);
        
        $request->session()->flash('status', 'The Url was added successfully');
        
        return redirect('/urls');
    }
    
    public function getEdit($id)
    {
        $url = Url::findOrFail($id);
        return view('url.edit', ['url' => $url]);
    }
    
    public function postEdit(Request $request, $id)
    {
        $url = Url::findOrFail($id);
        
        $validatedData = $request->validate([
            'title' => 'required|min:3|max:100',
            'url' => [
                'required',
                'url',
                'min:3',
                'max:255',
                Rule::unique('urls')->ignore($url->id),
            ]
        ]);
        
        $result = $url->fill($validatedData)->save();
        
        $request->session()->flash('status', 'The Url was updated successfully');
        
        return redirect('/urls');
    }
    
    public function getView($id)
    {
        $url = Url::findOrFail($id);
        return view('url.view', ['url' => $url]);
    }
    
    public function getDelete(Request $request, $id)
    {
        $url = Url::findOrFail($id);
        
        $url->delete();
        
        $request->session()->flash('status', 'The Url was deleted successfully');
        
        return redirect('/urls');
    }
}
