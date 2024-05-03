<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use App\Models\MessageUser;

use Illuminate\Support\Facades\DB;

class MessagesHudController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function messageshudfun()
    {
        $userId = auth()->user()->id; // Obtém o ID do usuário autenticado
        $users = DB::table('users')->whereNull('deleted_at')->get(); // Obtém o lista de contatos

        // Consulta para buscar mensagens do usuário logado na tabela MessageUser
        $messages = DB::table('message_user')
            ->join('messages', 'message_user.message_id', '=', 'messages.id')
            ->where('message_user.user_id', $userId)
            ->whereNull('messages.deleted_at')
            ->where('message_user.blocked', false)
            ->select('messages.*')
            ->orderBy('messages.created_at', 'desc') // Ordena por data decrescente
            ->get();

        return view('mailbox/messageshud', ['messages' => $messages],['users'=>$users]);
    }

    public function store(Request $request) {
        $toEmails = $request['to'];
        $ccEmails = $request['cc'];

        // Crie a mensagem principal
        $Message = Message::create([
            'to' => is_array($toEmails) ? implode(';', $toEmails) : $toEmails,
            'from' => auth()->user()->email,
            'cc' => is_array($ccEmails) ? implode(';', $ccEmails) : $ccEmails,
            'title' => $request->title,
            'message' => $request->myTextarea,
        ]);

        // Salve a mensagem principal
        $Message->save();
        $messageId = $Message->id;

        // Agora, para cada destinatário em "to", crie uma entrada na tabela message_user
        foreach ((array)$toEmails as $toEmail) {
            $user = User::where('email', $toEmail)->first();
            if ($user) {
                $messageUser = MessageUser::create([
                    'user_id' => $user->id,
                    'message_id' => $messageId,
                    'important' => false,
                    'promotions' => false,
                    'social' => false,
                    'Drafts' => false,
                    'blocked' => false,
                    'read_at' => null,
                ]);

                $messageUser->save();
            }
        }


        // Faça o mesmo para cada destinatário em "cc" (cópia oculta)
        foreach ((array)$ccEmails as $ccEmail) {
            $user = User::where('email', $ccEmail)->first();
            if ($user) {
                $messageUser = MessageUser::create([
                    'user_id' => $user->id,
                    'message_id' => $messageId,
                    'important' => false,
                    'promotions' => false,
                    'social' => false,
                    'Drafts' => false,
                    'blocked' => false,
                    'read_at' => null,
                ]);

                $messageUser->save();
            }
        }
          // Agora, crie uma entrada na tabela message_user para quem enviou a mensagem (from)
    $fromUser =auth()->user()->id;
    if ($fromUser) {
        $messageUser = MessageUser::create([
            'user_id' => $fromUser,
            'message_id' => $messageId,
            'important' => false,
            'promotions' => false,
            'social' => false,
            'Drafts' => false,
            'blocked' => false,
            'read_at' => null,
        ]);

        $messageUser->save();
    }

        return redirect('/mailbox');
    }


    public function messagedestroy($id){
        Message::findOrFail($id)->delete();
        return redirect ('/mailbox');
    }
    public function newmessage(){
        $users = DB::table('users')->whereNull('deleted_at')->get();
        return view ('/mailbox/newmessage',['users'=>$users]);
    }

    public function readmessage($id)
{
    $message = Message::findOrFail($id);

    // Atualize o campo 'read_at' no registro correspondente em 'message_user'
    $userId = auth()->user()->id; // Obtém o ID do usuário autenticado
    $messageUser = MessageUser::where('message_id', $id)
        ->where('user_id', $userId)
        ->first();

    if ($messageUser) {
        $messageUser->read_at = now(); // Define a data e hora atual como 'read_at'
        $messageUser->save();
    }

    return view('mailbox/readmessage')->with(['message' => $message]);
}


public function unreadMessageCount()
{
    $userId = auth()->user()->id; // Obtém o ID do usuário autenticado

    // Consulta para contar mensagens não lidas do usuário logado na tabela MessageUser
    $unreadMessageCount = DB::table('message_user')
        ->where('user_id', $userId)
        ->whereNull('read_at')
        ->count();

    return $unreadMessageCount;
}

}
