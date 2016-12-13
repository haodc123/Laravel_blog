
@extends($vlayout)
 
@section('title', 'Articles index')

@section('content')
	@include('shared.alert')
        
<script type="text/javascript">
$(document).ready(function() {
    //$("#results").load('{{URL::to('/')}}/draff.php'); // load from php file
    var p = {!! $page !!};
    load_page(p); // init
    
    //executes code below when user click on pagination links
    $("#results").on("click", ".pagination a", function (e){
        e.preventDefault();
        $("#loading-div").css('display','block'); //show loading element
        var page = $(this).attr("data-page"); //get page number from link
        load_page(page);
    }); 
    
});    

            function load_page(mypage)
            {
                var url = '{{ action("ArticlesController@paging_aj", ["page"=>":page"]) }}';
                url = url.replace(':page', mypage);
                $.ajax({
                    url : url,
                    type : "get", // chọn phương thức gửi là get
                    dateType: "json", // dữ liệu trả về dạng text
                    data : { // Danh sách các thuộc tính sẽ gửi đi
                        
                    },
                    success : function (result){
                        $("#loading-div").css('display','none');
                        
                        var jsonData = JSON.parse(result);
                            var html = '<table border="1">';
                                html += '<tr>';
                                html += '<th>No.</th>';
                                html += '<th>Edit</th>';
                                html += '<th>Delete</th>';
                                html += '<th>Recommend</th>';
                                html += '<th>Title</th>';
                                html += '<th>Author</th>';
                                html += '</tr>';
                            for (var i = 0; i < jsonData.content.length; i++) {
                                var content_row = jsonData.content[i];
                                html += '<tr>';
                                html += '<th>'+content_row.NO+'</th>'; 
                                html += '<th>'+content_row.ID+'</th>'; 
                                html += '<th>'+content_row.ID+'</th>'; 
                                html += '<th>'+content_row.ID+'</th>'; 
                                html += '<th>'+content_row.TITLE+'</th>';
                                html += '<th>'+content_row.AUTHOR+'</th>';
                                html += '</tr>';
                            }
                              
                             html += '</table>';
                             html += jsonData.link;
                             
                             $('#results').html(html); 
                             // Change URL on address bar
                             new_url = url.replace('-aj', '');
                             window.history.pushState({path:url},'',new_url);
                    }
                });
            }
</script>
        
	<h1>Articles</h1>
	{!! link_to_route('articles.create', 'New Articles', null, ['class' => 'btn btn-primary btn-lg', 'data-remote' => 'true']) !!}

        <div id="loading-div"><img src="{{ URL::asset('/img/ic_loader.gif') }}" ></div>
	<div id="results">
            
        </div>
        <a href="{{ action('ArticlesController@paging', ['page' => 1]) }}" >Start Paging with action</a><br />
        {!! link_to_route('paging_articles', 'Start paging with link_to_route', ['page'=>'1']) !!}
        

@endsection
