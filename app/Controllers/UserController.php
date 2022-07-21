<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GroupModel;
use App\Models\UserModel;
use Myth\Auth\Password;
use \Hermawan\DataTables\DataTable;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->user = new UserModel();
        $this->group = new GroupModel();
    }

    public function index()
    {
        if ($this->request->isAJAX()) {
            $users = $this->user->getUsers();
            return DataTable::of($users)->addNumbering('no')
            ->add('action', function($row) {
                $edit = '<button type="button" class="btn btn-warning btn-sm btn-edit" data-id="'.$row->id.'"><i class="bx bx-edit"></i> '. lang('App.edit').'</button>';
                $delete = '<button type="button" class="btn btn-danger btn-sm btn-delete" data-id="'.$row->id.'"><i class="bx bx-trash"></i> '. lang('App.delete').'</button>';
                $action = $edit ." ". $delete;
                return $action;
            })->toJson(true);
        }
        $data['title'] = lang('App.users');
        $data['users'] = $this->user->getUsers();
        $data['groups'] = $this->group->findAll();
        return view('users/index', $data);
    }

    public function create()
    {
        $user = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password_hash' => Password::hash($this->request->getVar('password')),
            'active' => 1
        ];
        if ($this->user->save($user)) {
            $idUser = $this->user->insertId();
            $idGroup = $this->request->getVar('group');
            if ($this->group->addUserToGroup($idUser, $idGroup)) {
                return json_encode([
                    'status' => 'success',
                    'message' => lang('App.createdData')
                ]);
            } else {
                return json_encode([
                    'status' => 'error',
                    'message' => lang('App.failedInsertData')
                ]);
            }
        } else {
            return json_encode([
                'status' => 'error',
                'message' => lang('App.failedInsertData'),
                'data' => $this->user->errors()
            ]);
        }
    }

    public function edit($id) {
        if ($this->request->isAJAX()) {
            $user = $this->user->getUser($id);
            return json_encode([
                'status' => 'success',
                'data' => $user
            ]);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    {
        $user = [
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username')
        ];
        $save = $this->user->save($user, ['id' => $id]);
        if ($save) {
            $idUser = $this->user->insertId();
            $idGroup = $this->request->getVar('group');
            $this->group->removeUserFromGroup($idUser, $idGroup);
            $this->group->addUserToGroup($idUser, $idGroup);
            return json_encode([
                'status' => 'success',
                'message' => lang('App.updatedData')
            ]);
        } else {
            return json_encode([
                'status' => 'error',
                'message' => lang('App.failedUpdateData'),
                'data' => $this->user->errors()
            ]);
        }
    }

    public function delete($id) 
    {
        $deleted = $this->user->delete(['id' => $id]);
        if ($deleted) {
            return json_encode([
                'status' => 'success',
                'message' => lang('App.deletedData')
            ]);
        }
        return json_encode([
            'status' => 'error',
            'message' => lang('App.failedDeleteData')
        ]);
    }
}