<?php

namespace App\Http\Controllers;

use App\Helper\IssueType;
use App\Models\Issue;
use App\Repository\PublicRepository;
use Illuminate\Http\Request;
use test\Mockery\ReturnTypeObjectTypeHint;

class IssueController extends Controller
{
    public function index()
    {
        $issues=PublicRepository::findWhere('Issue',['type'=>IssueType::Tooling]);
        $type=IssueType::Tooling;
        return view('issues.index',compact('issues','type'));
    }

    public function QualityIssue()
    {
        $issues=PublicRepository::findWhere('Issue',['type'=>IssueType::Quality]);
        $type=IssueType::Quality;
        return view('issues.index',compact('issues','type'));
    }

    public function MaintenanceIssue()
    {
        $issues=PublicRepository::findWhere('Issue',['type'=>IssueType::Maintenance],['subIssue']);
        $type=IssueType::Maintenance;
        return view('issues.index',compact('issues','type'));
    }

    public function createSubIssue(Request $request)
    {
        $data=$request->except('_token');
        $sub=PublicRepository::save('SubIssue',$data);
        return back()->with('success','Issue Created');
    }

    public function edit($id,Request $request)
    {
        $data=$request->except('_token');
        PublicRepository::update('Issue',$id,$data);
        return back()->with('success','Issue Updated');
    }

    public function create(Request $request)
    {
        $data=$request->except('_token');
        PublicRepository::save('Issue',$data);
        return back()->with('success','Issue Created');
    }

    public function delete($id)
    {
        PublicRepository::delete('Issue',$id);
        return back()->with('success','Issue Deleted');
    }
}
