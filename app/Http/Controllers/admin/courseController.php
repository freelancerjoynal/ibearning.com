<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\course;
use Illuminate\Http\Request;

class courseController extends Controller
{
    public function showTheCourses()
    {
        $query = course::get();
        return view('admin.course.courselist')->with('courses', $query);
    }
    public function AddNewCourse(Request $req)
    {
        function seoUrl($string) {
            $string = strtolower($string);
            $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
            $string = preg_replace("/[\s-]+/", " ", $string);
            $string = preg_replace("/[\s_]/", "-", $string);
            return $string;
        }

        $title = trim($req->title);
        $link = trim($req->link);
        $time = trim($req->time);
        $video = trim($req->video);
        $description = trim($req->description);
        $topics = trim($req->topics);
        $slug = seoUrl($title);
        $image = $req->file('image');
        $imageName = 'uploads/'.time().'.'.$image->extension();
                    $image->move(public_path('uploads'), $imageName);
        
        $sql = course::insert([
                    'title' => $title,
                    'slug' => $slug,
                    'image' => $imageName,
                    'description' => $description,
                    'link' => $link,
                    'time' => $time,
                    'video' => $video,
                    'topics' => $topics
                ]);
        
        if($sql)
        {
            $msg = 'A new course added';
            return redirect()->back()->with('msg', $msg); 
        }else
        {
            $msg = 'An error occured';
            return redirect()->back()->with('msg', $msg); 
        }
        
    }
    public function deleteCourse(Request $req)
    {
        $courseId= $req->courseId;
        $sql = course::where('id', $courseId)->first();
        $oldImage = $sql->image;
        $delimage = unlink(public_path('').'/'.$oldImage);
        $sql = course::where('id', $courseId)->delete();

        if($delimage && $sql)
        {
            $msg = 'A course deleted successfully';
            return redirect()->back()->with('msg', $msg);
        }else
        {
            $msg = 'An error occured';
            return redirect()->back()->with('msg', $msg); 
        }
    }

    public function editCourse(Request $req)
    {
        $courseId = $req->courseId;
        $sql = course::where('id', $courseId)->first();
        if($sql)
        {
            return view('admin.course.editcourse')->with('course' , $sql);
        }else
        {
            $msg = 'An error occured';
            return redirect()->back()->with('msg', $msg); 
        }
    }

    public function updateCourses(Request $req)
    {
        function seoUrl($string) {
            $string = strtolower($string);
            $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
            $string = preg_replace("/[\s-]+/", " ", $string);
            $string = preg_replace("/[\s_]/", "-", $string);
            return $string;
        }
        $courseId    = $req->id;
        $title       = trim($req->title);
        $link        = trim($req->link);
        $time        = trim($req->time);
        $video       = trim($req->video);
        $description = trim($req->description);
        $topics      = trim($req->topics);
        $slug        = seoUrl($title);
        $image       = $req->file('image');

        $findCourse = course::where('id', $courseId)->first();
        $oldImage   = $findCourse['image'];

        if($image !== null){
            $delimage = unlink(public_path('').'/'.$oldImage);
            $imageName = 'uploads/'.time().'.'.$image->extension();
                          $image->move(public_path('uploads'), $imageName);
            
            $sql =  course::where('id', $courseId)->update([
                        'title' => $title,
                        'slug' => $slug,
                        'image' => $imageName,
                        'description' => $description,
                        'link' => $link,
                        'time' => $time,
                        'video' => $video,
                        'topics' => $topics
                    ]);
            $msg = 'Great! Course Updated';
            return redirect('/web-admin/courses')->with('msg', $msg); 
                    
        }else
        {
            $sql =  course::where('id', $courseId)->update([
                'title' => $title,
                'slug' => $slug,
                'description' => $description,
                'link' => $link,
                'time' => $time,
                'video' => $video,
                'topics' => $topics
            ]);
            $msg = 'Great! Course Updated';
            return redirect('/web-admin/courses')->with('msg', $msg);
        }
        

        
        
    }
}
