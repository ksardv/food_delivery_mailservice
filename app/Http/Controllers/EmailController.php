<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Email;
use App\Events\EmailCreated;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class EmailController extends Controller
{
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
     * @param Request $request
     * @return JsonResponse
     */
    public function send(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        }

        $mail = $this->storeEmail($request->input('message'));
        return response()->json([], Response::HTTP_CREATED);
    }

    /**
     * This method triggers an event
     */
    public function storeEmail($data)
    {
        try {
            $email = Email::create([
                'from' => $data['from']['email'],
                'to' => $data['to']['email'],
                'subject' => $data['subject'],
                'content' => $data['text'],
                'type' => 'default',
                'status' => Email::EMAIL_INIT_STATUS
            ]);
        } catch (\Throwable $e) {
            report($e);

            return false;
        }

        event(new EmailCreated($email));
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    private function rules(): array
    {
        return [
            'message' => 'required',
            'message.from.email' => 'required|email',
            'message.from.name' => 'required',
            'message.to.email' => 'required|email',
            'message.to.name' => 'required',
            'message.subject' => 'required',
            'message.text' => 'required'
        ];
    }
}
