<script type="text/javascript">
    $(document).ready(function(){
        $('a.ct-close-alert').click(function() {
           $(this).parent().css('display','none'); 
        });
    });
</script>
    
<div id='alert-box' class="alert alert-danger"
{!! $errors->any() ? '' : "style='display: none'" !!}
>
    <b>Ops...</b>
    <a class="ct-close-alert" href="#"><img src="{{ URL::asset('/img/ic_del_small.png') }}" /></a>
    <ul>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
    </ul>
    
</div>
 
@if (Session::has('flash_message'))
    <div class="alert alert-info">
        <b>Success...</b>
        <a class="ct-close-alert" href="#"><img src="{{ URL::asset('/img/ic_del_small.png') }}" /></a>
        <br />
        {{ Session::get('flash_message') }}
        
    </div>
@endif