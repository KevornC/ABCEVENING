<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Auth;

class Login extends Component
{
    public $email;
    public $password;
    public $successMsg;
    
    protected $rules = [
        'email' => 'required|string|email|max:255',
        'password' => 'required|string|min:8',
    ];
 
    protected $messages = [
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
    ];
 
    protected $validationAttributes = [
        'email' => 'email address'
    ];
 
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    private function resetForm()
{
    $this->email = '';
    $this->password = '';
}
    public function Onsubmit(){
        //
        $login=$this->validate();
        $login['email']=$this->email;
        $login['password']=$this->password;
        if(Auth::attempt(['email'=>$login['email'],'password'=>$login['password']])){
            return redirect()->route('home');
        }
        sleep(1);
        $this->successMsg="Login Failed";
        // session()->flash('success_message', 'We received your message successfully and will get back to you shortly!');
            $this->resetForm();
    }

    public function render()
    {
        return view('livewire.login');
    }
}
