<?php
/**
 * Created by PhpStorm.
 * User: rat
 * Date: 6/20/17
 * Time: 10:29 PM
 */

namespace App\Services\Vote;


use App\BaseSettings\Settings;
use App\Models\Tags;
use App\Repositories\VoteResultRepository;
use App\Services\BaseService;
use App\Services\Tagger\TaggerService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VoteResultService extends BaseService
{
    /**
     * @var VoteResultRepository
     */
    private $voteResultRepository;
    /**
     * @var TaggerService
     */
    private $taggerService;

    /**
     * VoteResultService constructor.
     * @param VoteResultRepository $voteResultRepository
     * @param TaggerService $taggerService
     */
    public function __construct(VoteResultRepository $voteResultRepository,TaggerService $taggerService)
    {
        $this->voteResultRepository = $voteResultRepository;
        $this->taggerService = $taggerService;
    }


    /**
     * return Repository instance
     *
     * @return mixed
     */
    public function baseRepository()
    {
        return $this->voteResultRepository;
    }

    public function saveVote(Request $request)
    {

        $tagId = $this->taggerService->lookForTags($request->get('original_de'));
        $request->merge(['tag_id'=> $tagId]);
        $data = $request->only(
            [
                'title_de',
                'title_fr',
                'title_it',
                'original_de',
                'original_fr',
                'original_it',
                'total_vote',
                'total',
                'yes_vote_percentage',
                'no_vote_percentage',
                'vote_date',
                'source',
                'publish_date',
                'polling_date',
                'tag_id'
            ]
        );
        return $this->voteResultRepository->create($data);
    }

    public function updateVote($result_id, Request $request)
    {
        $tagId = $this->taggerService->lookForTags($request->get('original_de'));
        $request->merge(['tag_id'=> $tagId]);
        $data = $request->only(
            [
                'title_de',
                'title_fr',
                'title_it',
                'original_de',
                'original_fr',
                'original_it',
                'total_vote',
                'total',
                'yes_vote_percentage',
                'no_vote_percentage',
                'vote_date',
                'source',
                'publish_date',
                'polling_date',
                'tag_id'
            ]
        );
        return $this->voteResultRepository->update($data,$result_id);
    }

    public function activateResult(Request $request)
    {
        $resultId = $request->get('result_id');
        return $this->voteResultRepository->update(['vote_show_status' => Settings::$active_result_status],$resultId);
    }

    public function deActivateResult($request)
    {
        $resultId = $request->get('result_id');
        return $this->voteResultRepository->update(['vote_show_status' => Settings::$inactive_result_status],$resultId);
    }

    public function getFilterForApiPaginatedData(Request $request)
    {
        $query = $this->voteResultRepository->getQuery();
        if($request->has('active_status') and !empty($request->get('active_status'))){
            if($request->get('active_status') == "active"){
                $query->where('vote_show_status','ACTIVE');
            }elseif ($request->get('active_status') == "inactive"){
                $query->where('vote_show_status','INACTIVE');
            }
        }

        if($request->has('tags') and !empty($request->get('tags'))){
            $tags = explode(',',$request->get('tags'));
            $tagIds = Tags::whereIn('name',$tags)->pluck('id');
            $query->whereIn('tag_id',$tagIds);
        }

        if($request->has('keyword') and !empty($request->get('keyword'))){
            $keyword = $request->get('keyword');
            $query
                ->where('original_de','like','%'.$keyword.'%')
                ->orWhere('original_fr','like','%'.$keyword.'%')
                ->orWhere('original_it','like','%'.$keyword.'%')
                ->orWhere('title_de','like','%'.$keyword.'%')
                ->orWhere('title_it','like','%'.$keyword.'%')
                ->orWhere('title_fr','like','%'.$keyword.'%');
        }

        if($request->has('date') and !empty($request->get('date'))){
            if($request->get('date') == 'asc'){
                $query->orderBy('vote_date');
            }
            if($request->get('date') == 'desc'){
                $query->orderBy('vote_date','DESC');
            }
        }

        if($request->has('year') and !empty($request->get('year'))){
            $baseYear = Carbon::createFromDate((int) $request->get('year'),1,1);
            $baseYear->addYears(18);
            $query->where('vote_date','>',$baseYear);
        }



        return $query->paginate($this->voteResultRepository->recordPerPage);
    }

    public function unseenVotes()
    {
        return $this->voteResultRepository->getAllUnseenVoteIds();
    }
}