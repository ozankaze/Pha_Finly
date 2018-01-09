<?php

class UserController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
      $data_user = User::find();
      $this->view->data_user = $data_user;
    }

    public function getAjaxAction()
    {
      $user = new User();
      $json_data = $user->getDataUser();
      die(json_encode($json_data));
    }


// pos ngirim get nerima
    public function addUserAction()
    {
      $user = new User();

      

      if ($this->request->isPost()) {
          $cabang_id = $this->request->getPost('cabang_id');
          $username = $this->request->getPost('username');
          $password = $this->request->getPost('password');
          $type = $this->request->getPost('type');
          $id = "ID-".$username;

          $user->assign(array( //array panah dua
            'id' => $id,
            'cabang_id' => $cabang_id,
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

    public function editUserAction()
    {
      if ($this->request->isPost()) {
          $cabang_id = $this->request->getPost('cabang_id');
          $id = $this->request->getPost('id');
          $username = $this->request->getPost('username');
          $password = $this->request->getPost('password');
          $type = $this->request->getPost('type');

          $user = User::findFirst("id='$id'");
          $user->assign(array( //array panah dua
            'cabang_id' => $cabang_id,
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

    public function deleteUserAction()
    {
      if ($this->request->isPost()) {
          $id = $this->request->getPost('id');


          $user = User::findFirst("id='$id'");

          if ($user->delete()) {
            $notif['title']="Succes";
            $notif['text']="Data Telah berhasil Di Hapus";
            $notif['type']="Succes";
          }else {
            $pesan_error = $user->getMessages();
            $data_pesan_error ='';
            foreach ($data_pesan_error as $pesanError) {
              $data_pesan_error = "pesan_error";
            }
            $notif['title']="Succes";
            $notif['text']="Data Tidak berhasil Di Hapus";
            $notif['type']="Succes";
          }
          echo json_encode($notif);// bisa menampilkan di viewnya tadi
          die();
      }
    }

    public function listUserAction()
    {
      $data_user = User::find();
      $this->view->data_user = $data_user;
    }

}
