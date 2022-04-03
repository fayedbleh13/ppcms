<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class EmployeeList extends Component
{
  use WithPagination;
  protected $paginationTheme = 'bootstrap';
//   protected $listeners = ['delete'];
  protected $listeners = ['refreshComponent'=>'$refresh'];
  public $user_id, $name, $job_type, $age, $gender, $email, $mobile, $emp_id, $salary_rate;

    protected $rules = [
        'user_id' => 'required',
        'name' => 'required',
        'job_type' => 'required',
        'gender' => 'required',
        'mobile' => 'required',
        'email' => 'required',
        'salary_rate' => 'required'
    ];
    public function render()
    {
      $employees = Employee::all();
      $users = User::all();
        return view('livewire.admin.employee-list', ['employees'=>$employees, 'users' => $users])->layout('layouts.admin');
    }

    public function openAddEmployeeModal(){
      $this->dispatchBrowserEvent('openAddEmployeeModal');
    }

    public function AddEmployee(){
      $validate_emp = $this->validate();

      $employee = Employee::create($validate_emp, [
        'user_id' => Auth::user()->id,
        'name' => $this->name,
        'job_type' => $this->job_type,     
        'gender' => $this->gender,
        'mobile' => $this->mobile,
        'email' => $this->email,
        'salary_rate' => $this->salary_rate
      ]);

    //   $employee = new Employee();
    //   $employee->name = $this->name;
    //   $employee->job_type = $this->job_type;
    //   $employee->age = $this->age;
    //   $employee->gender = $this->gender;
    //   $employee->mobile = $this->mobile;
    //   $employee->email = $this->email;
    //   $employee->save();

      if ($employee) {
        $this->dispatchBrowserEvent('closeAddEmployeeModal');
      }
    }

    public function editEmployee($id){
      $employee = Employee::find($id);
      $this->user_id = $employee->user_id;
      $this->name = $employee->name;
      $this->job_type = $employee->job_type;
      $this->gender = $employee->gender;
      $this->email = $employee->email;
      $this->mobile = $employee->mobile;
      $this->emp_id = $employee->id;
      $this->dispatchBrowserEvent('openUpdateEmployeeModal',[
        'id'=>$id
      ]);
    }

    public function updateEmployee()
    {
      $emp_id = $this->emp_id;
      $this->validate([
        'user_id' => 'required',
        'name' => 'required',
        'job_type' => 'required',
        'gender' => 'required',
        'mobile' => 'required',
        'email' => 'required',
        'salary_rate' => 'required'
      ]);

      $employee = Employee::find($emp_id)->update([
        'user_id' => Auth::user()->id,
        'name' => $this->name,
        'job_type' => $this->job_type,     
        'gender' => $this->gender,
        'mobile' => $this->mobile,
        'email' => $this->email,
        'salary_rate' => $this->salary_rate
      ]);

      if ($employee) {
        $this->dispatchBrowserEvent('closeUpdateEmployeeModal');
      }
    }

    public function deleteEmployee($id){
      $employee = Employee::find($id);
      $this->dispatchBrowserEvent('SwalConfirm', [
        'title'=>'Remove this employee?',
        'id'=>$id
      ]);
    }

    public function delete($id){
      $employee = Employee::find($id)->delete();
      if ($employee) {
        $this->dispatchBrowserEvent('deleted');
      }
    }
}
