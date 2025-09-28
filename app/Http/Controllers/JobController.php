<?php 

namespace App\Http\Controllers; 
use App\Models\Job; 
use Illuminate\Http\Request; 

class JobController extends Controller 
{ 
    public function index() {
        $jobs = Job::with('employer')->paginate(6); 
        return view('jobs.index', ['jobs' => $jobs]);
    } 
    public function create() {
        return view('jobs.create');
    } 
    public function show(Job $job) {
        request()->validate([ 
        'title' => ['required', 'min:3'], 
        'salary' => ['required'] 
    ]);
    } 
    public function store() {
        request()->validate([ 
        'title' => ['required', 'min:3'], 
        'salary' => ['required'] 
    ]);
    } 
    public function edit(Job $job) {
        return view('jobs.edit', ['job' => $job]); 
    } 
    public function update(Job $job) {
        $job->update([ 
        'title' => request('title'), 
        'salary' => request('salary'), 
    ]);
    } 
    public function destroy(Job $job) {
        $job->delete(); 
        return redirect('/jobs'); 
    } 
} 