<?php

namespace App\Http\Controllers\Area;

use App\Helper\PostType;
use App\Http\Requests\PostRequest;
use App\Models\BN;
use App\Models\Core;
use App\Models\CylTemp;
use App\Models\Dosage;
use App\Models\Ejectors;
use App\Models\Holding;
use App\Models\HotRunnerTemp;
use App\Models\Injection;
use App\Models\Monitoring;
use App\Models\Mould;
use App\Models\MouldTemp;
use App\Models\PartNumber;
use App\Models\Plan;
use App\Models\Post;
use App\Models\ShortStroke;
use App\Notifications\changeParameter;
use App\Notifications\newPost;
use App\Repository\PublicRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{

    public function index()
    {
        $users = PublicRepository::findAll('User');
        $posts = PublicRepository::findAll('Post', ['part', 'bn', 'user']);
        return view('Post.index', compact('posts', 'users'));
    }

    public function getBn($bn)
    {
        $batch = PublicRepository::findById('Bn', $bn, ['machine']);
        $machine = $batch->machine;
        return view('Post.postParameters', compact('machine', 'bn'));
    }

    public function getParameters($part, $machine, $type = null)
    {
        if ($type == null) {
            $item['ejectors'] = PublicRepository::findFirst('Ejectors', ['part_id' => $part, 'machine_id' => $machine]);
            $item['mould'] = PublicRepository::findFirst('Mould', ['part_id' => $part, 'machine_id' => $machine]);
            $item['core'] = PublicRepository::findFirst('Core', ['part_id' => $part, 'machine_id' => $machine]);
            $item['cylTemp'] = PublicRepository::findFirst('CylTemp', ['part_id' => $part, 'machine_id' => $machine]);
            $item['dosage'] = PublicRepository::findFirst('Dosage', ['part_id' => $part, 'machine_id' => $machine]);
            $item['holding'] = PublicRepository::findFirst('Holding', ['part_id' => $part, 'machine_id' => $machine]);
            $item['hotRunner'] = PublicRepository::findFirst('HotRunnerTemp', ['part_id' => $part, 'machine_id' => $machine]);
            $item['injection'] = PublicRepository::findFirst('Injection', ['part_id' => $part, 'machine_id' => $machine]);
            $item['monitoring'] = PublicRepository::findFirst('Monitoring', ['part_id' => $part, 'machine_id' => $machine]);
            $item['mouldTemp'] = PublicRepository::findFirst('MouldTemp', ['part_id' => $part, 'machine_id' => $machine]);
        } else {
            $item['ejectors'] = PublicRepository::findLast('Ejectors', ['part_id' => $part, 'machine_id' => $machine]);
            $item['mould'] = PublicRepository::findLast('Mould', ['part_id' => $part, 'machine_id' => $machine]);
            $item['core'] = PublicRepository::findLast('Core', ['part_id' => $part, 'machine_id' => $machine]);
            $item['cylTemp'] = PublicRepository::findLast('CylTemp', ['part_id' => $part, 'machine_id' => $machine]);
            $item['dosage'] = PublicRepository::findLast('Dosage', ['part_id' => $part, 'machine_id' => $machine]);
            $item['holding'] = PublicRepository::findLast('Holding', ['part_id' => $part, 'machine_id' => $machine]);
            $item['hotRunner'] = PublicRepository::findLast('HotRunnerTemp', ['part_id' => $part, 'machine_id' => $machine]);
            $item['injection'] = PublicRepository::findLast('Injection', ['part_id' => $part, 'machine_id' => $machine]);
            $item['monitoring'] = PublicRepository::findLast('Monitoring', ['part_id' => $part, 'machine_id' => $machine]);
            $item['mouldTemp'] = PublicRepository::findLast('MouldTemp', ['part_id' => $part, 'machine_id' => $machine]);
        }
        return $item;
    }

    public function machineParametersAjax($bn)
    {
        $bn = PublicRepository::findById('Bn', $bn, ['ejectors', 'mould', 'core', 'cylTemp',
            'dosage', 'holding', 'hotRunner', 'injection', 'monitoring', 'mouldTemp', 'shortStroke']);
        $item['ejectors'] = $bn->ejectors;
        $item['mould'] = $bn->mould;
        $item['core'] = $bn->core;
        $item['cylTemp'] = $bn->cylTemp;
        $item['dosage'] = $bn->dosage;
        $item['holding'] = $bn->holding;
        $item['hotRunner'] = $bn->hotRunner;
        $item['injection'] = $bn->injection;
        $item['monitoring'] = $bn->monitoring;
        $item['mouldTemp'] = $bn->mouldTemp;
        $item['shortStroke'] = $bn->shortStroke;
        $item['comment'] = $bn->comment;
        return $item;
    }

    public function changeBn($post, Request $request)
    {
        $post = PublicRepository::findById('Post', $post);
        $bn = self::newBn($request);
        $data['bn_id'] = $bn->id;
        PublicRepository::update('Post', $post->id, $data);
        $notifiy = [
            'user' => auth()->user(),
            'title' => 'Parameter Change',
            'message' => 'Parameter Change On Machine ' . $post->machine_id . ' By User  ' . auth()->user()->name,
            'post' => $post->id,
            'type' => 'Change Parameter',
        ];
        foreach (PublicRepository::findAll('User') as $user) {
            Notification::send($user, new changeParameter($notifiy));
        }
        return back()->with('success', 'Parameters Edited');
    }

    public function changeBn2($post, Request $request)
    {
        $post = PublicRepository::findById('Post', $post);
        $bn = self::newBn($request);
        $data['bn_id'] = $bn->id;
        PublicRepository::update('Post', $post->id, $data);
        $notifiy = [
            'user' => auth()->user(),
            'title' => 'Parameter Change',
            'message' => 'Parameter Change On Machine ' . $post->machine_id . ' By User  ' . auth()->user()->name,
            'post' => $post->id,
            'type' => 'Change Parameter',
        ];
        foreach (PublicRepository::findAll('User') as $user) {
            Notification::send($user, new changeParameter($notifiy));
        }
        return 'DOne';
    }

    public function machineParameters($bn, $machine)
    {
        $machine = PublicRepository::findById('Machine', $machine);
        $post = PublicRepository::findLast('Post', ['bn_id' => $bn]);
        return view('Area.postParameters', compact('machine', 'post'));
    }

    public function machineParameters2($bn, $machine)
    {
        $data['machine'] = PublicRepository::findById('Machine', $machine);
        $data['post'] = PublicRepository::findLast('Post', ['bn_id' => $bn]);
        return json_encode($data);
    }

    public function newBn($request)
    {
        $part_id = $request->part_id;
        $machine_id = $request->machine_id;

        $coreData = $request->core;
        $coreData['part_id'] = $part_id;
        $coreData['machine_id'] = $machine_id;
        $core = Core::firstOrCreate($coreData);

        $mouldData = $request->mould;
        $mouldData['part_id'] = $part_id;
        $mouldData['machine_id'] = $machine_id;
        $mould = Mould::firstOrCreate($mouldData);

        $ejectorsData = $request->ejectors;
        $ejectorsData['part_id'] = $part_id;
        $ejectorsData['machine_id'] = $machine_id;
        $ejectors = Ejectors::firstOrCreate($ejectorsData);

        $holdingData = $request->holding;
        $holdingData['part_id'] = $part_id;
        $holdingData['machine_id'] = $machine_id;
        $holding = Holding::firstOrCreate($holdingData);

        $injectionData = $request->injection;
        $injectionData['part_id'] = $part_id;
        $injectionData['machine_id'] = $machine_id;
        $injection = Injection::firstOrCreate($injectionData);

        $dosageData = $request->dosage;
        $dosageData['part_id'] = $part_id;
        $dosageData['machine_id'] = $machine_id;
        $dosage = Dosage::firstOrCreate($dosageData);

        $monitoringData = $request->monitoring;
        $monitoringData['part_id'] = $part_id;
        $monitoringData['machine_id'] = $machine_id;
        $monitoring = Monitoring::firstOrCreate($monitoringData);

        $cylTempData = $request->nozzle['cylTemp'];
        $cylTempData['part_id'] = $part_id;
        $cylTempData['machine_id'] = $machine_id;
        $cylTemp = CylTemp::firstOrCreate($cylTempData);

        $hotRunnerData = $request->nozzle['hotRunner'];
        $hotRunnerData['part_id'] = $part_id;
        $hotRunnerData['machine_id'] = $machine_id;
        $hotRunner = HotRunnerTemp::firstOrCreate($hotRunnerData);

        $mouldTempData = $request->nozzle['mouldTemp'];
        $mouldTempData['part_id'] = $part_id;
        $mouldTempData['machine_id'] = $machine_id;
        $mouldTemp = MouldTemp::firstOrCreate($mouldTempData);

        $shortStrokeData = $request->shortStroke;
        $shortStrokeData['part_id'] = $part_id;
        $shortStrokeData['machine_id'] = $machine_id;
        $shortStroke = ShortStroke::firstOrCreate($shortStrokeData);

        $bnData['cyl_temp_id'] = $cylTemp->id;
        $bnData['hot_runner_id'] = $hotRunner->id;
        $bnData['mould_temp_id'] = $mouldTemp->id;
        $bnData['injection_id'] = $injection->id;
        $bnData['holding_id'] = $holding->id;
        $bnData['dosage_id'] = $dosage->id;
        $bnData['mould_id'] = $mould->id;
        $bnData['ejector_id'] = $ejectors->id;
        $bnData['monitoring_id'] = $monitoring->id;
        $bnData['core_id'] = $core->id;
        $bnData['short_stroke_id'] = $shortStroke->id;
        $bnData['part_id'] = $part_id;
        $bnData['machine_id'] = $machine_id;
        $bnData['comment'] = $request->comment;
        $bnData['user_id'] = auth()->id();
        $bn = BN::create($bnData);
        return $bn;
    }

    public function post(Request $request)
    {
        $part_id = $request->part_id;
        $machine_id = $request->machine_id;
        $postData = $request->only('part_id', 'machine_id', 'counter'
            , 'io', 'nio', 'cav', 'cycle_time', 'type', 'shift');


        if ($request->counter != 0) {
            if (!$request->comment) {
                $lastPost = PublicRepository::findLast('Post',
                    ['part_id' => $part_id, 'machine_id' => $machine_id]);
                $bn_id = $lastPost->bn_id;
            } else {
                $bn = self::newBn($request);
                $bn_id = $bn->id;
            }
        } else {
            $bn = self::newBn($request);
            $bn_id = $bn->id;
        }

        $postData['bn_id'] = $bn_id;
        $postData['user_id'] = auth()->id();

        $post = Post::create($postData);
        $week = Carbon::now();
//        $week->setWeekStartsAt(Carbon::SUNDAY);
//        $week->setWeekEndsAt(Carbon::SATURDAY); test A.Mohamed
        $week->setWeekStartsAt(Carbon::SATURDAY);
        $week->setWeekEndsAt(Carbon::FRIDAY);
        $weekNo = $week->weekOfYear;

        $plan = Plan::where(['machine_id' => $machine_id, 'part_id' => $part_id, 'week' => $weekNo])->first();
        $planData['missing'] = $plan->demand - $request->counter;
        $plan->update($planData);

        $notifiy = [
            'user' => auth()->user(),
            'title' => 'New Post',
            'message' => 'New Post On Machine Number ' . $post->machine_id . ' By User  ' . auth()->user()->name,
            'post' => $post->id,
            'type' => 'New Post',
        ];

        if ($post->type == PostType::ChangeOver) {
            $notifiy2 = [
                'user' => auth()->user(),
                'title' => 'Change Over',
                'message' => 'Change Over On Machine ' . $post->machine_id,
                'post' => $post->id,
                'type' => 'Change Over',
            ];
        }

        foreach (PublicRepository::findAll('User') as $user) {
            Notification::send($user, new newPost($notifiy));
            if ($post->type == PostType::ChangeOver) {
                Notification::send($user, new newPost($notifiy2));
            }
        }

        return back()->with('success', 'Your Post Done');
    }

    public function post2(Request $request)
    {
        $part_id = $request->part_id;
        $machine_id = $request->machine_id;
        $postData = $request->only('part_id', 'machine_id', 'counter'
            , 'io', 'nio', 'cav', 'cycle_time', 'type', 'shift');

        DB::beginTransaction();
        if ($request->counter != 0) {
            if (!$request->comment) {
                $lastPost = PublicRepository::findLast('Post',
                    ['part_id' => $part_id, 'machine_id' => $machine_id]);
                if ($lastPost) {
                    $bn_id = $lastPost->bn_id;
                } else {
                    $bn = self::newBn($request);
                    $bn_id = $bn->id;
                }
            } else {
                $bn = self::newBn($request);
                $bn_id = $bn->id;
            }
        } else {
            $bn = self::newBn($request);
            $bn_id = $bn->id;
        }
        $postData['bn_id'] = $bn_id;
        $postData['user_id'] = auth()->id();
        $post = Post::create($postData);

        DB::commit();
        $week = Carbon::now();
//        $week->setWeekStartsAt(Carbon::SUNDAY);
//        $week->setWeekEndsAt(Carbon::SATURDAY);
        $week->setWeekStartsAt(Carbon::SATURDAY);
        $week->setWeekEndsAt(Carbon::FRIDAY);
        $weekNo = $week->weekOfYear;
        $plan = Plan::where(['machine_id' => $machine_id, 'part_id' => $part_id, 'week' => $weekNo])->first();

        if ($plan) {
            $planData['missing'] = $plan->demand - $request->counter;
            $plan->update($planData);
        }

        $notifiy = [
            'user' => auth()->user(),
            'title' => 'New Post',
            'message' => 'New Post On Machine Number ' . $post->machine_id . ' By User  ' . auth()->user()->name,
            'post' => $post->id,
            'type' => 'New Post',
        ];

        if ($post->type == PostType::ChangeOver) {
            $notifiy2 = [
                'user' => auth()->user(),
                'title' => 'Change Over',
                'message' => 'Change Over On Machine ' . $post->machine_id,
                'post' => $post->id,
                'type' => 'Change Over',
            ];
        }

        foreach (PublicRepository::findAll('User') as $user) {
            Notification::send($user, new newPost($notifiy));
            if ($post->type == PostType::ChangeOver) {
                Notification::send($user, new newPost($notifiy2));
            }
        }

        $res = PublicRepository::findById('Post', $post->id, ['part', 'machine']);

        return json_encode($res);
    }

    public function filter(Request $request)
    {
        if ($request->from) {
            $from = date('Y-m-d', strtotime($request->from));
        } else {
            $from = date('Y-m-d', strtotime('2000-01-01'));
        }
        if ($request->to) {
            $to = date('Y-m-d', strtotime($request->to));
        } else {
            $to = Carbon::now();
        }

        $posts = Post::whereBetween('created_at', [$from, $to])
            ->with(['part', 'machine', 'user']);
        if ($request->shift) {
            $posts = $posts->where('shift', $request->shift);
        }
        if ($request->user_id) {
            $posts = $posts->where('user_id', $request->user_id);
        }
        if ($request->part_no) {
            $posts = $posts->whereHas('part', function ($q) use ($request) {
                $q->where('part_no', 'like', '%' . $request->part_no . '%');
            });
        }
        if ($request->machine_id) {
            $posts = $posts->where('machine_id', $request->machine_id);
        }
        if ($request->bn_id) {
            $posts = $posts->where('bn_id', $request->bn_id);
        }
        if ($request->type) {
            $posts = $posts->where('type', $request->type);
        }
        $posts = $posts->get();
//        $users=PublicRepository::findAll('User');
        return view('Post.postData', compact('posts'));
    }


    public function destroy(Request $request)
    {
        try {
            Post::whereIn('id', $request->ids)->delete();
            return response()->json(['success' => "Posts deleted successfully"]);
        } catch (\Exception $e) {

            return response()->json(['error' => "something is wrong, Please try again.."]);
        }
    }
}
