<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use App\Models\stud;
class test extends Controller
{
    //
    public function index()
    {
    	//return "test controller";
    	$data=stud::paginate(3);
    	return view('testdata',['data'=>$data]);
    } 
    public function setlang($locale)
    {
         App::setlocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
    
    public function save(Request $req)
    {
    	$req->validate([
    		'fname'=>'required',
    		'lname'=>'required',
    		'email'=>'required'
    	]);
    	$s= new stud;
    	$s->fname=$req->fname;
    	$s->lname=$req->lname;
    	$s->email=$req->email;
    	$result=$s->save();
    	if($result){
    		return redirect('test');
    	}else
    	{
    		return "data not inserted......??";
    	}
    }
     public function edit($id)
    {
        $student = stud::find($id);
        return response()->json($student);
    }

    public function update(Request $req)
    {
    	$data=stud::find($req->sid);
    	$data->fname=$req->fname;
    	$data->lname=$req->lname;
    	$data->email=$req->email;
    	$data->save();
    	return redirect('test');
    }

    public function delete($id)
    {
    	$data=stud::find($id);
    	$data->delete();
    	return redirect('test');
    }
}

