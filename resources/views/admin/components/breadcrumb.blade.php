<ol class="breadcrumb">
    <li class="box light_grey_box"><a href="{{route('admin.core')}}">{{$parent}}</a></li>
    @isset($parent2)
        <li class="box light_grey_box"><a href="{{ $parent2_route }}">{{$parent2}}</a></li>
    @endisset
    <li class="box grey_box">{{$active}}</li>
</ol>
