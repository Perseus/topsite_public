@extends('layouts.app')

@section('content')

   
        <div class="col-md-6 col-md-offset-0">
        	@if(count($news) > 0)
        		@foreach($news as $article)
        				  <div class="panel panel-default">
				                <div class="panel-heading">{{ $article->title }}</div>

				                <div class="panel-body"> 
				                {!! $article->text !!} 
                   	
               					 </div>
               					 <div class="panel-footer">
               					 by {{ $article->author }} <div class="pull-right"> {{ $article->created_at->diffForHumans() }}</div>
               					 </div>

          				  </div>
          		@endforeach
         
          	{{ $news->links() }} 
           @else
              <div class="panel panel-default">
                <div class="panel-heading"> News </div>
                  <div class="panel-body">
                      No news found
                  </div>
              </div>
          @endif
        </div>
         
   
@endsection
