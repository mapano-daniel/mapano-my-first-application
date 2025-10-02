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

    public function store(Request $request) {
        $validated = $request->validate([ 
            'title' => ['required', 'min:3'], 
            'salary' => ['required'] 
        ]);

        Job::create([
            'title' => $validated['title'],
            'salary' => $validated['salary'],
            'employer_id' => 1
        ]);

        return redirect('/jobs')->with('success', 'Job created successfully!');
    } 

    public function show(Job $job) {
        return view('jobs.show', ['job' => $job]);
    } 

    public function edit(Job $job) {
        return view('jobs.edit', ['job' => $job]); 
    } 

    public function update(Request $request, Job $job) {
        $validated = $request->validate([
            'title' => ['required', 'min:3'], 
            'salary' => ['required']
        ]);

        $job->update($validated);

        return redirect('/jobs')->with('success', 'Job updated successfully!');
    } 

    public function destroy(Job $job) {
        $job->delete(); 
        return redirect('/jobs')->with('success', 'Job deleted successfully!');
    } 
}
