<td>
  <div class="row">
    {{-- <div class="col-4 col-md-2">
      <div class="fa fa-home"></div>
      <img src="{{ $img ?? '' }}" width="60px" height="60px" class="img-fluid rounded-3" alt="...">
    </div> --}}
    <div class="col-8">
      <small>{{ $date ?? '' }}</small><br/>
      <p class="{{ $isMobile ? '' : 'h6' }}">
        <span class="fw-bold ">
          {{ $name ?? '' }}
        </span> <br>
        <small>{{ $comment ?? '' }}</small>
      </p>
    </div>
  </div>
</td>
{{-- IN / OUT --}}
<td class="fw-bold text-end h6">
  @if (($type ?? 'IN') == 'IN')
    <span class="text-success ">
      ${{ $money }} <i class="fa-solid fa-caret-down"></i>
    </span>
  @else
    - ${{ $money }} <i class="fa-solid fa-caret-up text-danger"></i>
  @endif
</td>
