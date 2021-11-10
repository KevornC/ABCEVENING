<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;

use Mail;
use App\Models\teachers;
use App\Models\course;

class Courses extends Component
{
    use WithPagination;
    public $coursename;
    public $startdate;
    public $enddate;
    public $examdate;
    public $teacher;
    public $successMsg;
    public $approveMsg;
    public $addmode=true;
    public $editmode=false;
    public $editid;
    public $searchTerm;
    
    protected $rules = [
        'coursename' => 'required| string| min:2|unique:courses,course_nm',
        'teacher' => 'required',
        'startdate' => 'required',
        'enddate' => 'required',
        'examdate' => 'required',
    ];
 
    // protected $messages = [
    //     'email.required' => 'The Email Address cannot be empty.',
    //     'email.email' => 'The Email Address format is not valid.',
    // ];
 
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
    $teacher=course::with('teacher')->find($id);
    $this->editid=$id;
    $this->coursename=$teacher->course_nm;
    $this->startdate=$teacher->course_start;
    $this->enddate=$teacher->course_ends;
    $this->examdate=$teacher->exam_year;
    $this->teacher=$teacher->teachers_id;
}

public function update(){
    $teacher=course::find($this->editid);
    $teacher->course_nm=$this->coursename;
    $teacher->course_start=$this->startdate;
    $teacher->course_ends=$this->enddate;
    $teacher->exam_year=$this->examdate;
    $teacher->teachers_id=$this->teacher;
    $teacher->Save();

    $this->successMsg="Successfully Updated";
    $this->editmode=false;
    sleep(1);
}

    private function resetForm()
    {
        $this->coursename='';
        $this->startdate='';
        $this->enddate='';
        $this->examdate='';
        $this->teacher='';
    }

    function Onsubmit(){

    $registration=$this->validate();
    $registration['coursename']=$this->coursename;
    $registration['startdate']  =$this->startdate;
    $registration['enddate']=$this->enddate;
    $registration['examdate']=$this->examdate;
    $registration['teacher']=$this->teacher;
        course::create([
            'course_nm'=>$registration['coursename'],
            'teachers_id'=>$registration['teacher'],
            'course_start'=>$registration['startdate'],
            'course_ends'=>$registration['enddate'],
            'exam_year'=>$registration['examdate']
        ]);
    $check=course::where('course_nm',$registration['coursename'])->count();
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
        return view('livewire.courses',[
            'teachers'		=>	teachers::all(),
            'courses' =>course::with('teacher')->get(),
        ]);
    }
}
