<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gig;
use App\Models\Tag;
use App\Models\User;

use App\Http\Requests\GigRequest;

class GigController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['only' => ['create', 'edit', 'store', 'update', 'destroy', 'manage']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /**** approach 1 ***/
        // eager loading 
        // $gigs = Gig::with('tags');
        // $filterTags = $request->get('tag');
        // if ($filterTags){
        //         $gigs = $gigs->whereHas('tags', function($query) use($filterTags) {
        //                 return $query->where('name', '=', $filterTags);
        //         });
        // }
        // $gigs = $gigs->paginate();
        /**** approach 2 ***/
        $filterTags = $request->get('tag');
        $gigs = Gig::with('tags')->when($filterTags, function($query){
            return $query->whereHas('tags', function($q){
                return $q->where('name', '=', request('tag'));
            });
        })->when($request->get('search'), function($query){
            return $query->where('job_title', 'like', "%" . request('search') . "%");
        })->paginate();
        return view('index', compact('gigs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $tags = Tag::all()->map(function($tag){
        //     return $tag->name;
        // });
        $tags = Tag::pluck('name', 'id');
        return view('create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GigRequest $request)
    {
        // when uploading file 
        // validation why xhe i change default to public it doesn't work 
        // it means that it will still stored in app even if kdefault is public if i don't specifiy the second parameter 

        if(!auth()->user()){
            return redirect()->route('login');
        }
        $formFields = $request->validated();
        // $formFields = $request->validate([
        //     "company_name" => 'bail|required|max:40',
        //     "job_title" => 'bail|required|max:100',
        //     "job_location" => 'required',
        //     "company_email" => 'required|email',
        //     "company_website" => "", // valid url ?
        //     "tags" => "nullable|numeric",
        //     "job_description" => 'required|max:1000'
        // ]);
        // saving 
        // Creating the gig 
        $formFields['user_id'] = auth()->user()->id;
        // checking file 
        if ($request->hasFile('logo')){
            // saving the image 
            $saved_img = $request->file('logo')->store('company_logos', 'public');
            $formFields['company_logo'] = $saved_img;
        }
        //         auth()->user()->posts()->create();
        Gig::create($formFields)->tags()->attach($formFields['tags']);
        // redirecting with a flash message 
        return redirect()->route('gigs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Gig $gig)
    {
        // $gig = Gig::findOrfail($id)->get();
        // Very important (eager loading) !!!
        $gig = $gig->load('tags');
        return view('single', compact('gig'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gig $gig)
    {
        // $user_id = auth()->user()->id;
        // if ($user_id !== $gig->user_id){
        //     return redirect()->back()->withErrors(['authorization' => 'Not authorized to edit this route.']);
        // }
        $this->authorize('edit', $gig);
        $tags = Tag::pluck('name', 'id');
        return view('edit', compact(['gig', 'tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GigRequest $request, Gig $gig)
    {
        // $user_id = auth()->user()->id;
        // if ($user_id !== $gig->user_id){
        //     abort(403, 'Unauthorized action.');
        // }
        // using policy 
        $this->authorize('update', $gig);

        $formFields = $request->validated();

        // $formFields = $request->validate([
        //     "company_name" => 'bail|required|max:40',
        //     "job_title" => 'bail|required|max:100',
        //     "job_location" => 'required',
        //     "company_email" => 'required|email',
        //     "company_website" => "", // valid url ?
        //     "tags" => "nullable|numeric",
        //     "job_description" => 'required|max:1000'
        // ]);

        // updating
        if($request->hasFile('company_logo')){
            $formFields['company_logo'] = $request->file('company_logo')->store('logos', 'public');
        }
        $gig->update($formFields);
        $gig->tags()->sync($formFields['tags'], false);
        
        // redirecting 
        return redirect()->route('gigs.show', ['gig' => $gig->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gig $gig)
    {
        // $user_id = auth()->user()->id;
        // if ($user_id !== $gig->user_id){
        //     abort(403, 'Unauthorized action.');
        // }
        // using policy -> make policy -> (register) AuthServiceProvider -> call it in the function $this->authorize('', '')
        $this->authorize('delete', $gig);
        $gig->delete();
        // redirect with a flush message
        return redirect()->route('gigs.index');
    }


        /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage()
    {
        $user_id = auth()->user()->id;
        $user_gigs = User::find($user_id)->gigs;
        // $user_gigs = Gig::all();
        return view('manage', compact('user_gigs'));
    }
}
