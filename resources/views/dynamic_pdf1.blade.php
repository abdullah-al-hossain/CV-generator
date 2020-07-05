<img loading="lazy" src="{{ asset('/images/'.$userPersonalInfo->image) }}">
<div>
  <span>Name: {{ $userPersonalInfo->name }}</span>
  <p>Address: {{ $userPersonalInfo->address }}</p>
  <p>Email: {{ $userPersonalInfo->email }}</p>
  <p>Mobile: {{ $userPersonalInfo->mobile }}</p>
</div>
