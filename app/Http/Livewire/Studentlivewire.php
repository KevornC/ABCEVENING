<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

use Mail;
use App\Models\student;
use App\Models\teachers;
use App\Models\course;
use App\Models\assignedcourses;

class Studentlivewire extends Component
{
    use WithPagination;
    public $student;
    public $studentcourse;
    public $contact;
    public $email;
    public $courses;
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
        'student' => 'required| string| min:2|unique:users,name',
        'courses' => 'required',
        'gender'=>'required',
        'email'=>'required|email|unique:users,email',
        'contact'=>'required',
        'password' => 'required|string|min:8',
        'password_confirmation' => 'required|string|min:8|',
    ];
 
    protected $messages = [
        'courses.required' => 'The Course cannot be empty.',
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
    ];
 
    // protected $validationAttributes = [
    //     'email' => 'email address'
    // ];
 
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
    $teacher=assignedcourses::find($id);
    $this->studentcourse=$teacher->course_id;
    $teacher=student::find($teacher->student_id);
    $this->editid=$id;
    $this->student=$teacher->name;
    $this->email=$teacher->email;
    $this->gender=$teacher->gender;
    $this->contact=$teacher->contact;
}

public function update(){
    $teacher=assignedcourses::find($this->editid);
    $teacher->course_id=$this->courses;
    User::where('email',$teacher->email)->update([
        'name'=>$this->student,
        'email'=>$this->email,
        'gender'=>$this->gender,
    ]);

    $teacher=student::find($teacher->student_id);
    $teacher->name=$this->student;
    $teacher->email=$this->email;
    $teacher->gender=$this->gender;
    $teacher->contact=$this->contact;
    $teacher->Save();

    $this->successMsg="Successfully Updated";
    $this->editmode=false;
    sleep(1);
}

    private function resetForm()
    {
        $this->student='';
        $this->email='';
        $this->gender='';
        $this->contact='';
        $this->courses='';
        $this->password = '';
        $this->password_confirmation = '';
    }

    function Onsubmit(){

    $registration=$this->validate();
    $registration['name']=$this->student;
    $registration['email']  =$this->email;
    $registration['gender']=$this->gender;
    $registration['contact']=$this->contact;
    $registration['course']=$this->courses;
    if($registration['password']==$registration['password_confirmation']){
        $registration['password']=Hash::make($registration['password']);
            User::create([
                'name'=>$registration['name'],
                'email'=>$registration['email'],
                'gender'=>$registration['gender'],
                'password'=>$registration['password'],
                'status'=>'2'
            ]);
    
            $id=student::create([
                'name'=>$registration['name'],
                'email'=>$registration['email'],
                'gender'=>$registration['gender'],
                'contact'=>$registration['contact']
            ])->id;
            $teachercourse=course::find($this->courses);
            $teacher=$teachercourse->teachers_id;
            assignedcourses::create([
                'teacher_id'=>$teacher,
                'student_id'=>$id,
                'course_id'=>$registration['course'],
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
        // $assignedcourses=assignedcourses::with('course','student','teacher')->get();
        // dd($assignedcourses);
        return view('livewire.studentlivewire',[
            'students'		=>	student::all(),
            'assignedcourses' => assignedcourses::with('course','student','teacher')->get(),
            'coursess' =>course::with('teacher')->get(),
        ]);
    }
}
