<?php

namespace App\Http\Controllers;

use Request;
use App\Author;
use App\Articles;
use App\Http\Requests\ArticlesRequest;
use Illuminate\Support\Facades\Input;
use App\MyGlobalFunc\MyPaging;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Articles::all();
        if (Request::wantsJson()) {
            return $articles;
        } else {
            $page = 1;
            return view('articles.index', compact('page'));
        }
    }
    public function create()
    {
        $article = new Articles;
        $authors = Author::pluck('name', 'id')->all();
        return view('articles.create', compact('article', 'authors'));
    }
    
    public function store(ArticlesRequest $request)
    {
        $articles = Articles::create($request->all());
	session()->flash('flash_message', 'Article was stored with success');
		
	$custom = Input::get("custom"); // $request->input('custom');
		
        if (Request::wantsJson()) {
            return $articles;
        } else {
            return redirect('articles');
        }
        
    }
    public function show(Articles $article)
    {
        if (Request::wantsJson()) {
            return $article;
        } else {
            return view('articles.show', compact('article'));
        }
    }
 
    public function edit(Articles $article)
    {
        $authors = Author::pluck('name', 'id')->all();
        return view('articles.edit', compact('article', 'authors'));
    }
 
    public function update(ArticlesRequest $request, Articles $article)
    {
        $article->update($request->all());
        session()->flash('flash_message', 'Article was updated with success');
		
        if (Request::wantsJson()) {
            return $article;
        } else {
            return redirect('articles');
        }
    }
 
    public function destroy(Articles $article)
    {
        $deleted = $article->delete();
	session()->flash('flash_message', 'Article was removed with success');
		
        if (Request::wantsJson()) {
            return (string) $deleted;
        } else {
            return redirect('articles');
        }
    }
    
    public function paging_aj($page) {
        //Get page number from Ajax
        if(isset($page)){
            $page_number = filter_var($page, FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
            if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
        }else{
            $page_number = 1; //if there's no page number, set it to 1
        }

        //get total number of records from database
        $get_total_rows = Articles::all()->count();
        //break records into pages
        $total_pages = ceil($get_total_rows/MyPaging::ITEM_PER_PAGE);

        //position of records
        $page_position = (($page_number-1) * MyPaging::ITEM_PER_PAGE);

        //Limit our results within a specified range. 
        $articles = Articles::take(MyPaging::ITEM_PER_PAGE)->skip($page_position)->get();
        
        $res_arr = array();
        $content_arr = array();
        
        $no = 1;
        foreach ($articles as $article) {
            $c_arr = ["NO"=>$no, "ID"=>$article->id, "TITLE"=>$article->title, "AUTHOR"=>$article->author->name];
            array_push($content_arr, $c_arr); 
            $no++;
        }
        $res_arr["content"] = $content_arr;
        
        $link = '<div align="center">';
        // To generate links, we call the pagination function here. 
        $link .= MyPaging::paginate_link(
                MyPaging::ITEM_PER_PAGE, 
                $page_number, 
                $get_total_rows, 
                $total_pages);
        $link .= '</div>';
        $res_arr["link"] = $link;
        
        // Check if request is a AJAX or not
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            die (json_encode($res_arr));
        } else {
            abort(404);
        }
        
        /*array("content"=>array(array("no"=>"1", "id"=>"1", "title"=>"title1","AUTHOR"=>"author1"),
				array("no"=>"2", "id"=>"2", "title"=>"title2","AUTHOR"=>"author1"),
				array("no"=>"3", "id"=>"3", "title"=>"title3","AUTHOR"=>"author1")), 
			"link"=>"abc");*/
        
    }
    
    public function paging($page) {
        if(isset($page)){
            $page = filter_var($page, FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
            if(!is_numeric($page)){die('Invalid page number!');} //incase of invalid page number
        }else{
            $page = 1; //if there's no page number, set it to 1
        }

        return view('articles.index', compact('page'));
        
    }
}
