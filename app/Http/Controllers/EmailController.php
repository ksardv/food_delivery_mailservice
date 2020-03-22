<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Email;
use App\Publisher\Publisher;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    private $publisher;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getAllEmails()
    {
        $mails = Email::all();
        return response()->json($mails);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function send(Request $request)
    {
        if(empty($request->all())){
            return false;
        }

        //TODO add logging
        $data = json_decode($request->getContent(), true);

        $validatedData = $this->validateData($data);

        if(count($validatedData->errors())){
            return $validatedData->errors();
        }

        $mail = $this->storeEmail($data);
dd($mail);
        // $publisher = new Publisher();
        // $publisher->publish($mail);
    }

    /**
     * @param $data
     */
    public function validateData($data)
    {
        $validatedData = Validator::make($data, [
            'from.email' => 'required|email',
            'from.name' => 'required',
            'to.email' => 'required|email',
            'to.name' => 'required',
            'subject' => 'required',
            'content' => 'required'
        ]);

        return $validatedData;
    }

    public function storeEmail($data)
    {
        $email = new Email();
        $email->to = $data['to'];
        $email->from = $data['from'];
        $email->subject = $data['subject'];
        $email->content = $data['content'];
        $email->save();

        return $email;
    }
}
