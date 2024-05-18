{{-- @include("template/head",["css"=>"map"])
@include("template/navbar") --}}
    {{-- <div class="body-container">
    @if($type == "home_to_school")
        <h1>Home To School Bus</h1>
    @else
        <h1>School To Home Bus</h1>
    @endif --}}
        <div id="map"></div>

{{-- @include("template/footer")
@include("template/foot") --}}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function sendUpdateRequest(){
    return $.ajax({
            type: 'POST',
            url: '/get-bus-location',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                type: {!! json_encode($type) !!}
            }
            ,
            success: function(data) {
                return data; 
            },
            error: function(xhr, status, error) {
                // Handle error response if needed
                console.error('Error sending update request:', error);
            },
        });
    }


async function autoRefresh(){
    var data = await sendUpdateRequest();
    var {latitude, longitude} = data;
    console.log(data)
    if(latitude != "" && longitude != "" && latitude != null && longitude != null){
        map.innerHTML = '<iframe width = "600" height="300" src= "https://maps.google.com/maps?q= '+latitude+','+longitude+'&amp;z=15&amp;output=embed"></iframe>';
    } else {
        map.innerHTML = '<p> Not Available Now </p>'
    }
}
    autoRefresh();
    setInterval(autoRefresh, 5000);


</script>