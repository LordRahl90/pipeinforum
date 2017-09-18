<?php
/**
 * Created by PhpStorm.
 * User: lordrahl
 * Date: 18/09/2017
 * Time: 10:54 AM
 */

namespace App\Service;

use App\Repositories\Models\PollRepository;
use App\Repositories\Models\PollOptionRepository;
use App\Repositories\Models\PollResponseRepository;
use App\Repositories\Models\PollMessageRepository;
use App\Repositories\Models\TopPollRepository;
use App\Utility\Utility;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class PollManager
{

    private $polls;
    private $pollOption;
    private $pollResponse;
    private $pollMessage;
    private $topPoll;

    /**
     * PollManager constructor.
     * @param PollRepository $pollRepository
     * @param PollOptionRepository $pollOptionRepository
     * @param PollResponseRepository $pollResponseRepository
     * @param PollMessageRepository $pollMessageRepository
     * @param TopPollRepository $topPollRepository
     */
    public function __construct(
        PollRepository $pollRepository,
        PollOptionRepository $pollOptionRepository,
        PollResponseRepository $pollResponseRepository,
        PollMessageRepository $pollMessageRepository,
        TopPollRepository $topPollRepository
    )
    {
        $this->polls=$pollRepository;
        $this->pollOption=$pollOptionRepository;
        $this->pollResponse=$pollResponseRepository;
        $this->pollMessage=$pollMessageRepository;
        $this->topPoll=$topPollRepository;
    }

    /**
     * @param $payload
     * @return \Illuminate\Http\JsonResponse
     */
    public function setTopPoll($payload){
        $payload=json_decode($payload);
            $user_id=$payload->user_id;
            $poll_id=$payload->poll_id;

            DB::beginTransaction();
        try
        {

            $findCurrentTopPoll=$this->topPoll->findBy("status",true);
            if(count($findCurrentTopPoll)>0){
                $findCurrentTopPoll->status=false;

                $saveCurrentTopPoll=$findCurrentTopPoll->save();
                if(!$saveCurrentTopPoll){
                    return Utility::databaseError();
                }
            }

            $findExistence=$this->topPoll->findBy('poll_id',$poll_id);

            if(count($findExistence)>0){
                $findExistence->status=true;
                $saveCurrentTopPoll=$findExistence->save();

                if(!$saveCurrentTopPoll){
                    return Utility::databaseError();
                }
            }
            else{
                $newTopPoll=$this->topPoll->create([
                    'user_id'=>$user_id,
                    'poll_id'=>$poll_id,
                    'status'=>true
                ]);

                if(!$newTopPoll){
                    return Utility::databaseError();
                }
            }

            DB::commit();
            return Utility::success("Top Post Updated Successfully");
        }
        catch(\Exception $ex){
            DB::rollBack();
            Log::info($ex);
            return Utility::error("An error occurred... Please try again!");
        }
    }


    public function managePoll($payload){
        $payload=json_decode($payload);
        //lets check if

        $hasUserVoted=Utility::hasUserVoted($payload->poll_id,$payload->user_id);
        if(!$hasUserVoted){
            $newVote=$this->pollResponse->create([
                'user_id'=>$payload->user_id,
                'poll_id'=>$payload->poll_id,
                'option_id'=>$payload->option_id
            ]);

            if(!$newVote){
                return Utility::databaseError();
            }
        }

        return Utility::success("Voting Completed");
    }

    public function getAllPolls(){
        return $this->polls->all();
    }

    public function getOnePoll($attr,$value){
        return $this->polls->findBy($attr,$value);
    }

}