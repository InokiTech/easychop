<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Role;
use App\Permission;
use App\Charts\Charts;
use Carbon\Carbon;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
      private $user;
      private $chart;



      /**
       * Create a new controller instance.
       *
       * @return void
       */
      public function __construct(Charts $chart,User $user)
      {
        if(setting('email_verification')){
            $this->middleware(['verified']);
        }

            $this->middleware(['web','auth']);

        $this->user = $user;

        $this->chart = $chart;

      }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->hasRole('customers')){
            return redirect('/');
        }
        if($this->isAdmin()){
          return $this->adminDashboard();
        }

        return $this->defaultDashboard();
    }

    /**
     * return admin users to admin dashboard
     * @return
     */
    private function adminDashboard()
    {
          $users = User::count();
          $roles = Role::count();
          $activities = Activity::count();
          $chart = $this->userCount();
          $latest_user_count = $this->getLatestUsers()->count();
          $latest_user = $this->getLatestUsers()->take(8)->get();

          return view('dashboard.admin',[
            'latestUser'=> $this->chart,
            'users' => $users,
            'roles'=> $roles,
            'activities'=> $activities,
            'latest_users_count' => $latest_user_count,
            'latest_users' => $latest_user,
          ]);
    }

    private function userCount()
    {
        $data = collect([]); // Could also be an array
      $label = collect([]); // Could also be an array

      for ($days_backwards = 4; $days_backwards >= 0; $days_backwards--) {
          $next_month = ($days_backwards !== 0)? $days_backwards - 1: 0;
          $data->push(User::whereBetween('created_at', [today()->subMonths($days_backwards)->startOfMonth(),today()->subMonths($days_backwards)->endOfMonth()])->count());
          $label->push(today()->subMonths($days_backwards)->format('M-y'));
      }

        $this->chart->labels($label);
        $this->chart->dataset('Registration History', 'bar', $data)
      ->backgroundColor('rgba(108, 178, 235, 0.9)');
        $this->chart->displayLegend(false);
        $this->chart->barWidth(0.4);
        return $this->chart;
    }

    /**
     * Function directs users to default dashboard
     * @return view default user dashboard
     */
    private function defaultDashboard()
    {
        return view('dashboard.default');
    }

    /**
     * Check if Authenticated user is admin
     * @return boolean [description]
     */
    private function isAdmin()
    {
        return (auth()->user()->hasRole('admin'))? true : false;
    }

    private function getFullname($id)
    {
        $user = $this->user->find($id);
        return ($user)? $user->fullname: null;
    }


    private function getLatestUsers()
    {
        return $this->user->whereBetween('created_at', [
        now()->subDay(3)->toDateString(),now()->addDay()->toDateString()
      ]);
    }

    // public function customerRedirect()
    // {

    //     if(Auth::user()->hasRole('customers')){
    //         return redirect('/');
    //     }
    // }
}
