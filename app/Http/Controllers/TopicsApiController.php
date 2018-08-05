<?php

namespace App\Http\Controllers;

use App\Repositories\TopicRepository;
use Illuminate\Http\Request;

class TopicsApiController extends Controller
{
    protected $topicRepository;

    /**
     * TopicsApiController constructor.
     * @param $topicRepository
     */
    public function __construct(TopicRepository $topicRepository)
    {
        $this->topicRepository = $topicRepository;
    }

    public function topicsApi(Request $request)
    {
        return $this->topicRepository->getTopicsForToggle($request);
    }
}
