<?php

class UserController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
      $data_user = User::find();
      $this->view->data_user = $data_user;
    }
// pos ngirim get nerima
    public function addUserAction()
    {
      $user = new User();
      if ($this->request->isPost()) {
          $username = $this->request->getPost('username');
          $password = $this->request->getPost('password');
          $type = $this->request->getPost('type');

          $user->assign(array( //array panah dua
            'username' => $username,
            'password' => $password,
            'type' => $type
          ));

          if ($user->save()) {
            $notif['title']="Succes";
            $notif['text']="Data Telah berhasil Di Simpan";
            $notif['type']="Succes";
          }else {
            $pesan_error = $user->getMessages();
            $data_pesan_error ='';
            foreach ($data_pesan_error as $pesanError) {
              $data_pesan_error = "pesan_error";
            }
            $notif['title']="Succes";
            $notif['text']="Data Telah berhasil Di Simpan";
            $notif['type']="Succes";
          }
          echo json_encode($notif);// bisa menampilkan di viewnya tadi
          die();
      }
    }
}
