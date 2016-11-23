<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Downloads;
use App\DownloadsAuthor;
use App\News;
use App\NewsAuthor;
use App\NewsCategory;
use App\DownloadsCategory;
use App\ContactUs;
use DB;
class SiteController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('admin');
    }
    /**
     * news display for admin
     */
    public function news()
    {
    	$newsItems = News::paginate(10);
    	$messages = array();

    	return view('admin.site.news',compact('newsItems','messages'));
    }
    /**
     * downloads display for admin
     */

    public function downloads()
    {
        $downloadItems = Downloads::paginate(10);
        $messages = array();

        return view('admin.site.downloads',compact('downloadItems','messages'));
    }




    /**
     * view all authors
     */

    public function viewAuthors($type='')
    {

        $messages = array();
        $showMenu = false;
        switch($type)
        {
            case 'downloads':
                $authors = new DownloadsAuthor;
                $authors = $authors->all();
            break;
            case 'news':
                 $authors = new NewsAuthor;
                $authors = $authors->all();
            break;
            default:
                $showMenu = true;

        }
        if($showMenu == true)
               return view('admin.site.authviews');


        if(!$authors)
        {
            $messages[] = ['type' => 'danger',
                            'heading' => 'Error',
                            'body' => 'No authors found '];
        }
            return view('admin.site.authview',compact('messages','authors','type'));
    }


    /**
     * adding authors - GET
     */
    public function addAuthors()
    {

    	$messages = array();
    	return view('admin.site.authorsadd',compact('messages'));
    }
    /**
     * adding authors - POST
     */
    public function postAuthors(Request $request)
    {
    	$messages = array();
    	$errors = array();


    	if($request->name == NULL || $request->name == "")
    	{
    		$errors[] = ['identifier' => 'nameError',
    					 'type' => 'danger',
    					 'title' => 'Error',
    					 'content' => 'No author name given'];

    	}
    	if($request->type == NULL)
    	{
    		$errors[] = ['identifier' => 'typeError',
    					 'type' => 'danger',
    					 'title' => 'Error',
    					 'content' => 'No author type given'];
    	}

    	if(count($errors) > 0)
    	{
    		$messages = $errors;
    		return view('admin.site.authorsadd',compact('messages'));
    	}

    	if($request->type == 'News')
    	{
    		$author = new NewsAuthor;
    		$author->name = $request->name;
    	}
    	else{
    	    		$author = new DownloadsAuthor;
    	    		$author->name = $request->name;
    	    }
    	 if($author->save())
    	 {
    	 	$messages[] = ['identifier' => 'authorSuccess',
    	 					'type' => 'success',
    	 					'title' => 'Success',
    	 					'content' => 'Author '.$request->name.' was saved in the category - '.$request->type.' authors.'];
    	 }
    	 else
    	 {
    	 	$messages[] = ['identifier' => 'authorError',
    	 					'type' => 'danger',
    	 					'title' => 'Error',
    	 					'content' => 'Author could not be created'];
    	 }

    	 	return view('admin.site.authorsadd',compact('messages'));
   	}

       /**
     * deleting authors
     */
     public function deleteAuthor($type,$id)
    {
        //check if category exists
        $messages = array();
        switch($type)
        {
            case 'news':
                $author = NewsAuthor::where('id',$id);
            break;
            case 'download':
            default:
                $author = DownloadsAuthor::where('id',$id);
              
        }

        if($author != NULL)
        {
            $deleted = $author->delete();
            if($deleted)
            {
                if($type == 'download')
                      $authors = DownloadsAuthor::all();
                else
                      $authors = NewsAuthor::all();
                $messages[] = ['type' => 'danger',
                                'heading' => 'Deleted successfully',
                                'body' => 'Author with id'.$id.' was deleted successfully'
                            ];
                    return view('admin.site.authview',compact('messages','type','authors'));
            }
            else
            {
                if($type == 'download')
                      $authors = DownloadsAuthor::all();
                else
                      $authors = NewsAuthor::all();
                $messages[] = ['type' => 'danger',
                                'heading' => 'Error',
                                'body' => 'Author with id'.$id.' was not found'
                            ];
                    return view('admin.site.authview',compact('messages','type','authors'));

            }
        }

    }
    /**
     * view all categories
     */

    public function viewCategories($type='')
    {

        $messages = array();
        $showMenu = false;
        switch($type)
        {
            case 'downloads':
                $categories = new DownloadsCategory;
                $categories = $categories->all();
            break;
            case 'news':
                 $categories = new NewsCategory;
                $categories = $categories->all();
            break;
            default:
                $showMenu = true;
        }
        if($showMenu)
            return view('admin.site.catviews');

        if(!$categories)
        {
            $messages[] = ['type' => 'danger',
                            'heading' => 'Error',
                            'body' => 'No categories found '];
        }

            return view('admin.site.catview',compact('messages','categories','type'));
    }

    /**
     * adding categories - GET
     */
    public function addCategories()
    {

        $messages = array();
        return view('admin.site.categoriesadd',compact('messages'));
    }
    /**
     * adding categories - POST
     */
    public function postCategories(Request $request)
    {
        $messages = array();
        $errors = array();


        if($request->name == NULL || $request->name == "")
        {
            $errors[] = ['identifier' => 'nameError',
                         'type' => 'danger',
                         'title' => 'Error',
                         'content' => 'No category name given'];

        }
        if($request->type == NULL)
        {
            $errors[] = ['identifier' => 'typeError',
                         'type' => 'danger',
                         'title' => 'Error',
                         'content' => 'No category type given'];
        }

        if(count($errors) > 0)
        {
            $messages = $errors;
            return view('admin.site.categoriesadd',compact('messages'));
        }

        if($request->type == 'News')
        {
            $categ = new NewsCategory;
            $categ->type = $request->name;
        }
        else{
                    $categ = new DownloadsCategory;
                    $categ->type = $request->name;
            }
         if($categ->save())
         {
            $messages[] = ['identifier' => 'categorySuccess',
                            'type' => 'success',
                            'title' => 'Success',
                            'content' => 'Category '.$request->name.' was saved in the category - '.$request->type.' categories.'];
         }
         else
         {
            $messages[] = ['identifier' => 'categoryError',
                            'type' => 'danger',
                            'title' => 'Error',
                            'content' => 'Category could not be created'];
         }

            return view('admin.site.categoriesadd',compact('messages'));
    }

    /**
     * deleting categories
     */
     public function deleteCategory($type,$id)
    {
        //check if category exists
        $messages = array();
        switch($type)
        {
            case 'news':
                $categ = NewsCategory::where('id',$id);
            break;
            case 'download':
            default:
                $categ = DownloadsCategory::where('id',$id);
              
        }

        if($categ != NULL)
        {
            $deleted = $categ->delete();
            if($deleted)
            {
                if($type == 'download')
                      $categories = DownloadsCategory::all();
                else
                      $categories = NewsCategory::all();
                $messages[] = ['type' => 'danger',
                                'heading' => 'Deleted successfully',
                                'body' => 'Category with id'.$id.' was deleted successfully'
                            ];
                    return view('admin.site.catview',compact('messages','type','categories'));
            }
            else
            {
                if($type == 'download')
                      $categories = DownloadsCategory::all();
                else
                      $categories = NewsCategory::all();
                $messages[] = ['type' => 'danger',
                                'heading' => 'Error',
                                'body' => 'Category with id'.$id.' was not found'
                            ];
                    return view('admin.site.catview',compact('messages','type','categories'));

            }
        }

    }

   	/**
   	 * adding news - GET
   	 */

    public function addNews()
    {
    	
    	$categories = NewsCategory::all();
    	$authors = NewsAuthor::all();
    	$messages = array();
    	return view('admin.site.newsadd',compact('messages','categories','authors'));
    }

    /**
     * adding news - POST
     */
    public function postNews(Request $request)
    {
    	$categories = NewsCategory::all();
    	$authors = NewsAuthor::all();
    	$messages = array();
    	$errors = array();
    	if($request->authorName == NULL)
    	{
    		$errors[] = [
    						'identifier' => 'authorError',
    						'type' => 'danger',
    					   'heading' => 'Error',
    					   'content' => 'No author selected'];
    	}
    	if($request->type == NULL)
    	{	
    		$errors[] = [	'identifier' => 'typeError',
    						'type' => 'danger',
    					   'heading' => 'Error',
    					   'content' => 'No news type selected'];
    	}	
    	if($request->title == "")
    	{
    		$errors[] = [ 'identifier' => 'titleError',
    					  'type' => 'danger',
    					  'heading' => 'Error',
    					  'content' => 'No title entered'];
    	}
    	if($request->content == "")
    	{
    		$errors[] = ['identifier' => 'contentError',
    					  'type' => 'danger',
    					   'heading' => 'Error',
    					   'content' => 'No content entered '];
    	}
    	//XSS checks
    	// check if author exists
    	$author = NewsAuthor::where(['name' => $request->authorName])->first();
    		if($author == NULL)
    		{
    			$errors[] = ['identifier' => 'authorNotExistsError',
    						 'type' => 'danger',
    						 'heading' => 'Error',
    						 'content' => 'Author '.$request->authorName.' does not exist. '];
    		}
    	// check if given category exists
    	$category = NewsCategory::where(['type' => $request->type])->first();
    		if($category == NULL)
    		{
    			$errors[] = ['identifier' => 'typeNotExistsError',
    						 'type' => 'danger',
    						 'heading' => 'Error',
    						 'content' => 'Category '.$request->type.' does not exist. '];
    		}
    	if(count($errors) > 0)
    	{
    		$messages = $errors;

    		return view('admin.site.newsadd',compact('messages','categories','authors'));
    	}

    	$news = new News;
    	$news->title = $request->title;
    	$news->text = $request->content;
    	$news->type = $request->type;
    	$news->author = $request->authorName;

    	if($news->save())
    	{
    		$messages[] = ['identifier' => 'newsCreatedSuccess',
    						'type' => 'success',
    						'heading' => 'Success',
    						'content' => 'News was successfully published' ];
    	}
    	else
    		$messages[] = ['identifier' => 'newsCreatedError',
    						'type' => 'danger',
    						'heading' => 'Error',
    						'content' => 'News could not be published. '];

    	return view('admin.site.newsadd',compact('messages','categories','authors'));

    }

    /**
     * delete news with id
     */
    public function deleteNews($id)
    {
    	// check if news exists
    		
    		$news = News::where(['id' => $id]);
    		if($news->first() != NULL)
    		{
    			if($news->delete())
    			{
    				$messages[] = ['type' => 'success',
    								'heading' => 'Success',
    								'content' => 'News was successfully deleted' ];
    			}
    		}
    		else
    			$messages[] = ['type' => 'danger',
    							'heading' => 'Error',
    							'content' => ' News with id '.$id.' could not be found. '];
    		$newsItems = News::paginate(10);


    		return view('admin.site.news',compact('messages','newsItems'));
    }

    /**
     * edit news with id - GET
     */

    public function editNews($id)
    {
            $messages = array();
            $categories = NewsCategory::all();
        // check if news exists
            $news = News::where(['id' => $id])->first();
            if($news != NULL)
                {
                        // go on.
                    
                    return view('admin.site.newsedit',compact('messages','news','categories'));

                }
    }

    /**
     * edit news with id - POST
     */

    public function changeNews($id, Request $request)
    {
            $messages = array();
            $categories = NewsCategory::all();
                // check if news exists
            $news = News::where(['id' => $id])->first();
                if($news != NULL)
                {
                    $news->title = $request->title;
                    $news->text = $request->content;
                    $news->type = $request->type;
                    if($news->save())
                    {
                        $messages[] = ["identifier" => "newsUpdateSuccess",
                                       "type" => "success",
                                       "title" => "Success",
                                       "content" => "News was successfully updated"];


                    }
                    else
                         $messages[] = ["identifier" => "newsUpdateError",
                                       "type" => "danger",
                                       "title" => "Failure",
                                       "content" => "News was not updated"];

                }
                else
                     $messages[] = ["identifier" => "newsNotFoundError",
                                       "type" => "danger",
                                       "title" => "Error",
                                       "content" => "News was not found"];

            return view('admin.site.newsedit',compact('messages','news','categories'));
    }

    public function addDownload()
    {

        $messages = array();
        $categories = DownloadsCategory::all();
        $authors = DownloadsAuthor::all();


        return view('admin.site.downloadsadd',compact('messages','categories','authors'));
    }

    public function postDownload(Request $request)
    {
        $messages = array();
        $categories = DownloadsCategory::all();
        $authors = DownloadsAuthor::all();

            $errors = array();
        if($request->authorName == NULL)
        {
            $errors[] = [
                            'identifier' => 'authorError',
                            'type' => 'danger',
                           'heading' => 'Error',
                           'content' => 'No author selected'];
        }
        if($request->type == NULL)
        {   
            $errors[] = [   'identifier' => 'typeError',
                            'type' => 'danger',
                           'heading' => 'Error',
                           'content' => 'No download type selected'];
        }   
        if($request->title == "")
        {
            $errors[] = [ 'identifier' => 'titleError',
                          'type' => 'danger',
                          'heading' => 'Error',
                          'content' => 'No title entered'];
        }
        if($request->url == "")
        {
            $errors[] = ['identifier' => 'contentError',
                          'type' => 'danger',
                           'heading' => 'Error',
                           'content' => 'No URL entered '];
        }
        //XSS checks
        // check if author exists
        $author = DownloadsAuthor::where(['name' => $request->authorName])->first();
            if($author == NULL)
            {
                $errors[] = ['identifier' => 'authorNotExistsError',
                             'type' => 'danger',
                             'heading' => 'Error',
                             'content' => 'Author '.$request->authorName.' does not exist. '];
            }
        // check if given category exists
        $category = DownloadsCategory::where(['type' => $request->type])->first();
            if($category == NULL)
            {
                $errors[] = ['identifier' => 'typeNotExistsError',
                             'type' => 'danger',
                             'heading' => 'Error',
                             'content' => 'Category '.$request->type.' does not exist. '];
            }
        if(count($errors) > 0)
        {
            $messages = $errors;

            return view('admin.site.downloadsadd',compact('messages','categories','authors'));
        }

        $download = new Downloads;
        $download->title = $request->title;
        $download->type = $request->type;
        $download->author = $request->authorName;
        $download->url = $request->url;
        if($download->save())
        {
            $messages[] = ['identifier' => 'downloadCreatedSuccess',
                            'type' => 'success',
                            'heading' => 'Success',
                            'content' => 'Download was successfully added' ];
        }
        else
            $messages[] = ['identifier' => 'downloadCreatedError',
                            'type' => 'danger',
                            'heading' => 'Error',
                            'content' => 'Download could not be added. '];

            return view('admin.site.downloadsadd',compact('messages','categories','authors')); 

    }

    /**
     * edit downloads - GET
     */

  public function editDownload($id)
    {
            $messages = array();
            $categories = DownloadsCategory::all();
        // check if download exists
            $download = Downloads::where(['id' => $id])->first();
            if($download != NULL)
                {
                        // go on.
                    
                    return view('admin.site.downloadsedit',compact('messages','download','categories'));

                }
    }

    /**
     * edit download with id - POST
     */

    public function changeDownload($id, Request $request)
    {
            $messages = array();
            $categories = DownloadsCategory::all();
                // check if download exists
            $download = Downloads::where(['id' => $id])->first();
                if($download != NULL)
                {
                    $download->title = $request->title;
                    $download->url = $request->url;
                    $download->type = $request->type;
                    if($download->save())
                    {
                        $messages[] = ["identifier" => "downloadUpdateSuccess",
                                       "type" => "success",
                                       "title" => "Success",
                                       "content" => "Download was successfully updated"];


                    }
                    else
                         $messages[] = ["identifier" => "downloadUpdateError",
                                       "type" => "danger",
                                       "title" => "Failure",
                                       "content" => "Download was not updated"];

                }
                else
                     $messages[] = ["identifier" => "downloadNotFoundError",
                                       "type" => "danger",
                                       "title" => "Error",
                                       "content" => "Download was not found"];

            return view('admin.site.downloadsedit',compact('messages','download','categories'));
    }

    /**
     * delete download with id
     */
    public function deleteDownload($id)
    {
        // check if download exists
            
            $download = Downloads::where(['id' => $id]);
            if($download->first() != NULL)
            {
                if($download->delete())
                {
                    $messages[] = ['type' => 'success',
                                    'heading' => 'Success',
                                    'content' => 'Download was successfully deleted' ];
                }
            }
            else
                $messages[] = ['type' => 'danger',
                                'heading' => 'Error',
                                'content' => ' Download with id '.$id.' could not be found. '];
            $downloadItems = Downloads::paginate(10);


            return view('admin.site.downloads',compact('messages','downloadItems'));
    }

    /**
     * showReports
     * GET method
     * displays all the bug reports
     */

    public function showReports()
    {
        $reports = ContactUs::orderBy('created_at')
                    ->paginate(10);




        return view('admin.reports.showreports',compact('reports'));
    }

    /**
     * POST method
     * shows a particular bug report
     */

    public function showReport($id)
    {
        if(!isset($id) || $id == 0)
        {
            abort(404);
        }
        $report = ContactUs::where('id',$id)->first();
        if($report == NULL)
            abort(404);

        if($report->read == 0)
        {    
            $report->read = 1;
            $report->save();
        }


        return view('admin.reports.showreport',compact('report'));
    }
}