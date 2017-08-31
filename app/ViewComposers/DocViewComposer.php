<?php
namespace App\ViewComposers;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Model\Relation;
class DocViewComposer
{

	public function compose(View $view)
	{
		//..........counting request
		$request = Relation::where('doc_id',Auth::user()->user_id)
		->where('status',0)->get()->count();
		$view->with('docRequest', $request);
	}
}

 ?>
