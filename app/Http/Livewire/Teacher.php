<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

use Mail;
use App\Models\teachers;

class Teacher extends Component
{
    use WithPagination;
    public $name;
    public $email;
    public $title;
    public $gender;
    public $password;
    public $password_confirmation;
    public $successMsg;
    public $approveMsg;
    public $addmode=true;
    public $editmode=false;
    public $editid;
    public $searchTerm;
    
    protected $rules = [
        'name' => 'required| string| min:2|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'title' => 'required',
        'gender' => 'required',
        'password' => 'required|string|min:8',
        'password_confirmation' => 'required|string|min:8|',
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
    // Mail::to('andre@andre.com')->send(new ContactFormMailable($contact));
    
public function add(){
    $this->addmode=true;
}
public function view(){
    $this->addmode=false;
}

public function edit(){
    
}

public function editmode($id){
    $this->editmode=true;
    $teacher=teachers::find($id);
    $this->editid=$id;
    $this->name = $teacher->name;
    $this->email =$teacher->email;
    $this->title=$teacher->title;
    $this->gender=$teacher->gender;
}

public function update(){
    $teacher=teachers::find($this->editid);
    User::where('email',$teacher->email)->update([
        'name'=>$this->name,
        'email'=>$this->email
    ]);
    $teacher->name=$this->name;
    $teacher->email=$this->email;
    $teacher->title=$this->title;
    $teacher->gender=$this->gender;
    $teacher->Save();

    $this->successMsg="Successfully Updated";
    $this->editmode=false;
    sleep(1);
}

    private function resetForm()
    {
    $this->name = '';
    $this->email = '';
    $this->title='';
    $this->gender='';
    $this->password = '';
    $this->password_confirmation = '';
    }
    function Onsubmit(){
    $registration=$this->validate();
    $registration['name']=$this->name;
    $registration['email']  =$this->email;
    $registration['title']=$this->title;
    $registration['gender']=$this->gender;
    $registration['password']=$this->password;
    $registration['password_confirmation']=$this->password_confirmation;
    if($registration['password']==$registration['password_confirmation']){
    $registration['password']=Hash::make($registration['password']);
        User::create([
            'name'=>$registration['name'],
            'email'=>$registration['email'],
            'password'=>$registration['password'],
            'status'=>'1'
        ]);

        teachers::create([
            'name'=>$registration['name'],
            'email'=>$registration['email'],
            'gender'=>$registration['gender'],
            'title'=>$registration['title']
        ]);
    }
    $check=User::where('name',$registration['name'])->count();
    // dd($check);
    if($check==1 ){
        $this->successMsg="Added Successfully";
        $this->addmode=false;
        sleep(1);
    
        // session()->flash('success_message', 'We received your message successfully and will get back to you shortly!');
            $this->resetForm();
    }elseif($check==0){
        // $this->successMsg = 'We received your message successfully and will get back to you shortly!';
        $this->successMsg="Failed";
        $this->addmode=true;
    }
   

    }

    public function render()
    {
        return view('livewire.teacher',[
            'teachers'		=>	teachers::where(function($sub_query){
                $sub_query->where('name', 'like', '%'.$this->searchTerm.'%')
                          ->orWhere('email', 'like', '%'.$this->searchTerm.'%');
            })->paginate(5)
        ]);
    }
}
