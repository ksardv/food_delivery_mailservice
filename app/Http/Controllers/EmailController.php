<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Email;
use App\Publisher\EmailPublisher;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

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

    public function index()
    {
        return view('app');
    }

    /**
     * @return JsonResponse
     */
    public function getAllEmails(): JsonResponse
    {
        $mails = Email::all();
        return response()->json($mails);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse
     */
    public function send(Request $request): JsonResponse
    {
        if(empty($request->all())){
            return false;
        }

        $data = json_decode($request->getContent(), true);

        $validatedData = $this->validateData($data['message']);

        if(count($validatedData->errors())){
            return $validatedData->errors();
        }

        $mail = $this->storeEmail($data['message']);
        return response()->json(Response::HTTP_CREATED);

        // $publisher = new EmailPublisher();
        // $publisher->publish(json_encode($data['message']));
    }

    /**
     * This method triggers an event
     */
    public function storeEmail($data)
    {
        $email = Email::create([
            'email' => $data,
            'status' => null
        ]);

        return $email;
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
            'subject' => 'required'
        ]);

        return $validatedData;
    }
}
