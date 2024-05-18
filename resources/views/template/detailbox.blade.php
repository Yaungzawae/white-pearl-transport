{{-- <p>{{$data}}</p> --}}
<div class="details">
    <div class="parent-name">
        <p>Parent Name: {{$data["g1_first_name"]}} {{$data["g1_last_name"]}}</p>
    </div>
    <div class="children-school-names">
        <select name="child-name" id="child-name">
            <option value="volvo" selected="selected" disabled>Child's Name</option>
            <option value="saab">{{$data["first_name"]}} {{$data["first_name"]}} </option>
            <option value="opel">Child2</option>
            <option value="audi">Child3</option>
        </select>
        <p> School Name: Name</p>
    </div>
    <div class="alert-board">
        <p>Any Message! Alert Board!!!!!</p>
    </div>
</div>