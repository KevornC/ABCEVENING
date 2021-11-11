<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

use Mail;
use App\Models\teachers;
use App\Models\course;
use App\Models\classes;

class Classschedule extends Component
{
    use WithPagination;
    public $course;
    public $studentcourse;
    public $dateandtime;
    public $successMsg;
    public $approveMsg;
    public $addmode=true;
    public $editmode=false;
    public $editid;
    public $searchTerm;
    
    protected $rules = [
        'course' => 'required',
        'dateandtime' => 'required',
    ];
 
    protected $messages = [
        'dateandtime.required' => 'The date and time  is required.',
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
    date_default_timezone_set("jamaica");
    $this->editmode=true;
    $teacher=classes::with('course')->find($id);
    $this->editid=$id;
    $this->course=$teacher->course_id;
    // dd($this->course);
    $this->dateandtime=$teacher->schedule;
}

public function update(){
    date_default_timezone_set("jamaica");
    $teacher=classes::find($this->editid);
    // dd($this->course);
    $teacher->course_id=$this->course;
    $teacher->schedule=$this->dateandtime;
    $teacher->Save();

    $this->successMsg="Successfully Updated";
    $this->editmode=false;
    // $this->resetForm();
    sleep(1);
}

    private function resetForm()
    {
        $this->course='';
        $this->dateandtime='';
    }

    function Onsubmit(){
    
    $registration=$this->validate();
    $registration['course']=$this->course;
    $registration['dateandtime']=$this->dateandtime;
    date_default_timezone_set('jamaica');
    $course=course::find($registration['course']);
        classes::create([
            'teacher_id'=>$course->teachers_id,
            'course_id'=>$registration['course'],
            'schedule'=>$registration['dateandtime'],
        ]);
    $check=classes::where('course_id',$registration['course'])->count();
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
        date_default_timezone_set("jamaica");
        return view('livewire.classschedule',[
            'classes'		=>	classes::with('teacher','course')->get(),
            'courses' =>course::with('teacher')->get(),
        ]);
    }
}
