@php
    $uid = Auth::check() ? Auth::user()->id : 0;
    $user_cv = \App\Cv::where('user_id', $uid)->first();
@endphp
<style media="screen">
  ul > li {
    padding: 5px;
  }
</style>
@extends('layouts.app')
@section('title')
  Create your CV
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as {{ Auth::user()->name }}!
                    <ul class="list-unstyled" style="font-size: 15px;">
                      @if($user_cv == null)
                      <li>
                        <a href="cv/create">Create New CV</a>
                      </li>
                      @endif
                      @if(!$user_cv == null)
                      <li>
                        <a href="{{ route('cv.show',  ['cv' => $uid]) }}">See your CVs</a>
                      </li>
                      <li>
                        <a href="{{ route('cv.edit',  ['cv' => $uid]) }}">Edit CV</a>
                      </li>
                      @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
