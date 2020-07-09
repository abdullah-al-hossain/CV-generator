@extends('layouts.admin_app')

@section('content')
<div class="col-xl-10 col-lg-8 offset-xl-1 offset-lg-2">
  <div class="card mb-lg-0">
    <form>
      <div class="card-header">
        <div class="d-flex align-items-center">
          <button class="btn btn-sm btn-icon btn-soft-secondary d-lg-none flex-shrink-0 mr-2" data-toggle="collapse-sidebar" data-target=".filter-sidebar" type="button">
            <i class="las la-filter"></i>
          </button>
          <input type="text" class="form-control form-control-sm" placeholder="Search Keyword">
        </div>

        <div class="w-200px">
          <select class="form-control form-control-sm aiz-selectpicker">
            <option value="" selected="">Most popular</option>
            <option value="">Highest rating first</option>
            <option value="">Lowest rating first</option>
            <option value="">Highest hourly rate first</option>
            <option value="">Lowest hourly rate first</option>
          </select>
        </div>
      </div>
    </form>
    @foreach($cvs as $cv)
    <div class="card-body p-0">
      <a href="{{ route('admin.show.cv', ['id' => $cv->user->id]) }}" target="_blank" class="d-block d-xl-flex card-project text-inherit px-3 py-4">
        <span class="avatar flex-shrink-0 mr-4">
          <img src="{{ asset('/images/'.$cv->image) }}">
          <span class="badge badge-dot badge-circle badge-secondary badge-status badge-md"></span>
        </span>
        <div class="flex-grow-1">
          <h5 class="fw-600 mb-1">{{ $cv->name }}</h5>
          <p class="opacity-50">{{ $cv->user->email }}</p>
          <div class="text-muted lh-1-8">
            <p class="text-truncate-3">{{ $cv->carObj }}</p>
          </div>

          <div class="d-flex text-secondary fs-12 mb-3">
            <div>
              <span>{{ $cv->address }}</span>
              <i class="las la-map-marker opacity-50"></i>
            </div>
          </div>
          <div>
            @foreach($cv->user->educations as $education)
            <span href="" class="btn btn-light btn-xs" tabindex="0">{{ $education->degree }}</span>
            @endforeach
          </div>
        </div>
        <div class="flex-shrink-0 pt-4 pt-xl-0 pl-xl-5 d-flex flex-row flex-xl-column justify-content-between align-items-center">
          <div class="text-right">

            <!-- <i class="las la-star"></i> -->
            <h4 class="mb-0">
              @if($cv->user->is_admin == 1)
              <i class="las la-star active"></i>
              @else
              <i class="fa fa-star-o" aria-hidden="true"></i>
              @endif
            </h4>
          </div>
          <div>
            <span class="btn btn-primary btn-sm">Show CV</span>
          </div>
        </div>
      </a>


    </div>
    @endforeach
    <div class="card-footer">
      <div class="aiz-pagination aiz-pagination-center flex-grow-1">
        <ul class="pagination">
          {{ $cvs->links() }}
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection
