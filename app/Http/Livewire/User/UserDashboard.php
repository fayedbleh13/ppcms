<?php

namespace App\Http\Livewire\User;

use App\Models\Booking;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class UserDashboard extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $user_id;
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $city;
    public $province;
    public $zipcode;
    public $profile_pic;
    public $newImg;
    
    public function mount() 
    {
        $user = Order::where('user_id', Auth::user()->id)->first();
        $profile = User::where('id', Auth::user()->id)->first();

        if ($user == Null) 
        {
            $this->email = $profile->email;
            $this->profile_pic = $profile->profile_photo_path;
        }
        else 
        {
            $this->firstname = $user->firstname;
            $this->lastname = $user->lastname;
            $this->email = $profile->email;
            $this->mobile = $user->mobile;
            $this->line1 = $user->line1;
            $this->city = $user->city;
            $this->province = $user->province;
            $this->zipcode = $user->zipcode;
            $this->profile_pic = $profile->profile_photo_path;
            
        }
        
    }

    public function updateProfile() 
    {
        $user = Order::where('user_id', Auth::user()->id)->first();
        $profile = User::where('id', Auth::user()->id)->first();

        $user->firstname = $this->firstname;
        $user->lastname = $this->lastname;
        $user->email = $this->email;
        $user->mobile = $this->mobile;
        $user->line1 = $this->line1;
        $user->city = $this->city;
        $user->province = $this->province;
        $user->zipcode = $this->zipcode;
        $user->save();

        
        if ($this->newImg) 
        {
            if ($this->profile_pic) 
            {
                unlink('assets/images/profile/'.$this->profile_pic);
            }
            $imageName = Carbon::now()->timestamp . '.' . $this->newImg->extension();
            $this->newImg->storeAs('profile', $imageName);
            $profile->profile_photo_path = $imageName;
        }
        $profile->save();

        $this->alert('success', 'You have Successfully updated your profile', [
            'position' => 'center'
        ]);

    }

    public function render()
    {
        $appointment = Booking::where('user_id', Auth::user()->id)->where('booking_status', 'pending')->count();
        $orders = Order::where('user_id', Auth::user()->id)->where('status', 'ordered')->count();

        $order = Order::where('user_id', $this->user_id)->first();
        $user = User::where('id', Auth::user()->id)->first();
        return view('livewire.user.user-dashboard', [
                'user' => $user, 
                'order' => $order, 
                'orders' => $orders, 
                'appointment' => $appointment
        ])->layout('layouts.app');
    }
}
