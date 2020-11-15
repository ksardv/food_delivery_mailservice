<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Email;
use App\Publisher\EmailPublisher;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class EmailController extends Controller
{
    const EMAIL_INIT_STATUS = "created";
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
     * @param Request $request
     * @return JsonResponse
     */
    public function send(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), $this->rules());

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        }
        //TODO - create event subscriber when mail is created and set the status to processing
        //after which to publish it
        $mail = $this->storeEmail($request);
        return response()->json([], Response::HTTP_CREATED);

        // $publisher = new EmailPublisher();
        // $publisher->publish(json_encode($data['message']));
    }

    /**
     * This method triggers an event
     */
    public function storeEmail($data)
    {
        $email = Email::create([
            'from' => $data->from['email'],
            'to' => $data->to['email'],
            'subject' => $data->subject,
            'content' => $data->text,
            'type' => 'default',
            'status' => self::EMAIL_INIT_STATUS
        ]);

        return $email;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    private function rules(): array
    {
        return [
            'from.email' => 'required|email',
            'from.name' => 'required',
            'to.email' => 'required|email',
            'to.name' => 'required',
            'subject' => 'required',
            'text' => 'required'
        ];
    }
}
