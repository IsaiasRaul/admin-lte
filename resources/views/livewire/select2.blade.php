<div>
    <h1>Laravel 9 Livewire Select2 Example - Tutsmake.com</h1>
    <strong>Select2 Dropdown: {{ $selCity }}</strong>
    <div wire:ignore>
        <select class="form-control select2" id="select2" >
            <option value="">-- Select City --</option>
            @foreach($cities as $city)
                <option value="{{ $city }}">{{ $city }}</option>
            @endforeach
        </select>
    </div>
</div>
 
   
 
@push('scripts')
 
<script>
 
    $(document).ready(function() {
        $('#select2').select2(
            minimumResultsForSearch: 1,
            allowClear: true
        ); 
        $('#select2').on('change', function (e) {
            var data = $('#select2').select2("val");
            @this.set('selCity', data);
        });
    });
 
</script>
 
@endpush