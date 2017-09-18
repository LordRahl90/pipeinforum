<?php

namespace App\Http\Controllers\Admin\Polls;

use App\Repositories\Models\PollOptionRepository;
use App\Repositories\Models\PollRepository;
use App\Utility\Utility;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Service\PollManager;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PollRepository $pollRepository)
    {

        return view('admin.polls.pollList',['polls'=>$pollRepository->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.polls.createNewPoll');
    }

    /**
     * @param Request $request
     * @param PollRepository $pollRepository
     * @param PollOptionRepository $pollOptionRepository
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, PollRepository $pollRepository, PollOptionRepository $pollOptionRepository)
    {
        $today=Date('Y-m-d');

        $request->validate([
            'title'=>'required',
            'target'=>'numeric',
            'expiry_date'=>'after:'.$today
        ]);

        $options=$request->get('option');

        if(count($options)<2){
            return redirect()->back()->withErrors(["errors"=>"Options should be more than 1"]);
        }

        $user_id=auth()->user()->id;

        DB::beginTransaction();
        try{

            $newPoll=$pollRepository->create([
                'user_id'=>$user_id,
                'title'=>$request->get('title'),
                'synopsis'=>$request->get('synopsis'),
                'expiry_date'=>$request->get('expiry_date'),
                'target'=>$request->get('target')
            ]);

            if(!$newPoll){
                return redirect()->back()->withErrors(["errors"=>"An error occurred... Please try again"]);
            }

            for($i=0; $i<count($options); $i++){
                $newPollOption=$pollOptionRepository->create([
                    'poll_id'=>$newPoll->id,
                    'option'=>$options[$i]
                ]);

                if(!$newPollOption){
                    return redirect()->back()->withErrors(["errors"=>"An error occurred... Please try again"]);
                }
            }

            DB::commit();
            return redirect()->back()->with(["message"=>"Poll Created Successfully!"]);
        }
        catch(\Exception $ex){
            DB::rollBack();
            Log::info($ex);
            return redirect()->back()->withErrors(["errors"=>"An error occurred... Please try again"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function makeTopPost(PollManager $manager){
        $poll_id=Input::get('poll_id');
        $user_id=auth()->user()->id;

        if($user_id==null){
            return Utility::error("Please login as admin before you can process this transaction!");
        }


        $payload=json_encode([
            'user_id'=>$user_id,
            'poll_id'=>$poll_id
        ]);
        return $manager->setTopPoll($payload);
    }
}
