<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    //events lists
    public function index(){
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $no = ($currentPage - 1) * $perPage + 1;

        $all = Event::latest()->get();
        $events = Event::latest()->paginate($perPage);
        return view('backend.events.index', compact('events', 'no', 'all'));
    }
    //events lists

    //search by title
    public function searchByTitle(Request $request){
        if(!$request->title){
            return redirect('/admin/events/');
        }else{
            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;

            $title = $request->title;

            $all = Event::where('title', 'like', '%'.$title.'%')->latest()->get();
            $events = Event::where('title', 'like', '%'.$title.'%')->latest()->get();
            return view('backend.events.search', compact('events', 'no', 'all', 'title'));
        }
    }

    //search by date
    public function searchByDate(Request $request){
        if(!$request->start || !$request->end){
            return redirect('/admin/events/');
        }else{
            $perPage = 10;
            $currentPage = request()->get('page', 1);
            $no = ($currentPage - 1) * $perPage + 1;

            $start = $request->start;
            $end = $request->end;

            $all = Event::whereBetween('created_at', [$start, $end])->latest()->get();
            $events = Event::whereBetween('created_at', [$start, $end])->latest()->get();
            return view('backend.events.search', compact('events', 'no', 'all', 'start', 'end'));
        }
    }

    //create events codes
    public function create(){
        return view('backend.events.create');
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'required',
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Get the file extension
            $extension = $file->getClientOriginalExtension();

            // Check if it's an image
            if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                $image = $request->file('file');
                $ext = $image->getClientOriginalExtension();
                $filename = uniqid('events') . '.' . $ext; // Generate a unique filename
                $image->move(public_path('assets/img/events/'), $filename); // Save the file to the pub

                Event::create([
                    'title' => $request->title,
                    'image' => $filename,
                    'description' => $request->description,
                ]);
                return redirect('/admin/events/')->with('success', 'New Event Created Successfully.');
            }

            // Check if it's a video
            if (in_array($extension, ['mp4', 'mov', 'avi'])) {
                $video = $request->file('file');
                $videoName = time() . '.' . $video->getClientOriginalExtension();
                $video->move(public_path('assets/img/events/'), $videoName);

                Event::create([
                    'title' => $request->title,
                    'video' => $videoName,
                    'description' => $request->description,
                ]);
                return redirect('/admin/events/')->with('success', 'New Event Created Successfully.');
            }
        }
    }
    //create events codes

    //edit events codes
    public function edit($id){
        $event = Event::find($id);
        return view('backend.events.edit', compact('event'));
    }
    public function update(Request $request, $id){
        $event = Event::find($id);
        if(!$request->file('file')){
            if($event->image){
                $filename = $event->image;
                $event->update([
                    'title' => $request->title,
                    'image' => $filename,
                    'description' => $request->description,
                ]);
                return redirect('/admin/events/')->with('success', 'Event Updated Successfully.');
            }
            if($event->video){
                $videoName = $event->video;
                $event->update([
                    'title' => $request->title,
                    'video' => $videoName,
                    'description' => $request->description,
                ]);
                return redirect('/admin/events/')->with('success', 'Event Updated Successfully.');
            }
        }else{
            $file = $request->file('file');
            // Get the file extension
            $extension = $file->getClientOriginalExtension();

            // Check if it's an image
            if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                if($event->image){
                    File::delete(public_path('assets/img/events/'.$event->image));
                }
                if($event->video){
                    File::delete(public_path('assets/img/events/'.$event->video));
                    $event->video = null;
                    $event->save();
                }

                $image = $request->file('file');
                $ext = $image->getClientOriginalExtension();
                $filename = uniqid('event') . '.' . $ext; // Generate a unique filename
                $image->move(public_path('assets/img/events/'), $filename); // Save the file to the pub

                $event->update([
                    'title' => $request->title,
                    'image' => $filename,
                    'description' => $request->description,
                ]);
                return redirect('/admin/events/')->with('success', 'Event Updated Successfully.');
            }

            // Check if it's a video
            if (in_array($extension, ['mp4', 'mov', 'avi'])) {
                if($event->image){
                    File::delete(public_path('assets/img/events/'.$event->image));
                    $event->image = null;
                    $event->save();
                }
                if($event->video){
                    File::delete(public_path('assets/img/events/'.$event->video));
                }

                $video = $request->file('file');
                $videoName = time() . '.' . $video->getClientOriginalExtension();
                $video->move(public_path('assets/img/events/'), $videoName);

                $event->update([
                    'title' => $request->title,
                    'video' => $videoName,
                    'description' => $request->description,
                ]);
                return redirect('/admin/events/')->with('success', 'Event Updated Successfully.');
            }
        }
    }
    //edit event codes

    public function view($id){
        $event = Event::find($id);
        return view('backend.events.view', compact('event'));
    }


    //delete events code
    public function delete(Request $request){
        $id = $request->id;
        $event = Event::find($id);
        if($event->image){
            File::delete(public_path('assets/img/events/'.$event->image));
        }elseif($event->video){
            File::delete(public_path('assets/img/events/'.$event->video));
        }

        Event::destroy($id);
        return redirect()->back()->with('success', "Event Removed.");
    }
    //delete events code
}
