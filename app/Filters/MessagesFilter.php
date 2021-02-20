<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class MessagesFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $messagesModel = new \App\Models\MessagesModel();
        $messages = $messagesModel->find($request->uri->getSegment(3));

        if(!$messages) {
         return redirect()->to('/home');
        }

        if(session()->id != $messages->id_recepient && session()->id != $messages->id_sender) {
         return redirect()->to('/home');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}