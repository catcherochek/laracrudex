@extends('layout')
@section('css')
    <style>
        a, a:hover {
            color: white;
        }
    </style>
@endsection
@section('content')
	@if(session()->get('success'))
		<div class="alert alert-success">
		  {{ session()->get('success') }}  
		</div><br />
	@endif
    <div class="container">
        <div class="float-right">
            <a href="{{ route('shares.create') }}" class="btn btn-primary">New</a>
        </div>
        <h1 style="font-size: 2.2rem">Image Gallery (Image CRUD Tutorial)</h1>
        <hr/>
        <div class="row">
            @foreach($shares as $share)
                <div class="col-md-4 col-lg-3" style="margin-bottom: 20px">
                    <div class="card" style = "height:350px;">
                        <img class="card-img-top"
                             src="images/{{ $share->filepath }}"
                             alt="{{$share->share_name}}" />
                        <div class="card-body">
                            <h6 class="card-title text-center">{{$share->share_name}}</h6>
							<br/> <h7 class = "card-title text-center">цена: {{$share->share_price}} грн.</h7>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <form id="frm_{{ $share->id }}"
                                      action="{{route('shares.destroy', $share->id)}}"
                                      method="post" style="padding-bottom: 0px;margin-bottom: 0px">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="javascript:if(confirm('Are you sure want to delete?')) $('#frm_{{$share->id}}').submit()"
                                               class="btn btn-danger btn-sm btn-block">Delete</a>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="{{route('shares.edit',$share->id)}}"
                                               class="btn btn-primary btn-sm btn-block">Edit</a>
                                        </div>
                                        <input type="hidden" name="_method" value="delete"/>
                                        {{csrf_field()}}
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
         <nav>

        </nav>
    </div>
@endsection
