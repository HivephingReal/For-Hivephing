@if(\Illuminate\Support\Facades\Session::has('success'))
    <div class="note note-success">
        <h4 class="block">Successful</h4>

        <p>Successfully {{\Illuminate\Support\Facades\Session::get('success')}}

        </p>
    </div>
@endif