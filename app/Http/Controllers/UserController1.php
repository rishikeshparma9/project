<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Question;
use App\Answer;
use App\Vote;
use App\Profile;
use App\Comment;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
class UserController1 extends Controller
{
public function postLIke(Request $request)
  {

    $x=DB::table('votes')->where([['user_id',$request['u']],['answer_id',$request['a']]])->count();
    if($x == 0)
    {$v=new Vote();
    $v->user_id=$request['u'];
    $v->answer_id=$request['a'];
    $v->islike=true;
    $v->save();
    $no=DB::table('answers')->where('id',$request['a'])->value('upvotes');
    $no=$no+1;
    DB::table('answers')
       ->where('id',$request['a'])
       ->update(array('upvotes' => $no));
    }

    $no=DB::table('answers')->where('id',$request['a'])->value('upvotes');

    return response()->json(['upvotes'=>$no]);
  }

  public function postDislike(Request $request)
  {

    $x=DB::table('votes')->where([['user_id',$request['u']],['answer_id',$request['a']]])->count();
     $message='fail';
    if($x==0)
    {$v=new Vote();
    $v->user_id=$request['u'];
    $v->answer_id=$request['a'];
    $v->islike=false;
    $v->save();
    $no=DB::table('answers')->where('id',$request['a'])->value('downvotes');
    $no=$no+1;
    DB::table('answers')
       ->where('id',$request['a'])
       ->update(array('downvotes' => $no));
       $message='pass';
  }

    $no=DB::table('answers')->where('id',$request['a'])->value('downvotes');
  return response()->json(['downvotes'=>$no]);
  }

  public function getLogout()
    {
       Auth::logout();
       return view('logout');
    }

    public function getProfile($name)
      {
          $id=DB::table('users')->where('username',$name)->value('id');
          $user_profile=DB::table('profiles')->where('user_id',$id)->first();
          $questions=User::find(Auth::user()->id)->questions()->orderBy('created_at', 'desc')->get();
          $answers=User::find(Auth::user()->id)->answers()->orderBy('created_at', 'desc')->get();
          return view('profile',['user_profile'=>$user_profile,'questions'=>$questions,'answers'=>$answers,'name'=>$name,'id'=>$id]);
      }

      public function getProfilequestion($name)
        {
            $id=DB::table('users')->where('username',$name)->value('id');
            $user_profile=DB::table('profiles')->where('user_id',$id)->first();
            $questions=User::find($id)->questions()->orderBy('created_at', 'desc')->get();
            $answers=User::find($id)->answers()->orderBy('created_at', 'desc')->get();
            return view('profilequestion',['user_profile'=>$user_profile,'questions'=>$questions,'answers'=>$answers,'name'=>$name,'id'=>$id]);
        }

        public function getProfileanswer($name)
          {      $id=DB::table('users')->where('username',$name)->value('id');
            $user_profile=DB::table('profiles')->where('user_id',$id)->first();
              $userid= DB::table('users')->where('username',$name)->value('id');
            $answers_text=User::find($userid)->answers;
            foreach($answers_text as $answer_text)
            {
               $answer_text->question_text= DB::table('questions')->where('id',$answer_text->question_id)->value('question');
                $answer_text->question_id= DB::table('questions')->where('id',$answer_text->question_id)->value('id');
            }
            return view('profileanswer',['answer_text->question_id'=>$answer_text->question_id,'user_profile'=>$user_profile,'name'=>$name,'answers_text'=>$answers_text,'id'=>$id]);
          }

      public function getSettings()
        {

        }

        public function postSettings(Request $request,$formid)
          {
            if($formid==1)
            {$this->validate($request,['user_name'=>'required|min:4|max:20'
                                      ,'first_name'=>'required|max:10'
                                     ,'last_name'=>'required|max:10'
                                     ,'about'=>'required|min:20'
                                     ,'bio'=>'required|min:10'
                                    , 'year'=>'required'
                                    ,'degree'=>'required'
                                    ,'image'=>'image'
                                     ]);
            $uname=$request['user_name'];
            $fname=$request['first_name'];
            $lname=$request['last_name'];
            $year=$request['year'];
            $user=$request['user'];
            $about=$request['about'];
            $bio=$request['bio'];
            $degree=$request['degree'];
            $user_profile= Profile::firstOrCreate(['user_id' => Auth::user()->id]);
              $user_profile->first_name=$fname;
                $user_profile->last_name=$lname;
              $user_profile->year=$year;
              $user_profile->degree=$degree;
              $user_profile->user_id=$user;
              $user_profile->about=$about;
              $user_profile->bio=$bio;
              $user_profile->save();
              DB::table('users')->where('username',Auth::user()->username)->update(['username'=>$uname]);
              $userid=Auth::user()->id;
              $file=$request->file('image');
              $filename='img-'.$userid.'.jpg';
              $username=Auth::user()->username;
              if($file){
                    if(Storage::disk('local')->has($filename))
                    {Storage::delete($filename);Storage::disk('local')->put($filename,File::get($file));}
                    else{Storage::disk('local')->put($filename,File::get($file));}
              }
            return redirect()->route('profile',['name'=>$uname]);
             }

             if($formid==2)
             {
               $this->validate($request,['username'=>'required|unique:users|min:4|max:10'
                                        ]);
                DB::table('users')->where('id', Auth::user()->id)->update(['username' => $request['username']]);
                return redirect()->route('dashboard');
             }

             if($formid==3)
             {
               $this->validate($request,['cpassword'=>'required|min:4|max:10','npassword'=>'required|min:4|max:10','npassword_confirm'=>'required|min:4|max:10|same:npassword'
                                        ]);
              if(Auth::attempt(['email'=>Auth::user()->email,'password'=>$request['cpassword']]))
                {
                  DB::table('users')->where('id', Auth::user()->id)->update(['password' => bcrypt($request['npassword'])]);
                  return redirect()->route('setting2');}
                  return redirect()->back()->withInput()->with('message', "Current Password is not correct.");
             }
          }

          public function postComment(Request $request)
          {
                  if($request['comment']!=null || $request['comment']!='')
                  {$comment=$request['comment'];
                  $answer_id=$request['answer_id'];
                  $user_id=$request['user_id'];
                  $comment_row=new Comment();
                  $comment_row->answer_id=$answer_id;
                  $comment_row->comment=$comment;
                  $comment_row->user_id=$user_id;
                  $comment_row->save();
                }
                $comm=DB::table('comments')->where('answer_id',$request['answer_id'])->orderBy('created_at', 'desc')->get();
                foreach($comm as $com)
                {
                  $com->username=DB::table('users')->where('id',$com->user_id)->value('username');
                }
                return response()->json(['comments'=>array($comm)]);
          }

          public function getComment($answer_id)
          {
                 $comm=DB::table('comments')->where('answer_id',$answer_id)->orderBy('created_at', 'desc')->get();
                 foreach($comm as $com)
                 {
                   $com->username=DB::table('users')->where('id',$com->user_id)->value('username');
                 }
                return response()->json(['comments'=>array($comm)]);
          }

          public function getImage($filename)
          {
                  $file=Storage::disk('local')->get($filename);
                  return new Response($file,200);
          }

          public function setting1()
          {
            $user_profile=User::find(Auth::user()->id)->profile;
            return view('setting1',['user_profile'=>$user_profile]);
          }

          public function setting2()
          {
            $user_profile=User::find(Auth::user()->id)->profile;
            return view('setting2',['user_profile'=>$user_profile]);
          }

          public function messages()
          {
            return ['cpassword.required'];
          }

        }
  ?>
