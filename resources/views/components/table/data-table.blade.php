<div class="dataTable-container">
    <table class="table table-striped table-hover dataTable-table" id="table1">
      <thead class="bg-primary text-white">
        <tr>
            @foreach ($headers as $header)
             <th data-sortable="" style="width: {{ $header['width']}};" class="{{ $header['classes'] }}">
                <a href="#" class="{{ $header['sortClass']}}">{{ $header['name'] }}</a>
            </th>
            @endforeach
        </tr>
      </thead>
      <tbody>
        
        {{ $slot }}
        
      </tbody>
    </table>
  </div>
