<?php

//namespace App\Livewire;
//
//use Livewire\Component;
//
//class DashBoardTabs extends Component
//{
//    public function render()
//    {
//        return view('livewire.dash-board-tabs');
//    }
//}
//


namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;

class DashBoardTabs extends Component
{
    public $tab = 'users';
    public $data=[];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        switch ($this->tab) {
            case 'users':
                $this->data = User::where('role_id',2)->get();
                break;
            case 'roles':
                $this->data = Role::all();
                break;
            case 'categories':
                $this->data = Category::all();
                break;
        }
    }

    public function switchTab($tab)
    {
        $this->tab = $tab;
        $this->loadData();
    }

    public function render()
    {

        return view('livewire.dash-board-tabs',[
            'data'=>$this->data
        ]);
    }
}
