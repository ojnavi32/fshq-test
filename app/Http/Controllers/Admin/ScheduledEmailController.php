<?php

namespace App\Http\Controllers\Admin;

use Mail;
use App\Mail\ScheduleMail;
use App\Jobs\ScheduleEmail as ScheduleJob;
use App\Models\ScheduledEmail;
use App\Http\Requests\ScheduleEmailRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduledEmailController extends Controller
{
    /**
     * Name of views folder
     */
    protected $view = 'schedule';

    /**
     * Variable for schedule email model
     */
    protected $model;

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->model = new ScheduledEmail;
    }

    public function index()
    {
        return view($this->view.'/index');
    }

    public function store(ScheduleEmailRequest $request)
    {
        $fillables = $request->only($this->model->getFillables());
        $fillables['date_time'] = ($request['send_option'] === 'now') ? date('Y/m/d h:i') : $fillables['date_time'];

        $email = $this->model->create($fillables);

        if ($request['send_option'] === 'now') {
            ScheduleJob::dispatch($email);
        }
        else {
            $diff = strtotime($request['date_time']) - strtotime(date('Y/m/d h:i'));
            $mins = date('i', $diff);
            ScheduleJob::dispatch($email)->delay(now()->addMinutes($mins));
        }

        return redirect('admin/schedule-email');
    }
}
