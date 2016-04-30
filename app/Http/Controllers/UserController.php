<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Question;
use App\Answer;
use App\Vote;
use App\Profile;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
class UserController extends Controller
{
  public function getDashBoard()
  {
    $info=DB::table('questions')->orderBy('created_at', 'desc')->simplepaginate(25);
    foreach($info as $x)
    {
      $questionid=$x->id;
      $answer=DB::table('answers')->where('question_id',$questionid)->first();
      if($answer == null )
      {$x->best_answer = null;}
      else{
      $votes=DB::table('answers')->where('question_id',$questionid)->max('upvotes');
      $goodanswer=DB::table('answers')->where([['upvotes',$votes],['question_id',$questionid],])->first();
      $goodanswer->user=Answer::find($goodanswer->id)->user->username;
      $userid=Auth::user()->id;
       $y=User::find($userid)->votes()->where('answer_id',$goodanswer->id)->count();
       if($y==0)
       {$x->best_answer_light=0;}
       else{
         $y=User::find($userid)->votes()->where('answer_id',$goodanswer->id)->value('islike');
         if($y==1)
         $x->best_answer_light=1;
         else
         $x->best_answer_light=-1;
       }
      $x->best_answer_user = $goodanswer->user;
      $x->best_answer_user_id=$goodanswer->user_id;
      $x->best_answer_user_profile=User::find($goodanswer->user_id)->profile;
      $x->best_answer=$goodanswer->answer;
      $x->best_answer_date=$goodanswer->created_at;
      $x->best_answer_upvotes=$goodanswer->upvotes;
      $x->best_answer_downvotes=$goodanswer->downvotes;
      $x->best_answer_id=$goodanswer->id;
      $x->best_answer_anonymous=$goodanswer->anonymous;
        }
    }
    return view('dashboard',['info' => $info]);
  }

  public function getAnswer($id)
  {
    $question_text= DB::table('questions')->where('id',$id)->value('question');
           $z=Question::find($id)->user;
           $question_user=$z->username;
    $question_anonymous=DB::table('questions')->where('id',$id)->value('anonymous');
  /*  $answers_text=DB::table('answers')->where('question_id',$id)->orderBy('created_at', 'desc')->get(); */
      $answers_text=Question::find($id)->answers()->orderBy('created_at', 'desc');
      $answers_text=$answers_text->simplepaginate(10);
      foreach($answers_text as $answer_text)
      {
        $userid=Auth::user()->id;
         $x=User::find($userid)->votes()->where('answer_id',$answer_text->id)->count();
         if($x==0)
         {$answer_text->light=0;}
         else{
           $y=User::find($userid)->votes()->where('answer_id',$answer_text->id)->value('islike');
           if($y==1)
           $answer_text->light=1;
           else
            $answer_text->light=-1;
         }
         $usertoanswer=Answer::find($answer_text->id)->user;
         $profile_user_bio=DB::table('profiles')->where('user_id',$usertoanswer->id)->value('bio');
         $answer_text->usertoanswer=$usertoanswer->username;
          $answer_text->userid=$usertoanswer->id;
         $answer_text->biousertoanswer= $profile_user_bio;
      }
    return view('answer',['id'=>$id,'question_text'=>$question_text,'question_user'=>$question_user,'question_anonymous'=>$question_anonymous,'answers_text'=>$answers_text]);
  }

  public function postAnswer(Request $request,$id)
  {
      $this->validate($request,['answer'=>'required|min:20']);
      $question_text= DB::table('questions')->where('id',$id)->value('question');
      $answer=$request['answer'];
      $user=$request['user'];
      $a=new Answer();
      if(isset($request['check']))
    $a->anonymous=true;
     else
      $a->anonymous=false;
      $a->answer=htmlentities($answer);
      $a->question_id=$id;
      $a->user_id=$user;
      $a->save();

      //$answers_text=Question::find($id)->answers()->orderBy('created_at', 'desc')->get();

      return redirect()->route('question',['id'=>$id]);
      //return view('answer');
  }



  public function postDashBoard(Request $request)
  {
    $this->validate($request,['question'=>'required|min:20']);
    if($request['check']==0);
    $question=$request['question'];
    $user=$request['user'];
    $q=new Question();
    $q->question=$question;
      if(isset($request['check']))
    $q->anonymous=true;
     else
      $q->anonymous=false;
    $q->user_id=$user;
    $q->save();
    return redirect()->route('dashboard');
  }

  public function postSignUp(Request $request)
  {
     $this->validate($request,['username'=>'required|min:4|max:20|unique:users'
                             ,'email'=>'required|email|unique:users'
                             ,'password'=>'required|min:4|max:10'
                              ]);

      $name=$request['username'];
      $email=$request['email'];
      $password=bcrypt($request['password']);

      $user=new User();
      $user->username=$name;
      $user->email=$email;
      $user->password=$password;

      $user->save();
      Auth::login($user);
      return redirect()->route('setting1');
  }
  public function postSignIn(Request $request)
  {
    $this->validate($request,['email'=>'required'
                            ,'password'=>'required|min:4|max:10'
                             ]);

     if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']]))
       { return redirect()->route('dashboard');}
       return redirect()->back()->withInput()->with('message', "Email and Password don't match!");
  }

  public function getSignIn()
  {

    if(Auth::check())
       { return redirect()->route('dashboard');}
       return view('welcome');
  }


}


 ?>
